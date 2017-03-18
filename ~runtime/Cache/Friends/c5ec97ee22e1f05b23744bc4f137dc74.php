<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!-- 前台通用顶部toper -->
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/toper.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/action.js"></script>
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
	var activity_set = '<?php  echo isset($activity_set) ? json_encode($activity_set) :  ''  ?>';
	var good_buy_times = '<?php echo isset($good_buy_times) ? json_encode($good_buy_times) :''  ?>';
	var qq_ico = "<?php echo THEME_STYLE_PATH;?>style/images/qq_ico.png";
	var qq_url = "<?php echo U('Oauth/Index/login');?>";

	$("#pages a").live('click',function(){
	  $(window).scrollTop(0);
	});	

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

	$('#qrcode').on('mouseover',function(){
		$(this).find('.qrcode').removeClass('dn');
	}).on('mouseout',function(){
		$(this).find('.qrcode').addClass('dn');
	});
	$('#ret_top').on('click',function(){
		$(window).scrollTop(0);
	});

</script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/member.js"></script>
	<body>
		<!-- scroll -->
		<div id="slide-scroll" class="dn">
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes" class="qq"></a>
			<?php if(C("site_complain_wangwang")) { ?>
			<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo C("site_complain_wangwang");?>&siteid=cntaobao&status=2&charset=utf-8" class="qq wangwang"></a>
			<?php } ?>
			<!-- <span class="h">邀请<br/>好友</span> -->
			<a href="<?php echo U('Member/MemberFriend/index');?>" target="_blank" class="yq hy"><b class="dn">邀请<br/>好友</b></a>
			<a href="<?php echo U('Member/EnterActivity/index');?>"  target="_blank" class="yq sj"><b class="dn">商家<br/>入驻</b></a>
			<a href="/help/?catid=2" class="yq wn" target="_blank"><b class="dn">新手<br/>帮助</b></a>			
			<a href="javascript:;" class="yq wx" id="qrcode" style="position:relative;">
				<b class="dn">关注<br/>微信</b>
				<div class="qrcode dn"><img src="<?php echo C('WEIXIN_LOGO');?>" ></div>
			</a>
            <a href="javascript:;" id="ret_top">返回顶部</a>
		</div>
	   <?php if(ACTION_NAME =='index' && MODULE_NAME == 'Product' && CONTROLLER_NAME =='Index') { ?>
	      <?php $is_show = model('poster')->where(array('id'=>5))->getField('disabled'); ?>
			<?php if($is_show != 1) { ?>
			<div id="big_img">
				 <script language="javascript" src="/index.php?m=Poster&c=Api&a=show&id=5"></script>
			</div>
			<?php } ?>
		<?php } ?>
		<div id="top" class="">
			<div class="wrap-and clear">
				<div class="fl l-nav clear" style="width:600px;overflow:hidden;" id='uBar'>
					<span class="fl">您好，欢迎光临<?php echo C("webname");?>！</span>
					<ul class="clear fl">
						<li class="qq-icon"><a href="<?php echo U('Oauth/Index/login');?>" target="_blank">QQ用户登录</a></li>
						<li><a href="<?php echo U('Member/Index/login', array('refresh' => urlencode(__SELF__)));?>" target="_blank">用户登录</a></li>
						<li><a href="<?php echo U('Member/Index/register_index');?>" target="_blank">免费注册</a></li>
					</ul>
				</div>
				<ul class="fr r-nav">
					<li class="qq-icon"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes" target="_blank">在线客服</a></li>
					<li><?php if(ACTION_NAME!='index') { ?><a href="<?php echo __APP__;?>" target="_blank">返回首页</a><?php } ?></li>
					<?php if($userinfo) { ?>
					<li><a href="<?php echo U('Member/Profile/index');?>" target="_blank">我的<?php echo C('WEBNAME');?></a></li>
					<?php } else { ?>
					<li><a href="<?php echo U('Member/Index/login');?>" target="_blank">我的<?php echo C('WEBNAME');?></a></li>

					<?php } ?>
					
					<li><a href="<?php echo U('Member/EnterActivity/index');?>" target="_blank">卖家报名</a></li>
					<li><a href="<?php echo U('document/index/lists',array('catid'=>2));?>" target="_blank">帮助中心</a></li>
					<li><a href="<?php echo U('navigation/index/index');?>" target="_blank">网站导航</a></li>
				</ul>
			</div>
		</div>