<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>		<style>
			#footer .footer-nav .footer-logo .l img{ width:auto; height:52px; }
			#footer .footer-nav .footer-logo .l span{ display:block; position:static; }
		</style>
		<div id="footer">
				<div class="footer-nav">
					<div class="wrap">
						<div class="list fl">
							<dl class="fl p0">
								<dt>买家常见问题</dt>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>57));?>">如何抢购商品</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>84));?>">如何参与试用</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>69));?>">如何领回划算金</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>11));?>">下单方式介绍</a></dd>
								
							</dl>
							<dl class="fl">
								<dt>商家常见问题</dt>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>18));?>">如何报名活动</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>39));?>">报名商品条件</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>87));?>">Vip商家有哪些特权</a></dd>
								
							</dl>
							<dl class="fl">
								<dt>服务中心</dt>
								<dd><a href="<?php echo U('document/Index/lists',array('catid'=>83));?>">关于我们</a></dd>
								<dd><a href="<?php echo U('navigation/index/index');?>">站点导航</a></dd>
								<dd><a href="<?php echo U('document/Index/lists',array('catid'=>88));?>">联系方式</a></dd>
								<dd><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes" target="_blank">在线客服</a></dd>
								
							</dl>
							<dl class="fl">
								<dt>帮助中心</dt>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>2));?>">帮助中心首页</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>2));?>">买家帮助</a></dd>
								<dd><a href="<?php echo U('document/index/lists',array('catid'=>3));?>">商家帮助</a></dd>
								
							</dl>
							<dl class="fl">
								<dt>特色服务</dt>
								<dd><a href="<?php echo U('document/index/trial_help');?>">新手引导</a></dd>
								<dd><a href="/invitation/">邀请好友</a></dd>


							</dl> 
						</div>
						<div class="footer-logo fr">
							<div class="l">
								<img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" />
								<span>客服时间:<?php echo C("site_work_day");?></span>
							</div>
							<div class="phone clear">
								<div class="fl p-i"></div>
								<div class="fl p-n"><?php echo C("site_contact_tel");?></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="b-c-l">
					<div class="b-fx">
						<div class="b-fx-w clear">
							<div class="gz fl t-code clear">
								<div class="c-i fl"><img src="<?php echo C('WEIXIN_LOGO');?>" alt="" /></div>
								<dl class="fr">
									<dt>关注官方微信</dt>
									<dd>扫一扫</dd>
									<dd>享受微信专享服务</dd>
								</dl>
							</div>
							
							<div class="gz fl sina">
								<p class="t">关注新浪微博</p>
								<p class="b">
									<a href="<?php echo C('XINLANG');?>" target="_blank" class="set_sina_icon border">立即关注</a>
								</p>
							</div>
							
							<div class="gz fl wb">
								<p class="t">关注腾讯微博</p>
								<p class="b">
									<a href="<?php echo C('TENGXUN');?>" target="_blank" class="set_tencent_icon border">立即关注</a>
								</p>
							</div>
							
						</div>
					</div>
					
					<div class="hz-sj">
						<div class="wrap-and">
								<?php require_once('E:\WWW\klz168.com/Application/Link\Taglib\link.class.php');$link_tag = new link();if(method_exists($link_tag, 'lists')) {$data = $link_tag->lists(array('linktype'=>'1','limit'=>'20',));} ?>
									<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
									<a href="<?php echo $r['url'];?>" target="_blank" ><img src="<?php echo $r['image'];?>" alt="" /></a>
									<?php $n++;}unset($n); ?>
						    	
						</div>
					</div>
					
					<div class="link">
						<div class="wrap-and">
							<span><a href="<?php echo U('document/Index/lists',array('catid'=>83));?>">关于我们</a></span>
							<span><a href="<?php echo U('document/Index/lists',array('catid'=>88));?>">联系方式</a></span>
							<span><a href="<?php echo U('Member/EnterActivity/index');?>">商家报名</a></span>
							<span><a href="<?php echo U('document/index/lists',array('catid'=>2));?>">帮助中心</a></span>
							<span><a href="<?php echo U('navigation/index/index');?>">站点导航</a></span>
							<span  class="rn"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes">在线客服</a></span>
						</div>
					</div>
					<p class="copy"><?php echo C("site_web_copyright");?>Copyright© <?php echo $_SERVER['SERVER_NAME'];?> 2019-2015，All Rights Reserved<?php echo C('site_web_icp');?> <?php echo stripslashes(C('site_statistical_code'));?></p>

					<div class="zd-h">
						<img src="<?php echo THEME_STYLE_PATH;?>style/img/b1.png" alt="" />
						<img src="<?php echo THEME_STYLE_PATH;?>style/img/b2.png" alt="" />
						<img src="<?php echo THEME_STYLE_PATH;?>style/img/b3.png" alt="" />
						<img src="<?php echo THEME_STYLE_PATH;?>style/img/b4.png" alt="" />
						<img src="<?php echo THEME_STYLE_PATH;?>style/img/b5.png" alt="" />
					</div>					
					
				</div>
		</div>
	</body>

</html>