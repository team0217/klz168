<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>买家个人中心-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="买家个人中心,<?php echo C('WEBNAME');?>" />
		<meta name="description" content="买家个人中心,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

	</head>
	<body>
		<style type="text/css">
		.user_i_mess_c .yhtx .img{ height:166px; }
		.user_i_mess_c .yhtx .img img{ width:166px; min-height:166px; }
		</style>

		<?php include template('v2_header','member/common'); ?>

		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>会员中心</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				
						<?php include template('v2_member_left','member/common'); ?>

				
				<div class="fr u_index_mess user_r_w_2">
					
					<div class="u_index_bor">
						
								<div class="user_i_mess_c user_pd_2">
									
									<div class="yhtx fl clear">
										<div class="img fl">
											<img src="<?php echo $this->userinfo['avatar'];?>"/>
										</div>
										<dl class="fr txt">
											<dt><?php echo nickname($this->userinfo['userid']);?>
												<span>
													<?php
												
													$h=date("H");
													if($h<11) echo "早上好!";
													else if($h<13) echo "中午好！";
													else if($h<17) echo "下午好！";
													else echo "晚上好！";
												?>
												</span>
											</dt>
											<dd>
												<?php if($this->userinfo['groupid'] == 2) { ?>
												<b class="vip">vip</b>
												<?php } elseif ($this->userinfo['groupid'] == 4) { ?>
                                                <b class="vip">代理商</b>
                                                <?php } elseif ($this->userinfo['groupid'] == 5) { ?>
                                                <b class="vip">总经销商</b>
                                                <?php } elseif ($this->userinfo['groupid'] == 6) { ?>
                                                <b class="vip">总运营商</b>
                                                <?php } else { ?>
												您不是VIP,<a href="<?php echo U('Member/Profile/becomevip');?>">立即升级VIP用户>></a>
												<?php } ?>
											</dd>
											<dd>
												我的积分：<span class="cc" style="margin-right:5px;"><?php echo $this->userinfo['point']; ?></span><a href="<?php echo U('Shop/index/index');?>" target="_blank">现在去兑换>></a>
											</dd>
											<dd class="gn clear">
												<a href="<?php echo U('Pay/Index/deposite');?>" class="tx">提现</a>
												<a href="<?php echo U('Pay/Index/pay');?>" class="cz" target="_blank">充值</a>
												<a href="<?php echo U('Member/Financial/index');?>" class="zhmx">淘支付明细</a>
												<a href="<?php echo U('Member/Financial/point_log');?>" class="zhmx">积分明细</a>

											</dd>
										</dl>
									</div>
									<ul class="yhxx fl">
										<li>认证邮箱：<?php echo substr_replace($this->userinfo['email'],'***',3,5);?> <a href="<?php echo U('Member/Attesta/email_attesta');?>">更换邮箱</a></li>
										<li>认证手机：
											<?php if($this->userinfo['phone_status'] == 1) { ?>

											<?php echo substr_replace($this->userinfo['phone'],'***',3,5);?> <a href="<?php echo U('Member/Attesta/phone_attesta');?>">更换手机</a>

											<?php } else { ?>未认证

											<a href="<?php echo U('Member/Attesta/phone_attesta');?>">现在去认证</a><?php } ?>
										</li>

										<li>淘支付余额：<span class="cc" style="margin-right:5px;"><?php echo $this->userinfo['money'];?></span> <a href="<?php echo U('Member/Financial/index');?>">查看淘支付明细</a></li>
 								</ul>
							</div>
							   
							
							<div class="user_kj_nav clear">
								
								<div class="#">
									<h2 class="title">闪电佣金</h2>
									
									
									<div class="box">
										<a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2,'search_status'=>1));?>">
											<p class="ico i1"></p>
											<p class="s_h">已通过待领取</p>
											<p class="cc"><?php echo $trial_pass_count;?></p>
										</a>
									</div>
									<div class="box">
										<a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2,'search_status'=>3));?>">
											<p class="ico i2"></p>
											<p class="s_h">已下单待交好评报告</p>
											<p class="cc"><?php echo $write_report_count;?></p>
										</a>
									</div>
									<div class="box">
										<a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2,'search_status'=>5));?>">
											<p class="ico i3"></p>
											<p class="s_h">待修改订单号/报告</p>
											<p class="cc"><?php echo $update_count;?></p>
										</a>
									</div>
									<div class="box">
										<a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2,'search_status'=>6));?>">
											<p class="ico i4"></p>
											<p class="s_h">申诉中</p>
											<p class="cc"><?php echo $appeal_count;?></p>
										</a>
									</div>
									
								</div>
								<!--		<div class="fr zyj_wrap clear">
                                            <h2 class="title">佣金活动</h2>
                                            <?php
                                            $pay_count = model('order')->where(array('buyer_id'=>$this->userinfo['userid'],'act_mod'=>'commission','status'=>5,'order_sn'=>array('NEQ','')))->count();
                                            $write_order = model('order')->where(array('buyer_id'=>$this->userinfo['userid'],'act_mod'=>'commission','status'=>2,'order_sn'=>array('EQ','')))->count();
                                            $update_order = model('order')->where(array('buyer_id'=>$this->userinfo['userid'],'act_mod'=>'commission','status'=>4,'order_sn'=>array('NEQ','')))->count();
                                            $appeal_order = model('order')->where(array('buyer_id'=>$this->userinfo['userid'],'act_mod'=>'commission','status'=>6,'order_sn'=>array('NEQ','')))->count();



                                            ?>

                                            <div class="box">
                                                <a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'commission','com_status'=>2));?>">
                                                    <p class="ico i5"></p>
                                                    <p class="s_h">已通过待领取</p>
                                                    <p class="cc"><?php echo $write_order;?></p>
                                                </a>
                                            </div>
                                            <div class="box">
                                                <a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'commission','com_status'=>5,'state'=>2));?>">
                                                    <p class="ico i6"></p>
                                                    <p class="s_h">待返款</p>
                                                    <p class="cc"><?php echo $pay_count;?></p>
                                                </a>
                                            </div>
                                            <div class="box">
                                                <a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'commission','com_status'=>4,'state'=>2));?>">
                                                    <p class="ico i7"></p>
                                                    <p class="s_h">待修改订单号/申诉</p>
                                                    <p class="cc"><?php echo $update_order;?></p>
                                                </a>
                                            </div>
                                            <div class="box">
                                                <a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'commission','com_status'=>6,'state'=>2));?>">
                                                    <p class="ico i8"></p>
                                                    <p class="s_h">申诉中</p>
                                                    <p class="cc"><?php echo $appeal_order;?></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>-->
						
					</div>
					
					
					<script type="text/javascript">
						$(function(){
							$('.shb_box_wrap .box:nth-child(4n)').css('margin-right','0px');
						});
					</script>
					
					<div class="shb_wrap">
						<h2 class="title">最新试用宝贝</h2>
						<div class="shb_box_wrap">
							<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'lists')) {$data = $product_tag->lists(array('mod'=>'trial','order'=>'id desc','limit'=>'4',));} ?>
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?> 
							
								<div class="box fl">
									<a href="<?php echo $r['url'];?>">
									<div class="img"><img src="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>" /></div>
									<dl class="txt">
										<dt><?php echo str_cut($r[title],45);?></dt>
										<dd>申请人数：<?php echo get_trial_by_gid($r['id']);?>人</dd>
										<dd>份数：<?php echo $r['goods_number'];?>份</dd>
									</dl>
									</a>
								</div>
							<?php $n++;}unset($n); ?>
							
							
								

						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		
				<?php include template('footer','common'); ?>



	</body>
</html>