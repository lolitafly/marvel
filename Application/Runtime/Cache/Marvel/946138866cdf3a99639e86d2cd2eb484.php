<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>超级英雄连连看</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,target-densitydpi=medium-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<link rel="stylesheet" href="/Public/Marvel/css/jquery.mobile-1.3.2.min.css">
		<link rel="stylesheet" href="/Public/Marvel/css/progressBar.css">
		<link rel="stylesheet" href="/Public/Marvel/css/style.css">
		<script src="/Public/Marvel/js/jquery-1.11.2.min.js"></script>
		<script src="/Public/Marvel/js/jquery.mobile-1.3.2.min.js"></script>
		<script src="/Public/Marvel/js/script.js"></script>
		<script src="/Public/Marvel/js/re.js"></script>
		<script type="text/javascript" src="/Public/Marvel/js/hero.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("img.start_btn").bind("tap", function() {
					var param={};
					param.phone=$("#phone").val();
					if(check(param)){
						$.ajax({
							url:'/marvel.php/Index/login',
							type:'post',
							dataType:'json',
							data:param,
							success:function(){
								$.mobile.changePage("#game", {
									transition : "flip"
								});
							},
							error:function(){
								alert("服务器连接错误！");
							}
						});
					}
				});
			});
			function check(p){
				if(!isPhone(p.phone)){
					alert("手机格式错误！");
					return false;
				}
				return true;
			}
			
			//离开游戏页时
			$(document).on("pagehide", "#game", function() {
				$(".meter span").stop();
				//动画停止
				clearInterval(mytimer);
				//倒计时停止
				
				var param={};
				param.score=score;
				//发送分数
				$.ajax({
					url:'/marvel.php/Index/submitScore',
					type:'post',
					dataType:'json',
					data:param,
				});
			});
		</script>
	</head>
	<body>
		<div data-role="page" style="" id="start">
			<img src="/Public/Marvel/images/tm.png" class="start_btn" />
			<div class="imgstore"></div>
			<form method="post" class="login_form">
				<input type="tel" placeholder="手机号码" id="phone">
			</form>
		</div>
		
		<div data-role="page" id="game">
			<div id="game-head">
				<p><label class="left">倒计时：<span id="time"></span></label><label class="right">得分：<span id="score">0</span></label></p>
				<div class="meter orange nostripes">
					<span style="width: 100%;"></span>
				</div>
			</div>
			<img src="/Public/Marvel/images/bar.png" class="bar"/>
			<div id="main"></div>
			<img src="/Public/Marvel/images/game_bottom.png" class="bottom"/>
		</div>
		
		<div data-role="page" style="" id="showScore">
			<div id="shareMask" class="shareMask">
				<img src="/Public/Marvel/images/shareImg.png" />
				<p>点击分享到朋友圈</p>
			</div>
			<p id="scoreText">游戏成绩为0分</p>
			<a href="#game" data-transition="flip"><div class="btn">再玩一次</div></a>
			<a href="#" data-transition="flip"><div class="btn">选座购票</div></a>
			<div id="shareBtn" class="btn">分享</div>
		</div>
		
	</body>
</html>