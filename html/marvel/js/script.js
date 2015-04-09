var totaltime = 20;
var score = 0;
var mytimer;
//倒计时对象
$(document).ready(function() {
	// $.mobile.hidePageLoadingMsg();
	$("#shareBtn").bind("tap", function() {
		setTimeout(function() {
			$("#shareMask").show();
		}, 400)
	});
	$("#shareMask").bind("tap", function() {
		setTimeout(function() {
			$("#shareMask").hide();
		}, 400)
	});
});

$(document).on("pagebeforecreate", function() {
	loadImg();
	$.mobile.showPageLoadingMsg('a', "Please wait...");
});

function loadImg() {
	for (var i = 1; i <= imageTypeNum; i++) {
		var temp = "<img src=\"images/" + i + ".png\" />";
		$("div.imgstore").append(temp);
	}
}

//离开游戏页时
$(document).on("pagehide", "#game", function() {
	$(".meter span").stop();
	//动画停止
	clearInterval(mytimer);
	//倒计时停止
});

//游戏页面进入时
$(document).on("pagebeforeshow", "#game", function() {
	initial();
	gameReset();
	scoreReset();
	gogogo();
});

//进入分数页时
$(document).on("pagebeforeshow", "#showScore", function() {
	document.title = '超级英雄连连看我的分数为' + score + ",求超越！";

});

//离开分数页时
$(document).on("pagehide", "#showScore", function() {
	document.title = '超级英雄连连看';
});

function initial() {
	// 倒计时条
	$(".meter span").css("width", "100%");
	//倒计时时间
	$("#time").text(totaltime);
	//游戏中图片数量重置
	imageTotal = rowImageNum * colImageNum;
}

function scoreReset() {
	score = 0;
	$("#score").text(score);
}

function gogogo() {
	mytimer = setInterval("timer()", 1000);
	$(".meter span").animate({
		width : "0%"
	}, (totaltime + 1) * 1000);
}

//倒计时函数
function timer() {
	var temp = $("#time").text();
	if (temp == 0) {
		timeup();
	} else {
		$("#time").text(temp - 1);
	}
}

//时间到函数
function timeup() {
	$("#main img").unbind();
	$(".meter span").stop();
	//动画停止
	clearInterval(mytimer);
	//倒计时停止
	initial();
	$.mobile.changePage("#showScore", "pop");
	$("#scoreText").text("游戏成绩为" + score + "分");
}