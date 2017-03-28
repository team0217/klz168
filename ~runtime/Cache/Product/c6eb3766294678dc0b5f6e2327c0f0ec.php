<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo get_seo('postal_seo','postal_title','');?></title>
	<meta name="keywords" content="<?php echo get_seo('postal_seo','postal_keyword','');?>" />
	<meta name="description" content="<?php echo get_seo('postal_seo','postal_description','');?>" />
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/Move.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/setIndex.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/slide.js"></script>
	<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
	<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/menu_gen_style.css" />
	<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/list_try.css" />

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
			<style>
		@-moz-document url-prefix() {#header .logo img { top:0% !important;
			margin-top:0 !important;}}

	</style>
	<style type="text/css">
			.sbment { height:36px; border-bottom:solid 1px #ddd; line-height:36px; }
			.sbment span { color:#999; float:left; text-align:right; width:78px; height:100%; padding:0 12px; }
			.sbment li { float:left; margin:0 12px; }
			.sbment li a { color:#999; }
			.sbment li .a_click { color:#ff6600; }
			
	</style>

   <style type="text/css">.banner_menu{ display: none;}</style>
           <script>
   (function(win,doc){
   var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
   if (!win.alimamatk_show) {
   s.charset = 'gbk';
   s.async = true;
   s.src = "http://a.alimama.cn/tkapi.js";
   h.insertBefore(s, h.firstChild);
   }
   var o = {
   pid: "<?php echo C('API_PID');?>", //淘宝客pid
   appkey:"<?php echo C('API_KEY');?>",  //淘宝客key
   unid:"",
   evid:"",
   type:"click",
   plugins: [
   {name: 'keyword'},
   {name: 'aroundbox'}
   ]
   }
   win.alimamatk_onload = win.alimamatk_onload || [];
   win.alimamatk_onload.push(o);
   })(window, document);
   </script>


</head>
<body>
	<!-- wrap 内容页盒模型 -->
	<!-- 顶部部分 -->
	<?php include template('toper','common'); ?>
	<!-- logo和搜索部分 -->
	<?php include template('header','common'); ?>
	<div class="content">
		<!--试用精选-->
		<div class="content-bd top3" style="width:1210px;margin:0 auto; position:relative;">
			<div class="fleat getjing" style="width: 100%;">
				<div class="fleat left1" style="margin-top:10px;">
					<span class="fleat block">
						<img src="<?php echo THEME_STYLE_PATH;?>style/images/xing.png"></span>
					<span class="fleat big block" style="margin: 3px;color:#666;">
						<?php echo C_READ('POSTAL_NAME','POSTAL');?> <b class="font-red">精选</b>
					</span>
					<a class="nohover jx-more">为你精选每一样东西！</a>
				</div>

				<div style="clear: both"></div>
				<style type="text/css">

#header .logo img {
    width:176px;
    height:52px;
    position: relative;
    top:54%;
    margin-top:-26px;
 } 

.jx-more {
    margin:7px 0 0 2px;
    display: block;
    float: left;
    font-size:12px;
    color:#888;
}

					.getjing .bd ul li{ font-size:12px; width:220px; background:#fff; padding:5px; float:left; margin:5px; border:solid 1px #eaeaea; overflow:hidden; }
					.jing-div .pic{ height:220px; }
					.jing-div .pic img{ width:100%; height:100%; }
					.title{ font-size:12px; position:relative; padding-left:22px; }
					.small_logo{ position:absolute; left:0; top:4px; }
					.fleat{ float:left; }
					.money{     font-size: 16px;
					    color: #f45a4f;
					    font-weight: bold; }	
					    .big2 {
					    font-size: 28px;
					    color: #f45a4f;
					    font-weight: bold;
					}
					.top {
    margin-top: 5px;
}
.getjing .bd ul li {
    float: left;
    display: _inline;
    line-height: 20px;
}

.top1 {
    margin-top: 10px;
}

.anniu_button4 {
    background:#ff6c00;
    color: #fff;
    cursor: pointer;
    float: left;
    height: 31px;
    line-height: 31px;
    text-align: center;
    text-decoration: none;
    width: 91px;
    font-weight: bold;
    font-size: 14px;
    border-radius:3px;
}
.rleat {
    float: right;
}

.top1 {
    margin-top: 10px;
}
.original-a {
    font-size: 12px;
    color: #5c5c5c;
    text-decoration: none;
}
.jing-div .title a:hover{ color:#ff6c00; }

</style>
<style type="text/css" media="screen">
#page{
margin-top: 50px !important;
}
	
</style>
				<div class="bd" id="goods_lists">
					
				</div>

			</div>
		</div>

		<div style="clear: both; zoom: 1;"></div>

			<div id="page" class="mt30">
						</div>

<?php include template('footer','common'); ?>
<script type="text/javascript">
	getContent(1);
	function getContent(page) {
		var page = page || 1;
		var param = {
            catid : <?php echo $catid;?>,
			num:'30',
			mod   : "<?php echo $mod;?>",
			orderby  :'',
			orderway :'',
			protype : 2,
			page:page
		};
		$.getJSON(site.site_root + '/index.php?m=product&c=api&a=v2_getlists', param, function(ret) {
			var _html = '';
			if(ret.status == 1) {
				$.each(ret.data.lists, function(i, n) {
					_html += '<ul class="jing">';
					_html += '<li class="fleat"><div class="jing-div"><div class="pic">';
					_html += '<a isconvert="1" href="'+ n.goods_url +'" target="_blank"><img src="'+ n.thumb +'" width="290" height="290" title="'+ n.title +'" alt="'+ n.title +'" /></a></div>';
					_html += '<div class="title top"><span class="small_logo"><img src="'+ n.img_source +'"/></span><a isconvert="1" href="'+ n.goods_url +'" target="_blank" class="size" title="'+ n.title +'">'+ n.title +'</a></div>';
					_html += '<div class="jing-top top"><div class="fleat top"><div class="fleat top1"><span class="money">￥</span><span class="big2" style="font-size:24px; text-decoration:line-through;">'+n.goods_price+'</span></div>';
                    _html += '<div class="fleat original-a left1" style="margin-left:30px;padding-top:10px;">';
					_html += '<div><span>剩余'+n.number+'/'+n.goods_number+'</span></div>';
                    _html += '</div></div><div class="rleat top1"><a isconvert="1" href="'+ n.goods_url +'" target="_blank" class="anniu_button4 nohover3">去看看</a></div></div>';
					_html += '</li></ul>';
			   });
			   $("#goods_lists").html(_html);
			     $("#page").html(ret.data.pages);
		   } else {
			   $("#goods_lists").html(ret.info);
			   $("#pages").html('');
			   return false;
		   }
		});
	}
	
	$('#page a').live('click', function() {
		var urlstr = $(this).attr('href').toString();
		var page = $.urlParam('page', urlstr);
		if(page != false) {
			getContent(page);
		}
		return false;
	})
	
	$.urlParam = function(name, url){
		var url = url || window.location.href;
		var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url);
		if(!results) return false;
		return results[1] || 0;
	}
</script>
</div>