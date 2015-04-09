<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>格映科技项目管理系统</title>

    <!-- Bootstrap -->
    <link href="/Public/Marvel/system/css/bootstrap.css" rel="stylesheet">
    <script src="/Public/Marvel/system/js/jquery-1.11.2.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    	$(document).ready(function() {
	    	$("#login_btn").bind("click", function(){
	    		var param={};
	    		param.username=$("#username").val();
	    		param.password=$("#password").val();
	    		$.ajax({
					url:'/marvel.php/System/login',
					type:'post',
					dataType:'json',
					data:param,
					success:function(r){
						if(r==1){
							window.location.href="/marvel.php/System/show";
						}else{
							alert("信息填写错误！");
						}
					},
					error:function(){
						alert("服务器连接错误！");
					}
				});
			});
			$("form").submit(function (){ 
				return false;
			});
		});
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
  	
  	<div class="container">
		<form class="form-horizontal col-sm-offset-2 col-sm-6">
		  <div class="form-group   has-feedback">
		    <label for="username" class="col-sm-2 control-label">账号</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" placeholder="Username">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">密码</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <button type="submit" class="btn btn-default pull-right" id="login_btn">登 陆</button>
		      </div>
		    </div>
		  </div>
		</form>
  	</div>
	
  </body>
</html>