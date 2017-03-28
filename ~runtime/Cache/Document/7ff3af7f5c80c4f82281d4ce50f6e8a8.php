<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>联系方式-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
		<meta name="description" content="<?php echo $SEO['description'];?>">
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/Move.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/setIndex.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="j<?php echo THEME_STYLE_PATH;?>style/s/slide.js"></script>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/menu_gen_style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/help.css" /> 
		<script type="text/javascript">
			$(document).ready(function(){
				//首页顶部移入效果
				setTopMouseover();
				//搜索下拉菜单显示隐藏
				sMouBox('.menu_sum','.search_menu_top');
				//首页banner左侧菜单栏目
				topMove();						
			});
		</script>
	</head>
	<body>
	<!-- wrap 内容页盒模型 -->
	<!-- 顶部部分 -->
		<?php include template('toper','common'); ?>
		<!-- 帮助中心头部 -->
		<div id="user_header">
			<div class="wrap-and">
				<div class="user_logo clear fl">
					<div class="logo_img fl"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /></div>
					<h1 class="l_title fl">联系方式</h1>
					<ul class="help_main_nav_tab">

<!-- 
						<?php
							$_catid = ($catid == 1) ? 2 : $catid;
							$_top_catid = id_in_arrchildid(2, $_catid) ? 2 : 3;
						?>
						<?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'category')) {$data = $document_tag->category(array('catid'=>'1','limit'=>'2',));} ?>
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<li class="<?php if((id_in_arrchildid($r[catid], $_catid))) { ?> active<?php } ?>"><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
						<?php $n++;}unset($n); ?>
						 -->
					<!-- 	<li><a href="help_tmp.html">试客中心</a></li>
						<li class="active"><a href="help_shops_tmp.html">商家中心</a></li> -->
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




		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b><?php if($type == 5) { ?>VIP公告<?php } elseif ($type == 3) { ?>官方公告<?php } elseif ($type == 2) { ?>招商公告<?php } else { ?>最新消息<?php } ?></b>
				</p>
			</div>
			
			<div class="wrap-and clear">

				<div class="help_left fl">

					
					<h2 class="title">
						公告管理
					</h2>

				
					
					<dl class="nav_list">

						
<!-- 						<dt><?php echo $r['catname'];?></dt>
 -->						
						
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

									<dl>
						<dt>新浪微博：</dt>
						<dd><a href="<?php echo C('xinlang');?>" alt="#" title="新浪微博" target="view_window"><?php echo C('xinlang');?></a></dd>
					</dl>
					<dl>
						<dt>腾讯微博：</dt>
					
						<dd><a href="<?php echo C('tengxun');?>" alt="#" title="腾讯微博" target="view_window">
						<?php echo C('tengxun');?></a></dd>
					</dl>
					<dl>
						<dt>联系电话: </dt>
						<dd><?php echo C('site_contact_tel');?></dd>
					</dl>
					<dl>
						<dt>联系邮箱: </dt>
						<dd><?php echo C('site_contact_email');?></dd>
					</dl>
					<dl>
						<dt>详细地址：</dt>
						<dd><?php echo C('site_contact_address');?></dd>
					</dl>
					<dl>
						<dt>工作日: </dt>
						<dd><?php echo C('site_work_day');?></dd>
					</dl>
					<dl>
						<dt>客服QQ: </dt>
						<dd><?php echo C('site_contact_qq1');?></dd>
					</dl>

								</div>
							</div>
							
						</div>
					</div>
				</div>
		</div>
	</div>
		<?php include template('footer','common'); ?>