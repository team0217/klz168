<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>重置密码-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="<?php echo $SEO['keyword'];?>" />
		<meta name="Description" content="<?php echo $SEO['description'];?>" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css" /> 

		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/find_password.css" /> 
	</head>

	<style type="text/css">
		#header .logo img{ width:auto; height:52px; position:relative; top:50% !important; margin-top:-26px; }
		.onCorrect{ color: green;}
		.onError { color: red;}
		.onFocus{ color: red;}
</style>

	<body>
		<?php include template('v2_register_header','member/common'); ?>

	<div class="content" style="overflow:hidden;width:100%;padding-bottom:30px;">		
		<form action="<?php echo U('forget_set_phone');?>" method="post" id="myform">	
		<input type="hidden" name="uid" value="<?php echo $uid;?>">	
			<div class="password_wrap">
				<ul class="at_present">
					<li class="by_bg">
						<p>1</p>
						<font>填写账户信息</font>
					</li>
					<li class="by_bg">
						<p>2</p>
						<font>验证身份</font>
					</li>
					<li class="at_bg">
						<p>3</p>
						<font>设置新密码</font>
					</li>
					<li class="auto_bg">
						<p>4</p>
						<font>完成</font>
					</li>
				</ul>
				<ul class="input_message">
					<li>
						<span>设置新密码：</span>
						<input type="password" id="password" name="password" class="set_w_input"/>
						<div style="clear: both;"></div>
					</li>
					<li>
						<span>确认新密码：</span>
						<input type="password" name="pwdconfirm" class="set_w_input" id="pwdconfirm"/>
						<div style="clear: both;"></div>
					</li>
					<li><input type="submit" value="完成设置" /></li>
				</ul>
			</div>
		</form>
		</div>
		<?php include template('v2_register_footer','member/common'); ?>
	</body>
</html>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript">
		$(function(){
			$.formValidator.initConfig({
			formid:"myform",
			autotip:true,
			onerror:function(msg,obj){
				$(obj).focus();
			}
		});

		$("#password").formValidator({
			empty:false,
			onempty:'登录密码不能为空',
			onshow:true,
			onfocus:'请输入6-20个字符，使用字母数字加上下划线组合密码。'
		}).inputValidator({
			min:6,
			max:20,
			onerror:'设置密码必须为6-20个字符'
		});

		$("#pwdconfirm").formValidator({
			empty:false,
			onempty:'确认密码不能为空',
			onshow:true,
			onfocus:'请再次确认登录密码'
		}).compareValidator({
			desid:'password',
			onerror:'两次密码输入不一致'
		});

	});


</script>