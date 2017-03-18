<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $rs['title'];?>_闪电试用免审核--<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="<?php echo $rs['title'];?>,闪电试用,<?php echo C('WEBNAME');?>" />
		<meta name="description" content="<?php echo $rs['title'];?>闪电试用免审核,申请即可获得资格,赶紧来参与吧！" />
		<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/user_style.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/profile.css" />
		<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/base.css" />

		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.8.3.min.js"></script>
	</head>
	<body>

<script type='text/javascript'>
<?php $goods = $rs;
unset($rs['goods_content']);
$goods['report_count'] = report_count_by_gid($id);
$goods['buyer_count'] = buyer_count_by_gid($id);
$userinfo = is_login();
// 已绑定的淘宝账号
$bind_tbs = get_bind_taobao($userinfo['userid']);
// 活动后台设置
$bind_set = string2array(C_READ('buyer_join_condition','trial'));

$bind_set_commission = string2array(C_READ('buyer_join_condition','commission'));


$act_condition =model('activity_set')->where(array('activity_type' => 'trial'))->getField('key,value');
// 公用
if($act_condition['buyer_join_condition']) $act_condition['buyer_join_condition'] = string2array($act_condition['buyer_join_condition']);
if(in_array(7, $act_condition['buyer_join_condition'])){
    $reason = 7;
}

?>
var goods = <?php echo json_encode($goods);?>;
goods.goods_stock = goods.goods_number - goods.already_num;
goods.buyer_good_buy_times = <?php echo C_READ('buyer_good_buy_times','trial');?>;
var bind_tbs = <?php echo json_encode($bind_tbs ? $bind_tbs : 0);?>;
var bind_set = <?php echo $bind_set['bind_taobao'] ? $bind_set['bind_taobao'] : 0;?>;
var reason = <?php echo $reason?$reason :0;?>;
var com_set = <?php echo $bind_set_commission['bind_taobao'] ? $bind_set_commission['bind_taobao'] : 0;?>;


