<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo nickname($report[userid]);?>试用<?php echo $rs['title'];?>报告-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="<?php echo $rs['title'];?>试用报告，<?php echo nickname($report[userid]);?>，">
		<meta name="description" content="由会员<?php echo nickname($report[userid]);?>试用<?php echo $rs['title'];?>报告，分享给大家。">
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/Move.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/setIndex.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/slide.js"></script>

        <link rel="stylesheet" type="text/css" href="/templates/cloud/style/css/sun_single_show.css" />

		<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/style.css" />


        <style type="text/css">

        </style>
  
		<script type="text/javascript">
			$(document).ready(function(){
				//首页顶部移入效果
				setTopMouseover();
				//展示界面按钮显示隐藏
				sMouBox('.hot_com_show','.hot_pages');
				//搜索下拉菜单显示隐藏
				sMouBox('.menu_sum','.search_menu_top');
				//首页banner左侧菜单栏目
				topMove();			
				//首页中间展示大图制作
				bannerPlay();
				//商城公告部分
				showSign();	
				//新品热门部分插件
				jQuery(".hot_com_show").slide({ mainCell:".hot_show_wrap", effect:"leftLoop",vis:5, autoPlay:true});
				//缩略图商品移入出现按钮
				shopsMouse();
				//热门商品信息显示
				setHorComShow();
				//列表菜单点击样式			
				//setShopsStyle(obj,getColor,getBackground,getBorder,setColor,setBackground,setBorder);
				setShopsStyle('.jsone li a','#666','#f9f9f9','none','#fff','#ff6798','solid 1px #fe5991');				
				setShopsStyle('.jstwo li a','#666','#f9f9f9','none','#fff','#fe8860','solid 1px #fe8860');				
				setShopsStyle('.js_3 li a','#666','#f9f9f9','none','#fff','#ff73e0','solid 1px #ff73e0');			
				setShopsStyle('.js_4 li a','#666','#f9f9f9','none','#fff','#60a2ff','solid 1px #60a2ff');
				
				//晒单达人展示
				jQuery(".hot_shops_content").slide({ mainCell:".hot_shops_content_img_wrap", effect:"leftLoop",vis:2, autoPlay:true});	
			});
		</script>
		<style type="text/css">
			.top {
				height:65px;
			}
			.login_nav{
				display:block;
				float:right;
				
			}

			.login_nav > li{
				display: list-item;
				text-align: -webkit-match-parent;
				margin-top:33px;
				
			}
			.login_nav > li a{
				font-size: 16px;
				outline: none;
			}
			.login_nav > li a:hover{
				text-decoration:underline;
			}
			div.top h1 {
			float: left;
			font-size: 18px;
			height: 100%;
			line-height: 54px;
			text-indent: 110px;
			font-weight: normal;
			margin-top: 15px;
			background: url(<?php echo C('SITE_LOGO_ZHU');?>) no-repeat 0 7px;
			}
		</style>
	</head>
	<a name="top"></a>
	<body>
	<!-- wrap 内容页盒模型 -->
	<!-- 顶部部分 -->
		<?php include template('toper','common'); ?>
		<style type="text/css">
			.sy{ height:54px; position:absolute; left:0; bottom:0; }
			.sy .sy_logo{ width:176px; height:54px; float:left; }
			.sy .sy_logo img{ width:100%; height:100%; border:none; }
			.sy h4{ float:left; font-size:18px; margin-top:30px; margin-left:5px; color:#fff; }
		</style>
		<div class="top" style="padding-top:30px;margin:0;">
			<div class="wrap" style="overflow:hidden;position:relative;">
				<div class="sy clear">
				 	<div class="sy_logo"><img src="<?php echo C('SITE_LOGO_fu');?>"></div>
				 	<h4>试用报告</h4>
				 </div>
				<ul class="login_nav">
					<li ><a href="<?php echo U('Product/Index/report_list');?>">试用报告首页</a></li>
					<!-- <li><a href="#">最新报告</a></li>
					<li><a href="#">精华报告</a></li> -->
				</ul>				
			</div>
		</div>
		<div style="clear: both;"></div>
		<div class="main">
			<div class="main_left">
				<div class="main_goods">
					<div class="goods_name">
						<dl>
							<dt><?php echo $rs['title'];?></dt>
							<dd>推荐购买指数：<span><img src="<?php echo THEME_STYLE_PATH;?>style/images/star<?php echo $score;?>.png" /></span></dd>
							<dd class="goods_comment"><?php echo str_cut(strip_tags($report['content']),100);?></dd>
						</dl>
					</div>
					<div class="stamp">
						<span class="stamp_stamp">
							<?php if($good[appraised] == 1) { ?>
							<img src="<?php echo THEME_STYLE_PATH;?>style/images/essence.png" width="76" height="61" />
							<?php } ?>
						</span>
						<?php if($rs[keyword] ) { ?>
						<dl>
							<dt>标签：</dt>
							<dd><a href="javascript:;" search-keyword="<?php echo $rs['keyword'];?>" target="_blank"><?php echo $rs['keyword'];?></a></dd>
						</dl>
						<?php } ?>
					</div>
				</div>
				<div style="clear: both;"></div>
				<div class="main_try">
					<div class="try_name">
						<div class="try_name_info">
							<div class="try_name_info_goods">
								<img src="<?php echo $rs['thumb'];?>" width="100" height="100" />
							</div>
							<div class="try_name_info_info">
								<p>
									<span>试用活动：</span>
									<span style="color: #4ba6d3;"><?php echo $rs['title'];?></span>
								</p>
								<p>
									<span>试用分数:</span>
									<span><img src="<?php echo THEME_STYLE_PATH;?>style/images/star<?php if($baseinfo[star] == 4) { ?>4<?php } elseif ($baseinfo[star] == 5) { ?>5<?php } elseif ($baseinfo[star] == 3) { ?>3<?php } elseif ($baseinfo[star] == 2 ) { ?>2<?php } else { ?>1<?php } ?>.png" /></span>
								</p>
								<a href="<?php echo $rs['url'];?>" target="_blank">我也要试用</a>
								<a href="<?php echo $rs['goods_url'];?>" target="_blank">直接购买</a>
							</div>
							<div style="clear: both;"></div>
						</div>
<!-- 						<a href="#" class="try_name_url">查看其它用户的试用报告 →</a>
 -->					</div>
					<div style="clear: both;"></div>
					<div class="try_background">
						<dl>
							<dt>试客背景</dt>
							<dd>
								<?php echo $baseinfo['background'];?>
								<div class="trial_info">
									<p>
										<span class="fw">试客ID：</span>
										<span><?php echo nickname($report[userid]);?></span>
									</p>
									<p>
										<span class="fw">年龄：</span>
										<span><?php echo $baseinfo['age'];?></span>
									</p>
									<p>
										<span class="fw">职业：</span>
										<span><?php echo $baseinfo['job'];?></span>
									</p>
									<p>
										<span class="fw">身高：</span>
										<span><?php echo $baseinfo['height'];?></span>
									</p>
									<p>
										<span class="fw">体重：</span>
										<span><?php echo $baseinfo['weight'];?></span>
									</p>
								</div>
							</dd>
						</dl>
					</div>
					<?php if($report[thumb]) { ?>
					<div class="try_experience">
						<dl>
							<dt>试用过程与体验</dt>
							<dd>
								<?php echo htmlspecialchars_decode(stripslashes($report[content]));?> 
								<br />
								<img src="<?php echo $report['thumb'];?>" />
							</dd>
						</dl>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="main_right">
				<div class="main_right_member">
					<span>
						<img src="<?php echo getavatar($report['userid'],1);?>" width="100" height="100" />
					</span>
					<p class="main_right_member_name"><?php echo nickname($report[userid]);?></p>
					<p class="application">申请次数：<?php echo $alipay_count;?>次</p>
					<p class="application">成功申请：<?php echo $success_count;?>次</p>
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>
		<?php include template('footer','common'); ?>