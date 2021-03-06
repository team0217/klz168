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
	<link href="<?php echo THEME_STYLE_PATH;?>style/css/n_businessman.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>


</head>
		      <?php include template('v2_merchant_header','member/common'); ?>

	<div class="i_businessman">
		<!--s_nav-->
		<div class="ibody">
			<div class="s_weiz">
				当前位置：
				<a href="<?php echo U('Member/Profile/index');?>" class="nav_active">商家中心</a>
				&nbsp;>缴纳活动保证金
			</div>
			<!--s_weiz-->
			<?php include template('v2_merchant_left','member/common'); ?>
			<div class="s_right" >
				<div  class="title">缴纳成功</div>
				<div class="s_tryout5">
					<div class="part1">您发布的活动一旦系统审批成功，您将不能对此试用活动进行删除，请慎重！</div>
					<div  class="part2">
						<div class="part">填写活动信息</div>
						<div class="jg2"></div>
						<div class="part ">填写试用信息</div>
						<div class="jg2"></div>
						<div class="part ">存入活动担保金</div>
						<div class="jg3"></div>
						<div class="part sel">等待审核</div>
					</div>
					<div class="clear"></div>
					<div class="part3" >
						<div class="ti">
							<span  >
								您发布的商品正在审核中，我们会在1-3个工作日完成审核！
								<br/>
								请耐心等待...
								<br/>
								温馨提示：您可以联系您的客服专员,加快审核！
							</span>
						</div>

					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php include template('footer','common'); ?>