var day_count = <?php echo $day_count;?>;
var month_count = <?php echo $month_count;?>;
</script>
		
		<?php include template('toper','common'); ?>

				<?php include template('header','common'); ?> 


		<div id="content">
			
			<div class="wrap">
				<p class="hint-wz clear">
					当前位置：
					<b>首页 > </b>
					<b><?php echo catpos($catid, '', 'product',$mod);?></b>
					<b><?php echo $title;?></b>				
				</p>
				
				<div class="cp-wrap clear">
					
					<div class="big big_2 fl">
						<img src="<?php echo $rs['thumb'];?>" alt="" />
					</div>
					
					<div class="txt fr">
						<h2 class="title title_2 txt-flow">
							<?php if($rs[bonus_price] > 0) { ?>
							<span class="p-hbsy-ico fl">闪电试用</span>
							<?php } ?>
							<?php echo str_cut($rs[title],80);?></h2>
						<p class="t-hint t-hint_2 txt-flow">
							本单奖励红包 <?php echo $rs['bonus_price'];?>元 &nbsp;&nbsp;
							<?php if($rs[subsidy_type] == 1 && $rs['subsidy'] > 0) { ?>
							 完成本单平台将额外补贴<?php echo $rs['subsidy'];?>积分
							<?php } elseif ($rs[subsidy_type] ==2 && $rs['subsidy'] > 0) { ?>
							完成本单平台将额外补贴<?php echo $rs['subsidy'];?>元
							<?php } ?>
						</p>
						
						<div class="n n_2 clear">
							<dl class="fl pn">
								<dt class="num"><strong><?php echo $goods_number - buyer_count_by_gid($rs['id']); ?></strong><span>/<?php echo $rs['goods_number'];?></span></dt>
								<dd>剩余份数</dd>
							</dl>
							<dl class="fl">
								<dt class="cc">￥<?php echo $rs['goods_price'];?></dt>
								<dd>下单价</dd>
							</dl>
							<dl class="fl">
								<dt class="cc">￥<?php echo sprintf("%.2f",$rs['goods_price'] + $rs['bonus_price']); ?></dt>
								<dd>返还金额</dd>
							</dl>
						</div>
						<div class="btn-wrap">

							<?php $com_count = model('order')->where(array('buyer_id'=>$userinfo['userid'],'goods_id'=>$rs['id']))->count();?>
							<?php if($com_count > 0) { ?>
							<a href="javascript:;" class="fl btn cc1" style="background:#D8D8D8;">已申请</a>
							<a target="_blank" href="http://www.gokd168.com/" class="fl btn cc2">去下单</a>

							<?php } elseif ($goods_number - buyer_count_by_gid($rs['id']) <=0) { ?>
							<a class="fl btn cc1" style="background:#D8D8D8;">已售罄</a>
							<?php } elseif (NOW_TIME > $rs[end_time]    ) { ?>

							<a class="fl btn cc1" style="background:#D8D8D8;">来晚了 结束了</a>
							<?php } else { ?>
							<a href="javascript:;" class="fl btn cc1"  onclick="check()">抢购资格</a>
							<?php } ?>
						</div>

						
						<!-- 状态 -->
						<img class="staus_2" src="<?php echo THEME_STYLE_PATH;?>style/images/p2-status_1.png" alt="" />
						
					</div>
				</div>
				
				
				<div class="list-hdlc list-hdlc_2 clear">
					<div class="l1 fl">
						申请<br/>流程
					</div>
					<div class="b box l2 fl">
						<p class="fl">1</p>
						<dl>
							<dt>申请</dt>
							<dd>获得试用资格</dd>
						</dl>
					</div>
					
					<div class="c box l3 fl">
						<p class="fl">2</p>
						<dl>
							<dt>购买<span class="g_hint">原价<b class="cc">￥<?php echo $rs['goods_price'];?></b>下单领取（包邮）</span></dt>
							<dd>以原价去指定平台购买</dd>
						</dl>
					</div>
					<div class="c box l4 fl">
						<p class="fl">3</p>
						<dl>
							<dt>提交订单号</dt>
							<dd>填写已付款订单号</dd>
						</dl>
					</div>
					<div class="b box l5 fl">
						<p class="fl">4</p>
						<dl>
							<dt>返还担保金<span class="g_hint">返还<b class="cc">￥<?php echo sprintf("%.2f",$rs['goods_price'] + $rs['bonus_price']); ?></b>到您的账户</span></dt>
							<dd>试用报告通过后返还试用担保金，提现</dd>
						</dl>
					</div>
				</div>
					
				<div class="sy-content clear">
					<div class="syc-tab" id="syc-tab" style="width:100%;">
						<ul class="title clear">
							<li class="active" data-tabindex="try_help_01"><a href="javascript:;">申请规则</a></li>
							<li data-tabindex="try_help_02"><a href="javascript:;">已申请试客</a></li>
						</ul>

						<script type="text/javascript">
							$(function(){
								$('.title li').click(function(){
									$('.title li').removeClass('active');
									$("div[data-tabcontent='arr_content']").hide();
									$("div#" + $(this).attr('data-tabindex')).show();
									if ($(this).attr('data-tabindex') == 'try_help_02') {
										getContent();
									};
									$(this).addClass('active');
								});
							});
				       </script>
						
						<div class="syc-list">
							<div class="box" data-tabcontent="arr_content" id="try_help_01">
								<dl class="zysx">
									<dt>注意事项：</dt>
									<dd>1、与商家旺旺聊天时不要提及“<?php echo C('WEBNAME');?>、试客、<?php echo C('WEBNAME');?>试客”等信息，否则试用无效。</dd>
									<dd>2、禁止使用信用卡、淘金币、优惠券、红包、天猫积分等。</dd>
									<dd>3、禁止通过淘宝客、返利网、一淘等返现返利网链接下单。</dd>
									<dd>4、非手机端活动，禁止使用手机端下单。</dd>
									<dd>以上由于买家违规下单所产生的费用，由买家承担。<?php echo C('WEBNAME');?>有权冻结其帐号，限制提现操作，IP列入黑名单。</dd>
								</dl>

								<dl class="zysx">
									<dt>温馨提示：</dt>
									<dd style='color:red'>1、抢购资格成功之后，请在 <?php echo C_READ('buyer_write_order_time','commission');?> 分钟内完成下单，未在指定时间下单并填写订单号，视为放弃资格！</dd> 
									<dd style='color:red'>2、填写订单号之后，商家将在 <?php echo C_READ('seller_check_time','commission');?>小时内完成审核，超时未审核，系统自动审核通过！</dd> 
	                                <dd style='color:red'>3、商家将在订单号审核成功之后，<?php echo C_READ('seller_pay_time','commission');?> 小时内完成返款！如超时未返款，系统自动返款。</dd>

								</dl>
									<dl class="zysx">
										<dt>活动说明：</dt>
									</dl>
								<div class="tc" style="text-align:left;padding:0 30px;">
 									<?php echo $goods_content;?>
								</div>

								<dl class="zysx">
									<dt>搜索流程图：</dt>
									<dd></dd>
								</dl>
								<?php if($com_count > 0) { ?>
								<dl class="zysx">
								<?php $n=1;if(is_array($goods_search_albums_url)) foreach($goods_search_albums_url AS $sa) { ?>
								<img src="<?php echo $sa;?>" />
								<?php $n++;}unset($n); ?>
								</dl>

								<?php } else { ?>

								<dl class="ui_add_con">
									<dt style='font-size: 16px;'>申请通过之后，您可以在此页面看到搜索流程图</dt>
									<dd><a href="#" class="ui_add_btn">查看新手入门</a></dd>
								</dl>
								<?php } ?>


                                 <br/>

                                 <img src="<?php echo THEME_STYLE_PATH;?>style/images/liucehng.png">

							</div>

							<div class="box spsk spsk_2 dn" data-tabcontent="arr_content" id="try_help_02">
								
								<h2>已申请的试客(<span id="report_count"></span>)</h2>
								
								<ul class="u-box-ic u-box-ic_2 clear" id="js_people">
				
								</ul>
								
								<div id="page" class="w1 mt20">
							
								</div>
								
								<!--<div class="sydp">
									<h2>试用点评</h2>
									<textarea name="" placeholder="这个宝贝试用如何?喜欢就点评点评吧!" rows="" cols=""></textarea>
									<p>
										<a href="javascript:;">马上发表</a>
									</p>
								</div>-->
								
							</div>

							<style type="text/css">	
								body .cp-wrap .big_2 img{ width:100%;}
								.ui_add_con{ width:600px; margin-left:0px; color:#666; }
								.ui_add_con dt,.ui_add_con dd{ text-align:center; height:30px; line-height:30px; }
								.ui_add_con .ui_add_btn{ padding:4px 8px; background:#ff6c00; border-radius:3px; color:#fff; }
							</style>
							
						</div>
						
					</div>
					
				</div>
					
				
				
			</div>
			
		</div>
		<!-- 底部  -->
			<?php include template('footer','common'); ?> 
		
		<!--  侧边栏  -->
		
		
		
	</body>
</html>
<style type="text/css" media="screen">
   .weiwc{ width: 305px;/* border: 1px solid #e84c3d;*/margin: 0px auto 0 auto}
.weiwc p {font-size: 14px; color: #333333; line-height: 25px;position: relative;}
.weiwc a { color: #4e87c8;font-size: 12px}
.weiwc img{position: relative;top: 2px;margin-right: 5px;}      
.Grayb{ width: 98px; height: 34px;
         color: #3c3d45; font-size: 14px;
          margin: 20px auto 0 auto; border: 1px solid #b9b9b9;
           text-align: center; font-family: 宋体;
           line-height: 33px; border-radius: 3px;cursor: pointer
           }
.Choice{ text-align: center; color: #323232; font-size: 18px;margin-top: 20px;/*height: 40px*/}    
.pulldown{ width: 186px; height: 26px;margin: -4px auto 0 auto} 
.pull{ width: 185px; height: 26px; border: 1px solid #7f9db9; cursor: pointer;margin-top: 15px;}  
.taobao{ text-align: center; margin-top: 26px;} 
.taobao p{ font-size: 12px; color: #444444; line-height:8px;} /*e63c31*/

</style>

<div class="ling_mian" style="display:none;">
        <div class="weiwc">
            <div style="color: #e74c3c; font-size: 18px;">
               	<?php if($num == 0) { ?> <?php } else { ?>啊哦，还有<?php echo $num;?>项未完善<?php } ?>
            </div>
            	<?php if(array_key_exists("num_trial", $buyer_join_condition)) { ?>
                <p style="margin: 12px 0 0 0;<?php if($tiral_num <  $buyer_join_condition['num_trial_art']) { ?> <?php } else { ?> color: #888888; <?php } ?>" >
                    <span>●</span>&nbsp;需成功完成<?php echo $buyer_join_condition['num_trial_art'];?>次试用活动
                    <?php if($tiral_num <  $buyer_join_condition['num_trial_art']) { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    已完成<?php echo $tiral_num;?>次,
                    <a href="/trial/" target="_blank">去做活动</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } ?>
                </p>
                <?php } ?>
                <?php if(array_key_exists("information", $buyer_join_condition)) { ?>
                <p <?php if(empty($information)) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
                    <span>●</span>&nbsp;已完善基本资料。
                    <?php if(empty($information)) { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a href="<?php echo U('Member/Profile/infomation');?>" target="_blank">去完善</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } ?>
                </p>
                <?php } ?>


                <?php if(array_key_exists("phone", $buyer_join_condition)) { ?>
                <p <?php if($user_info['phone']) { ?> style="color: #888888" <?php } ?>><span>●</span>&nbsp;已完成手机认证。
              
				   <?php if($user_info['phone']) { ?>
				   <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } else { ?>
				   	<img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a href="<?php echo U('Member/Attesta/phone_attesta');?>" target="_blank">去认证</a>
                   <?php } ?>
                </p>
                <?php } ?>

                <?php if(array_key_exists("email", $buyer_join_condition)) { ?>
                <p <?php if($buyer_join_condition['email'] && !$this->user_info['email_status']) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
                    <span>●</span>&nbsp;已完成邮箱认证。
					<?php if($buyer_join_condition['email'] && !$this->user_info['email_status']) { ?>
					<img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a href="<?php echo U('Member/Attesta/email_attesta');?>" target="_blank">去认证</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                   <?php } ?>
                </p>
                <?php } ?>
                
                <?php if(array_key_exists("realname", $buyer_join_condition)) { ?>
                <p <?php if($buyer_join_condition['realname'] && $identity_count != 1) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
                    <span>●</span>&nbsp;已进行身份认证。
                    <?php if($buyer_join_condition['realname'] && $identity_count != 1) { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a href="<?php echo U('Member/Attesta/name_attesta');?>" target="_blank">去认证</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } ?>
                </p>
                <?php } ?>
                
                <?php if(array_key_exists("bind_taobao", $buyer_join_condition)) { ?>
                <p <?php if($buyer_join_condition['bind_taobao'] && $tb_count < 1) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
                    <span>●</span>&nbsp;已绑定淘宝账号。
                    <?php if($buyer_join_condition['bind_taobao'] && $tb_count < 1) { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a href="<?php echo U('Member/Attesta/bindtaobao');?>" target="_blank">去绑定</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } ?>
                </p>
                <?php } ?>
                
                <?php if(array_key_exists("bind_alipay", $buyer_join_condition)) { ?>
                <p <?php if($buyer_join_condition['bind_alipay'] && $account != 1) { ?><?php } else { ?> style="color: #888888" <?php } ?>>
                    <span>●</span>&nbsp;已绑定支付宝。
                    <?php if($buyer_join_condition['bind_alipay'] && $account != 1) { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a href="<?php echo U('Member/Attesta/alipay_attesta');?>" target="_blank">去绑定</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } ?>
                </p>
                <?php } ?>
                
        </div>
    </div>
    <?php 
    	if ($allow) {
    		if (in_array($user_info['groupid'],$allow)) {
    			$allow_s = 1;
    		}else{
    			$allow_s = 2;

    		}
    	}else{
    		$allow_s = 1;
    	}




     ?>

<script type="text/javascript">
			getContent(1);
			function getContent(page) {
			    var page = page || 1;
			    var param = {
			      goods_id:'<?php echo $rs['id'];?>',
			      mod:'<?php echo $rs['mod'];?>',
			      num:'55',
		    	  page:page
			    };
			    $.getJSON(site.site_root + '/index.php?m=product&c=api&a=v2_buyer_list', param, function(ret) {
			       var _html = '';
			       if(ret.status == 1) {
			           $.each(ret.data.lists, function(i, n) {
			               _html += '<li>';
			               _html += '<a href="javascript:;"><img src="'+n.avatar+'" alt="" /></a>';
			               _html += '<p><a href="javascript:;">'+n.nickname+'</a></p>';
			               _html += '</li>';
                           
			           });
			           $("#js_people").html(_html);
			          $("#page").html(ret.data.pages);
			          $("#report_count").html(ret.data.count);




			       } else {
			           $("#js_people").html(ret.info);
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

<style>

body .CPM_style_2{ height:20px; line-height:20px; font-size:12px; }
body .hint_text_2 li{ padding-left:30px; }
.CPM_style .font_2 {
    font-size: 14px;
    font-weight: 700;
    font-family: "微软雅黑";
    color: #ff6600;
}
.CPM_style .font {
   /* padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 35px;*/
    font-size:14px;
    margin: 0 auto;
    line-height: 26px;
    height: 26px;
}
.f_bg_yes {
    background: url(../images/verify_btn1.png) no-repeat 0 center;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from div.CPM_style.CPM_style_2.border_radius_5
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from div.aui_content
.aui_state_focus .aui_content {
    color: #000;
}
.aui_content {
    color: #666;
}
.aui_content {
    display: inline-block;
    text-align: left;
    border: none 0;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from td.aui_main
.aui_main {
    text-align: center;
    font-size:14px;
    min-width: 9em;
    min-width: 0\9/*IE8 BUG*/;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from tr
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from tbody
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from table.aui_dialog
table.aui_border, table.aui_dialog {
    border: 0;
    margin: 0;
    border-collapse: collapse;
    width: auto;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
user agent stylesheettable {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: grey;
}
Inherited from div.aui_inner
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from td.aui_c
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from tr
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from tbody
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from table.aui_border
table.aui_border, table.aui_dialog {
    border: 0;
    margin: 0;
    border-collapse: collapse;
    width: auto;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
user agent stylesheettable {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: grey;
}
Inherited from div.aui_outer
.aui_outer {
    text-align: left;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from div.aui_state_focus.aui_state_lock
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from body
html, body {
    background: #fff;
    color: #666;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
Inherited from html
html, body {
    background: #fff;
    color: #666;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
</style>

<script type="text/javascript">
    
    var sort = '<?php echo $rs['sort'];?>';
      
      if (sort==1) {
      	 sort ="综合";
      }else if(sort==2){
           
         sort ="人气";
      }else if(sort==3){

      	sort ="销量";

      }else if(sort==4){

      	sort ="信用";

      }else if(sort==5){
      	sort ="最新";

      }else if(sort==6){
           sort ="价格";
      }

		var commisson_html = "<div class='CPM_style CPM_style_2 border_radius_5' style='position: static;'>";
		    commisson_html += '<font class="font f_bg_yes font_2">抢购成功，请使用搜索方式下单</font>';
            commisson_html += '<ul class="hint_text_2 margin_b_10"><p>搜索下单提示：</p>';
            commisson_html += "<li>1、请在 <span style='color:red'> <?php echo C_READ('buyer_write_order_time','commission');?> 分钟</span> 内完成下单,并填写订单号</li>";
	         commisson_html +="<li>2、打开淘宝首页 搜索关键词<span style='color:red'>'<?php echo $rs['keyword'];?>'</span></li>";
	         commisson_html +="<li>3、按照 <span style='color:red'>" + sort + "</span>方式排序</li>";
	         commisson_html +="<li>4、宝贝位置大约在 <span style='color:red'>'<?php echo $rs['goods_address'];?>'</span></li>";
	         commisson_html +="<li>5、认准商家旺旺<span style='color:red'> '<?php echo $rs['goods_wangwang'];?>'</span></p> <br/>";
             commisson_html += '</ul><ul class="hint_text_2"><p>请注意以下事项：</p>';
             commisson_html += "<li>1、下单价：<span style='color:red'> <?php echo $rs['goods_price'];?> </span> 元，请在下单页面核对下单价是否一致。</li>";
             commisson_html += "<li>2、返还金额：<span style='color:red'> <?php echo sprintf("%.2f",$rs['goods_price'] + $rs['bonus_price']); ?> </span> 元，交易完成后，将返还给您的金额。</li>";
             commisson_html +="<li>3、可以根据活动页面上的，搜索流程图下单。</li> ";
             commisson_html +="<li>4、可以使用 <span style='color:red'> ctrl + F </span>  快速查找商家旺旺。</li> ";
             commisson_html += "<li>注意：报名抢购后 <span style='color:red'><?php echo C_READ('buyer_write_order_time','commission');?>分钟内</span> 不下单付款并返回填写订单号，本次订单将自动关闭。</li></ul></div>";

     var goodurl = "<?php echo $rs['goods_url'];?>";

         goodurl = getDomain(goodurl);

     var goods_url1 = goodurl;  
        $('.fl btn cc2').attr("href",goodurl);

         //console.log(url);
     function getDomain (weburl){ 
         var urlReg=/^((https?|ftp|news):\/\/)?([a-z]([a-z0-9\-]*[\.。])+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)|(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))(\/[a-z0-9_\-\.~]+)*(\/([a-z0-9_\-\.]*)(\?[a-z0-9+_\-\.%=&]*)?)?(#[a-z][a-z0-9_]*)?$/i; 
         domain = weburl.match(urlReg);
         domain = domain[1] + 'www.' + domain[4] + domain[5];
         return ((domain != null && domain.length>0) ? domain:"");
     }

	function check(){
		  var num = '<?php echo $num;?>';
		  var id ="<?php echo $rs['id'];?>";
		  if (site.user.length < 1) {	// 未登录
				member.login();
				return false;
			}

		   if('<?php echo $user_info['modelid'];?>' == 2){
		   		art.dialog({
		   	        id:'goods_logs',
		   	        lock : true,
		   	        fixed : true,
		   	        title : '错误提示',
		   	        content:'亲 您当前是商家,不能参与抢购<br/> 请注册买家帐号参与！',
		   	        icon:'error',
		   	        drag : false,
		   	        ok:function(){
		   	        },
		   	       
		   	    });

            return false;
		   }
		  
		   var allow = "<?php echo $allow_s;?>";
		  if (parseInt(allow) == 2) {
			  	art.dialog({
			   	        lock : true,
			   	        fixed : true,
			   	        title : '温馨提示',
			   	        content:'亲，普通会员不能参与抢购',
			   	        icon:'error',
			   	        drag : false,
			   	        ok:function(){
			   	        },
			   	       
			   	    });

			  	return false;
		  }



		  if (num == 0){
		  	commission.buy(id);

		  }else{
		 
        	art.dialog({
                id:'goods_logs',
                lock : true,
                fixed : true,
                title : '淘宝绑定',
                content:$('.ling_mian').html(),
                drag : false,
                ok:function(){
                    location.reload();

                },
               
            });

            }
              
	};
	

	function ajaxFileUploadOrder(){
	    $.ajaxFileUpload ({
	         url:'?m=order&c=api&a=add_show_img',
	         secureuri:false,//是否启用安全提交
	         fileElementId:'file_uploads',
	         dataType: 'json',
	         success: function (data){
	            if (data!='error') {
	                $('#notices').html('上传成功！');
	            }else{
	                $('#notices').html('上传失败')
	            }
	            $('#images').attr('style','display:none');
	            $('#urls').val(data);
	         },
	         error:function(data){
	            console.log(data);
	         }
	     }) 
	     return false; 
	};

</script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/commission.js"></script>