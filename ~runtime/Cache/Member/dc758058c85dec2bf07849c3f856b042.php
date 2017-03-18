<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>验证身份-忘记密码-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="<?php echo $SEO['keyword'];?>" />
		<meta name="Description" content="<?php echo $SEO['description'];?>" />
	
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
				<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css" /> 

		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/find_password.css" /> 
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

	</head>

	<style type="text/css">
		#header .logo img{ width:auto; height:52px; position:relative; top:50% !important; margin-top:-26px; }
</style>
	<body>
		<?php include template('v2_register_header','member/common'); ?>

	<div class="content" style="overflow:hidden;width:100%;padding-bottom:30px;">			
			<div class="password_wrap">
				<ul class="at_present">
					<li class="by_bg">
						<p>1</p>
						<font>填写账户信息</font>
					</li>
					<li class="at_bg">
						<p>2</p>
						<font>验证身份</font>
					</li>
					<li class="auto_bg">
						<p>3</p>
						<font>设置新密码</font>
					</li>
					<li class="auto_bg">
						<p>4</p>
						<font>完成</font>
					</li>
				</ul>				
				<div class="aff_message_hint">
					<input type="hidden" id="email" value="<?php echo $email;?>">
					<span class="hint_text">确认信已经发到你的邮箱 <b><?php echo $email;?></b> ，你需要点击邮件中的确认按钮来完成设置新密码</span>
					<p class="anew_send">
						<a href="https://mail.qq.com/" class="btn">立即登录邮箱</a>没有收到邮件？<a href="javascript:;" id="js_send_email" class="anew_send_link">再发一封</a>
					</p>
				</div>
			</div>
		</div>
					<?php include template('v2_register_footer','member/common'); ?>
	</body>
</html>
<script type="text/javascript" >
$(function(){
	$("#js_send_email").click(function(){
		var email = $("#email").val();
		$.post("<?php echo U('Member/Index/success_email');?>",{username:email},function(data){
			if (data.status == 1) {
				art.dialog({
						lock: true,
						fixed: true,
						icon: 'face-smile',
						title: '提示',
						content: data.info,
						okVal: '确定',
						ok:function() { 
						}
					});
			}else{
				art.dialog({
						lock: true,
						fixed: true,
						icon: 'face-sad',
						title: '提示',
						content: data.info,
						okVal: '确定',
						ok:function() { 
						}
					});
			};

		},'json')
			
	});
});
	

</script>