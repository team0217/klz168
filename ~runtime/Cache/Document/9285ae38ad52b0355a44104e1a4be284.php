<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
		<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
		<meta name="description" content="<?php echo $SEO['description'];?>">
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/help.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	</head>
	<body>
						<?php include template('toper','common'); ?>

		
		<div id="user_header">
			<div class="wrap-and">
				<div class="user_logo clear fl">
					<div class="logo_img fl"><a href="<?php echo __APP__;?>"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /></a></div>
					<h1 class="l_title fl">帮助中心</h1>
					<ul class="help_main_nav_tab">


						<?php
							$_catid = ($catid == 1) ? 2 : $catid;
							$_top_catid = id_in_arrchildid(2, $_catid) ? 2 : 3;
						?>
						<?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'category')) {$data = $document_tag->category(array('catid'=>'1','limit'=>'2',));} ?>
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<li class="<?php if((id_in_arrchildid($r[catid], $_catid))) { ?> active<?php } ?>"><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
						<?php $n++;}unset($n); ?>
						
					<!-- 	<li><a href="help_tmp.html">试客中心</a></li>
						<li class="active"><a href="help_shops_tmp.html">商家中心</a></li> -->
					</ul>
				</div>
				<div class="help_search">
					<form method="get">
						<input type="hidden" name="c" value="Index"></input>
						<input type="hidden" name="a" value="search_help"></input>
						<input type="hidden" name="catids" value="<?php echo $catid;?>" class="catids"></input>
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
					<b><?php echo $t_title;?>><?php echo $title;?></b>
				</p>
			</div>
			
			<div class="wrap-and clear">

				<div class="help_left fl">
					
					<h2 class="title"><?php echo $t_title;?></h2>
					<?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'category')) {$data = $document_tag->category(array('catid'=>$_top_catid,'limit'=>'20',));} ?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					<?php $subcats = subcat($r['catid']);?>
					
					<dl class="nav_list">

						
						<dt><?php echo $r['catname'];?></dt>
						
						<?php $n=1; if(is_array($subcats)) foreach($subcats AS $k => $rs) { ?>
						<dd><a href="<?php echo $rs['url'];?>"><?php echo $rs['catname'];?></a></dd>
						<?php $n++;}unset($n); ?>
						

					</dl>
					

					<?php $n++;}unset($n); ?>
					
					
					<!-- <dl class="nav_list">
						<dt>试用流程说明</dt>
						<dd><a href="#">用户登录与注册</a></dd>
						<dd><a href="#">如何注册</a></dd>
						<dd><a href="#">如何登录</a></dd>
					</dl>
					<dl class="nav_list">
						<dt>试客中心</dt>
						<dd><a href="#">了解试用</a></dd>
						<dd><a href="#">参与试用的条件</a></dd>
						<dd><a href="#">如何获取金币</a></dd>
						<dd><a href="#">如何搜索试用下单</a></dd>
						<dd><a href="#">如何查看我的试用情况</a></dd>
						<dd><a href="#">如何填写我的试用报告</a></dd>
					</dl> -->
				</div>




				<div class="help_right fr">
					<div class="box">
						<h3 class="title"><?php echo $title;?></h3>
						<div class="content">
							<?php echo $content;?>
							<!-- <ul>
								<li class="clear">

									<b class="list-ico fl">1.</b>
									第一步：在领啦首页右边点击"免费注册"，打开注册页面。（所有帮助页面参照这一个模板）
								</li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php include template('footer','common'); ?>

	</body>
</html>