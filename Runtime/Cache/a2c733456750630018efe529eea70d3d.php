<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<title>Hello</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link type="text/css" href="__ROOT__/Public/css/bootstrap-responsive.css" rel="stylesheet">
<link type="text/css" href="__ROOT__/Public/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="__ROOT__/Public/js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Public/js/bootstrap.min.js"></script>
<script type="text/javascript">
checkVideo();
function checkVideo()
{
if(!!document.createElement('video').canPlayType)
  {
  var vidTest=document.createElement("video");
  oggTest=vidTest.canPlayType('video/ogg; codecs="theora, vorbis"');
  if (!oggTest)
    {
    h264Test=vidTest.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');
    if (!h264Test)
      {
    	location.href='__ROOT__/error.html';
      }
    else
      {
      if (h264Test=="probably")
        {
        }
      else
        {
        }
      }
    }
  else
    {
    if (oggTest=="probably")
      {
      }
    else
      {
      }
    }
  }
else
  {
	location.href='__ROOT__/error.html';
  }
}
</script>
<style type="text/css">
body{
	background: rgb(241,241,241);
	font-family: 微软雅黑;
	background-repeat:no-repeat;

}



/*滚动条样式=========================*/
::-webkit-scrollbar {
    width: 12px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 6px;
}

::-webkit-scrollbar-thumb {
    border-radius: 6px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}
/*=====================================*/

.faceimg {
	width:180px;
	height:180px;
	margin: 110px auto 0;
}

p {
	margin: 10px;
	text-align: center;
}

#lable {
	padding: 4px 10px 4px;
	background: rgba(235, 235, 235, .5);
	color: rgba(175, 175, 175, 0.9);
	font-weight: 600;
	text-shadow: 0 0px 0 rgba(0, 0, 0, 0);
}
.ifram{
	visibility:hidden;
}
.fileSelect{
	visibility:hidden;
}
.submit{
	visibility:hidden;
}
.container{
	overflow: hidden;
	width:940px;
}
.slide1,.silde2{
	width:940px;
	height:500px;
	float:left;
	margin:0 auto;
}
.slide1{
	background-repeat:no-repeat;
	background-image: url(__ROOT__/Public/img/backpng4.png);
	background-position:96% 146%;
}
.silde2{
	height:600px;
}
.slides{
	width:1880px;
}
.image{
    background: rgb(28,151,223);
	color:white;
	letter-spacing:-1px;
	font-size:33px;
	font-weight:800;
	text-shadow: 0px -1px 1px #1E2D4D;
	float:left;
	height:30px;
	line-height: 1;
	padding:5px;
	padding-bottom:6px;
	margin-top:-5px;
	margin-left:-3px;
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.image:HOVER{
	background: rgba(28,151,223,.7);
	color:white;
	padding:5px;
	padding-bottom:6px;
	cursor:pointer;
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}

.logo{
	padding:11px 0 0 18px;
	height:41px;
	min-width:500px;
	background:rgb(247,247,247);
	-webkit-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
	box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
	border-radius: 3px;
}


#appendedInputButton{
	color: rgba(90, 90, 90, .8);
	background: rgba(0, 0, 0, .1);
	/*box-shadow: 0 1px 0 rgba(255, 255, 255, .15),0px 1px 3px rgba(0, 0, 0, .2) inset;*/
	color: #B7D4EC	9;
	/*border: 1px solid rgb(196,200,202);*/
	background: #0C6EBF	9;
	letter-spacing: 1px;
	font-family: 微软雅黑;
	font-size: 13px;
	font-weight: bold;
	line-height: 18px;
	padding: 11px 14px;
	width:420px;
}
input[type="text"],input[type="password"]{
	font-size: 12px;
}

input::-webkit-input-placeholder {
	color: rgba(255, 255, 255,.6);
}
input:-moz-placeholder {
	color: rgba(255, 255, 255,.6);
}
.inputbox{
	width:578px;
	height:70px;
	margin:30px auto 0px;
}
.sanjiao,.text{
	float:left;
}
.sanjiao{
	width:10px;
}
.uface{
	width:75px;
	height:60px;
}
.talkbox-title-left-user {
	width: 0;
	height: 0;
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;
	border-left: 10px solid rgb(210,210,210);
	position: relative;
	top: 12px;
	left: -1px;
}
.talkbox-title-left-2-user {
	width: 0;
	height: 0;
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;
	border-left: 10px solid rgb(217, 217, 217);
	position: relative;
	top: -8px;
	left: -2px;
}
.uface2{
	float:left;
	margin-left:18px;
}
.img-polaroid{
	height:60px;
    width:60px;
    padding:0;
    border:1px;
    -webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px ;
}

.toolbar{
	width:190px;
	height:300px;
	float:right;
	margin-top:30px;
}
.context,.context-captain,.context-cirman,.context-msgcenter,.context-usercenter{
	width:720px;
	height:300px;
	float:left;
}
.friend{
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border:4px solid rgb(245, 245, 245);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	width:130px;
	background:rgb(247,247,247);
	overflow: hidden;
	line-height:0.7;
	float:left;
	margin-left:42px;
	margin-top:30px;
}
.f-face-img{
	width:120px;
	height:120px;
	font-size:13px;
}
.f-face{
	margin:5px auto 0;
	width:120px;
	height:120px;
	background:rgb(243,243,243);
	overflow: hidden;
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.muted{
	color: rgb(190,190,190);
	font-size:12px;
	text-align: left;
	letter-spacing:0px;
	left:-2px;
	position: relative;
}
.f-bottom{
	margin-top:1px;
	/*border-top: 1px solid rgb(255,255,255);*/
}
.group{
	background: rgb(248, 248, 248);
	text-align: left;
	padding: 10px 15px 8px;
	/*-webkit-box-shadow: 1px 1px 0px rgba(0,0,0,.2);
	-moz-box-shadow: 1px 1px 0px rgba(0,0,0,.2);*/
	box-shadow: 0 0 2px rgba(0,0,0,.2);
	border-radius: 2px;
	word-wrap:break-word;
	color: rgb(182, 182, 182);
	letter-spacing: 1px;
	font-weight:bold;
	font-size:12px;
	width:150px;
	margin-top:3px;
}

.group-top{
	background:rgb(28,151,223);
	color: rgba(250,250,250,.8);
}
.finfo{
	background: rgba(252, 252, 252, 0.9);
	padding: 2px 7px 2px;
	box-shadow: 0 0 2px rgba(0,0,0,.2);
	border-radius: 2px;
	word-wrap: break-word;
	color: rgb(97, 179, 255);
	letter-spacing: 1px;
	font-weight: bold;
	float:right;
	margin-left:4px;
	margin-top:-3px;
	cursor: pointer;
}
.finfo:HOVER{
	background: rgba(252, 252, 252, 0.5);
	color: rgba(250,250,250,.8);
}
.talkbox-title-left{
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 10px solid #d9d9d9;
			position:relative;
			top:15px;
			left:-11px;
}
.talkbox-title-left-2{
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 10px solid rgb(250,250,250);
			position:relative ;
			top:-5px;
			left:-10px;
}

.talkbox,.talkbox-user{
			background-color: rgb(250,250,250);
			border: 1px solid #d9d9d9;
			text-align: left;
			padding: 15px 20px 13px;
			margin-left:-72px;
			border-radius: 3px;
			-webkit-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
			box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
			word-wrap:break-word;
			max-width:370px;
			min-width:50px;
			position:relative;
			left:-76px;
			color:rgb(28,151,223);
			letter-spacing: 1px;
			font-weight:bold;
			font-size:15px;
}
.captain-talk {
	position: relative;
	left: -48px;
	z-index: 2;
}

.context-captain,.context-cirman{
	padding:40px 0 0 9px;
	background: ;
}

.user{
	margin-left:19px;
	display:none;
}

.talkbox-title-left-user-i {
	width: 0;
	height: 0;
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;
	border-left: 10px solid #147DCD;
	position: relative;
	top: 16px;
	left: 2px;
}

.talkbox-title-left-2-user-i {
	width: 0;
	height: 0;
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;
	border-left: 10px solid rgb(30, 149, 229);
	position: relative;
	top: -4px;
	left: 1px;
}

.talkbox-user{
	background: rgb(30, 149, 229);
	border: 1px solid #147DCD;
	position:relative;
	left:63px;
	color:#ffffff;
}

.talkbox{
	left:-58px;
}
.captain,.captain-cirman{
	margin-top:25px;
}
.cface{
	position:relative;
	left:23px;
}

.context-join{
	width:720px;
	float:left;
	margin-top:32px;
}

#circle-join-btn{
	padding:2px 3px 3px;
}
h5{
	margin:0;
}
.dl-horizontal dt{
	text-align:right;
	width:60px;
	font-size: 12px;
}
.dl-horizontal dd{
	margin-left:2px;
	font-size: 11px;
}

