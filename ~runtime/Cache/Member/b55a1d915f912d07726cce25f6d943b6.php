<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><div id="top" class="">
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
		
		<div id="user_header">
			<div class="wrap-and">
				<div class="user_logo clear fl">
					<div class="logo_img fl"><a href="/user/"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /></a></div>
					<h1 class="l_title fl">会员管理中心</h1>
				</div>
				
				<ul class="user_nav fr clear">
				    <li><a href="/user/" >会员中心首页</a></li>
				    <?php if(C('REBATE_ISOPEN') == 1) { ?>
				    <li><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'rebate','state'=>2,'com_status'=>2));?>" >购物返利</a></li>
				    <?php } ?>
				    <?php if(C('TRIAL_ISOPEN') == 1) { ?>
					<li><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2));?>" >闪电佣金</a></li>
					<?php } ?>
					<!--		<?php if(C('COMMISSION_ISOPEN') == 1) { ?>
                        <li><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'commission','state'=>2));?>">原闪电佣金</a></li>
					<?php } ?>-->
				<li><a href="<?php echo U('Member/Financial/work_log');?>">开心任务</a></li>
				<li><a href="<?php echo U('Member/Financial/index');?>">淘支付</a></li>
				<li><a href="<?php echo U('Member/Yeb/index');?>">淘金呗</a></li>
				</ul>
			</div>
		</div>

<script type="text/javascript">
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