<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if($type == 'all') { ?>最新消息<?php } elseif ($type == 3) { ?>官方公告<?php } elseif ($type == 2) { ?>招商公告<?php } elseif ($type == 5) { ?>VIP公告<?php } ?><?php echo $rs['title'];?>-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="<?php if($type == 'all') { ?>最新消息<?php } elseif ($type == 3) { ?>官方公告<?php } elseif ($type == 2) { ?>招商公告<?php } elseif ($type == 5) { ?>VIP公告<?php } ?>">
		<meta name="description" content="<?php if($type == 'all') { ?>最新消息<?php } elseif ($type == 3) { ?>官方公告<?php } elseif ($type == 2) { ?>招商公告<?php } elseif ($type == 5) { ?>VIP公告<?php } ?>-<?php echo C('WEBNAME');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/help.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	</head>
	<body>
		<?php include template('toper','common'); ?>

		
		<div id="user_header">
			<div class="wrap-and">
				<div class="user_logo clear fl">
					<div class="logo_img fl"><a href="<?php echo __APP__;?>"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /></a></div>
					<h1 class="l_title fl">公告中心</h1>
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
				<!-- <div class="help_search">
					<form  method="get">
						<input type="hidden" name="m" value="Document">
						<input type="hidden" name="c" value="Index">
						<input type="hidden" name="a" value="search_help">
						<input type="hidden" name="catids" value="<?php echo $catid;?>" class="catids">
						<div class="txt fl"><input placeholder="有问题试着搜" type="text" name="keywords" value="<?php echo $_GET['keywords'];?>"  /></div>
						<input class="fl nav_sub" type="submit" value="搜索"/>
					</form>
				</div> -->
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

					<dd><a href="<?php echo U('Announce/Index/lists',array('type'=>'all'));?>" <?php if($type == 'all') { ?>class="active"<?php } ?>>最新信息</a></dd>
					<dd><a href="<?php echo U('Announce/Index/lists',array('type'=>3));?>" <?php if($type == 3) { ?>class="active"<?php } ?>>官方公告</a></dd>
					<dd><a href="<?php echo U('Announce/Index/lists',array('type'=>2));?>" <?php if($type == 2) { ?>class="active"<?php } ?>>招商公告</a></dd>
					<dd><a href="<?php echo U('Announce/Index/lists',array('type'=>5));?>" <?php if($type == 5) { ?>class="active"<?php } ?>>VIP公告</a>
					</dd>
					
						

					</dl>
					


					
					
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
						
						<h3 class="title"><?php echo $rs['title'];?></h3>
						
						<div class="content">

							<?php echo htmlspecialchars_decode(stripslashes($rs[content]));?> 
							
							<!-- 常见问题 --> 
							<script type="text/javascript">
								$(function(){ $('.help_wt_list li:odd').css('float','left'); });
							</script>
							<!-- <div class="help_wt">
								<p class="help_wt_title">常见规则</p>
								<ul class="help_wt_list clear">
									<?php require_once('E:\WWW\klz168.com/Application/Announce\Taglib\announce.class.php');$announce_tag = new announce();if(method_exists($announce_tag, 'lists')) {$data = $announce_tag->lists(array('limit'=>'8',));} ?>
									<?php $n=1; if(is_array($data)) foreach($data AS $k => $r) { ?>
									<li><b class="float: left;"></b><a href="<?php echo U('Announce/Index/show',array('id'=>$r[announceid],'type'=>$r[type]));?>"><?php echo str_cut($r[title],75);?></a></li>
									<?php $n++;}unset($n); ?>
									
									<li style="float: left;"><b class="ico"></b><a href="#">如何登录？</a></li>
									<li><b class="ico"></b><a href="#">参与试用的条件？</a></li>
									<li style="float: left;"><b class="ico"></b><a href="#">如何获取金币？</a></li>
									<li><b class="ico"></b><a href="#">如何搜索试用下单？</a></li>
									<li style="float: left;"><b class="ico"></b><a href="#">如何查看我的试用情况？</a></li>
									<li><b class="ico"></b><a href="#">如何填写我的试用报告？</a></li>
									<li style="float: left;"><b class="ico"></b><a href="#">如何申请试用商品？</a></li>
									<li><b class="ico"></b><a href="#">如何填写试用报告？</a></li>
									<li style="float: left;"><b class="ico"></b><a href="#">试用规则？</a></li>
								</ul>
							</div> -->
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php include template('footer','common'); ?>

	</body>
</html>