.first-li{
	margin-left:0px;
}

input::-webkit-input-placeholder {
    color:#999;
}
input:-moz-placeholder {
    color:#999;
}

.alert-info-uppass{
	width: 198px;
	padding: 3px 10px;
	font-size: 11px;
	float: left;
	color: #3a87ad;
	background-color: #d9edf7;
	border-color: #bce8f1;
}
.btn-upcirpass{
	background: rgb(30, 149, 229);
	letter-spacing: 2px;
	color: rgba(0, 59, 126, .8);
	box-shadow: 0 1px 0 rgba(0, 0, 0, .05),0 1px 0 rgba(255, 255, 255, .15) inset;
	border: 1px solid #147DCD;
	cursor: pointer;
	display: inline-block;
	font-size: 14px;
	font-weight: bold;
	font-family: 微软雅黑;
	line-height: 18px;
	text-shadow: 1px 1px 1px rgba(255, 255, 255, .2);
	padding: 10px 26px 10px;
	text-align: center;
	vertical-align: middle;
	border-radius: 5px;
	padding: 4px 14px 4px 15px;
	font-size: 11px;
	border-radius: 3px;
	margin-left: 21px;
}
.btn-upcirpass:HOVER {
	background: rgb(35,152,217);
	color: rgba(0, 59, 126, .8);
}
.lable-info-register:HOVER {
	cursor: pointer;
	background: rgba(38, 165, 235,.6);
}

.lable-info-register,.lable-info-password,.lable-info-agreefa,.lable-info-load{
	margin-top:1px;
	margin-left:8px;
	float: right;
	background: rgb(38, 165, 235);
}
.lable-info-agreefa{
	cursor:pointer;
}
tr{
	font-size:12px;font-family:微软雅黑;
	font-weight: normal;
	color:#999;
}
.group-center{
	padding: 7px 15px 5px;
	border-radius: 0px;
}

.group-center-blue{
	background:rgba(28,151,223,0.6); color:rgba(250,250,250,0.8);
}
.group-center:HOVER{
	background:rgb(28,151,223);
	color: rgba(250,250,250,.8);
	cursor: pointer;
}

.envelop-alert{
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	left:65px;
	top:-5px;
	z-index:99;
	cursor:default;
}

.android-down{
	background: rgb(95,176,60);
	color: white;
	letter-spacing: -1px;
	font-size: 15px;
	font-weight: 800;
	height: 30px;
	line-height: 1;
	padding: 5px;
	padding-bottom: 6px;
	margin-top: -5px;
	margin-left: -3px;
	line-height:2;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
	box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	margin-right:30px;
	cursor:pointer;
}

.android-down:hover{
	background: rgba(95,176,60,.8);
}

