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
    html,body{
				margin:0px;
				padding:0px;
    		}

	body{
    		background-color: rgb(28,151,223);
    		font-family: 微软雅黑;
    		background-image: url('__ROOT__/Public/img/glow.png');
			background-repeat: no-repeat;
			background-position: center;
    	}
    	.header{
    		margin:80px 0 0;
    	}
    	.logo{
    		text-align:center;
    		margin:40px;
    		color:#ffffff;
			letter-spacing:-4px;
			font-size:73px;
			font-weight:800;
			text-shadow: 0px -1px 1px #1E2D4D;
    	}
    	.dialog{
    		margin:35px 0 0px;
    		height:260px;
    		font-family: 微软雅黑;
    	}
    	.span4,.span5,.span12{

    	}
    	.img-polaroid{
    		height:70px;
    		width:70px;
    		padding:0;
    		border:0px;
    		-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px ;
		}
		.talkbox-title-left{
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 10px solid #d9d9d9;
			position:relative;
			top:15px;
			left:-29px;
		}
		.talkbox-title-left-2{
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 10px solid rgb(250,250,250);
			position:relative ;
			top:-5px;
			left:-29px;
		}
		.talkbox-title-left-user{
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-left: 10px solid #147DCD;
			position:relative;
			top:16px;
			left:22px;
		}
		.talkbox-title-left-2-user{
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-left: 10px solid rgb(30, 149, 229);
			position:relative ;
			top:-4px;
			left:21px;
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
		.talkbox-user{
			background: rgb(30, 149, 229);
			border: 1px solid #147DCD;
			position:relative;
			left:83px;
			color:#ffffff;
		}
		.user,.captain{
			padding:15px 0;
		}
		.container{
			width:780px;
		}
		.captain{
			margin-left:8px;
		}
		.user{
			margin-left:8px;
		}
		.captain-talk{
			position:relative;
			left:-48px;
			z-index:2;
		}
		.inputbox{
			margin-left:8px;
		}
		#appendedInputButton{
			color: rgba(255, 255, 255, .8);
			background: rgba(0, 0, 0, .1);
			/*box-shadow: 0 1px 0 rgba(255, 255, 255, .15),0px 1px 3px rgba(0, 0, 0, .2) inset;*/
			color: #B7D4EC	9;
			border: 1px solid #147DCD;
			background: #0C6EBF	9;
			letter-spacing: 1px;
			font-family: 微软雅黑;
			font-size: 13px;
			font-weight: bold;
			line-height: 18px;
			padding: 9px 14px;
			width:475px;
			margin-left:80px;
		}
		.btn{
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
		}
		.btn:HOVER {
			background: rgb(38, 165, 235);
			color: rgba(0, 59, 126, .8);
		}
		.lable-info-register,.lable-info-password{
			float:right;
		}
		.lable-info-password{
			margin-top:1px;
		}
		.lable-info-register:HOVER{
			cursor: pointer;
			background:rgb(35,152,217);
		}
		.lable-info-password:HOVER{
			cursor: pointer;
			background:rgb(35,152,217);
		}
		#registerBtn{
			padding: 4px 14px 4px 15px;
			font-size: 11px;
			font-family: 微软雅黑;
			border-radius: 3px;
			margin-left: 21px;
		}
		.span3,.span2,.span4{
			font-family: 微软雅黑;
			letter-spacing: 1px;
			font-size:12px;
		}
		.register{
			margin-left:31px;
			margin-top:15px;
		}

		.captain-register{
			display:none;
		}
		.verifyPng{
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
			-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.1);
			box-shadow: 0 1px 3px rgba(0,0,0,0.1);
			background-color: #fff;
			border: 1px solid #ccc;
			border: 1px solid rgba(0,0,0,0.2);
			margin-left:0;
			width:58px;
		}
		.verifyPng:HOVER{
			cursor: pointer;
		}
		.alert-info{
			width:198px;
			padding:3px 10px;
			font-size:11px;
			float:left;
		}
		input[type="text"],input[type="password"]{
			font-size: 12px;
		}
		.well{
			display:inline;
			float:left;
			font-size:12px;
			padding:4px;
			margin-left:0px;
		}
		.rPhone{
			display:inline;
			padding:4px 2px;
			float:left;
		}
		.input-xlarge{
			text-align: center;
		}
		.loader-gif{
			margin:0 6px;
		}
		.starbg-hidden{
			background-repeat:no-repeat;
			background-image: url(/Public/img/starbg.png);
			-moz-background-size:cover; /* 老版本的 Firefox */
			background-size:cover;
			z-index:99;
			height:100%;
			width:100%;
			overflow:hidden;
			position:absolute;
			min-width:20px;
			margin:0px;
			padding:0px;
			background-origin:content-box;
			display:none;
		}
		.starbg-hidden-cover{
			background-repeat:no-repeat;
			background-color:rgba(17,160,256,.5);
			-moz-background-size:cover; /* 老版本的 Firefox */
			background-size:cover;
			z-index:100;
			height:100%;
			width:100%;
			overflow:hidden;
			position:absolute;
			min-width:20px;
			margin:0px;
			padding:0px;
			background-origin:content-box;
			display:none;
		}
		.starbg-font{
			font-family: 微软雅黑;
			font-size:30px;
			text-align:center;
			font-weight:bold;
			color:rgba(255,255,255,0.97);
		}
    </style>
    <script type="text/javascript">
    	$(document).ready(function(){
    		//页面载入时清空email input信息
    		$("#email").val(null);
    		//计数器
    		var count = 1;
    		//工具提示
    		$('#img-polaroid').hover(function(){
    			$('#img-polaroid').tooltip('toggle')
    		});

    		//点击找回密码
    		$("body").delegate("#lable-info-password","click",function(){
    			//点击提交注册后显示加载进度条 注册按钮失效
  		    	$('#lable-info-password').attr("disabled",true);
      		    $('#lable-info-password').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");

    			//获取email的值
    		    var email = $("#email").val();
    			//post findPassword方法 提交email查找密码.
    			$.post("findPassword",{Email:email},function(data,status){
    				 $('.talkbox:last').html(data['talkinfo']+"<span class='label label-info lable-info-password' id='lable-info-password'></span>");
    				 $('#lable-info-password').html(data['rightinfo']);
    			});
    		});

    		//点击注册链接
    		$(".lable-info-register").click(function(){
    			//移除首个对话框
    			$('#dialog>div:first-child').slideUp(100,function(){
	     			//隐藏发送按钮
	       			$('#sendBtn').fadeOut(400);
	       			$('#appendedInputButton').fadeOut(400);
        		  	$('#sendBtn').fadeTo(10,0.3);
	       			//显示注册表单对话框
	     			$('.captain-register').fadeIn(400);
	       		});
    		});

    		//点击注册资料提交按钮
    		$("#registerBtn").click(function(){
    			//清空注册表单所有输入框的值
    			$("#appendedInputButton").val('');
    			var rEmail = $(".rEmail").val().trim();
      		    var rPassword = $(".rPassword").val().trim();
      		    var rName = $(".rName").val().trim();
      		    var rPhone = $(".rPhone").val().trim();
      		    var rVerify = $(".rVerify").val().trim();

      		    if(rEmail != '' && rPassword != '' && rName != '' && rPhone != '' && rVerify != ''){
      		    	//点击提交注册后显示加载进度条 注册按钮失效
      		    	$('#registerBtn').attr("disabled",true);
          		    $('#registerBtn').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
          		  	$('.alert-info').html("正在提交资料，请耐心等待");
      		    	//使用post提交注册信息
      		    	$.post("registerIn",
 	     	    			{ Email:rEmail,
      		    		      Password:rPassword,
      		    		      Name:rName,
      		    		      Phone:rPhone,
      		    		      Verify:rVerify},
 	     	    			  function(data,status){
 	     					  	//解析服务端返回的json数据
 	     	    			  	$('.alert-info').html(data['info']);
 	     					  	//如果插入数据成功 status == 5
 	     					  	if(data['status']=='5'){
 	     					  		$('#registerBtn').html("成功");
 	     					  		$('div.body').fadeOut(200,function(){
 	     					  			$('.starbg-hidden-all').fadeIn(500,function(){
 	     					  				$('.starbg-font-1').fadeIn(3000,function(){
 	     					  					$('.starbg-font-1').fadeOut(3000,function(){
 	     					  						$('.starbg-font-2').fadeIn(3000,function(){
	 	     					  						$('.starbg-font-2').fadeOut(3000,function(){
	 	     					  							$('.starbg-font-3').fadeIn(3000,function(){
	 	     					  								$('.starbg-hidden-cover').fadeOut(600,function(){
	 	     					  									location.href='http://www.hello008.com';
	 	     					  								});
	 	     					  							});
	 	     					  						});
 	     					  						});
 	     					  					});
 	     					  				});
 	     					  			});
 	     					  		});


 	     					  	}else{
 	     					  		//恢复注册按钮
 	      		    		    	$('#registerBtn').attr("disabled",false);
 	     					  		$('#registerBtn').html('提交');
 	     					  	}
 	     	    	});
      		    }else{
      		    	$('.alert-info').html("注册资料不能有未填项，请检查！");
      		    }

    		});

    		$(".btn").click(function(){
    		  //获取用户从文本框输入的值
    		  var inputValue = $("#appendedInputButton").val().trim();
    		  var email = $("#email").val();

    		  //若用户输入的值不为空 计数器+1
    		  if(inputValue==null || inputValue==''){
    		  }else{
    			  //当用户点击“发送”后 按钮焦点失效且淡出 直到json加载完毕
    			  $('.btn').attr("disabled",true);
        		  $('.btn').fadeTo(10,0.3);
    			  //获取div第一个子节点。
     			 count = count + 1;

     			 if(true){
     				$('#dialog>div:first-child').slideUp(100,function(){
     	       			 $('#dialog>div:first-child').remove();
     	       		});
     				//当计数器大于等于3时
 	         	    if(count>=3){
 	         	    	$('.captain:first').slideUp(100,function(){
 	     	       			 $('.captain:first').remove();
 	     	       		});
 	         	    }

     				$('#dialog').append("<div class='row user' id='user'><div class='span5 offset2'><div class='talkbox-user'>&nbsp</div></div><div class='span1'><div class='talkbox-title-left-user'></div><div class='talkbox-title-left-2-user'></div></div></div>");
 	         		$('#dialog>div:first-child').show(500);
 	         	    $('.talkbox-user:last').html(inputValue);

     				 /*$(".talkbox-user").html(inputValue);
     	    		 $("#user").fadeIn(600);//显示元素*/

     	    		 //当用户同时提交登录账户密码信息时  用ajax post提交用户输入的数据到后台控制层处理
     	    		 if(email!=null && email!="" && inputValue!=null){
     	    			 var inputValuePassword = inputValue.replace(/\S/g,'*');
	     	    		 //移除注册表单对话框
	          			 $('.captain-register').remove()
     	    			 $('.talkbox-user:last').html(inputValuePassword);
     	    			 $.post("register",
     	     	    			{ username:email,password:inputValue},
     	     	    			  function(data,status){
     	     					  $('#dialog').append("<div class= 'row captain' style='display:none'><div class= 'span2 offset1'><div class= 'cface'><img src='__ROOT__/Uploads/1.jpg' class= 'img-polaroid'></div></div><div class= 'span1 captain-talk' ><div class= 'talkbox-title-left' ></div><div class= 'talkbox-title-left-2' ></div></div><div class= 'span5' ><div class= 'talkbox' >&nbsp</div></div></div>");
     	     					  //如果账号正确，则记录账号，并且将输入框type改成password
     	     					  $('#dialog>div:last-child').fadeIn(400,function(){
     	     						  //加载完毕后 登录状态status不为3（登陆成功） 即显示“发送”按钮
     	     						  if(data['status'] != '3'){
     	     							$('.btn').attr("disabled",false);
       	     						    $('.btn').fadeTo(300,1);
     	     						  }else{
     	     							  location.href = 'http://www.hello008.com';
     	     						  }
     	     					  });
     	     					//解析服务端返回的json数据
     	     					$('.talkbox:last').html(data['info']+"<span class='label label-info lable-info-password' id='lable-info-password'>找回密码</span>");
     	     	    	 });
     	    		 }else if(email.length==0){
     	    			 //移除注册表单对话框
	          			 $('.captain-register').remove()

     	    			 //用ajax post提交用户输入的数据到后台控制层处理
         	    		 $.post("register",
         	    			{ username: inputValue},
         	    			  function(data,status){
         					  $('#dialog').append("<div class= 'row captain' style='display:none'><div class= 'span2 offset1'><div class= 'cface'><img style='display:none;' src='__ROOT__/Uploads/1.jpg' class= 'img-polaroid' onload='imgOnload(this);'></div></div><div class= 'span1 captain-talk' ><div class= 'talkbox-title-left' ></div><div class= 'talkbox-title-left-2' ></div></div><div class= 'span5' ><div class= 'talkbox' >&nbsp</div></div></div>");
         					  //如果账号正确，则记录账号，并且将输入框type改成password
         					  if(data['status']== '1'){
         						 $("#email").val(inputValue);
         						 $("#appendedInputButton").val("");
         						 $("#appendedInputButton").attr('type','password');
         						 $('.talkbox:last').html(data['info']+"<span class='label label-info lable-info-password' id='lable-info-password'>找回密码</span>");
         					  }else{
         						 $('.talkbox:last').html(data['info']);
         					  }
  	   	         		      $('#dialog>div:last-child').fadeIn(400,function(){
  	   	         		    	  $('.btn').attr("disabled",false);
  	   	         		    	  $(".btn").fadeTo(200,1);
  	   	         		      });
         	    		  });
     	    		 }

     			 }
    		  }

    	  });


    	});

    	 function imgOnload(tagthis){
    	  	$(tagthis).fadeIn('100');
    	 }
    </script>
    <link rel="shortcut icon" href="/Public/img/logo.ico" type="image/icon">
  </head>

  <body>
  	<div class="starbg-hidden starbg-hidden-all">
  	</div>
  	<div class="starbg-hidden-cover starbg-hidden-all">
  		<p class='starbg-font starbg-font-1' id="starbg-font-1" style="display:none; margin-top:370px;">哥丢了n多手机 一个个通知别人换号是件麻烦事~</p>
  		<p class='starbg-font starbg-font-2' id="starbg-font-2" style="display:none; margin-top:370px;"> 哥忙着睡觉呢 ，任何时候要哥电话就上这！</p>
  		<p class='starbg-font starbg-font-3' id="starbg-font-3" style="display:none; font-size:40px; margin-top:370px;">Hello</p>
  	</div>

  	<div class="body" >
		<div class="container">
			<div class="row-fluid header">
				<div class="span12">
					<div class="logo">Hello</div>
				</div>
			</div>
			<div class="content">
				<img  style="z-index:-1; position:absolute; left:58%; top:13%; display:none;" id="backlogin" src="__ROOT__/Public/img/backlogin.png" onload="imgOnload(this);" >

				<div class="dialog left" id="dialog">
					<div class="row captain">
						<div class="span2 offset1">
							<div class="cface">
								<img style="display:none;" src="__ROOT__/Uploads/1.jpg" class="img-polaroid" onload="imgOnload(this);" >
							</div>
						</div>
						<div class="span1 captain-talk">
							<div class="talkbox-title-left"></div>
							<div class="talkbox-title-left-2"></div>
						</div>
						<div class="span5">
							<div class="talkbox">请告诉我你的登陆账号
								<span class="label label-info lable-info-register">点我注册</span>
							</div>
						</div>
					</div>

					<!-- 注册表单  -->
					<div class="row captain captain-register" >
						<div class="span2 offset1">

							<div class="cface">
								<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="提示底部">
									<img style="display:none;" src="__ROOT__/Uploads/1.jpg" class="img-polaroid" id="img-polaroid" onload="imgOnload(this);" >
								</a>
							</div>
						</div>
						<div class="span1 captain-talk">
							<div class="talkbox-title-left"></div>
							<div class="talkbox-title-left-2"></div>
						</div>
						<div class="span5">
							<div class="talkbox" style="margin-bottom:30px;">
								<div class="register">
									<div class="controls controls-row">
								      <input class="span4 rtext rEmail" type="text" placeholder="邮箱地址(登录账号)">
								    </div>
									<div class="controls controls-row">
								      <input class="span4 rtext rPassword" type="password" placeholder="登录密码">
								    </div>
									<div class="controls controls-row">
								      <input class="span4 rtext rName" type="text" placeholder="真实姓名">
								    </div>
									<div class="controls controls-row">
									  <input class="span1 input-xlarge" id="disabledInput" type="text" value="0086" disabled>
								      <input class="span3 rtext rPhone" type="text" placeholder="手机号码">
								    </div>
								    <div class="controls controls-row">
								      <img src='/Public/verify/' class="span1 verifyPng" onclick="this.src='/Public/verify/?'+Math.random()"/>
								      <input class="span3 rtext rVerify" type="text" placeholder="验证码" >
								    </div>
								    <div class="controls controls-row">
								      <button type="button" class="btn btn-primary" id="registerBtn">提交</button>
								      <div class="alert alert-info">若想返回登录，刷新网页即可。</div>
								    </div>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="row user" id="user">
						<div class="span5 offset2">
							<div class="talkbox-user"></div>
						</div>
						<div class="span1">
							<div class="talkbox-title-left-user"></div>
							<div class="talkbox-title-left-2-user"></div>
						</div>
					</div> -->

				</div>
			</div>
			<div class="row inputbox">
				<div class="input-append span9" >
					<input class="input-left offset1" id="appendedInputButton" type="text">
					<input class="input-left offset1" id="email" type="hidden">
					<button class="btn" type="button" id="sendBtn">发送</button>
				</div>
			</div>

			<div class="footer"></div>
		</div>
  	</div>
  </body>

</html>