<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>注册成功--<?php echo C('WEBNAME');?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	</head>
	<body class="ui-bg-a">
       <?php include template('v2_register_header','member/common'); ?>
		<div id="zc-content">
			<div class="wrap">
				<ul class="zc-lc">
					<li class="li1">填写账户信息<b></b></li>
					<li class="li2">验证身份信息<b></b></li>
					<li class="li3 active">注册成功<b></b></li>
					<li class="linear"></li>
				</ul>
				<div class="user_l_c">
					<h2 class="hint_title">恭喜注册成功</h2>
					<ul class="hint_txt">
						<li>
							登录账号：
							<span class="cc">
								<?php if($userinfo['email']) { ?>
								<?php echo $userinfo['email'];?>
								<?php $type = 1?>
								<?php } else { ?>
								<?php echo $userinfo['phone'];?>
								<?php $type = 2?>
								<?php } ?>
							</span>
							<?php if($type == 2) { ?>
							  (邮箱：也可以作为登录号)

							<?php } else { ?>
							 (手机：也可以作为登录号)

							<?php } ?>
						</li>
						<li>您现在可以进行以下操作：</li>
						<li class="mt" >
							<a style="width:98px" href="<?php echo __APP__;?>" ><?php echo C('WEBNAME');?>首页</a>
							<a style="width:98px" href="<?php echo U('member/profile/index');?>">个人中心</a>
						</li>
					</ul>
				</div>
			</div>	
		</div>
	  <?php include template('v2_register_footer','member/common'); ?>
	</body>
</html>