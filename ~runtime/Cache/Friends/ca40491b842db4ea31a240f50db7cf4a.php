<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo C('WEBNAME');?>app下载- <?php echo C('WEBNAME');?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/phoneuser.css"/>
	</head>
	<body>
		<?php include template('toper','common'); ?>
		<!-- logo和搜索部分 -->
		<div class="bannerzzz">
			<div class="bz-m">
				<div class="img1">
					<img src="<?php echo THEME_STYLE_PATH;?>style/img/app1.png"/>
				</div>
				<div class="bz-bn">
					<div class="bzimg">
						<img src="<?php echo THEME_STYLE_PATH;?>style/img/top-1.png"/>
					</div>
					<div class="bz-bt clearFix">
						<div class="btimg">
							<img src="/uploadfile/apk/app.png" width="150" height="150"/>
						</div>
						<div class="btp">
							<a href="<?php echo C('download_android');?>"><p class="anduo"><img src="<?php echo THEME_STYLE_PATH;?>style/img/anzuo.png"/>Android 版下载</p></a>
							<a href="<?php echo C('download_iphone');?>"><p><img src="<?php echo THEME_STYLE_PATH;?>style/img/apple.png"/>iPhone 版下载</p></a>
						</div>
						
					</div>
					<p class="bz360">扫描二维码即可下载安卓版体验 ios版本稍后上线！</p>
				</div>
			</div>
		</div>
		<div class="m1zzz">
			<div class="m1z-m">
				<div class="img2">
					<img src="<?php echo THEME_STYLE_PATH;?>style/img/app2.png"/>
				</div>
				<div class="m1zmt">
					<p class="hai">海量商品 免费试用</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou.png"/>海量商品免费领，超高通过率！</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou.png"/>免费提供化妆品、日用百货、食品产品等免费试用品，限时领取</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou.png"/>试用商品后无需退还</p>
				</div>
			</div>
		</div>
		<div class="m2zzz">
			<div class="m2z-m">
				<div class="img3">
					<img src="<?php echo THEME_STYLE_PATH;?>style/img/app3.png"/>
				</div>
				<div class="m2zmt">
					<p class="gou">购物返利 每天准时10:00上线</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou2.png"/>商品低至1折,购物返利高至95%</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou2.png"/><?php echo C('WEBNAME');?>购物返利，网购首选!</p>
					
				</div>
			</div>
		</div>
		<div class="m1zzz">
			<div class="m1z-m">
				<div class="img2">
					<img src="<?php echo THEME_STYLE_PATH;?>style/img/app4.png"/>
				</div>
				<div class="m1zmt">
					<p class="hai">做任务 赢红包</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou.png"/>红包任务天天有</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou.png"/>做<?php echo C('WEBNAME');?>任务，每天都有红包领</p>
					
				</div>
			</div>
		</div>
		<div class="m2zzz m5zzz">
			<div class="m2z-m m5zm">
				<div class="img3">
					<img src="<?php echo THEME_STYLE_PATH;?>style/img/app5.png"/>
				</div>
				<div class="m2zmt">
					<p class="gou">9.9包邮，限量抢购</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou2.png"/>9.9包邮天天有，享受低价网购惊喜</p>
					<p><img src="<?php echo THEME_STYLE_PATH;?>style/img/gou2.png"/>限量抢购，超值不断</p>
					
				</div>
			</div>
		</div>
				<?php include template('footer','common'); ?>

	</body>
</html>