<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
		<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
		<meta name="description" content="<?php echo $SEO['description'];?>">
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.6.min.js"></script>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/help.css" /> 
				<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/help2.css" /> 


	</head>
	<body>
	<!-- wrap 内容页盒模型 -->
	<!-- 顶部部分 -->

	<!-- 顶部部分 -->
	<style type="text/css">
	.header .wrap span .name_hover{
		color:green;
	}
	.login-tipMsg {
		display: block;
		margin-bottom: 10px;
		padding: 4px 22px 4px;
		border: 1px solid #FFAD77;
		color: #f00;
		word-wrap: break-word;
	}
	.login-uName p, .login-pwd p {
		line-height: 24px;
		font-size: 14px;
	}
	.login-pwd input, .login-uName input {
		padding: 5px;
		width: 240px;
		border: 1px solid #ccc;
		outline: none;
	}
	.login-pwd {
		margin-top: 12px;
	}
	.login-other {
		margin-top: 10px;
	}
	.login-otherL {
		float: left;
	}
	.login-other a {
		text-decoration: underline;
	}
	.login-btn {
		display: block;
		height: 35px;
		line-height: 35px;
		width: 252px;
		font-size: 18px;
		background-size: cover;
		color: #f9f9f9;
		cursor: pointer;
		text-align: center;
		font-weight: normal;
		font-weight: bold\0;
		border: 0;
		text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
		background-color: #E22627;
		background-image: -webkit-gradient(linear,left top,left bottom,from(#F23C3D),to(#D51415));
		background-image: -moz-linear-gradient(top,#F23C3D,#D51415);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F23C3D',endColorstr='#D51415');
		background-image: -o-linear-gradient(top,#F23C3D,#D51415);
		background-image: -ms-linear-gradient(top,#F23C3D 0,#D51415 100%);
		background-image: linear-gradient(top,#F23C3D,#D51415);
	}
	.login-otherR {
		float: right;
	}
	.login-QQlogin {
		margin-right: 10px;
	}
	.login-QQlogin img{
		width: 16px;
		height:16px;
	}
	.login-btnDisabled,.login-btnDisabled:hover{text-shadow:1px 1px 0 #fff;color:#a0a0a0;background:#ccc;filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);cursor:default}

	.login-form a,p{
	    font-size: 12px;
	    color: #5c5c5c;
	    text-decoration:none;
	}
	#header .logo img{ width:auto; height:52px; position:relative; top:13%; margin-top:-26px; }
	</style>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title></title>
			<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/base.css" />
			<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/style.css" />
			<script type="text/javascript" src="/templates/cloud3/style/js/jquery-1.7.2.min.js"></script>
			<script type="text/javascript" src="/static/js/dialog/jquery.artDialog.js?skin=default"></script>
			<script type="text/javascript" src="/templates/cloud3/style/js/action.js"></script>
		</head>
		<script type="text/javascript">
	var site = {
		"site_root" : '',
		"js_path" : '/static/js/',
		"css_path" : '/static/css/',
		"img_path" : '/static/images/',
		"template_img" : '/templates/cloud3/style/images',
		"webname" : '云划算',
		"order_url" : '/index.php?m=Order&c=DoOrder&a=manage',
		"nickname" : '新会员，请完善资料',
		"message":'1',
		"user":{"userid":"292","modelid":"1","nickname":"","groupid":"1","lastdate":"1446264701","alipay_status":"0","bank_status":"0","email_status":"0","phone_status":"0","phone":"","email":"727115906@qq.com","point":"2","name_status":null}};
	var activity_set = null;
	var good_buy_times = null;
	var qq_ico = "/templates/cloud3/style/images/qq_ico.png";
	var qq_url = "/index.php?m=Oauth&c=Index&a=login";

	$("#pages a").live('click',function(){
	  $(window).scrollTop(0);
	});	

	$("#logout").live('click',function(){
			$.post("/index.php?m=Member&c=Index&a=logout",function(data){
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
	<script type="text/javascript" src="/templates/cloud3/style/js/member.js"></script>
		<body>
			<!-- scroll -->
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
					<!-- <form  method="get">
						<input type="hidden" name="m" value="Document">
						<input type="hidden" name="c" value="Index">
						<input type="hidden" name="a" value="search_help">
						<input type="hidden" name="catids" value="<?php echo $catid;?>" class="catids">
						<div class="txt fl"><input placeholder="有问题试着搜" type="text" name="keywords" value="<?php echo $_GET['keywords'];?>"  /></div>
						<input class="fl nav_sub" type="submit" value="搜索"/>
					</form> -->
				</div>
			</div>
		</div>
		
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
							
							<div class="wrap web_nav_c_border">
				<div class="web_hint_box">
					<h1 class="title">网站热点</h1>
					<ul class="list">
						<?php $n=1;if(is_array($nav)) foreach($nav AS $v) { ?>
						<li><a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
						<?php $n++;}unset($n); ?>
						
					</ul>
				</div>
				<div class="web_hint_box">
					<h1 class="title">网站服务</h1>
					<ul class="list">
						<li><a href="<?php echo U('document/index/lists',array('catid'=>2));?>">帮助中心</a></li>
					</ul>
				</div>
				<div class="web_hint_box">
					<h1 class="title">商家服务</h1>
					<ul class="list">
						<li><a href="<?php echo U('Member/EnterActivity/index');?>" target="_blank">商家报名</a></li>
						<li><a href="<?php echo U('Member/merchant/becomevip');?>">店铺VIP</a></li>
						<li><a href="<?php echo U('Member/Profile/index');?>">商家中心</a></li>
					</ul>
				</div>
			</div>	
							
						</div>
					</div>
				</div>	
		</div>
	</div>
	<?php include template('footer','common'); ?>