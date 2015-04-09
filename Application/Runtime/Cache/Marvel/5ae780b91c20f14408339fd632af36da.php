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
	    $(document).ready(function() {
	    	$("#start_btn").bind("click", function(){
	    		
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
	
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-4 col-md-offset-4">
	    	<table class="table table-striped">
	    		<thead>
		    		<th>#</th>
		    		<th>手机号码</th>
		    		<th>得分</th>
		    	</thead>
		    	<tbody>
		    		<tr>
		    			<td>1</td>
		    			<td>1123</td>
		    			<td>1123</td>
		    		</tr>
		    		<tr>
		    			<td>2</td>
		    			<td>1123</td>
		    			<td>1123</td>
		    		</tr>
		    		<tr>
		    			<td>3</td>
		    			<td>1123</td>
		    			<td>1123</td>
		    		</tr>
		    		<tr>
		    			<td>4</td>
		    			<td>1123</td>
		    			<td>1123</td>
		    		</tr>
		    	</tbody>
			</table>
			<p class="pull-right">
			  <button type="button" class="btn btn-primary" id="start_btn">开始</button>
			  <button type="button" class="btn btn-danger" id="stop_btn">停止</button>
			</p>
	    </div>
	  </div>
	</div>
	
</body>
</html>