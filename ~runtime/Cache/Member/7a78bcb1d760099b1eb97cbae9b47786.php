<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>账号信息-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="账号信息,<?php echo C('WEBNAME');?>" />
		<meta name="Description" content="账号信息,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	</head>
	<body>
		<?php include template('v2_header','member/common'); ?>
		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>账号信息</b>
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
													else if($h<18) echo "下午好！";
													else echo "晚上好！";
												?>
												</span>
											</dt>
											<dd>
												<?php if($this->userinfo['groupid'] == 2) { ?>
												<b class="vip">vip</b>
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
												<a href="<?php echo U('Member/Financial/index');?>" class="zhmx">账户明细</a>
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

										<li>余额：<?php echo $this->userinfo['money'];?> <a href="<?php echo U('Member/Financial/index');?>">查看资金账户</a></li>
<!-- 										<li>唯一识别码：123456789</li>
 -->									</ul>
							</div>
							
							
							<div class="user_kj_nav clear user_pd_2">
								
								<div class="list_zh_mess_list clear <?php if($userinfo['email_status'] == 1) { ?> old <?php } ?>">
									<div class="zh_rz_mess  fl clear">
										<b class="zh_ico email fl"></b>
										<span class="fl zh_name">邮箱认证</span>
										<span class="fl zh_status"><?php if($userinfo['email_status'] == 1) { ?>已认证<?php } else { ?>未认证<?php } ?></span>
									</div>
									<p class="fl zh_sm">可用于登录账号，安全地找回密码</p>

									
									<?php if($userinfo['email_status'] == 1) { ?><a href="<?php echo U('Member/Attesta/email_attesta');?>" class="fr zh_b_btn">更换邮箱</a><?php } else { ?><a href="<?php echo U('Member/Attesta/email_attesta');?>" class="fr zh_b_btn">去认证</a><?php } ?>
								</div>
								
								<div class="list_zh_mess_list clear  <?php if($userinfo['phone_status'] == 1) { ?> old <?php } ?>">
									<div class="zh_rz_mess  fl clear">
										<b class="zh_ico phone fl"></b>
										<span class="fl zh_name">手机认证</span>
										<span class="fl zh_status"><?php if($userinfo['phone_status'] == 1) { ?>已认证<?php } else { ?>未认证<?php } ?></span>
									</div>
									<p class="fl zh_sm">可用于登录账号，安全地找回密码</p>
									<?php if($userinfo['phone_status'] == 1) { ?><a href="<?php echo U('Member/Attesta/phone_attesta');?>" class="fr zh_b_btn">更换手机</a><?php } else { ?><a href="<?php echo U('Member/Attesta/phone_attesta');?>" class="fr zh_b_btn">去认证</a><?php } ?>
								</div>
								
								<div class="list_zh_mess_list clear <?php if($arr['identity'] && $arr['identity']['status'] == 1) { ?>old<?php } ?>">
									<div class="zh_rz_mess  fl clear">
										<b class="zh_ico sm fl"></b>
										<span class="fl zh_name">实名认证</span>
										<span class="fl zh_status"><?php if($arr['identity'] && $arr['identity']['status'] == 1) { ?>已认证<?php } elseif (($arr['identity'] && $arr['identity']['status'] == 0)) { ?>审核中<?php } elseif (($arr['identity'] && $arr['identity']['status'] == -1)) { ?>未通过<?php } else { ?>未认证<?php } ?></span>
									</div>
									<p class="fl zh_sm" style="margin-top:15px;">为了保障您的资金账户安全<br/>第一次提现须通过实名认证</p>
									<?php if(empty($arr['identity'])) { ?>
									<a href="<?php echo U('Member/Attesta/name_attesta');?>" class="fr zh_b_btn">去认证</a>
									<?php } ?>
									<?php if(!empty($arr['identity']) && ($arr['identity'] && $arr['identity']['status'] == 0)) { ?>
									<a href="javascript:;" class="fr zh_b_btn">审核中</a>
									<?php } elseif (!empty($arr['identity']) && ($arr['identity'] && $arr['identity']['status'] == -1)) { ?>
										<a href="<?php echo U('Member/Attesta/name_attesta');?>" class="fr zh_b_btn">重新认证</a>

									<?php } ?>
								</div>

								<div class="list_zh_mess_list clear <?php if($arr['alipay']['status'] == 1) { ?>old<?php } ?>">
									<div class="zh_rz_mess  fl clear">
										<b class="zh_ico pass fl" style="background: url(<?php echo THEME_STYLE_PATH;?>style/images/alipay.png) no-repeat;"></b>
										<span class="fl zh_name">支付宝绑定</span>
										<span class="fl zh_status"><?php if($arr['alipay']['status'] == 1) { ?>已绑定<?php } else { ?>未绑定<?php } ?></span>
									</div>
									<p class="fl zh_sm">绑定您的支付宝，可有效保障您的资金安全</p>

									<?php if($arr['alipay']['status'] != 1) { ?>
									<a href="javascript:;" class="fr zh_b_btn" id="alipaybind">去绑定</a>
									<?php } ?>
								</div>

								<!-- 支付宝账号绑定  end-->
								<script type="text/javascript">
								$(document).ready(function(){
									$("#alipaybind").click(function(){
										//检测身份认证是否以已经认证过
										$.ajax({
											url:"<?php echo U('Member/Attesta/v2_check');?>",
											type:'post',
											dataType:'json',
											success:function(data){
												if(data.status == 0){
														art.dialog({
														lock: true,
														fixed: true,
														icon: 'face-smile',
														title: '温馨提示',
														content: data.info,
														ok: function(){
															location.href=data.url;
														}
														});
													
												}else{
													
													location.href="<?php echo U('Member/Attesta/alipay_attesta');?>";
												}
											}
										},'json');
									});

									$("#bankbind").click(function(){
										//检测身份认证是否以已经认证过
										$.ajax({
											url:"<?php echo U('Member/Attesta/v2_check_bank');?>",
											type:'post',
											dataType:'json',
											success:function(data){
												if(data.status == 0){
														art.dialog({
														lock: true,
														fixed: true,
														icon: 'face-smile',
														title: '温馨提示',
														content: data.info,
														ok: function(){
															location.href=data.url;
														}
														});
													
												}else{
													
													location.href="<?php echo U('Member/Attesta/bank_attesta');?>";
												}
											}
										},'json');
									});
								});
								</script>

								<div class="list_zh_mess_list clear <?php if($userinfo[bank_status] == 1) { ?>old<?php } ?>">
									<div class="zh_rz_mess  fl clear">
										<b class="zh_ico pass fl" style="background: url(<?php echo THEME_STYLE_PATH;?>style/images/bank.png) no-repeat;"></b>
										<span class="fl zh_name">银行卡绑定</span>
										<span class="fl zh_status"><?php if($userinfo[bank_status] == 1) { ?>已绑定<?php } else { ?>未绑定<?php } ?></span>
									</div>
									<p class="fl zh_sm">绑定您的银行卡</p>

									<?php if($userinfo[bank_status] != 1) { ?>
									<a href="javascript:;" class="fr zh_b_btn" id="bankbind">去绑定</a>
									<?php } ?>
								</div>
								
							</div>
						
					</div>
				</div>
			</div>
			
		</div>
		
		<?php include template('footer','common'); ?>
	</body>
</html>