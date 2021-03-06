<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo get_seo('rebate_seo','rebate_title','');?></title>
	<meta name="keywords" content="<?php echo get_seo('rebate_seo','rebate_title','');?><?php echo get_seo('rebate_seo','rebate_keyword');?>"/>
	<meta name="description" content="<?php echo get_seo('rebate_seo','rebate_description','');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/list.css" />
</head>
<body>
	<style>
			#content .list_2_tab .l2_content .li_2_wrap .li_2_filter dd img{ height:20px; vertical-align:middle; margin-right:8px; margin-top:-2px; }
		</style>
	<?php include template('toper','common'); ?>
	<!-- logo和搜索部分 -->
	<?php include template('header','common'); ?>
	<div id="content">

		<div class="wrap">
			<p class="hint-wz clear">
				当前位置： <b>首页 ></b> <b><?php echo C('REBATE_NAME');?></b>
			</p>
		</div>

		<script type="text/javascript">
							$(function(){
								$('.list-wrap .title .al a').on('click',function(){
									$(this).addClass('active').siblings('a').removeClass('active');
										getContent();

								});

								$('.list-wrap .title .a2 a').on('click',function(){
									$(this).addClass('active').siblings('a').removeClass('active');
										getContent();

								});
								/* 兼容 */
								$('.list-wrap .list .box:nth-child(3n),.l2_box_wrap .l2_box:nth-child(6n)').css('margin-right','0');
								
								/* 如用ajax刷新数据此处tab选项卡可删除  */
								$('.list_2_tab .l2_title a').on('click',function(){
									$(this).addClass('active').siblings('a').removeClass('active');
												getContent();

									/*$(this).parents('.list_2_tab').find('.li_2_wrap').eq($(this).index()).removeClass('dn').siblings('.li_2_wrap').addClass('dn');*/
								});
							});
			</script>

		<div class="list_2_tab wrap list-wrap">

			<div class="l2_title clear">
				<a href="javascript:;" class="fl active" data-status="1">正在进行</a>
				<a href="javascript:;" class="fl" data-status="3">往期回顾</a>
			</div>

			<script type="text/javascript">
					$(function(){					
						$('.li_2_filter dt,.li_2_filter dd').on('click',function(){
							$(this).addClass('active').siblings().removeClass('active');
							getContent();

						});
					});
				</script>
			<style type="text/css">
				.li_2_filter dd img{ background:#767676; border-radius:3px; }
				</style>
			<div class="l2_content">
				<div class="li_2_wrap">
					<dl class="li_2_filter clear">
						<dt class="<?php if($catid==0) { ?>active<?php } ?>">
							<a href="javascript:;" data-catid="0">全部试品</a>
						</dt>
						<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'category')) {$data = $product_tag->category(array('catid'=>'0','limit'=>'8',));} ?>
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<dd class="clear <?php if($catid==$r[catid]||in_array($catid, explode(',', $r[arrchildid]))) { ?>active<?php } ?>" >
							<img src="<?php echo $r['image'];?>">
							<a href="javascript:;" data-catid="<?php echo $r['catid'];?>"><?php echo $r['catname'];?></a>
						</dd>
						<?php $n++;}unset($n); ?>
							
					</dl>

					<div class="title clear">
						<div class="fl clear al">
							<a href="javascript:;" class="active" data-orderby="id" data-orderway="desc">
								按时间
								<b></b>
							</a>
							<a href="javascript:;" data-orderby="goods_price" data-orderway="desc">
								按价格
								<b></b>
							</a>
							<a href="javascript:;"  data-orderby="already_num" data-orderway="desc">
								按份数
								<b></b>
							</a>

						</div>

						<div class="fr clear page-num"></div>
						<!--  搜索  -->
						<div class="fr list_2_search">
							<div class="insert fl">
								<input type="text" placeholder="宝贝名称的关键词" id="title"/>
							</div>
							<div class="l2_btn fl">
								<button>GO</button>
							</div>
						</div>
					</div>
					<script type="text/javascript">
							$('button').click(function(){
								getContent();
							});

						</script>
					<div class="l2_box_wrap clear" id="js_lists">loading...</div>

					<div id="page" class="mt30"></div>

				</div>

			</div>

		</div>

	</div>

	<!-- 底部  -->
	<?php include template('footer','common'); ?>
	<!--  侧边栏  -->

	<style>
			.box_out{ height:100%; width:100%; position:absolute; left:0; top:0; background:url(<?php echo THEME_STYLE_PATH;?>style/img/sold_out.png) no-repeat center center; }
		</style>

</body>
</html>
<script type="text/javascript">
			getContent(1);
			function getContent(page) {
			    var page = page || 1;
			    var catid = $(".li_2_filter .active a").attr('data-catid');
			    var sort = $(".al a[class~='active']"); 
			    var status = $(".l2_title .active").attr('data-status');
			    var title = $('#title').val();


			    var param = {
			      catid : catid,
			      mod   : "<?php echo $mod;?>",
			      orderby  :sort.attr('data-orderby'),
                  orderway : sort.attr('data-orderway'),
			      status:status,
			      title:title,
			      num:'30',
			      protype : $("a[data-type][class='active']").attr('data-type'),
			      page:page
			    };
			    $.getJSON(site.site_root + '/index.php?m=product&c=api&a=v2_getlists', param, function(ret) {

			       var _html = '';
			       if(ret.status == 1) {
			           $.each(ret.data.lists, function(i, n) {
			           		var _ul_margin = ((i+1) % 6 == 0) ? 'style="margin-right: 0px;"' : '';
			               _html += '<div class="l2_box fl" '+_ul_margin+'>';
			               _html += '<div class="b_img">';
								
			               _html += '<a target="_blank" style="position:relative;" href="'+n.url+'">';
			               if (n.number <= 0){
			              	 	_html += '<div class="box_out"></div>';
			              	 }

			               _html += '<img src="'+n.thumb+'" alt="'+n.title+'" width="184px" height="180px"/></a></div>';
			               _html += '<dl class="b_m">';
                            _html += '<dt class="b_title txt-flow">'+n.title+'</dt>';
                           _html += '<dd class="b_mon clear">';

			              _html += '<span class="fl yj">￥'+n.goods_price+'</span>';
			              _html += '<span class="fr">限量<b class="cc">'+n.goods_number+'</b>份</span>';
			              _html += '</dd></dl>';
			               _html += '<a target="_blank" href="'+n.url+'" class="b_btn" target="_bank">我要抢购</a></div>';
			              
			           });
			           $("#js_lists").html(_html);
			          $("#page").html(ret.data.pages);
			          $(".page-num").html(ret.data.pages2);
			          if (ret.data.count <= 30) {
			          		$('#page').find('.all').hide().eq(0).show();
			          };

			       } else {
			           $("#js_lists").html(ret.info);
			          $("#page").html('');
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
			});

			$('.page-num a').live('click', function() {
			    var urlstr = $(this).attr('href').toString();
			    var page = $.urlParam('page', urlstr);
			    if(page != false) {
			    	getContent(page);
			    }
			    return false;
			});


			$("#js_page").live('click',function(){
				var page = $("#js_page_num").val();
				if (page != false) {
					getContent(page);
				};
				
			});

			$.urlParam = function(name, url){
			    var url = url || window.location.href;
			    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url);
			    if(!results) return false;
			    return results[1] || 0;
			}
</script>