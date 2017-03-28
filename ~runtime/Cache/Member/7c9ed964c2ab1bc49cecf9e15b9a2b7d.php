<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!-- 底部 start -->
	<div id="footer">
		<div id="footer_box">
			<div class="help fl">
				<dl class="fl">
					<dt>买家常见问题</dt>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>57));?>">如何抢购商品</a></dd>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>84));?>">如何参与试用</a></dd>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>69));?>">如何领回划算金</a></dd>
					<dd><a href="<?php echo U('document/index/lists',array('catid'=>11));?>">下单方式介绍</a></a></dd>
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
			</div>
			<div class="advisory fl">
				<p class="ffffff f18">咨询热线</p>
				<p class="ffffff f32"><?php echo C('site_contact_tel');?></p>
				<dl class="fl mr20">
					<dt class="f16 bec1c5 fl">卖家咨询：</dt>
					<dd class="fl"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_complain_qq');?>&site=qq&menu=yes"><img src="<?php echo THEME_STYLE_PATH;?>style/images/on_line_qq.jpg" /></a></dd>
				</dl>
				<dl class="fl">
					<dt class="f16 bec1c5 fl">廉政举报：</dt>
					<dd class="fl"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_consult_qq');?>&site=qq&menu=yes"><img src="<?php echo THEME_STYLE_PATH;?>style/images/on_line_qq.jpg" /></a></dd>
				</dl>
				<div class="clear"></div>
				<p class="copyright">
					<p>Copyright &copy; 2009-2014 <?php echo $_SERVER['SERVER_NAME'];?></p>

					<br />
					 <?php echo C('site_web_copyright');?> 		
					 <?php echo C("site_statistical_code");?>

				</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- 底部 end -->