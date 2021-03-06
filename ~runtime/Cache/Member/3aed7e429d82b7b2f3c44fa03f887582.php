<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>完成-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="<?php echo $SEO['keyword'];?>" />
		<meta name="Description" content="<?php echo $SEO['description'];?>" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.6.min.js"></script>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css" /> 

		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/find_password.css" /> 
	</head>
	
<style type="text/css">
		#header .logo img{ width:auto; height:52px; position:relative; top:50% !important; margin-top:-26px; }
</style>

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
					<li class="by_bg">
						<p>2</p>
						<font>验证身份</font>
					</li>
					<li class="by_bg">
						<p>3</p>
						<font>设置新密码</font>
					</li>
					<li class="at_bg">
						<p>4</p>
						<font>完成</font>
					</li>
				</ul>				
				<div class="aff_message_hint">
					<p class="succeed_hint">恭喜您，密码修改成功</p>
					<p class="jump_page">
						本页面即将在<b id="wait">3</b>秒后自动跳转到登录页，</br>
						如果没有跳转，也可以直接<a href="<?php echo __APP__;?>">进入登录页</a>
					</p>
				</div>
			</div>
		</div>
		<?php include template('v2_register_footer','member/common'); ?>
	</body>
</html>

<script style="text/javascript">


$(function(){
var wait = document.getElementById('wait');
var href = "<?php echo U('Member/Index/login');?>";
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>