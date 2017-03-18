<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php if($modelid == 1) { ?>买家用户注册<?php } else { ?>商家用户注册<?php } ?>-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="<?php if($modelid == 1) { ?>买家用户注册<?php } else { ?>商家用户注册<?php } ?>，<?php echo C('WEBNAME');?>" /> 
        <meta name="description" content="<?php if($modelid == 1) { ?>欢迎您注册<?php echo C('WEBNAME');?>买家用户，拥有<?php echo C('WEBNAME');?>账号可享受<?php echo C('WEBNAME');?>为您带来的多项便捷服务.<?php } else { ?>欢迎您注册<?php echo C('WEBNAME');?>商家用户，拥有<?php echo C('WEBNAME');?>商家账号可报名参与<?php echo C('WEBNAME');?>多项促销活动，可为您提升产品销量，提示产品知名度等多项服务。<?php } ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css"/>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/shops_login.css" /> 
		<link type="text/css" rel="stylesheet" href="<?php echo __ROOT__;?>/static/style/css/common.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo __ROOT__;?>/static/style/css/logo_reg.css" />
	</head>
	<style type="text/css" media="screen">
	#header .logo img{
		top: 50% !important;
	}
	.clear{
		clear:none !important;
	}
		
	</style>
	<body class="ui-bg-a">

					<?php include template('v2_register_header','member/common'); ?>

		<div class="center">
			<div id="reg_main">
				<div class="reg_options">
					<!-- 试客介绍 start -->
					<div class="buyer fl">
						<p class="f22 yahei c3198db mb15">用户注册</p>
						<p class="f14 lh20 c707070 mb15">我想要赚取佣金，体验商品带给我更多快乐，并将这份快乐传递给更多人</p>
						<p><a  href="javascript:;" data-type="1" class="buyer_btn js_btn"></a></p>
						<p class="buyer_bg"></p>
					</div>
					<!-- 试客介绍  end-->
					<!-- 商家介绍 start 
					<div class="merchant fr">
						<p class="f22 yahei cfe7e46 mb15">商家注册</p>
						<p class="f14 lh20 c707070 mb15">我想要推广商品，提升销量，打造专属与我的品牌！所以我是一名：商家</p>
						<p><a href="javascript:;" data-type="2" class="merchant_btn js_btn"></a></p>
						<p class="merchant_bg"></p>
					</div>
					 商家介绍 end -->
					<div class="clear"></div>
				</div>
			</div>
		</div>
							<div class="clear"></div>

					<?php include template('v2_register_footer','member/common'); ?>
				
						
		</body>
<script type="text/javascript">
	$('.js_btn').click(function(){
		var modelid = $(this).attr('data-type');
		$.post("<?php echo U('Member/Index/public_ajax_check');?>",{modelid:modelid},function(data){
			if (data.status == 1) {
				location.href=data.url;
			}else{
				art.dialog({
				lock: true,
				fixed: true,
				icon: 'face-sad',
				title: '错误提示',
				content: data.info,
				ok: function(){
					location.href=data.url;
				}
			});

				};
								
		},'json');
	});
	

</script>