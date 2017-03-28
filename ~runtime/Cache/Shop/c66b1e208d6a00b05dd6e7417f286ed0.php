<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!-- 前台通用顶部header -->
<div id="header">
	<div class="wrap-and clear">
		<div class="fl logo">
			<a href="<?php echo __APP__;?>">
				<img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" />
			</a>
		</div>

		<div class="i-qgsj fl">
			<p class="icon">每天</p>
			<p class="time">
				<span>
					10:00 <b>AM</b>
				</span>
				开抢
			</p>
		</div>

		<div class="search clear">
			<input type="text" class="search-text" search-keyword=""/>
			<a href="javascript:;" class="search-button">搜索</a>
		</div>

		<div class="i-order fr clear">
			<a style="display:block;" class="fl" href="<?php echo U('Member/MemberFriend/index');?>" target="_blank">
				<div class="i-tjhy fl">
					<p class="p1">最高得</p>
					<p class="p2"> <strong><b>200</b>
							元</strong> 
						奖励
					</p>
				</div>
			</a>
			<a href="<?php echo U('Member/EnterActivity/index');?>" class="i-btn fl">
				<b></b>
				<span>商家报名入口</span>
			</a>
		</div>

	</div>
</div>
<script type="text/javascript">
<?php if(ACTION_NAME =='index' && MODULE_NAME == 'Product' && CONTROLLER_NAME =='Index') { ?>
<?php } else { ?>

	$(function(){
	/* 兼容 IE */
	var h = $('#nav .silde-nav-h').height();
	$('#nav .silde-nav-h,#nav .shadow').css('height', h);
	/* 收缩  */
		if(!$('#nav .silde').attr('stop')){
			$('#nav .silde-nav-h,#nav .shadow').css('height', 0);
			var timer = null;
			$('#nav .silde').mouseover(function() {
				clearTimeout(timer);
				$('#nav .silde-nav-h,#nav .shadow').css('height', h);
			}).mouseout(function() {
				timer = setTimeout(function() {
					$('#nav .silde-nav-h,#nav .shadow').css('height', 0);
				}, 200);
			});
		}

	});

<?php } ?>
var site = {
	"site_root" : '<?php echo __ROOT__;?>',
	"js_path" : '<?php echo JS_PATH;?>',
	"css_path" : '<?php echo CSS_PATH;?>',
	"img_path" : '<?php echo IMG_PATH;?>',
	"template_img" : '<?php echo THEME_STYLE_PATH;?>style/images',
	"webname" : '<?php echo C("webname");?>',
	"order_url" : '<?php echo U("Order/DoOrder/manage");?>',
	"nickname" : '<?php echo nickname($userinfo["userid"]);?>',
	"message":'<?php echo message_count($userinfo["userid"]);?>',
	"user":<?php echo json_encode($userinfo ? $userinfo : array());?>
};

	$("#page a").live('click',function(){
	  $(window).scrollTop(0);
	}); 

    $(function(){
	
		$('.search-text').keydown(function(e){
			if(e.keyCode==13) localsearch();
		});
		
		$(".search-button").click(function(){localsearch();})

		function localsearch() {
			var keyword = $("input[search-keyword]").val();
			if($.trim(keyword).length == 0) {
				alert('关键字不能为空');
				return false;
			}
			window.location.href = site.site_root +"/index.php?m=search&keyword="+keyword; 
		}
	
    }) 

    $(function(){
    		$('.search clear input').eq(0).keydown(function(e){
    			if(e.keyCode==13) 
    			localsearch();
    		})

    		$(".search clear a").eq(0).click(function(){alert('1');})

    })

    function localsearch() {
    	var stype = '';
    	var keyword = $(".search clear input").eq(0).val();
    	if($.trim(keyword).length == 0) {
    	alert('关键字不能为空');
    	return false;
    	}
    	window.location.href = site.site_root + "/index.php?m=search&type=" + stype + '&keyword=' + keyword; 
    }
</script>
<div id="nav">
	<!--  兼容IE6  -->
	<div class="linear"></div>
	<div class="wrap-and clear">
		<div class="silde">
			<p class="silde-nav-name">
				试用品分类
				<b></b>
			</p>
			<div class="silde-nav">
				<div class="shadow"></div>
				<ul class="silde-nav-h">
					<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'category')) {$data = $product_tag->category(array('catid'=>'0','limit'=>'12',));} ?>
					  <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<li>
							<a href="<?php echo $r['url'];?>" target="_blank">
								<img src="<?php echo $r['image'];?>"><?php echo $r['catname'];?></a>
						</li>
					   <?php $n++;}unset($n); ?>
					
				</ul>
			</div>
		</div>
		<?php $url = $_SERVER['REQUEST_URI'];?>
		<?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'navigate')) {$data = $document_tag->navigate(array('navid'=>'0','order'=>'listorder ASC','limit'=>'20',));} ?>
		<ul class="main-nav fl clear">
			<li <?php if(ACTION_NAME=='index') { ?>class="int-focus" <?php } ?>>
				<a href="<?php echo __APP__;?>">首页</a>
			</li>
			<?php $n=1; if(is_array($data)) foreach($data AS $k => $d) { ?>
			<li <?php if($url== $d['url']) { ?>class="int-focus"<?php } ?>>
				<a href="<?php echo $d['url'];?>"  <?php if($d['isblank'] == 1) { ?> target="_blank" <?php } ?>><?php echo $d['name'];?></a>
				<?php if($k == 0) { ?>
				<b class="m-i-ico new">NEW</b>
				<?php } elseif ($k == 1) { ?>
				<b class="m-i-ico hot">HOT</b>
				<?php } ?>
			</li>
			<?php $n++;}unset($n); ?>
		</ul>
		
		<div class="qd fr">
			<a href="<?php echo U('task/index/index');?>">签到领积分</a>
		</div>
	</div>
</div>