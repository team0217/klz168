<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo get_seo('site_web_title','','');?></title>
		<meta name="keywords" content="<?php echo get_seo('keyword','','');?>">
    	<meta name="description" content="<?php echo get_seo('description','','');?>">
    	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/index.css" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.8.3.min.js"></script>
		<style type="text/css">
			.main-nav{ font-size:17px; }
			#content .tj-sy .tj-pmd .box:hover{ position:relative; z-index:1; border-color:#ff6c00; }
			body #nav .silde{ width:168px; }
			body .silde-nav{ height:386px; }
			body #nav .silde .silde-nav .shadow{ width:168px; filter:alpha(opacity:100); opacity:1; }
			body #nav .silde{ width:168px; }
			body .silde-nav{ height:386px; }
			body #nav .silde .silde-nav .shadow{ width:168px; filter:alpha(opacity:100); opacity:1; }
		   .int-focus a{
					color:#FF6C00 !important ;
				}
			.silde-nav img{ height:20px; margin-right:18px; vertical-align:middle; margin-top:-2px; }
			.silde-nav-h a{ color:#fff; }
			.main-nav{ font-size:14px; }
			.l-nav{ width:600px; }
		</style>

	</head>
	<body>


	<!-- 顶部部分 -->
		<?php include template('toper','common'); ?>
		<!-- logo和搜索部分 -->
		<?php include template('header','common'); ?>

		<link rel="stylesheet" type="text/css" href="/static/js/SuperSlide/SuperSlideIndex.css"/>
		<script type="text/javascript" src="/static/js/SuperSlide/jquery.SuperSlide.2.1.1.js"></script>

		<div class="banner" style="position:relative;">
		       <div id="SuperSlide" class="SuperSlide">
		           <div class="hd">
		           <?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'turn_rund')) {$data = $document_tag->turn_rund(array('order'=>'listorder ASC','where'=>'type=1','limit'=>'3',));} ?>
		           <?php $n=1;if(is_array($data)) foreach($data AS $t) { ?>
		                   <span></span>
		                   <?php $n++;}unset($n); ?>		
		                   
		           </div>
		            <div class="bd">
		               <ul>
		               <?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'turn_rund')) {$data = $document_tag->turn_rund(array('order'=>'listorder ASC','where'=>'type=1','limit'=>'3',));} ?>
		               <?php $n=1;if(is_array($data)) foreach($data AS $t) { ?>
		                       <li style="background:<?php echo $t['color'];?>">
		                           
		                           <a href="<?php echo $t['url'];?>" onclick="clickNumber(217)" target="_blank" style="transition: transform 3s linear; transform: scaleX(1.1) scaleY(1.1);">
		                               <img src="<?php echo $t['image'];?>" style="position:relative;margin-left: auto; margin-right: auto; width: 100%;" width="1920" height="386" />
		                           </a>
		                       </li>
                       <?php $n++;}unset($n); ?>		
                       
		                   </ul>
		           </div>
		           <a class="superprev" href="javascript:void(0)"><i></i></a>
		           <a class="supernext" href="javascript:void(0)"><i></i></a>
		       </div>

				<div class="fr banner-r">
				<div class="dl">
					<a href="<?php echo U('Member/EnterActivity/index');?>" target="_blank" class="fl sj">商家报名</a>
					<?php if($userinfo) { ?>
						<a href="javascript:;" class="fr yh" id="logout">用户退出</a>

					<?php } else { ?>
						<a href="<?php echo U('Member/Index/login', array('refresh' => urlencode(__SELF__)));?>" class="fr yh">用户登录</a>


					<?php } ?>
				</div>

				<div class="hint" id="tab">
					<p class="t">
						<a href="<?php echo U('Announce/Index/lists');?>" class="active" target="_blank">公告</a>
						<a href="<?php echo U('Document/Index/lists',array('catid'=>75));?>" target="_blank">个人规则</a>
						<a href="<?php echo U('Document/Index/lists',array('catid'=>22));?>" target="_blank">商家规则</a>
					</p>
					<div class="c">
						<div class="s"></div>
								<ul>
									<?php require_once('E:\WWW\klz168.com/Application/Announce\Taglib\announce.class.php');$announce_tag = new announce();if(method_exists($announce_tag, 'lists')) {$data = $announce_tag->lists(array('order'=>'inputtime DESC','limit'=>'4',));} ?>
									<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
									<li><a href="<?php echo U('Announce/Index/show',array('id'=>$r[announceid]));?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],51);?></a></li>
									<?php $n++;}unset($n); ?>
									
								</ul>
								<ul class="dn">
									<?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'lists')) {$data = $document_tag->lists(array('catid'=>'2','order'=>'inputtime DESC','limit'=>'4',));} ?>
									<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
									<li><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],51);?></a></li>
									<?php $n++;}unset($n); ?>
									
								</ul>
								<ul class="dn">
									<?php require_once('E:\WWW\klz168.com/Application/Document\Taglib\document.class.php');$document_tag = new document();if(method_exists($document_tag, 'lists')) {$data = $document_tag->lists(array('catid'=>'3','order'=>'inputtime DESC','limit'=>'4',));} ?>
									<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
									<li><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],51);?></a></li>
									<?php $n++;}unset($n); ?>
									
								</ul>
					</div>
				</div>

				<div class="s-link">
					<div class="s"></div>
					<div class="l"></div>
					<div class="r"></div>
					<a href="<?php echo U('Product/Index/lists',array('mod'=>'trial'));?>" target="_blank" class="a1-off">免费试用</a>
					<a href="<?php echo U('task/index/broke');?>"  target="_blank" class="a2-off">日赚佣金</a>
					<a href="<?php echo U('Product/Index/lists',array('mod'=>'commission'));?>" class="a3-off">闪电佣金</a>
					<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("SITE_CONSULT_QQ");?>&site=qq&menu=yes" class="a4-off" target="_blank">意见反馈</a>
				</div>
			</div>

		   </div>
		<!-- 正文 -->
		<div id="content">
			
			<div class="wrap">
			<?php

                     foreach ($trialinfos as $_k=>$_v){
                        $factory = new \Product\Factory\product($_v['goods_id']);
                        $trialinfos[$_k]['title'] = $factory->product_info['title'];
                        $trialinfos[$_k]['content'] = str_cut(strip_tags($vdata["content"]),48);
                        $trialinfos[$_k]['avatar']=getavatar($_v['userid']);
                        $trialinfos[$_k]['totals'] = $_v['total'];
                    }

                     $userTryreports = model('trial_report')->alias('p')->join(C('DB_PREFIX').'member AS t ON p.userid = t.userid')->
                             where(array('p.thumb'=>array('NEQ',''),'p.status'=>array('EQ',1)))->group('t.nickname DESC')->field("count(p.id) as total,t.nickname")->order("total desc")->limit(5)->cache(true,60)->select();

                    $broke = model('task_records')->field('id,userid,count(userid) AS num,tid,sum(price) AS total')->group('userid')->order('total DESC')->limit(5)->cache(true,60)->select();
                    
                    $goods_count = model('product')->cache(true,60)->where(array('status'=>1))->count(); 
                    $merchant_count = (model('member')->cache(true,60)->where(array('modelid'=>2))->count())+10000;
                    $order_count = (model('order')->cache(true,60)->where(array('status'=>7))->count())+90000;
                    $total_count = (model('product')->cache(true,60)->count())+100000;


                 ?>
				
			<div class="hint clear">
				<div class="box clear odd">
					<div class="l l1"></div>
					<dl class="r">
						<dt>今日商品在线数</dt>
						<dd><?php echo $goods_count;?></dd>
					</dl>
				</div>
				<div class="box clear even">
					<div class="l l2"></div>
					<dl class="r">
						<dt>已有入驻商家数</dt>
						<dd><?php echo $merchant_count;?></dd>
					</dl>
				</div>
				<div class="box clear odd">
					<div class="l l3"></div>
					<dl class="r">
						<dt>已领到商品的用户人数</dt>
						<dd><?php echo $order_count;?></dd>
					</dl>
				</div>
				<div class="box clear even">
					<div class="l l4"></div>
					<dl class="r">
						<dt>已发布的活动个数</dt>
						<dd><?php echo $total_count;?></dd>
					</dl>
				</div>
			</div>

			<div class="tj-sy">
				<h3 class="clear">
					<span class="fl">推荐试用</span>
					<a class="fr clear js_change" style="cursor:pointer;">
						<b class="sx-icon fr"></b>
						换一换
					</a>
				</h3>
				<div class="s">
					<!-- 按钮 -->
					<a href="javascript:;" class="prev"></a>
					<a href="javascript:;" class="next"></a>
					<div class="tj-pmd clear" id="js_replace">
					<?php $_where_trial = "`isrecommend` = 1 ";?>
					<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'lists')) {$data = $product_tag->lists(array('mod'=>'trial','addfields'=>'2','thumb'=>'1','where'=>$_where_trial,'limit'=>'12',));} ?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<div class="box fl">
							
							<div class="img">
							<a href="<?php echo $r['url'];?>" target="_blank" class="href_a">
								<img src="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>" />
							</a>
							</div>
							<div class="ul">
								<p class="t txt-flow"><a href="<?php echo $r['url'];?>" target="_blank" class="href_a"><?php echo str_cut($r[title],45);?></a></p>
								<p class="c clear">
									<a href="<?php echo $r['url'];?>" target="_blank" class="href_a">
									<span class="fl">￥<?php echo price($r[id]);?></span>
									<span class="fr f12">限量份:<b><?php echo $r[goods_number] - $r[already_num];?></b></span>
									</a>
								</p>
								<p class="btn">
									<a href="<?php echo $r['url'];?>" target="_blank">我要试用</a>
								</p>
							</div>
						</div>
						<?php $n++;}unset($n); ?>
						
					</div>
				</div>

			</div>
			<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'category')) {$data = $product_tag->category(array('catid'=>'0','limit'=>'6',));} ?>
			<?php $n=1; if(is_array($data)) foreach($data AS $k => $r) { ?>
			<div class="l-box">
				<h3 class="il-mz clear" style="background:url(<?php echo $r['image2'];?>) no-repeat left 3px;">

					<span class="fl"><?php echo $r['catname'];?></span>
					<a href="<?php echo U('Product/Index/lists',array('mod'=>'trial','catid'=>$r['catid']));?>" class="il-ico">查看更多</a>
				</h3>
				<div class="l-c clear">
					<?php $_where_trial = "isrecommend=1"?>
					<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'lists')) {$data = $product_tag->lists(array('mod'=>'trial','addfields'=>'2','thumb'=>'1','where'=>$_where_trial,'catid'=>$r[catid],'limit'=>'1',));} ?>
					<?php $n=1;if(is_array($data)) foreach($data AS $s) { ?>
					<div class="l fl">
						<a href="<?php echo $s['url'];?>" target="_blank"><img src="<?php echo $s['thumb'];?>" alt="" /></a>
					</div>
					<?php $n++;}unset($n); ?>
					
					<div class="r fr clear">
					<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'lists')) {$data = $product_tag->lists(array('mod'=>'trial','addfields'=>'2','thumb'=>'1','catid'=>$r[catid],'limit'=>'4',));} ?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>

						<div class="box fl m1">
							<div class="img">
								<img class="lazy" data-original="<?php echo $r['thumb'];?>" src="/static/images/loading_d.gif" alt="<?php echo $r['title'];?>" />
							</div>
							<div class="ul">
								<p class="t txt-flow"><?php echo str_cut($r[title],45);?> </p>
								<p class="c clear">
									<span class="fl txt-line">￥<?php echo price($r[id]);?></span>
									<span class="fr f12">限量份:<b><?php echo $r[goods_number] - $r[already_num];?></b>份</span>
								</p>
								<p class="btn">
									<b>我要试用</b>
								</p>
							</div>
							<!-- 链接 -->
							<a href="<?php echo $r['url'];?>" target="_blank"></a>
						</div>
						<?php $n++;}unset($n); ?>
						
					</div>
				</div>
			</div>
			<?php $n++;}unset($n); ?>
			
			
			
			<div class="l-box">
				<h3 class="il-xc clear">
					<span class="fl">个人秀场</span>
					<a href="<?php echo U('product/index/report_list');?>" target="_blank" class="il-ico">查看更多</a>
				</h3>
				
				<div class="clear">
					<div class="cx-c clear fl" style="overflow:hidden">
            		 <?php $n=1;if(is_array($trialinfos)) foreach($trialinfos AS $r) { ?>
						<div class="box fl">
							<div class="big">
								<div class="img"><img src="<?php echo $r['thumb'];?>" width="100%" /></div>
								<p><?php echo str_cut($r[title],40);?></p>
							</div>
							<div class="u clear">
								<div class="u-l fl">
									<img src="<?php echo $r['avatar'];?>" alt="" />
								</div>
								<div class="u-r fl">
									<p><?php echo str_cut(nickname($r[userid]),25);?>***</p>
									<p>共<b><?php echo $r['totals'];?></b>份报告</p>   
								</div>
							</div>
							<!-- 链接 -->
							<a href="<?php echo U('product/index/report_show',array('id'=>$r['id']));?>" target="_blank"></a>
						</div>
					<?php $n++;}unset($n); ?>
					</div>
					<?php  $userTryreports = model('trial_report')->alias('p')->join(C('DB_PREFIX').'member AS t ON p.userid = t.userid')->
                             group('t.nickname DESC')->field("count(p.id) as totals,p.userid,t.nickname")->order("totals desc")->limit(5)->cache(true,60)->select();
                              ?>
					
					<!-- tab -->
					<div class="u-tab fr">
						
						<div class="t">
							<a href="javascript:;" class="active">精华报告排行榜</a>
							<a href="javascript:;">日赚佣金排行榜</a>
						</div>
						<div class="c">
							<div class="c-l">
								<?php $n=1; if(is_array($userTryreports)) foreach($userTryreports AS $k => $v) { ?>

								<div class="u clear">
									<div class="fl xh <?php if($k < 3) { ?> c-f60 <?php } ?>"><?php echo $n;?>.</div>
									<div class="u-l fl">
										<img src="<?php echo getavatar($v[userid],1);?>" alt="" />
									</div>
									<div class="u-r fl">
										<p class="f14"><?php echo str_cut(nickname($v['userid']),20);?>***</p>
										<p class="f12">共<b><?php echo $v['totals'];?></b>份报告</p>
									</div>
								</div>
								<?php $n++;}unset($n); ?>
							</div>

							<div class="c-l dn">
								<?php $n=1; if(is_array($broke)) foreach($broke AS $k => $v) { ?>
								<div class="u clear">
									<div class="fl xh <?php if($k < 3) { ?> c-f60 <?php } ?>"><?php echo $n;?>.</div>
									<div class="u-l fl">
										<img src="<?php echo getavatar($v[userid],1);?>" alt="">
									</div>
									<div class="u-r fl">
										<p class="f14"><?php echo str_cut(nickname($v['userid']),20);?>***</p>
										<p class="f12">已赚<b><?php echo $v['total'];?></b>元</p>
									</div>
								</div>
								<?php $n++;}unset($n); ?>
								
								
							
							</div>
						</div>


					
					</div>
					
				</div>
				
				
			</div>
				
			</div>
			
		</div>
		<!-- 底部  -->
		<div id="catid_hidden" style="display:none;" >
			<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'category')) {$data = $product_tag->category(array('catid'=>'0','limit'=>'20',));} ?>
			<?php $n=1; if(is_array($data)) foreach($data AS $k => $r) { ?>
			<a><?php echo $k;?></a>
			<?php $n++;}unset($n); ?>
			
		</div>
		<script type="text/javascript">
		$(function(){
				  jQuery(".SuperSlide").slide({
			        mainCell: ".bd ul", autoPlay: true, interTime: 4000, mouseOverStop: true,
			        startFun: function (i, c) {
			            $(".SuperSlide li a").eq(i).css({ "transition": "transform 3s linear", "transform": "scaleX(1.1) scaleY(1.1)" });
			        },
			        endFun: function (i, c) {
			            $(".SuperSlide li a").eq(i).css({ "transform": "scaleX(1) scaleY(1)" });
			        }
			    });
		})

		$(".js_change").click(function(){
			 $.post(site.site_root + '/index.php?m=product&c=index&a=rand_lists',function(ret) {
           var _html = '';
           if(ret.status == 1) {
               $.each(ret.data.lists, function(i, n) {
                _html +='<div class="box fl">';
                _html +='<div class="img">';
                _html +='<img src="'+n.thumb+'" alt="'+n.title+'" />';
                _html +='</div>';
                _html +='<div class="ul">';
                _html +='<p class="t txt-flow">'+n.title+'</p>';
                _html +='<p class="c clear">';
                _html +='<span class="fl">￥'+n.mod_price+'</span>';
                _html +='<span class="fr f12">限量份:<b>'+n.number+'</b></span></p>';
                _html +='<p class="btn"><a href="'+n.url+'" target="_blank">我要试用</a></p>';
                _html +='</div>';
                _html +='</div>';
               });
               $("#js_replace").html(_html);
           } else {
               $("#js_replace").html(ret.info);
               return false;
           }
        },'json');
		});
		</script>
		<?php include template('footer','common'); ?>

        <script src="/static/js/jquery.lazyload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $('img.lazy').lazyload({
            	effect:'fadeIn'
            });
        </script>