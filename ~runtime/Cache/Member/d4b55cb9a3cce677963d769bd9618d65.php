<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!-- <div id="top" class="ui-bg-f">
	<div class="wrap-and clear">
		<div class="fl l-nav clear">
			<span class="fl">您好，欢迎光临<?php echo C('WEBNAME');?>  <a href="<?php echo U('Member/Profile/index');?>"><?php echo nickname(cookie('_userid'));?></a>							<a href="<?php echo U('Member/Announce/announce',array('type'=>1));?>">
 <?php echo message_count(cookie('_userid'));?></a></span>
			<?php if(cookie('_userid') > 0) { ?>
			<ul class="clear fl">
				<li><a href="<?php echo U('Member/Index/logout');?>">退出</a></li>
			</ul>
			<?php } else { ?>
			<ul class="clear fl">
				<li class="qq-icon"><a href="<?php echo U('Oauth/Index/login');?>" target="_blank">QQ用户登录</a></li>
				<li><a href="<?php echo U('Member/Index/login', array('refresh' => urlencode(__SELF__)));?>" target="_blank">用户登录</a></li>
				<li><a href="<?php echo U('Member/Index/register_index');?>">免费注册</a></li>
			</ul>
			<?php } ?>
		</div>
		<ul class="fr r-nav">
			<li class="qq-icon"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes">在线客服</a></li>
			<li><?php if(ACTION_NAME!='index') { ?><a href="<?php echo __APP__;?>">返回首页</a><?php } ?></li>
			<li><a href="<?php echo U('Member/EnterActivity/index');?>" target="
				_blank">卖家报名</a></li>
			<li><a href="<?php echo U('document/index/lists',array('catid'=>2));?>" target="
				_blank">帮助中心</a>    </li>
			<li><a href="<?php echo U('navigation/index/index');?>" target="
				_blank">网站导航</a></li>
		</ul>
	</div>
</div> -->
		<?php include template('toper','common'); ?>

<style>
	#zc-content .user_l_c .u_tab_list li a{ float:none; }
	.l-nav{ width:600px; }
</style>
<div id="header" class="user-header clear">
	<div class="wrap-and clear">
		<div class="fl logo">
			<a href="<?php echo __APP__;?>"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>"  /></a>
		</div>
		<h2 class="user-header-hint fl">欢迎注册</h2>
	</div>
</div>