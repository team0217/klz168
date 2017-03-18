<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>

<div id="top" class="">
			<div class="wrap-and clear">
				<ul class="fl l-nav clear">
					<li class="l_nav_yh">欢迎光临<?php echo C('WEBNAME');?><span class="user_name"><a href="<?php echo U('Member/Profile/index');?>"><?php echo nickname(cookie('_userid'));?></a><b class="user_n_ico"><a href="<?php echo U('Member/Announce/announce',array('type'=>1));?>"><?php echo message_count(cookie('_userid'));?></a></b></span></li>
					<li class="l_nav_time">您上次的登录时间：<span><?php echo dgmdate(getUserInfo(cookie('_userid'),'lastdate'),"Y年m月d日 H:i ");?></span></li>
				</ul>
				<ul class="fr r-nav">
				<li><a href="/" target="
					_blank">返回网站首页 &nbsp;&nbsp;&nbsp;&nbsp;</a></li>
				<li class="qq-icon"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes" target="
						_blank">在线客服</a></li>
					<li><a href="<?php echo U('document/index/lists',array('catid'=>2));?>" target="
						_blank">帮助中心</a></li>
					<li><a href="<?php echo U('navigation/index/index');?>" target="
						_blank">网站导航</a></li>
					<li class="user_gn"><a href="javascript:;" id="logout" style="cursor:pointer;">退出</a></li>
				</ul>
			</div>
		</div>
		
		<div id="user_header" class="s_user_header">
			<div class="wrap-and">
				<div class="user_logo clear fl">
					<div class="logo_img fl"><a href="/user/"><img src="<?php echo C('SITE_LOGO_FU');?>" alt="<?php echo C('WEBNAME');?>" /></a></div>
					<h1 class="l_title fl">商家管理中心</h1>
				</div>
				
				<ul class="user_nav fr clear">
				    <li><a href="/user/">商家中心首页</a></li>
					<li><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'trial'));?>">闪电佣金管理</a></li>
					<li><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'rebate'));?>">购物返利管理</a></li>
					<?php if(C('COMMISSION_ISOPEN') == 6) { ?>
					<li><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'commission'));?>"><?php echo C('COMMISSION_NAME');?>管理</a></li>
					<?php } ?>
					<li><a href="<?php echo U('Member/MerchantTask/task_list');?>">开心任务管理</a></li>
		</ul>
			</div>
		</div>

<script type="text/javascript">
<?php $userinfo = is_login();?>
var site = {
	"site_root" : '<?php echo __ROOT__;?>',
	"js_path" : '<?php echo JS_PATH;?>',
	"css_path" : '<?php echo CSS_PATH;?>',
	"img_path" : '<?php echo IMG_PATH;?>',
	"template_img" : '<?php echo THEME_STYLE_PATH;?>style/images',
	"webname" : '<?php echo C("webname");?>',
	"order_url" : '<?php echo U("Order/DoOrder/manage");?>',
	"nickname" : '<?php echo nickname($userinfo["userid"]);?>',
	"message":'<?php echo message_count($userinfo["userid"]);?>',
	"user":<?php echo json_encode($userinfo ? $userinfo : array());?>
};
	$("#logout").live('click',function(){
		$.post("<?php echo U('Member/Index/logout');?>",function(data){
			if (data.status == 1) {
				location.href=data.url;
			}else{

				art.dialog({
					lock: true,  
					fixed: true,
					icon: 'face-smile',
					title: '温馨提示',
					content: data.info,
					ok: true
				});

			};
		},'json');
 
});	
</script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/member.js"></script>