</style>
<script type="text/javascript">
	$(document).ready(function(){
		//调用首页查询所有好友方法
		queryMyFriend(0,1,null);

		requestMyInfo();

		$("li:eq(4)").css('marginLeft','0');

		$('.thumbnail').click(function(){
			$('.fileSelect').click();
		});

		//头像
		$('.fileSelect').change(function(){
			$('.label-firstimage-text').html('<img src=/Public/img/ajax-loader.gif>');
			$('.submit').click();
		});

		//查询用户点击圈子的圈子所包含所有人

		$.doSerCirFrien = function SerCirFrien(pagechange,pagenum,circleId,tagThis){
			if($('.friend-cir').length > 0 || $('.context-current-cir').css('display') == 'none'){
			$('.context-all').fadeOut(0);
			$('.context-current-cir').fadeIn(100);
			var circleId = circleId;
			$('.friend-cir').remove();
			$('.well').remove();
			$('#appendedInputButton').attr('placeholder','');
			$(".hidden-input").val('circle-person');
			$('.context-current-cir').append("<img style='margin-left:400px;' src='/Public/img/ajax-loader.gif' id='circle-serchper'>");

			//当pagechange分页状态为1的时候 则是用户点击了上一页 为2时
			if(pagechange == 1){
				pagenum = pagenum + 1;
			}else if(pagechange == 2){
				pagenum = pagenum - 1;
			}else if(pagechange == 0){
				pagenum = pagenum;
			}

			//var pagenumcurrent =
			$.post('/Index/serchCirclePersion',{circleId:circleId,pagenum:pagenum},function(data){
				$('#circle-serchper').remove();
				$.each(data['data'],function(index,content){

					if(content.appstatus != '1' && content.appstatus != '0' && content.appstatus != '-2' && content.appstatus != '3'){
						var html = "<button class='btn btn-mini btn-primary' type='button' style='float:right; margin-bottom:3px;' onclick=\"$.doFriendApply("+circleId+",'"+content.uemail+"',this)\">加为好友</button>";
					}else if(content.appstatus == '0'){
						var html = "<div style='text-align:right;font-size:13px; font-weight:bold; margin-right:11px; color:rgb(190,190,190); padding:3px;'>好友申请中</div>";
					}else if(content.appstatus == '1'){
						var html = "<div style='text-align:right;font-size:13px; font-weight:bold; margin-right:11px; color:rgb(190,190,190); padding:3px;'>我的好友</div>";
					}else if(content.appstatus == '-2'){
						var html = "<div style='text-align:right;font-size:13px; font-weight:bold; margin-right:11px; color:rgb(190,190,190); padding:3px;'>我自己</div>";
					}else if(content.appstatus == '3'){
						var html = "<div style='text-align:right;font-size:13px; font-weight:bold; margin-right:11px; color:rgb(190,190,190); padding:3px;'>已被其申请好友</div>";
					}

					$('.context-current-cir').append("<div class='friend friend-cir'><div class='f-face'><img style='display:none;' onload='imgOnload(this);' src='/Public/Uploads/"+content.faceimg+"' class='f-face-img'></div><div class='f-bottom'><p class='muted'>"+content.uname+"&nbsp&nbsp</p><p class='muted muted-phone'>"+content.phonenumber+"</p><p>"+html+"</p></div></div>");
				});

				if(data['pageif'] == '-1'){
				}else{
					var pageoldhtml = '';
					var pagenexthtml = '';
					if(data['pageold'] == '1'){
						var pageoldhtml = "<button type='button' class='btn btn-small btn-block btn-primary' onclick=\"$.doSerCirFrien(2,"+pagenum+","+circleId+",this)\">上一页</button>";
					}

					if(data['pagenext'] == '1'){
						var pagenexthtml = "<button type='button' class='btn btn-small btn-block' onclick=\"$.doSerCirFrien(1,"+pagenum+","+circleId+",this)\">下一页</button>";
					}

					var infohtml = "<div class='alert alert-info' style='font-size:11px; border-color:#d9edf7;margin-bottom:6px; padding:3px 5px;'>共"+data['pagenumCount']+"页&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp第<span style=' font-weight:bold; font-size:13px;'>"+pagenum+"</span>页</div>";
					$('.context-current-cir').append("<div class='well' style='width: 124px;  padding:6px; margin-left:42px; margin-top:30px;float:left; '>"+infohtml+pageoldhtml+pagenexthtml+"</div>");
				}
			});

			}
		}

		//点击logo返回首页
		$('.image').click(function(){
			$('.context-all').fadeOut(0);
			$('.context-showfriend').fadeIn(100);

			$('#appendedInputButton').attr('placeholder','输入电话或姓名查找自己的好友');
			$(".hidden-input").val('normal');
			queryMyFriend(0,1,null);
		});

		//点击用户个人中心usercenter按钮 进入用户个人资料修改编辑页面
		$('.btn-usercenter').click(function(){
			$('.context-all').fadeOut(0);
			$('.context-usercenter').fadeIn(100);

			$('.alter-info-usercenter').css('display','none');
			$('#appendedInputButton').attr('placeholder','');
			$(".hidden-input").val('user-center');
		});

		//点击加为好友按钮时 ，提交被申请好友id号以及所在圈子id号
		$.doFriendApply = function friendApplyClick(circleid,uemail,tagThis){
			$(tagThis).html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			$(tagThis).attr('class','btn btn-mini btn-primary disabled');

			var uemail2 = uemail;
			$.post("/Index/applyFriend",{circleid:circleid,uemail2:uemail2},function(data){
				if(data['info'] == '1'){
					$(tagThis).parent().html("<div style='text-align:right;font-size:13px; font-weight:bold; margin-right:11px; color:rgb(190,190,190); padding:3px 0 3px;'>申请已提交</div>");
				}else{
					$(tagThis).html("失败,点击重试");
					$(tagThis).attr('class','btn btn-mini btn-primary');
				}
			});
		}

		//搜索当前登录用户已加入的圈子
		$('#s-mycircle').click(function(){
			$('.toolbar').append("<div class='group group-center' >"+"正在查询..."+"</div>");
			$.post('/Index/myCircle',{},function(data){
				$('.group-center').remove();
				if(data['status'] == '0'){
					$('.toolbar').append("<div class='group group-center' >"+"你还没有加入或创建的圈子..."+"</div>");
				}else{
					$('.toolbar').append("<div class='group group-center group-center-blue' onclick='allmyfriend()'>"+"全部好友"+"</div>");
					$.each(data,function(index,content){
						if(content.isCreater=='1'){
							$('.toolbar').append("<div class='group group-center group-center-blue' onclick='$.doSerCirFrien(0,1,"+content.circleid+",this)'>"+content.circlename+"<i class='icon-wrench icon-white' style='float:right; cursor:pointer; margin-top:3px;' onmouseout='$.doCirMngOut(this)' onmouseover='$.doCirMngOver(this)' onclick=\"$.doCirMng("+content.circleid+","+content.count+",'"+content.time+"',this)\"></i></div>");
						}else{
							$('.toolbar').append("<div class='group group-center' onclick='$.doSerCirFrien(0,1,"+content.circleid+",this)'>"+content.circlename+"</div>");
						}

					});
				}
			});
		});

		function showMyCircle(){
			$.post('/Index/myCircle',{},function(data){
				$('.group-center').remove();
				$.each(data,function(index,content){
					if(content.isCreater=='1'){
						$('.toolbar').append("<div class='group group-center' style='background:rgba(28,151,223,0.6); color:rgba(250,250,250,0.8);'>"+content.circlename+"<i class='icon-wrench icon-white' style='float:right; cursor:pointer; margin-top:3px;' onmouseout='$.doCirMngOut(this)' onmouseover='$.doCirMngOver(this)' onclick=\"$.doCirMng("+content.circleid+","+content.count+",'"+content.time+"',this)\"></i></div>");
					}else{
						$('.toolbar').append("<div class='group group-center'>"+content.circlename+"</div>");
					}
				});
			});
		}
		$('#s-mycircle').click();

		//点击创建圈子之后 将现有context界面隐藏 然后吸纳实处captain对话框
		$('.create-circle').click(function(){
			$('#appendedInputButton').attr('placeholder','输入你要创建的圈子名称 点击头像发送');
			$('.hidden-input').attr('value','hidden-circle');

			$('.context-all').fadeOut(0);
			$('.context-captain').fadeIn(200);
		});

		//当用户在创建圈子界面 输入圈子姓名时 获取隐藏input的value值 为hidden-circle

		//点击加入圈子按钮
		$('.join-circle').click(function(){
			$('#appendedInputButton').attr('placeholder','输入圈子名称或圈子号可以查找你要加入的圈子  点击头像发送');
			$('.hidden-input').attr('value','joinCircleInput');
			$('.context-all').fadeOut(0);
			$('.context-join').fadeIn(150);
			serchCircleNew();
		});

		//计数器 当计数器大于零时说明为第二次输入值并且点击
		var count = 0;
		//点击用户头像发送输入框数据
		$("#button-face").click(function(){
			//获取当前输入框的值
			var appendVal = $("#appendedInputButton").val().trim();

			if(appendVal != ''){
				//判断隐藏input的值
				var hiddenInput = $(".hidden-input").val();
				var bfid = $(".button-face").attr("id");

				//创建圈子页面的点击头像按钮操作
				if(hiddenInput == 'hidden-circle' && bfid != 'boff'){
					$("#button-face").animate({opacity:'0.4'},100);
					$(".button-face").attr('id','boff');
					//获取当前用户输入框的值
					var circleName = $("#appendedInputButton").val().trim();

					if(count>0){
						$('#user').fadeOut(10,function(){
							$('#user').remove();
							$('.captain').fadeOut(10,function(){
								$('.captain').remove();
								//在船长对话框之前添加 用户本人对话框
								$(".context-captain").append("<div class='row user' id='user'><div class='span5 offset2'><div class='talkbox-user'>"+circleName+"</div></div><div class='span1'><div class='talkbox-title-left-user-i'></div><div class='talkbox-title-left-2-user-i'></div></div></div>");
								$(".user").fadeIn(200,function(){
									//将圈子名称异步提交至action处理程序
									$.post('/Index/doCircle',{circlename:circleName},function(data,status){
										$(".context-captain").append("<div class='row captain' style='display:none'><div class='span2 offset1'><div class='cface'><img src='__ROOT__/Uploads/4.jpg' class='img-polaroid'></div></div><div class='span1 captain-talk'><div class='talkbox-title-left'></div><div class='talkbox-title-left-2'></div></div><div class='span5'><div class='talkbox'>"+data['info']+"</div></div></div>");
										$('#s-mycircle').click();
										$(".captain").fadeIn(200,function(){
											$(".button-face").animate({opacity:'1'},10,function(){
												$(".button-face").attr('id','button-face');
											});
										});
									});
								});
							});
						});
					}else{
						count = count + 1;
						//移除船长对话框
						$(".captain").fadeOut(10,function(){
							$(".captain").remove();
							//在船长对话框之前添加 用户本人对话框
							$(".context-captain").append("<div class='row user' id='user'><div class='span5 offset2'><div class='talkbox-user'>"+circleName+"</div></div><div class='span1'><div class='talkbox-title-left-user-i'></div><div class='talkbox-title-left-2-user-i'></div></div></div>");
							$(".user").fadeIn(300,function(){
								//将圈子名称异步提交至action处理程序
								$.post('/Index/doCircle',{circlename:circleName},function(data,status){
									$(".context-captain").append("<div class='row captain' style='display:none'><div class='span2 offset1'><div class='cface'><img src='__ROOT__/Uploads/4.jpg' class='img-polaroid'></div></div><div class='span1 captain-talk'><div class='talkbox-title-left'></div><div class='talkbox-title-left-2'></div></div><div class='span5'><div class='talkbox'>"+data['info']+"</div></div></div>");
									$(".captain").fadeIn(200,function(){
										$('#s-mycircle').click();
										$(".button-face").animate({opacity:'1'},10,function(){
											$(".button-face").attr('id','button-face');
										});
									});
								});
							});
						});
					}
				}

				//搜索圈子页面的操作
				if(hiddenInput == 'joinCircleInput' && bfid != 'boff'){
					$("#button-face").animate({opacity:'0.4'},100);
					$(".button-face").attr('id','boff');
					//获取输入框的查询条件如圈子id和圈子名称  post到后台

						$('.thumbnails-ser').html("<input name='circleMark' type='hidden' class='repend-cl'/>");
						$('.thumbnails-ser').fadeIn(200,function(){
							$('.thumbnails-ser').html("<p style='text-align:center;'><img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'></p>");

							$.post('/Index/serchCircle',{circleName:appendVal},function(data,status){
								if(data == null){
									$('.thumbnails-ser').html("<p class='p-applymsg' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>暂时没有这个圈子..</p>");
									$(".button-face").animate({opacity:'1'},10,function(){
										$(".button-face").attr('id','button-face');
									});
								}else{
									$('.thumbnails-ser').html("<ul class='thumbnails-ser-ui' style='margin-bottom:0px;'></ul>");
									var ei = 0;
									$.each(data,function(index,content){
										$("li").css('marginBottom','20px');
										var liStyle = '';
										if(ei==4){
											var liStyle = 'margin-left:0px';
										}
										//是否已经加入该圈子
										if(content.isJo == 1){
											var isJo = "<div style='text-align:right;font-size:13px; font-weight:bold;'>已加入</div>";
										}else if(content.password != null){
											var isJo = "<button  style='font-size:12px;' type='button' class='btn btn-primary  circle-"+content.id+"' onclick='$.doJoin("+content.id+",this,1)'>加入圈子</button>";
										}else{
											var isJo = "<button  style='font-size:12px;' type='button' class='btn btn-primary  circle-"+content.id+"'' onclick='$.doJoin("+content.id+",this,2)'>加入圈子</button>";
										}
										$('.thumbnails-ser-ui').append("<li class='span3 first-li' style='"+liStyle+"'><div class='thumbnail'><div class='caption'><h5 style='color:#666'>"+content.name+"</h5><dl class='dl-horizontal'><dt>圈子编号：</dt><dd>"+content.id+"</dd><dt>成员数量：</dt><dd>"+content.count+"</dd><dt>创建人：</dt><dd>"+content.createname+"</dd><dt>创建日期：</dt><dd>"+content.time+"</dd></dl><p class='join_btn' style='text-align:right;margin:0px;'>"+isJo+"</p></div></div></li>");
										ei = ei+1;
									});
									$(".button-face").animate({opacity:'1'},10,function(){
										$(".button-face").attr('id','button-face');
									});
								}
							});

						});

				}

			}

		});

		$.doCirMngOver = function circleMngMouseover(tagThis){
			$(tagThis).attr('class','icon-wrench');
		}
		$.doCirMngOut = function circleMngMouseout(tagThis){
			$(tagThis).attr('class','icon-wrench icon-white');
		}
		$.doCirMng = function circleMng(circleid,count,time,tagThis){
			event.stopPropagation();
			$(".hidden-input").val('manage');
			$('.context-all').fadeOut(0);
			$('.context-cirman').fadeIn(200);
			$('.captain-cirman').fadeIn(200);
			$('#td-circleid').html(circleid);
			$('#td-count').html(count);
			$('#td-time').html(""+time);
			$('.label-info-cirinfoshow').css('opacity','0.6');
			$('.label-info-uppass').css('opacity','1');
			$('.register').css('display','none');
			$('.cirmman-info').css('display','block');
			$('.circleid-hidden').val(circleid);
		}

		//查看圈子信息
		$('.label-info-cirinfoshow').click(function(){
			$('.label-info-cirinfoshow').css('opacity','0.6');
			$('.label-info-uppass').css('opacity','1');
			$('.register').fadeOut(100,function(){
				$('.cirmman-info').fadeIn(200);
			});
		});

		//设置圈子密码界面
		$('.label-info-uppass').click(function(){
			$('.label-info-uppass').css('opacity','0.6');
			$('.label-info-cirinfoshow').css('opacity','1');
			$('.cirmman-info').fadeOut(100,function(){
				$('.register').fadeIn(200);
			});
		});

		//新密码提交
		$('.btn-upcirpass').click(function(){
			var circleid = $('.circleid-hidden').val();
			var password = $('.rPassword').val();

			$('.btn-upcirpass').attr('disabled',true);
			$('.alert-info-uppass').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'></p>");
			$.post('/Index/upcirpass',{circleid:circleid,cirpassword:password},function(data){
				$('.alert-info-uppass').html(data['info']);
				$('.btn-upcirpass').html('提交');
				$('.btn-upcirpass').attr('disabled',false);
			});
		});

		//加入根据圈子id号加入圈子
		$.doJoin = function(circleId,tagThis,modelMark){
			//如果modelMark为1 则说明圈子需要密码 若为2 则不需要
			if(modelMark == 1){
				$('.modal-1').modal('toggle');
				$('#input-joinCirpass').val('');
				$('#input-joinCirId').val(circleId);
				$('.hide-join-pass1').css('display','block');
				$('.hide-join-pass2').css('display','none');
				$('.hide-join-pass3').css('display','none');
				$('#alert-info-uppass-join').html('提交后若页面长时间无反应请刷新重试');
				$('#btn-joincir-passwordup').html('提交');
				$('#btn-joincir-passwordup').attr('disabled',false);
			}else if(modelMark == 2){
				$('.modal-1').modal('toggle');
				$('#input-joinCirpass').val('');
				$('#input-joinCirId').val(circleId);
				$('.hide-join-pass1').css('display','none');
				$('.hide-join-pass2').css('display','block');
				$('.hide-join-pass3').css('display','none');
				$('#btn-joincir-true').html('确认');
				$('#btn-joincir-true').attr('disabled',false);
				$('#alert-info-nopass-info').remove();
			}else{
				$(tagThis).html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
				$.post('/Index/doJoinCircle',{circleId:circleId},function(data){
					//若异步返回值为1 则加入圈子成功
					if(data['info']==1){
						$(tagThis).parent().html("<div style='text-align:right;font-size:13px; font-weight:bold; padding:5px 0 5px;'>已加入</div>");
					}else{
						alert(data['info']);
					}
				});
			}
		}

		//当不需要密码就可以加入的圈子 确认按钮处理
		$('#btn-joincir-true').on('click',function(){
			var circleId = $('#input-joinCirId').val();
			$('#btn-joincir-true').attr('disabled','true');
			$('#btn-joincir-true').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			//$('#circle-'+circleId).html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			$.post('/Index/doJoinCircle',{circleId:circleId},function(data){
				//若异步返回值为1 则加入圈子成功
				if(data['info']==1){
					$('.circle-'+circleId).parent().html("<div style='text-align:right;font-size:13px; font-weight:bold; padding:5px 0 5px;'>已加入</div>");
					$('#btn-joincir-true').html('加入成功');
					$('.modal').modal('hide');
					$('#s-mycircle').click();
				}else if(data['info']=='-200'){
					$('#btn-joincir-true').before('<div class="alert alert-info alert-info-uppass" id="alert-info-nopass-info" style="margin-left:125px;font-size:13px;text-align:left;width:258px;text-align:center;">加入非自己创建圈子个数暂时不能超过8个</div>');
				}else{
					alert(data['info']);
				}
			});
		});

		//但圈子需要密码时  用户加入圈子时点击按钮提交圈子密码
		$('#btn-joincir-passwordup').click(function(){
			//获取密码和圈子id号
			var passWord = $('#input-joinCirpass').val();
			var circleId = $('#input-joinCirId').val();
			$('#btn-joincir-passwordup').attr('disabled','true');
			$('#btn-joincir-passwordup').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			//$('#alert-info-uppass-join').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");

			$.post('/Index/doJoinCircle',{passWord:passWord,circleId:circleId},function(data){
				if(data['info'] == 3){
					$('#alert-info-uppass-join').html('密码不正确，加入失败');
					$('#btn-joincir-passwordup').attr('disabled',false);
					$('#btn-joincir-passwordup').html('提交');
				}else if(data['info']=='-200'){
					$('#alert-info-uppass-join').html('加入非自己创建圈子个数暂时不能超过8个');
				}else{
					$('.circle-'+circleId).parent().html("<div style='text-align:right;font-size:13px; font-weight:bold; padding:5px 0 5px;'>已加入</div>");
					$('#alert-info-uppass-join').html('加入成功!');
					$('.modal').modal('hide');
					$('#s-mycircle').click();
				}
			});
		});

		//计时器 每5秒请求一次服务器查询新消息数目
		var scrollTimer;
		getNewMsgNum();
		scrollTimer = self.setInterval("getNewMsgNum()",7000);

		//点击信息中心按钮时 查看新的好友申请信息
		$(".btn-msgcenter").click(function(){
			$('.hidden-input').val('hidden-msgcenter');
			$('#appendedInputButton').attr('placeholder','');
			$('.context-all').fadeOut(0);
			$('.context-msgcenter').fadeIn(200);

			//同时将 所有查看状态为0的信息查看状态设置为1
			var status = '1';
			$(".envelop-alert").css('display','none');
			$(".normal-user").remove();
			$(".p-applymsg").remove();

			$.post('/Index/upAppMsgStatus',{status:status},function(data){
				if(data['status'] == '1'){
					$.each(data['info'],function(index,content){
						$('.context-msgcenter').append("<div class='row normal-user' style='margin-top:40px;'><div class='span2 offset1'><div class='cface'><img style='display:none;'  onload='imgOnload(this);' src='__ROOT__/Public/Uploads/"+content.ufaceimg2+"' class='img-polaroid'></div></div><div class='span1 captain-talk'><div class='talkbox-title-left'></div><div class='talkbox-title-left-2'></div></div><div class='span5'><div class='talkbox'>我是<span style='color:#888'>"+content.uname2+"</span>在圈子<span style='color:#999'>"+content.circlename+"</span>中申请和你成为好友！<P style='text-align:right;margin: 5px 0 -4px;'><span class='label label-info lable-info-agreefa' id='lable-info-agreefa' style='float:none; margin-left:0;' onclick=\"applyAgree('"+content.uemail2+"',this)\">同意</span>&nbsp<span class='label label-info lable-info-agreefa' id='lable-info-agreefa' style='float:none; margin-left:2px;' onclick=\"applyCancel('"+content.uemail2+"',this)\">拒绝</span></p></div></div></div>");
					});

				}else{
					$('.context-msgcenter').append("<p class='p-applymsg' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>暂时没有任何信息..</p>");
				}
			});

		});

		//在查询自己全部好友页面 当输入框值改变的时候
		$('#appendedInputButton').keyup(function(){
			var condition = $('#appendedInputButton').val().trim();
			var hiddenInput = $(".hidden-input").val();
			if($('.smyfri-hidden-value').val() != condition && hiddenInput == 'normal'){
				$('.smyfri-hidden-value').val(condition);
				queryMyFriend(0,1,condition);
			}

		});




	});

	//首页查询所有好友
	function queryMyFriend(pagechange,pagenum,condition){
	 if($('.friend').length>0 || $('.showfriend-p').length>0){
		$('.well').remove();
		$('.friend').remove();
		$('.showfriend-p').remove();
		$('.nofriend-info').remove();
		$('#appendedInputButton').attr('placeholder','输入电话或姓名查找自己的好友');
		var condition = condition;

		//当pagechange分页状态为1的时候 则是用户点击了上一页 为2时
		if(pagechange == 1){
			pagenum = pagenum + 1;
		}else if(pagechange == 2){
			pagenum = pagenum - 1;
		}else if(pagechange == 0){
			pagenum = pagenum;
		}

		$.post('/Index/queryMyFriend',{pagenum:pagenum,condition:condition},function(data){

			if(data['info'] != null){
				$.each(data['info'],function(index,content){
					$('.context-showfriend').append("<div class='friend'><div class='f-face'><img style='display:none;' onload='imgOnload(this);' src='__PUBLIC__/Uploads/"+content.faceimage1+"' class='f-face-img'></div><div class='f-bottom'><p class='muted'>"+content.uname1+"&nbsp;&nbsp;</p><p class='muted muted-phone'>"+content.uphonenumber1+"</p></div></div>");
				});
			}else{
				//当查询全部好友时
				if(condition == null){
					$('.context-showfriend').append("<div class='alert alert-block alert-info nofriend-info fade in' style='width:550px; margin-top:32px; margin-left:120px;'><h4 class='alert-heading' style='text-align:center;'>目前你还没有任何好友！</h4><p style='text-align:left;'>&nbsp好友间才能看到对方电话号码，哥这下不会丢谁的电话了~</p><p style='text-align:left;'>1.创建新的圈子然后邀请好友加入 </p><p style='text-align:left;'>2.加入已有的圈子并在圈子中添加你所认识的好友</p><p><button class='btn btn-success nf-joincircle' onclick='nofjoincircle()'>加入圈子</button>&nbsp&nbsp&nbsp<button class='btn nf-createcircle' onclick='nofcreatecir()'>创建圈子</button></p></div>");
				}else{
					$('.context-showfriend').append("<p class='showfriend-p' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>你好友中没有你搜索的这个人！</P>");
				}
			}

			if(data['pageif'] == '-1'){
			}else{
				var pageoldhtml = '';
				var pagenexthtml = '';
				if(data['pageold'] == '1'){
					if (condition == null){
						var pageoldhtml = "<button type='button' class='btn btn-small btn-block btn-primary' onclick=\"queryMyFriend(2,"+pagenum+","+condition+")\">上一页</button>";
					}else{
						var pageoldhtml = "<button type='button' class='btn btn-small btn-block btn-primary' onclick=\"queryMyFriend(2,"+pagenum+",'"+condition+"')\">上一页</button>";
					}
				}
				if(data['pagenext'] == '1'){
					if (condition == null){
						var pagenexthtml = "<button type='button' class='btn btn-small btn-block' onclick=\"queryMyFriend(1,"+pagenum+","+condition+")\">下一页</button>";
					}else{
						var pagenexthtml = "<button type='button' class='btn btn-small btn-block' onclick=\"queryMyFriend(1,"+pagenum+",'"+condition+"')\">下一页</button>";
					}
				}
				var infohtml = "<div class='alert alert-info' style='font-size:11px; border-color:#d9edf7;margin-bottom:6px; padding:3px 5px;'>共"+data['pagenumCount']+"页&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp第<span style=' font-weight:bold; font-size:13px;'>"+pagenum+"</span>页</div>";
				$('.context-showfriend').append("<div class='well' style='width: 124px;  padding:6px; margin-left:42px; margin-top:30px;float:left; '>"+infohtml+pageoldhtml+pagenexthtml+"</div>");
			}
		});
	  }


		//点击用户中心 资料修改按钮btn-usercenter
		$('.btn-usercenter-change').click(function(){
			$('.alter-info-usercenter').css('display','none');
			var phonenumber = $('#inputphone-usercenter').val().trim();
			$('.btn-usercenter-change').attr('class','btn btn-usercenter-change disabled');
			$('.btn-usercenter-change').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			$.post('/Index/alterUserMsg',{phonenumber:phonenumber},function(data){
				$('.btn-usercenter-change').attr('class','btn btn-usercenter-change');
				$('.btn-usercenter-change').html("确定修改");
				$('.alter-info-usercenter').html(data['info']);
				$('.alter-info-usercenter').fadeIn(200);
			});
		});


		//点击退出按钮
		$('.warning').click(function(){
			$('.hide-join-pass1').css('display','none');
			$('.hide-join-pass2').css('display','none');
			$('.hide-join-pass3').css('display','block');
		});

		//判断div slide1 是否存在 如果不存在直接显示导航栏按钮
		 var CountSlide1 = $('.slide1').length;
		if(CountSlide1>0){

		}else{
			$('.btn-usercenter').fadeIn(0);
			$('.btn-msgcenter').fadeIn(0);
			$('#warning-temp').fadeOut(0);
			$('#warning-use').fadeIn(0);
		}

	}

	//点击同意好友申请
	var applyAgreeMark = 1;
	function applyAgree(uemail,thisTag){
		if(applyAgreeMark == 1){
			applyAgreeMark = 0;
			$(thisTag).html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			$.post('/Index/applyAgree',{uemail:uemail},function(data){
				if(data['status'] == '1'){
					$(thisTag).html('成功');
					$(thisTag).parent().parent().parent().parent().fadeOut(600,function(){
						var childrenLen = $('.context-msgcenter').children().length;
						if(childrenLen == 1){
							//$('.context-msgcenter').append("<p class='p-applymsg' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>暂时没有任何好友申请信息..</p>");
							queryFrApp();
						}
					});
				}else{
					$('#lable-info-agreefa').html('重试');
					applyAgreeMark = 1;
				}
			});
		}
	}

	/*查询所有好友申请信息*/
	function queryFrApp(){
		$('.hidden-input').val('hidden-msgcenter');
		$('#appendedInputButton').attr('placeholder','');
		$('.context-all').fadeOut(0);
		$('.context-msgcenter').fadeIn(200);

		//同时将 所有查看状态为0的信息查看状态设置为1
		var status = '1';
		$(".envelop-alert").css('display','none');
		$(".normal-user").remove();
		$(".p-applymsg").remove();
		$.post('/Index/upAppMsgStatus',{status:status},function(data){
			if(data['status'] == '1'){
				$.each(data['info'],function(index,content){
					$('.context-msgcenter').append("<div class='row normal-user' style='margin-top:40px;'><div class='span2 offset1'><div class='cface'><img src='__ROOT__/Uploads/4.jpg' class='img-polaroid'></div></div><div class='span1 captain-talk'><div class='talkbox-title-left'></div><div class='talkbox-title-left-2'></div></div><div class='span5'><div class='talkbox'>我是<span style='color:#888'>"+content.uname2+"</span>在圈子<span style='color:#999'>"+content.circlename+"</span>中申请和你成为好友！<P style='text-align:right;margin: 5px 0 -4px;'><span class='label label-info lable-info-agreefa' id='lable-info-agreefa' style='float:none; margin-left:0;' onclick=\"applyAgree('"+content.uemail2+"',this)\">同意</span>&nbsp<span class='label label-info lable-info-agreefa' id='lable-info-agreefa' style='float:none; margin-left:2px;' onclick=\"applyCancel('"+content.uemail2+"',this)\">拒绝</span></p></div></div></div>");
				});
			}else{
				$('.context-msgcenter').append("<p class='p-applymsg' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>暂时没有任何信息..</p>");
			}
		});
	}

	//查找最新全部圈子
	function serchCircleNew(){
		var appendVal = null;
		$.post('/Index/serchCircle',{circleName:appendVal},function(data,status){
			if(data == null){
				$('.thumbnails-ser').html("<p class='p-applymsg' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>暂时没有这个圈子..</p>");
			}else{
				$('.thumbnails-ser').html("<ul class='thumbnails-ser-ui' style='margin-bottom:0px;'></ul>");
				var ei = 0;
				$.each(data,function(index,content){
					$("li").css('marginBottom','20px');
					var liStyle = '';
					if(ei==4){
						var liStyle = 'margin-left:0px';
					}
					//是否已经加入该圈子
					if(content.isJo == 1){
						var isJo = "<div style='text-align:right;font-size:13px; font-weight:bold;'>已加入</div>";
					}else if(content.password != null){
						var isJo = "<button  style='font-size:12px;' type='button' class='btn btn-primary  circle-"+content.id+"' onclick='$.doJoin("+content.id+",this,1)'>加入圈子</button>";
					}else{
						var isJo = "<button  style='font-size:12px;' type='button' class='btn btn-primary  circle-"+content.id+"'' onclick='$.doJoin("+content.id+",this,2)'>加入圈子</button>";
					}
					$('.thumbnails-ser-ui').append("<li class='span3 first-li' style='"+liStyle+"'><div class='thumbnail'><div class='caption'><h5 style='color:#666'>"+content.name+"</h5><dl class='dl-horizontal'><dt>圈子编号：</dt><dd>"+content.id+"</dd><dt>成员数量：</dt><dd>"+content.count+"</dd><dt>创建人：</dt><dd>"+content.createname+"</dd><dt>创建日期：</dt><dd>"+content.time+"</dd></dl><p class='join_btn' style='text-align:right;margin:0px;'>"+isJo+"</p></div></div></li>");
					ei = ei+1;
				});
			}
		});
	}

	//点击拒绝好友申请
	var applyCancelMark = 1;
	function applyCancel(uemail,thisTag){
		if(applyCancelMark == 1){
			applyCancelMark = 0;
			$(thisTag).html("<img  src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
			$.post('/Index/applyCancel',{uemail:uemail},function(data){
				if(data['status'] == '1'){
					$(thisTag).html('已取消');
					$(thisTag).parent().parent().parent().parent().fadeOut(600,function(){
						var childrenLen = $('.context-msgcenter').children().length;
						if(childrenLen == 1){
							//$('.context-msgcenter').append("<p class='p-applymsg' style='text-align:center; font-size:15px; font-weight:bold; color:#999; margin-left:100px;'>暂时没有任何好友申请信息..</p>");
							queryFrApp();
						}
					});
				}else{
					$('#lable-info-agreefa').html('重试');
					applyCancelMark = 1;
				}
			});
		}
	}

	//上传头像成功后处理
	function notice(msg){
		var m = msg;
		if(m == "1"){
			$('.label-firstimage-text').html("上传成功");
			requestMyInfo();
			$(".slide1").animate({'margin-left':'-940px','opacity':'0.0',},1800);
			$('.btn-usercenter').fadeIn(500);
			$('.btn-msgcenter').fadeIn(500);
			$('#warning-temp').fadeOut(0);
			$('#warning-use').fadeIn(500);
		}else{
			alert(msg);
		}
	}

	//请求服务器获取头像等个人资料
	function requestMyInfo(){
		$.post('/Index/requestMyInfo',{},function(data){
			//$('.label-firstimage-text').html('请点击图片上传真实头像');
			$('#img-polaroid-myface').attr('src','/Public/Uploads/'+data['faceimage']);
		});
	}

	//请求服务器端查询有多少未查看的新好友请求信息
	function getNewMsgNum(){
		$.post('/Index/getNewMsgNum',function(data){
			if(data['info'] != '0'){
				$('.envelop-alert').css('display','block');
				$('.envelop-alert').html('&nbsp'+data['info']);
			}else{
				$('.envelop-alert').css('display','none');
			}
		});
	}

	function nofcreatecir(){
		$('.create-circle').click();
	}

	function nofjoincircle(){
		$('.join-circle').click();
	}

	function allmyfriend(){
		$('.image').click();
	}

	function allmymodel(){

	}

	function imgOnload(tagthis){
    	$(tagthis).fadeIn('8');
   	}

   	function imgOnloadF(){
   		$('#button-face').fadeIn('18');
   	}

</script>
<link rel="shortcut icon" href="/Public/img/logo.ico" type="image/icon">
</head>

<body>
	<div class="logo">
		<div class="image">Hello
			<img src="__ROOT__/Public/img/logo2.png" style="width:28px;margin-top:-8px; margin-left:-5px; display:none;" onload="imgOnload(this);">
		</div>

		<div class="android-down" data-toggle="modal" data-target="#model-android" style="float:right;padding:0px 8px;margin-top:0px;">Android客户端<i class="icon-download icon-white" style=" margin-left:3px;margin-top:3px;"></i></div>
		<div class="btn-group head-buttons" style="float:right;margin-right:19px;">
			<button class="btn btn-success btn-usercenter" style="display:none;"><i class="icon-user"></i></button>
			<button class="btn btn-success btn-msgcenter" style="display:none;"><i class="icon-envelope"></i></button>
			<div class="envelop-alert" style="position:absolute; height:16px; width:16px; background:orange; font-size:11px; color:white; font-weight:bold; vertical-align:middle; display:none;">&nbsp1</div>
			<button class="btn btn-warning warning" id="warning-use" style="display:none;" data-toggle="modal" data-target="#myModal"><i class="icon-off"></i></button>
		</div>
		<button class="btn btn-warning warning" style="float:right;margin-right:19px;" id="warning-temp" data-toggle="modal" data-target="#myModal"><i class="icon-off"></i></button>
	</div>

	<div class="container">
		<div class="slides">
			<?php if(($slide1) == "slide1"): ?><!-- 首次登陆页面   -->
			<div class="slide1">
				<div class="faceimg">
					<form enctype="multipart/form-data"
						action="/Index/doImageUp" method="post"
						target="ifram" id="formif">
						<a href="#" class="thumbnail">
							<img data-src="holder.js/160x160" alt="160x160" style="width: 170px; height:170px;display:none;" src="/Public/img/clickhead2.jpg"  onload="imgOnload(this);">
						</a>
						<p>
							<span class="label label-info label-firstimage-text" id="lable">请点击图片上传真实头像</span>
						</p>
						<input type="file" name="photo" class="fileSelect">
						<input type="submit" class="submit">
					</form>
					<iframe width="0px" height="0px" name="ifram" class="ifram"></iframe>
				</div>
			</div><?php endif; ?>

			<!-- 用户首页 -->
			<div class="silde2">
				<div class="inputbox">
					<div class="text">
						<input class="text" id="appendedInputButton" type="text">
						<!-- 隐藏input确认当前文本框状态 -->
						<input type="hidden"  class="hidden-input" value="normal"/>
					</div>
					<div class="sanjiao">
						<div class="talkbox-title-left-user"></div>
						<div class="talkbox-title-left-2-user"></div>
					</div>

					<div class="uface2 button-face" id='button-face' style="display:none;">
						<img  src="/Public/img/logo2.png" class="img-polaroid" id="img-polaroid-myface" onload="imgOnloadF(this);">
					</div>
				</div>

				<div class="content">
					<!-- 已加入的好友的展示首页 -->
					<div class="context-showfriend context context-all ">
						<input class='smyfri-hidden-value' value='' type='hidden'/>
					</div>

					<!-- 搜索某圈子成员页面 -->
					<div class="context context-all context-current-cir" style='display:none;'>
						<div class="friend">
								<div class="f-face">
									<img  src="/Uploads/1.jpg" class="f-face-img">
								</div>
								<div class="f-bottom">
									<p class="muted">王凯&nbsp&nbsp</p>
									<p class='muted muted-phone'>123123123</p>
								</div>
								<div>
									<p>
									  <!--
									  	<button class='btn btn-mini btn-primary' type='button' style='float:right; margin-bottom:3px;'>加为好友</button>
										-->
										<div style='text-align:right;font-size:13px; font-weight:bold; margin-right:11px; color:rgb(190,190,190);'>我的好友</div>
									</p>
								</div>
						</div>
						<input type="hidden"  class="circle-per-page" value="1"/>
					</div>

					<!-- msgcenter 信息中心显示页面-->
					<div class="context-msgcenter context-all" style="display:none; overflow:auto;overflow-x:hidden;overflow-y:auto;">

					</div>

					<!-- usercenter 用户个人资料编辑页面 -->
					<div class="context-usercenter context-all" id="context-usercenter" style="display:none;">
				        <div style="margin:50px 0 0 295px;">
					         <div class="control-group" >
					            <div class="controls" >
					              <input type="text" id="inputphone-usercenter" placeholder="手机号">
					            </div>
					         </div>
					         <div class="control-group">
					            <div class="controls">
					              <button type="button" class="btn btn-usercenter-change" style="width:220px;">确认修改</button>
					            </div>
					         </div>
					         <div class="alert alert-info alter-info-usercenter" style="text-align:center; width:210px; padding-left:4px; padding-right:4px; padding-top:2px; padding-bottom:3px; font-size:13px;display:none;"></div>
				         </div>
					</div>

					<!-- captain context 创建圈子页面 -->
					<div class="context-captain context-all" style="display:none">

						<!-- usertalkinput -->
						<!-- <div class='row user' id='user'><div class='span5 offset2'><div class='talkbox-user'>asd</div></div><div class='span1'><div class='talkbox-title-left-user-i'></div><div class='talkbox-title-left-2-user-i'></div></div></div>-->

							<!--  用户发言框头像
								<div class="cface">
									<img src="__ROOT__/Uploads/4.jpg" class="img-polaroid">
								</div>
							-->

						<!-- captaintalkinput -->
						<div class="row captain"><div class="span2 offset1"><div class="cface"><img src="__ROOT__/Uploads/4.jpg" class="img-polaroid"></div></div><div class="span1 captain-talk"><div class="talkbox-title-left"></div><div class="talkbox-title-left-2"></div></div><div class="span5"><div class="talkbox">告诉我你要创建的圈子名称</div></div></div>

						<input name="circle-value" type="hidden"/>
					</div>

					<!-- 加入圈子需要设置密码 模态对话框 -->
					<div class="modal hide fade modal-1" id="myModal" >

					  <div class="hide-join-pass1" style="display:none;">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h3 id="h3-joinCirInfo" style="color:#999;">该圈子需要输入密码加入</h3>
						  </div>
						  <div class="modal-body">
						    <p><input class="span4" id="input-joinCirpass" type="password" placeholder="圈子密码" style="margin-top:10px;"></p>
						  	<input id="input-joinCirId" type="hidden" value="">
						  </div>
						  <div class="modal-footer" style="height:40px;">
						  	<div class=" alert-info alert-info-uppass" id="alert-info-uppass-join" style="margin-left:125px;font-size:13px;text-align:left;width:258px;text-align:center;">提交后若页面长时间无反应请刷新重试</div>
						    <button type="button" class="btn btn-primary btn-joincir-passwordup" id='btn-joincir-passwordup'>提交</button>
						  </div>
						</div>

						<div class="hide-join-pass2" style="display:none">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h3 id="h3-joinCirInfo" style="color:#999;">确认加入该圈子吗？</h3>
						  </div>
						  <div class="modal-footer" style="height:45px;padding: 14px 15px 1px;">
						    <button type="button" class="btn btn-primary btn-joincir-ture" id='btn-joincir-true'>确认</button>
						  </div>
						</div>

						<div class="hide-join-pass3" >
							<div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h3 id="h3-joinCirInfo" style="color:#999;">确认退出吗？</h3>
						  </div>
						  <div class="modal-footer" style="height:45px;padding: 14px 15px 1px;">
						  	<form action="/Index/loginout">
						    	<button type="submit" class="btn btn-primary btn-loginout" id='btn-joincir-true'>确认</button>
						  	</form>
						  </div>
						</div>

					</div>

					<div class="modal hide fade" id="model-android">
						  <div class="modal-header" style="border-bottom:0px; padding:15px;">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top:-12px;margin-right:-6px;">&times;</button>
						    <h3 id="h3-joinCirInfo" style="color:#999; font-size:13px;">安卓的马上就搞好,至于你是用土豪金的高富帅，我靠 土豪我们交个朋友吧，iphone端要再等等。毕竟像您这种高富帅不多啊 哈哈</h3>
						  </div>
					</div>

					<!-- 加入圈子页面  根据圈子id号搜索 或者名称 或者创始人名称-->
					<div class="context-join context-all" style="display:none">
						<div class="row-fluid">

							<!--
				            <div class="thumbnails-hi">
					            <ul class="thumbnails">
					              <?php if(is_array($circlelist)): $i = 0; $__LIST__ = $circlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="span3">
					                <div class="thumbnail">
					                  <div class="caption">
					                    <h5 style="color:#666"><?php echo ($vo["name"]); ?></h5>
					                     <dl class="dl-horizontal">
								            <dt>圈子编号：</dt>
								            <dd id="dd-circleid"><?php echo ($vo["id"]); ?></dd>
								            <dt>成员数量：</dt>
								            <dd><?php echo ($vo["count"]); ?></dd>
								            <dt>创建人：</dt>
								            <dd><?php echo ($vo["createname"]); ?></dd>
								            <dt>创建日期：</dt>
								            <dd><?php echo ($vo["time"]); ?></dd>
								          </dl>
					                    <p class="join_btn" style="text-align:right;margin:0px; font-size:13px; font-weight:bold">
					                    	<?php if($vo["isJo"] == 1 ): ?><div style='text-align:right;font-size:13px; font-weight:bold;'>已加入</div><?php else: if(($vo["password"]) != ""): ?><button id='circle-<?php echo ($vo["id"]); ?>' style='font-size:12px;' type="button" class='btn btn-primary circle-<?php echo ($vo["id"]); ?>' data-toggle='modal' onclick='$.doJoin(<?php echo ($vo["id"]); ?>,this,1)'>加入圈子</button><?php else: ?><button id='circle-<?php echo ($vo["id"]); ?>' style='font-size:12px;' type='button' class='btn btn-primary circle-<?php echo ($vo["id"]); ?>' onclick='$.doJoin(<?php echo ($vo["id"]); ?>,this,2)'>加入圈子</button><?php endif; endif; ?>
					                    </p>
					                  </div>
					                </div>
					              </li><?php endforeach; endif; else: echo "" ;endif; ?>
					            </ul>
				            </div>
				            -->

				            <div class='thumbnails-ser' style='display:block;' >

				            </div>

				          </div>
					</div>

					<div class="context-all context-cirman" style="display:none">
						<!-- captaintalkinput -->
						<div class="row captain-cirman" style="display:none"><div class="span2 offset1"><div class="cface"><img src="__ROOT__/Uploads/4.jpg" class="img-polaroid"></div></div><div class="span1 captain-talk"><div class="talkbox-title-left"></div><div class="talkbox-title-left-2"></div></div><div class="span5"><div class="talkbox">管理你的圈子
							<span class="label label-info lable-info-register label-info-uppass">设置密码</span>
							<span class="label label-info lable-info-register label-info-cirinfoshow">圈子信息</span>

							<div class="cirmman-info" style="margin-top:28px;">
								<table class="table table-bordered table-striped">
						            <colgroup>
						              <col class="span1">
						              <col class="span7">
						            </colgroup>
						            <tbody>
						              <tr>
						                <td >
						                  	圈子编号:
						                </td>
						                <td id="td-circleid">

						                </td>
						              </tr>
						              <tr>
						                <td >
						                	成员数量:
						                </td>
						                <td id="td-count">

						                </td>
						              </tr>
						              <tr>
						                <td >
						                	创建日期:
						                </td>
						                <td id="td-time">

						                </td>
						              </tr>
						            </tbody>
						          </table>
							</div>

							<div class="register" style="display:none; margin-left: 35px;margin-top: 25px;">
									<div class="controls controls-row">
								      <input class="span4 rtext rPassword" type="password" placeholder="圈子密码">
								      <input type="hidden" class="circleid-hidden" value="">
								    </div>
								    <div class="controls controls-row">
								      <button type="button" class="btn btn-primary btn-upcirpass" id="registerBtn">提交</button>
								      <div class="alert alert-info alert-info-uppass">若想取消密码，提交空密码即可</div>
								    </div>
							</div>
						</div></div></div>
					</div>

				</div>
				<div class="toolbar" style="height:150px;">
					<div class="group group-top">
						<div class="group-word">我的圈子
							<span class="finfo create-circle">创建</span>
							<span class="finfo join-circle">加入</span>
						</div>
						<button class="s-mycircle" id="s-mycircle" style="display:none;"></button>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>