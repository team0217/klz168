<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <title><?php echo get_seo('trial_show','show_trial_title',$title);?></title>
    <meta name="keywords" content="<?php echo get_seo('trial_show','show_trial_keyword',$title);?>">
    <meta name="description" content="<?php echo get_seo('trial_show','show_trial_description',$title);?>">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/profile.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/show_trial.css" />
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/validate.js"></script>
	</head>
	<script type='text/javascript'>
	<?php $goods = $rs;
	unset($rs['goods_content']);
	$goods['report_count'] = report_count_by_gid($id);
	$goods['buyer_count'] = buyer_count_by_gid($id);
	$userinfo = is_login();
	// 活动后台设置
	$bind_set = string2array(C_READ('buyer_join_condition','trial'));
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
	var bind_set = <?php echo $bind_set['bind_taobao'] ? $bind_set['bind_taobao'] : 0;?>;
	var reason = <?php echo $reason?$reason :0;?>;
	var day_count = <?php echo $day_count;?>;
	var month_count = <?php echo $month_count;?>;
	var bind_tbs = <?php echo json_encode($bind_tbs ? $bind_tbs : 0);?>;
    var bind_set = <?php echo $bind_set['bind_taobao'] ? $bind_set['bind_taobao'] : 0;?>;

	</script>

	<body>
	<!-- scroll -->	
	<?php include template('toper','common'); ?>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/trial.js"></script>
	<?php include template('header','common'); ?>
	<?php 
		$count = model('unreal_order')->where(array('goods_id'=>$rs['id']))->count();
		$unreal = model('unreal_order')->where(array('goods_id'=>$rs['id']))->select();
		foreach ($unreal as $k => $v) {
			$member = model('member_unreal')->find($v['buyer_id']);
			$unreal[$k]['nickname'] = $member['nickname'];
			$unreal[$k]['avatar'] = $member['avatar'];
		}
	    $buy_count = get_trial_by_gid($rs['id']);
		$total_count = $count+$buy_count;
	?>
	<div id="content">

		<div class="wrap">
			<p class="hint-wz clear">
				当前位置： <b>首页 ></b> <b><?php echo catpos($catid, '', 'product',$mod);?></b>
				<b><?php echo $title;?></b>
			</p>

			<div class="cp-wrap clear">

				<div class="big fl ">
					<div class="tb-booth tb-pic tb-s310">
						<img  width="100%" height="100%" src="<?php echo $rs['thumb'];?>" alt="<?php echo $rs['title'];?>"  rel="<?php echo $rs['thumb'];?>" class="jqzoom" />	
					</div>
				</div>

				<div class="txt fr" id="shop_text">
					<?php if($goods_bonus > 0) { ?>
					<span class="p-hbsy-ico fl">闪电佣金</span>
					<?php } ?>
					<h2 class="title f1">&nbsp;<?php echo str_cut($rs[title],84);?></h2>
					<p class="t-hint">
					    <?php if($goods_postage == 0) { ?>
							<span style="display:inline-block; padding:0px 10px; height:24px; line-height:24px;  background:#7bae23; border-radius:3px; color:#FFFFFF" >包邮</span>
						<?php } ?>

						<?php if($goods_tryproduct) { ?>
						<span style="display:inline-block; padding:0px 10px; height:24px; line-height:24px;  background:#D85557; border-radius:3px; color:#FFFFFF">拍A发B 送图片商品</span>
						<?php } else { ?>
						<?php if($goods_bonus == 0 || $trial_type == 1) { ?>
						<span style="display:inline-block; padding:0px 10px; height:24px; line-height:24px;  background:#D85557; border-radius:3px; color:#FFFFFF">拍A发A 送图片商品</span>
						<?php } ?>
                        <?php } ?>
                         
						<?php if($goods_bonus > 0) { ?>完成本单赠送红包<?php echo $goods_bonus;?>元 <?php } ?> 
						<?php echo $rs['goods_tips']['goods_order']['remark'];?>&nbsp;&nbsp;
						<?php if($rs[subsidy_type] == 1 && $rs['subsidy'] > 0) { ?>
						 完成本单平台将额外补贴<?php echo $rs['subsidy'];?>积分
						<?php } elseif ($rs[subsidy_type] ==2 && $rs['subsidy'] > 0) { ?>
						完成本单平台将额外补贴<?php echo $rs['subsidy'];?>元
						<?php } ?>
					</p>

					<div class="n clear">
						<dl class="fl pn">
							<dt class="num"> <strong><?php if($goods_number - buyer_count_by_gid($rs['id']) <= 0){
									echo '0';
								}else{
									echo $goods_number - buyer_count_by_gid($rs['id']);
								}?></strong>
								<span>/<?php echo $goods_number;?></span>
							</dt>
							<dd>剩余份数</dd>
						</dl>
						<dl class="fl">
							<dt class="cc">￥<?php echo $rs['goods_price'];?></dt>
							<dd>商品价值</dd>
						</dl>
						<dl class="fl">
							<dt class="cc">
								￥<?php echo sprintf('%.2f',$rs[goods_price]+$rs['goods_bonus'])?>
							</dt>
							<dd>返还金额</dd>
						</dl>
					</div>

					<div class="sysj clear">
						<div class="fl clear s-t">
							<div class="fl s-w">剩余时间：</div>
							<div class="fl time clear">
								<?php if(NOW_TIME > $rs[end_time]) { ?>
								<span>0</span> <strong>天</strong>
								<span>0</span>
								<strong>小时</strong>
								<span>0</span>
								<strong>分</strong>
								<span>00</span>
								<strong>秒</strong>
								<?php } ?>
							</div>
						</div>
						<div class="db fl" style="width:500px">
							商家已缴纳保证金<?php echo sprintf('%.2f',($rs['goods_price'] + $rs['goods_bonus']) *  $goods_number)?> 元，请放心申请
						</div>
					</div>

					<ul class="sqrs">
						<li>
							已申请人数：
							<b><?php echo $total_count;?></b>
						</li>
						<li>
							已获得试用人数：
							<b><?php echo get_trial_pass_by_gid($rs['id']);?></b>
						</li>
						<li class="bn">
							已完成下单人数：
							<b><?php echo get_over_trial_by_gid($rs['id']);?></b>
						</li>
					</ul>

					<?php $s_status = array('已关闭','已申请 待商家审核试用资格', '已获得资格 下单中','商家审核中', '审核失败', '审核通过', '申诉中', '已完成'); ?>

					<?php $r_status = get_order_status($rs['id'],$userinfo['userid']);			 ?>	
					<?php if($userinfo && (int)$r_status > 0) { ?>
					<p>
						您已经申请过了,当前订单状态
						<b class="cc"><?php echo $s_status[$r_status];?></b>
						<a href="/index.php?m=Member&c=Order&a=v2_manage&mod=trial&state=2&search_status=1">点击查看我的闪电佣金订单</a>
					</p>
					<?php } ?>
					<div class="btn-wrap">
						<a href="javascript:;" onclick="tj_chek();" id="btn_buy" class="fl btn cc1">在线申请</a>





						<?php if($rs['goods_vipfree'] >1) { ?>
						<a href="javascript:;" onclick="trial_detail.buy(1)" id="btn_buy" class="fl btn cc2 js_vip">vip通道</a>
						<?php } ?>


						<?php if($rs['goods_point'] > 0) { ?>
						<a href="javascript:;" onclick="trial_point();" id="btn_buy" class="fl btn cc2 js_point">积分兑换</a>
						<dl class="fl">
							<dt>
								申请需
								<b><?php echo Integral_quantity($rs['goods_price']); ?></b>
								积分
							</dt>
							<dd>
								<a href="<?php echo U('task/index/index');?>">积分不足？</a>
							</dd>
						</dl>
						<?php } ?>
					</div>

					<!-- 状态 -->	
					<?php  
						if($rs['type'] == 'general'){
							 $images = THEME_STYLE_PATH.'style/images/general.png';
						}elseif($rs['type'] == 'search'){
						 	$images = THEME_STYLE_PATH.'style/images/search.png';
						}elseif($rs['type'] == 'qrcode'){
						  $images = THEME_STYLE_PATH.'style/images/qrcode.png';

						}elseif($rs['type'] == 'ask'){
							$images = THEME_STYLE_PATH.'style/images/ask.png';

						}
					?>	
					<img class="staus" src="<?php echo $images;?>" alt="" />	
				</div>
			</div>

			<div class="list-hdlc list-hdlc_2 clear">
				<div class="l1 fl">申请</br>
				流程
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
					<dt>
						购买
						<span class="g_hint">
							原价
							<b class="cc">￥<?php echo $goods_price;?></b>
							下单领取（包邮）
						</span>
					</dt>
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
					<dt>
						返还本金
						<span class="g_hint">
							返还
							<b class="cc">￥<?php echo $goods_price;?></b>
							<?php if($goods_bonus > 0) { ?>
								+&nbsp;
							<b class="cc"><?php echo $goods_bonus;?></b>
							佣金
								<?php } ?>

								到您的账户
						</span>
					</dt>
					<dd>好评报告通过后返还购物本金和佣金</dd>
				</dl>
			</div>
		</div>

		<div class="sy-content clear">

			<div class="fl syc-tjsy">
				<h2>推荐活动</h2>

				<div class="w">
					<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'lists')) {$data = $product_tag->lists(array('mod'=>'trial','limit'=>'4',));} ?>
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					<div class="box">
						<div class="img">
							<a href="<?php echo $r['url'];?>" target="_blank">
								<img src="<?php echo $r['thumb'];?>"/>	
							</a>
							<dl class="tgl">
								<dt>
									<span><?php echo rand(90,99);?></span>
									%
								</dt>
								<dt>通过率</dt>
							</dl>
						</div>
						<p>
							<a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r[title],57);?></a>
						</p>
					</div>
					<?php $n++;}unset($n); ?>
						
				</div>

			</div>

			<div class="fr syc-tab" id="syc-tab">
				<ul class="title clear">
					<li class="active" data-tabindex="try_help_01">
						<a href="javascript:;">申请规则</a>
					</li>
					<li data-tabindex="try_help_02">
						<a href="javascript:;">活动报告</a>
					</li>
					<li data-tabindex="try_help_03">
						<a href="javascript:;">已申请用户</a>
					</li>
				</ul>
				<div class="syc-list">
					<div class="box" data-tabcontent="arr_content" id="try_help_01">
				<dl class="zysx">
							<dt>闪电佣金注意事项：</dt>
							<dd>
								1.一个会员账号，一个支付宝！
							</dd>
							<dd>2.每天每个账号不能超过3000元！  </dd>
							<dd>3.申请时谨记下单价格.下单时价格要与申请价格一致！</dd>
							<dd>4.下单支付成功后复制订单号要把订单号输入快乐挣的页面！</dd>
							<dd>5.截下订单详情图！上传图片信息</dd>
                            <dd>6.闪电佣金！购物满7天后到go商店好评！好评时请截图！审核通过后立即到账到淘支付！二十四小时提现到账！</dd>
						</dl>
                 <dl style="font-size: 16px; height: 30px;line-height: 30px; color: #ff6c00;">温馨提示!!请认准小树林快乐挣平台！不要轻易相信其他网络刷单平台！以防止出现不必要的经济损失！</dl>
						<dl class="zysx" >
							<dt>注意事项：</dt>
							<?php if(array_filter($rs['goods_tips']['order_tip'])) { ?>
										<?php $goods_tips_arr=array( '请不要使用信用卡下单', '请不要催促商家返款')?>
										<?php $n=1; if(is_array($rs['goods_tips']['order_tip'])) foreach($rs['goods_tips']['order_tip'] AS $k => $v) { ?>
							<dd><?php echo $goods_tips_arr[$k];?></dd>
							<?php $n++;}unset($n); ?>
									<?php } ?>
									<?php if(($rs['goods_tips']['goods_order']['kuaidi'])) { ?>
							<dd>默认快递：<?php echo $rs['goods_tips']['goods_order']['kuaidi'];?></dd>
							<?php } ?>
									<?php if(($rs['goods_tips']['goods_order']['remark'])) { ?>
							<dd>拍下须知:<?php echo $rs['goods_tips']['goods_order']['remark'];?></dd>
							<?php } ?>
									<?php if(($rs['goods_tips']['goods_order']['price']['cost'])) { ?>
							<dd>
								原价为：<?php echo $rs['goods_tips']['goods_order']['price']['cost'];?>元，拍下后价格为：<?php echo $rs['goods_tips']['goods_order']['price']['after'];?>元
							</dd>
							<?php } ?>
									<?php if(($rs['goods_tips']['goods_order']['price']['lv'])) { ?>
							<dd>
								请用V1-V3价格<?php echo $rs['goods_tips']['goods_order']['price']['lv'];?>元下单
							</dd>
							<?php } ?>
							<dd>请按照活动要求下单</dd>

						</dl>
						<?php if(($rs['type'] == 'search'  )) { ?>
						<dl class="ui_add_con">
							<dt>申请通过之后，您可以在此页面看到搜索流程图</dt>
							<dd>
								<a href="/help/?catid=84" target="_blank" tclass="ui_add_btn">查看新手入门</a>
							</dd>
						</dl>

                        <?php if($r_status >1 ) { ?>
							<div class="process_content" id="apply_pass" >
								<p>搜索流程图：</p>
								<?php $n=1;if(is_array($goods_search_albums)) foreach($goods_search_albums AS $sa) { ?>
								<img src="<?php echo $sa['url'];?>" />	
								<?php $n++;}unset($n); ?>
							</div>
                         <?php } ?>

						<?php } ?>
						<dl class="zysx">
							<dt>活动详情：</dt>
						</dl>

						<div class="tc" style="text-align:left;padding:0 30px;"><?php echo $goods_content;?></div>
					</div>

					<div class="box baogao dn" data-tabcontent="arr_content" id="try_help_02" style="display:none;">
						<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'trail_report')) {$data = $product_tag->trail_report(array('goods_id'=>$id,'order'=>'id desc','limit'=>'5',));} ?>
								<?php if(empty($data)) { ?>
						<p style="line-height:40px;text-align:center;height:40px;">新品上架,暂时还未有人完成报告</p>
						<?php } else { ?>
								<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<div class="baogao_box clear">
							<div class="user_m fl">
								<a href="#">
									<img src="<?php echo getavatar($r['userid']);?>" alt="" />	
								</a>
								<p>
									<a href="#"><?php echo nickname($r['userid']);?></a>
								</p>
							</div>
							<div class="fr user_txt">
								<div class="user_nr"><?php echo str_cut(strip_tags($r['content']), 500);?></div>
								<p class="time">提交时间：<?php echo dgmdate($r['inputtime'],'Y/m/d');?></p>
							</div>
						</div>
						<?php } ?>
								<?php $n++;}unset($n); ?>
								
					</div>
					<div class="box spsk dn" data-tabcontent="arr_content" id="try_help_03" style="display:none;" >

						<h2>
							已申请的用户(
							<span><?php echo $total_count;?></span>
							)
						</h2>
						<?php  $apply_people = model('order')->	
						where(array('goods_id'=>$id))->select(); ?>
						<ul class="u-box-ic clear">
							<?php $n=1;if(is_array($apply_people)) foreach($apply_people AS $v) { ?>
		                                <?php $userinfo = getuserinfo($v['buyer_id']);?>
							<li>
								<a href="javascript:;">
									<img src="<?php echo getavatar($v['buyer_id']);?>" alt="<?php echo $userinfo['nickname'];?>" width="60" height="60" />	
									<p class="txt-flow">
										<a href="javascript:;"><?php echo $userinfo['nickname'];?></a>
									</p>
								</a>
							</li>
							<?php $n++;}unset($n); ?>

									<?php $n=1;if(is_array($unreal)) foreach($unreal AS $s) { ?>
							<li>
								<a href="javascript:;">
									<img src="<?php echo $s['avatar'];?>" alt="<?php echo $s['nickname'];?>" width="60" height="60" />	
									<p class="txt-flow">
										<a href="javascript:;"><?php echo $s['nickname'];?></a>
									</p>
								</a>
							</li>
							<?php $n++;}unset($n); ?>
						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

	</div>
	<!-- 底部  -->	
	<?php include template('footer','common'); ?>
	<script type="text/javascript">trial_detail.init();</script>
	<!--  侧边栏  -->
	<div class="ling_mian" style="display:none;">
        <div class="weiwc">
            <div style="color: #e74c3c; font-size: 18px;">
            啊哦，还有<span id="num_was"></span>项未完善
            </div>
                <?php if(array_key_exists("information",$bind_set)) { ?>
                <p <?php if(empty($user_info['nickname'])) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
                    <span>●</span>&nbsp;已完善基本资料。
                    <?php if(empty($user_info['nickname'])) { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
                    <a class="cd" href="<?php echo U('Member/Profile/infomation');?>" target="_blank">去完善</a>
                    <?php } else { ?>
                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
                    <?php } ?>
                </p>
                <?php } ?>

                <?php if(array_key_exists("phone", $bind_set)) { ?>
                       <p <?php if(empty($user_info['phone_status'])) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
                       <span>●</span>&nbsp;已完成手机认证。
	                   <?php if($user_info['phone_status']) { ?> 
	                     <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
	                   <?php } else { ?>
						  <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
		                  <a class="cd" href="<?php echo U('Member/Attesta/phone_attesta');?>" target="_blank">去认证</a>
	                   <?php } ?>
                    </p>
                <?php } ?>

                <?php if(array_key_exists("email", $bind_set)) { ?>
	                <p <?php if($buyer_join_condition['email'] && !$this->user_info['email_status']) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
	                    <span>●</span>&nbsp;已完成邮箱认证。
						<?php if($buyer_join_condition['email'] && !$this->user_info['email_status']) { ?>
						<img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
	                    <a class="cd"  href="<?php echo U('Member/Attesta/email_attesta');?>" target="_blank">去认证</a>
	                    <?php } else { ?>
	                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
	                   <?php } ?>
	                </p>
                <?php } ?>
                
                <?php if(array_key_exists("realname", $bind_set)) { ?>
	                <p <?php if($buyer_join_condition['realname'] && $identity_count != 1) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
	                    <span>●</span>&nbsp;已进行身份认证。
	                    <?php if($buyer_join_condition['realname'] && $identity_count != 1) { ?>
	                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
	                    <a class="cd" href="<?php echo U('Member/Attesta/name_attesta');?>" target="_blank">去认证</a>
	                    <?php } else { ?>
	                    <img  src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
	                    <?php } ?>
	                </p>
                <?php } ?>
                
                <?php if(array_key_exists("bind_taobao",$bind_set)) { ?>
	                <p <?php if($tb_count < 1) { ?> <?php } else { ?> style="color: #888888" <?php } ?>>
	                    <span>●</span>&nbsp;已绑定淘宝账号。
	                    <?php if($tb_count < 1) { ?>
	                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
	                    <a class="cd" href="<?php echo U('Member/Attesta/bindtaobao');?>" target="_blank">去绑定</a>
	                    <?php } else { ?>
	                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
	                    <?php } ?>
	                </p>
                <?php } ?>
                
                <?php if(array_key_exists("bind_alipay", $bind_set)) { ?>
	                <p <?php if($user_info['alipay_status']  !=1) { ?> style="color: #888888" <?php } ?>>
	                    <span>●</span>&nbsp;已绑定支付宝。
	                    <?php if($user_info['alipay_status'] !=1 ) { ?>
	                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/cax.jpg" />
	                    <a class="cd" href="<?php echo U('Member/Attesta/alipay_attesta');?>" target="_blank">去绑定</a>
	                    <?php } else { ?>
	                    <img src="<?php echo THEME_STYLE_PATH;?>style/images/gggou.jpg" />
	                    <?php } ?>
	                </p>
                <?php } ?>   
        </div>
    </div>
    
	</body>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery.imagezoom.min.js"></script>
	<script type="text/javascript">

		$(function(){
			$('.title li').click(function(){
				$('.title li').removeClass('active');
				$("div[data-tabcontent='arr_content']").hide();
				$("div#" + $(this).attr('data-tabindex')).show();
				if ($(this).attr('data-tabindex') == 'try_help_03') {
					getContent();
				};
				$(this).addClass('active');
			});
		});

        /*执行抢购条件检测*/
		function tj_chek(type){

			if (site.user.length < 1) {	// 未登录
				member.login();
				return false;
			}

			if(site.user.modelid != 1){
					art.dialog({
				        lock : true,
				        fixed : true,
				        title : "参与提醒",
				        content:'您是平台入驻商家,不能参与买家活动，请注册买家账户参与！',
				        drag : false,
				    });

				    return false;
			}

	        var tj_num = $('.weiwc').find('.cd').length;

	        if(tj_num ==0){
	        	trial_detail.buy();
	        }else{
	        	$('#num_was').text(tj_num);
	        	art.dialog({
	                id:'goods_logs',
	                lock : true,
	                fixed : true,
	                title : "活动参与提醒,您还有"+tj_num +"条件未满足",
	                content:$('.ling_mian').html(),
	                drag : false,
	                ok:function(){
	                    location.reload();
	                },
	            });
	        }

		}

		$(document).ready(function(){
			     $(".jqzoom").imagezoom();
			$("#thumblist li a").click(function(){
				//增加点击的li的class:tb-selected，去掉其他的tb-selecte
				$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
				//赋值属性
				$(".jqzoom").attr('src',$(this).find("img").attr("mid"));
				$(".jqzoom").attr('rel',$(this).find("img").attr("big"));
			});
		});

		function getContent(page) {
		    var page = page || 1;
		    var param = {
		      goods_id:'<?php echo $rs['id'];?>',
		      mod:'<?php echo $rs['mod'];?>',
		      num:'55',
	    	  page:page
		    };         
		    $.getJSON(site.site_root + '/index.php?m=product&c=api&a=v2_buyer_list', param, function(ret) {
		       if(ret.data.lists.length == 0){
		       $('#js_people').html('<p style="line-height:40px;text-align:center;height:40px;">新品上架，就等你来申请</p>');

					return;
		       }

		       var _html = '';
		       if(ret.status == 1) {
		           $.each(ret.data.lists, function(i, n) {
		               _html += '<li>';
		               _html += '<a href="javascript:;"><img src="'+n.avatar+'" alt="" /></a>';
		               _html += '<p class="txt-flow"><a href="javascript:;">'+n.nickname+'</a></p>';
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

			
			var good_point = "<?php echo Integral_quantity($rs['goods_price']); ?>";
		function trial_point(){

			if (site.user.length < 1) {	// 未登录
					member.login();
					return false;
				}

		  var point = site.user.point;
	      //判断当前用户积分是否充足
	      if(good_point-0 > point-0 ){
	      	art.dialog({
	      	    title:'兑换提示：',
	      	    fixed:true,
	      	    lock:true,
	      	    icon: 'error',
	      	    cancelVal:'取消',
	      	    content:'亲 当前积分不足! <br/> 不能兑换本商品活动资格!<br/>您当前积分 <span style="color:red">'+ point +'</span > 兑换本商品需要积分 <span style="color:red">'+good_point+'</span><br/> ',
	      	    okVal:'去做任务,赚积分',
	      	    ok:function(){
	      	    	window.open('<?php echo U('task/index/index');?>');
	      	    },
	      	    cancel:true
	      	})

	      	return false;

	      }

	      trial_detail.buy(2);

		}
	</script>
<style type="text/css">
	#nav{ z-index:89; }
</style>