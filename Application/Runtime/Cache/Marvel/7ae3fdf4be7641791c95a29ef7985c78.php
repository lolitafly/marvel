<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>游戏排名</title>

    <!-- Bootstrap -->
    <link href="/Public/Marvel/system/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/Marvel/system/js/jquery-1.11.2.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    	var startFlag=false;
    	var startTime;
    	var timer=self.setInterval("fresh()",2000);
	    $(document).ready(function() {
	    	//开始
	    	$("#start_btn").bind("click", function(){
	    		$("#start_btn").addClass("disabled");
	    		startTime=GetCurrentTime(1);
	    		startFlag=true;
	    		$("#stop_btn").removeClass("disabled");
			});
			//停止
			$("#stop_btn").bind("click", function(){
	    		startFlag=false;
	    		$("#stop_btn").addClass("disabled");
	    		$("#reset_btn").removeClass("disabled");
			});
			//重置
			$("#reset_btn").bind("click", function(){
				$("#reset_btn").addClass("disabled");
	    		startFlag=false;
	    		$("#start_btn").removeClass("disabled");
	    		$("#scoreTable").html("");
			});
		});
		function fresh(){
			if(startFlag){
				var param={};
				param.startTime=startTime;
				$.ajax({
					url:'/marvel.php/System/getRanking',
					type:'post',
					dataType:'json',
					data:param,
					success:function(r){
						if(r){
							changeRanking(r);
						}
					},
					error:function(){
					}
				});
			}
		}
		
		function changeRanking(r){
			var html;
			for(var i=0;i<r.length;i++){
				html+="<tr>";
				html+="<td>"+Number(i+1)+"</td>";
				html+="<td>"+r[i].phone+"</td>";
				html+="<td>"+r[i].score+"</td>";
				html+="<td>"+r[i].createDate+"</td>";
				html+="</tr>";
			}
			$("#scoreTable").html(html);
		}
		
		function GetCurrentTime(flag) {
		    var currentTime = "";
		    var myDate = new Date();
		    var year = myDate.getFullYear();
		    var month = parseInt(myDate.getMonth().toString()) + 1; //month是从0开始计数的，因此要 + 1
		    if (month < 10) {
		        month = "0" + month.toString();
		    }
		    var date = myDate.getDate();
		    if (date < 10) {
		        date = "0" + date.toString();
		    }
		    var hour = myDate.getHours();
		    if (hour < 10) {
		        hour = "0" + hour.toString();
		    }
		    var minute = myDate.getMinutes();
		    if (minute < 10) {
		        minute = "0" + minute.toString();
		    }
		    var second = myDate.getSeconds();
		    if (second < 10) {
		        second = "0" + second.toString();
		    }
		    if(flag == "0")
		    {
		        currentTime = year.toString() + month.toString() + date.toString() + hour.toString() + minute.toString() + second.toString(); //返回时间的数字组合
		    }
		    else if(flag == "1")
		    {
		        currentTime = year.toString() + "-" + (month.toString()) + "-" + date.toString() + " " + hour.toString() + ":" + minute.toString() + ":" + second.toString(); //以时间格式返回
		    }
		    return currentTime;
		}
    </script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" >
	      	超级英雄连连看排名
	      </a>
	    </div>
	  </div>
	</nav>
	
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-4 col-md-offset-4">
	    	<table class="table table-striped">
	    		<thead>
		    		<th>#</th>
		    		<th>手机号码</th>
		    		<th>得分</th>
		    		<th>时间</th>
		    	</thead>
		    	<tbody id="scoreTable">
		    	</tbody>
			</table>
			<p class="pull-right">
			  <button type="button" class="btn btn-primary" id="start_btn">开始</button>
			  <button type="button" class="btn btn-danger disabled" id="stop_btn">停止</button>
			  <button type="button" class="btn btn-info disabled" id="reset_btn">重置</button>
			</p>
	    </div>
	  </div>
	</div>
	
</body>
</html>