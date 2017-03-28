<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><script type="text/javascript">
<?php $userinfo = is_login();?>
var site = {
	"site_root" : '<?php echo __ROOT__;?>',
	"js_path" : '<?php echo JS_PATH;?>',
	"css_path" : '<?php echo CSS_PATH;?>',
	"img_path" : '<?php echo IMG_PATH;?>',
	"webname" : '<?php echo C("webname");?>',
	"order_url" : '<?php echo U("Order/DoOrder/manage");?>',
	"nickname" : '<?php echo nickname($userinfo["userid"]);?>',
	"message":'<?php echo message_count($userinfo["userid"]);?>',
	"user":<?php echo json_encode($userinfo ? $userinfo : array());?>
};
var activity_set = <?php echo json_encode($activity_set); ?>;
var good_buy_times = <?php echo json_encode($good_buy_times); ?>;
</script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/member.js"></script>
<!-- 头部 start -->
	<div id="header">
		<div id="topnav">
			<ul class="fr">
				<li class="fl"><a><?php echo C('WEBNAME');?>商家报名中心</a><span>|</span></li>
				<li class="fl"><a href="<?php echo __APP__;?>">返回首页</a><span>|</span></li>
				<li id="uBar" class="fl">
					<span class="a8abaf pl10">您还未登录，请</span>
					<a href="<?php echo U('Member/Index/login',array('refresh' => urlencode(__SELF__)));?>" class="fefefe pl0">登录</a>
				</li>
				<li class="fl"><a href="<?php echo U('Member/Profile/index');?>" class="c29658e">商家中心</a></li>
				<li class="fl"><a href="<?php echo U('Announce/index/lists');?>" class="c29658e">消息中心</a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div id="topmenu">
			<div class="topmenu_box">
				<div class="logo fl">
					<span class="logo_logo"><img src="<?php echo C('SITE_LOGO_ZHU');?>" width="140" height="48" /></span>
					<span class="logo_bg"></span>
				</div>
				<div class="topmenu_menu fr">
					<ul>
						<li class="fl"><a href="<?php echo U('Member/EnterActivity/index');?>#sign_up" <?php if(ACTION_NAME == 'index') { ?>class="active"<?php } ?>>活动报名</a></li>
						<li class="fl"><a href="<?php echo U('Member/MerchantProduct/activity');?>">已报名商品</a></li>
						<li class="fl"><a href="<?php echo U('Member/EnterActivity/contact');?>" <?php if(ACTION_NAME == 'contact') { ?>class="active"<?php } ?>>联系我们</a></li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- 头部 end -->