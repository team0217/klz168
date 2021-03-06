<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>商家中心-活动中心-等待审核-<?php echo C('WEBNAME');?></title>
	<meta name="keywords" content="商家中心,活动中心,等待审核,<?php echo C('WEBNAME');?>" />
	<meta name="description" content="商家中心,活动中心,等待审核<?php echo C('WEBNAME');?>" />
	<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
	<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/release_shop.css" />
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/plugins/iframeTools.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/order.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/activity.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/task.js"></script>
	<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/release_shop.css" />

</head>
<body>
	<!-- wrap 内容页盒模型 -->
	<?php include template('v2_merchant_header','member/common'); ?>
	<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b>活动追加</b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php include template('v2_merchant_left','member/common'); ?>
			<div class="fr u_index_mess user_pd_1">

				<h2 class="user_page_title">活动追加</h2>
				<div class="content_wrap overflow_hidden">
					<div class="float_right right border_1_dddddd border_efefef">
						<img src="<?php echo THEME_STYLE_PATH;?>style/images/release_hint_07.jpg" class="display_block state margin_0_auto" alt="" />
						<div class="r_content"> <font class="r_state bg_yes"></font>
							<span>
								您追加的商品正在审核中，我们会在24小时内完成审核，您也可以联系您所属专员加快审核！
							</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>	
			<?php include template('footer','common'); ?>