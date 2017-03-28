<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>关于我们-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
		<meta name="description" content="<?php echo $SEO['description'];?>">
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.6.min.js"></script>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/help.css" /> 
	</head>
	<body>
	<!-- wrap 内容页盒模型 -->
	<!-- 顶部部分 -->
		<?php include template('toper','common'); ?>

		<div id="user_header">
			<div class="wrap-and">
				<div class="user_logo clear fl">
					<div class="logo_img fl"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /></div>
					<h1 class="l_title fl">服务中心</h1>
					<ul class="help_main_nav_tab">
					</ul>
				</div>
				<div class="help_search">
					<form  method="get">
						<input type="hidden" name="m" value="Document">
						<input type="hidden" name="c" value="Index">
						<input type="hidden" name="a" value="search_help">
						<input type="hidden" name="catids" value="<?php echo $catid;?>" class="catids">
						<div class="txt fl"><input placeholder="有问题试着搜" type="text" name="keywords" value="<?php echo $_GET['keywords'];?>"  /></div>
						<input class="fl nav_sub" type="submit" value="搜索"/>
					</form>
				</div>
			</div>
		</div>


		<!-- 帮助中心头部 -->
		
		<div id="content">	
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b><?php if($catid==83) { ?>关于我们<?php } elseif ($catid==88) { ?>联系方式<?php } elseif ($catid==2) { ?>帮助中心<?php } else { ?>站点导航<?php } ?></b>
				</p>
			</div>
			<div class="wrap-and clear">

				<div class="help_left fl" style="width:170px;">

					
					<h2 class="title">
						服务中心
					</h2>
					
					<dl class="nav_list">

				    <dd><a href="<?php echo $rs['url'];?>"><?php echo $rs['catname'];?></a></dd>

					<dd><a href="<?php echo U('navigation/index/index');?>">站点导航...</a></dd>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>83));?>" <?php if($catid == 83) { ?>class="active"<?php } ?>>关于我们...</a></dd>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>88));?>" <?php if($type == 88) { ?>class="active"<?php } ?>>联系我们...</a></dd>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>2));?>" <?php if($type == 2) { ?>class="active"<?php } ?>>帮助中心...</a>
					</dd>
				
					</dl>
				</div>




				<div class="help_right fr">
					<div class="box">
						
						<h3 class="title"><?php if($catid==83) { ?>关于我们<?php } elseif ($catid==88) { ?>联系方式<?php } elseif ($catid==2) { ?>帮助中心<?php } else { ?>站点导航<?php } ?></h3>
						
						<div class="content">
							
							<div class="help_wt" >
								<div class="about_content">
									<?php echo dstripslashes($content);?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include template('footer','common'); ?>