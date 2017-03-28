<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>闪电试用商品列表 - 精选万件商品免费试用-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="闪电试用,试用网,试客,试客网,试客网站,佣金试用,<?php echo C('WEBNAME');?>。" />
		<meta name="description" content="欢迎来<?php echo C('WEBNAME');?>:<?php echo C('WEBNAME');?>—是全国领先的免费试用网和试客网,深的消费者信赖的免费试用网和试客网站,是试客免费试用网和试客网站的首选,<?php echo C('WEBNAME');?>闪电试用网为试客提供最优质和实用的优秀免费试用商品,每天更新,还有佣金任务等你来拿。" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/list.css" />
	</head>
	<body>
		<style type="text/css" media="screen">
				#header .logo img{ width:auto; height:52px; position:relative; top:50% !important; margin-top:-26px;}
				@-moz-document url-prefix() {#header .logo img { top:0% !important;
					margin-top:0 !important;}}

		</style>
	<!-- wrap 内容页盒模型 -->
	<!-- 顶部部分 -->
	<?php include template('toper','common'); ?>
		<!-- logo和搜索部分 -->
		<?php include template('header','common'); ?> 
				<div id="content">
			
			<div class="wrap">
				<p class="hint-wz clear">
					当前位置：
					<b>首页 > </b>
					<b><?php echo C('COMMISSION_NAME');?></b>
				</p>
				
				<div class="list-hdlc clear">
					<div class="l1 fl">
						活动</br>流程
					</div>
					
					<div class="b box l2 fl">
						<p class="fl">1</p>
						<dl>
							<dt>申请</dt>
							<dd>获得活动资格</dd>
						</dl>
					</div>
					
					<div class="c box l3 fl">
						<p class="fl">2</p>
						<dl>
							<dt>购买</dt>
							<dd>以原价去指定平台购买</dd>
						</dl>
					</div>
					<div class="c box l4 fl">
						<p class="fl">3</p>
						<dl>
							<dt>提交订单号</dt>
							<dd>无需填写报告,只填写已付款订单号</dd>
						</dl>
					</div>
					<div class="b box l5 fl">
						<p class="fl">4</p>
						<dl>
							<dt>返还担保金和佣金</dt>
							<dd>确认收货、给予好评后通过返还</dd>
						</dl>
					</div>
				</div>
			</div>
			
			
			<div class="list-wrap wrap">
				<script type="text/javascript">
					$(function(){
						$('.list-wrap .title .al a').on('click',function(){
							$(this).addClass('active').siblings('a').removeClass('active');
							getContent();

						});
						/* 兼容 */
						$('.list-wrap .list .box:nth-child(3n)').css('margin-right','0');
					});
				</script>
				
				<div class="title clear">
					<div class="fl clear al">
						<a href="javascript:;" class="active" data-orderby="id" data-orderway="desc">按时间<b></b></a>
					    <a href="javascript:;" data-orderby="bonus_price" data-orderway="desc">按佣金<b></b></a>

						<a href="javascript:;"  data-orderby="already_num" data-orderway="desc">按份数<b></b></a>
					</div>

					
					<div class="fr clear page-num">
						<!-- <span class="fl"><b class="cc">1</b>/<b>66</b></span>
						<span class="fr btn">
							<a href="javascript:;" class="prev"><</a>
							<a href="javascript:;" class="next">></a>
						</span> -->
					</div>
					
				</div>
				
				<div class="list clear" id="js_lists">loading...
					
					<!-- <div class="box clear fl">
						<div class="img fl">
							<img src="img/1.png" alt="" />
							<div class="ts">
								<p class="p1">佣金</p>
								<p class="p2">3.00</p>
							</div>
						</div>
						<div class="txt fl">
							<p class="txt-flow t">创诺华男士长袖衬衫暗...</p>
							<div class="jg clear">
								<div class="fl bl">
									<p>下单价</p>
									<p>￥1.65</p>
								</div>
								<div class="fl">
									<p>返还</p>
									<p>￥4.65</p>
								</div>
							</div>
							<p class="sy">剩余份数：<b class="cc">91</b>/<span>250</span></p>
							<a href="#" class="btn">我要抢购</a>
						</div>
					</div> -->
					
					
				</div>
			</div>
			
			<div id="page" class="mt30">
					<!-- <span class="all clear"><b>共</b><b>240页</b></span>
					<span class="all clear"><b>到第</b><input class="i1 fl" type="text" /><b>页</b></span>
					<span class="all"><a href="#" class="b1">确定</a></span>
					<span>
						<a href="javascript:;" class="b2">前一页</a>
						<a href="#" class="n1 now">1</a>
						<a href="#" class="n1">2</a>
						<a href="#" class="n1">3</a>
						<a href="#" class="n1">4</a>
						<a href="javascript:;" class="b2">后一页</a>
					</span> -->
			</div>
			
		</div>
		<?php include template('footer','common'); ?>
		<script type="text/javascript">
			getContent(1);
			function getContent(page) {
			    var page = page || 1;
			    if (<?php echo $catid;?> > 0 ) {
			    	var catid = <?php echo $catid;?>;
			    }
			    var sort = $(".al a[class~='active']");    

			    var param = {
			      catid : catid,
			      mod   : "<?php echo $mod;?>",
			      orderby  :sort.attr('data-orderby'),
                  orderway : sort.attr('data-orderway'),
			      status:'1',
			      num:'30',
/*			      protype : $("a[data-type][class='a_click_style_1']").attr('data-type'),
*/			      page:page
			    };
			    $.getJSON(site.site_root + '/index.php?m=product&c=api&a=v2_getlists', param, function(ret) {
			       var _html = '';
			       if(ret.status == 1) {
			           $.each(ret.data.lists, function(i, n) {
			           	  var _ul_margin = ((i+1) % 3 == 0) ? 'style="margin-right: 0px;"' : '';
			               _html += '<div class="box clear fl" '+_ul_margin+' >';
			               _html += '<div class="img fl">';
			               _html += '<img src="'+n.thumb+'" alt="" />';
			               _html += '<div class="ts">';
			               var  money = (parseInt(n.bonus_price) + parseInt(n.goods_price)); 

                          /* var divstyle = '';
                           var div_price = '';
                           var money = ''
                           if(parseInt(n.goods_bonus) > 0 && n.goods_tryproduct == '0') {
                               divstyle = ' 红包';
                               div_price =n.goods_bonus;
                              
                           }
                           if(n.goods_tryproduct != '0') {
                               divstyle = 'A->B';
                               div_price =n.goods_tryproduct;
                               money = (n.goods_price);


                           }
                           if(n.goods_bonus == '0.00' && n.goods_tryproduct == '0') {
                               divstyle = '实物';
                               div_price ='0.00';
                               money = (n.goods_price);


                           }*/
                            _html += '<p class="p1">佣金</p>';
                           _html += '<p class="p2">'+n.bonus_price+'</p>';

                           _html += '</div></div>';
			               _html += '<div class="txt fl">';
			              _html += '<p class="txt-flow t">'+n.title+'</p>';
			              _html += '<div class="jg clear"><div class="fl bl"><p>下单价</p>';
			              _html += '<p>￥'+n.goods_price+'</p></div>';
			              _html += '<div class="fl"><p>返还</p><p>￥'+money+'</p></div></div>';
			              _html += '<p class="sy">剩余份数：<b class="cc">'+n.number+'</b>/<span>'+n.goods_number+'</span></p>';
			               _html += '<a href="'+n.url+'" class="btn" target="_bank">我要试用</a></div></div>';
			              
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