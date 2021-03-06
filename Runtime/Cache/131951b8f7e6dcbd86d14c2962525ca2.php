<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>密码设置</title>
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
		input[type="text"],input[type="password"]{
			font-size: 12px;
		}
		.inputbox{
			margin-left:8px;
			margin-top:80px;
		}
		.container{
			width:780px;
		}
		input::-webkit-input-placeholder {
		    color: rgba(255, 255, 255,.6);
		}
		input:-moz-placeholder {
		    color: rgba(255, 255, 255,.6);
		}

</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#appendedInputButton").focus();

		//回车键提交内容
		$("#appendedInputButton").keyup(function(event){
			var i = event.which;
			if(i==13){
				$('#sendBtn').click();
			}
		});

		$('#sendBtn').click(function(){
			//获取输入框值
			var value = $("#appendedInputButton").val();
			if(value!=null && value!=''){
				$('#sendBtn').attr('disabled',true);
				$('#sendBtn').html("<img src='__ROOT__/Public/img/ajax-loader.gif' class='loader-gif'>");
				$('#sendBtn').fadeTo(200,0.3);

				$.post('__ROOT__/Public/doResetPassword',{password:value},function(data,status){
					//若密码更新成功
					if(data['info']=='更新成功'){
						$('#sendBtn').html(data['info']);
						location.href='__ROOT__/';
					}else if(data['status']=="-1" || data['status']=="-2" || data['status']=="-3"){
						$('#sendBtn').attr('disabled',false);
						$('#sendBtn').fadeTo(200,1);
						$('#sendBtn').html('发送');
						$("#appendedInputButton").val("");
						$("#appendedInputButton").attr("placeholder",data['info']+"");
						$("#appendedInputButton").focus();
					}
				});
			}
		});
	});
</script>
</head>
<body>
	<div class="body">
		<div class="container">
			<div class="row-fluid header">
				<div class="span12">
					<div class="logo">Hello</div>
				</div>
			</div>

			<div class="row inputbox">
				<div class="input-append span9">
					<input class="input-left offset1" id="appendedInputButton" type="password" placeholder="请输入新密码">
					<button class="btn" type="button" id="sendBtn" style="opacity: 1;">发送</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>