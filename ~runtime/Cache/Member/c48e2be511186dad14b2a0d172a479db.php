<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><div class="fl u_index_silde">
	<?php 
		 $my_order_count = model('order')->where(array('buyer_id'=>$this->userinfo['userid'],'act_mod'=>'trial'))->count();
		 $my_rebate_count = model('order')->where(array('buyer_id'=>$this->userinfo['userid'],'act_mod'=>'rebate'))->count();

		 $my_report_count = model('trial_report')->where(array('userid'=>$this->userinfo['userid']))->count();
		 $my_appeal_count = model('appeal')->where(array('buyer_id'=>$this->userinfo['userid']))->count();

		

	?>
					
					<div class="user_bor">
						<dl class="i_u_s_list">
							<dt>活动管理</dt>
							<?php if(C('REBATE_ISOPEN') == 1) { ?>

							<dd  <?php if(strtolower(CONTROLLER_NAME) == 'order' && $mod == 'rebate') { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'rebate','state'=>2,'com_status'=>2));?>">返利参与(<i><?php echo $my_rebate_count;?></i>)</a></dd>
							<?php } ?>
							<?php if(C('TRIAL_ISOPEN') == 1) { ?>

							<dd  <?php if(strtolower(CONTROLLER_NAME) == 'order' && $mod == 'trial') { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2,'search_status'=>1));?>">闪电佣金(<i><?php echo $my_order_count;?></i>)</a></dd>
							<?php } ?>
							<dd <?php if(ACTION_NAME=='get_trial_report' ) { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Order/get_trial_report');?>" >好评报告(<i><?php echo $my_report_count;?></i>)</a></dd>
							<dd <?php if(strtolower(CONTROLLER_NAME) == 'appeal' &&  ACTION_NAME == 'appeal_manage') { ?>  class="active" <?php } ?>><a href="<?php echo U('Member/Appeal/appeal_manage');?>" >申诉管理(<i><?php echo $my_appeal_count;?></i>)</a></dd>
						</dl>
						
						<dl class="i_u_s_list">
							<dt>基本信息</dt>
							<dd <?php if(strtolower(CONTROLLER_NAME) == 'attesta' && ACTION_NAME == 'index') { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Attesta/index');?>">账号信息</a></dd>
							<dd <?php if(ACTION_NAME=='infomation' ) { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Profile/infomation');?>"  >个人资料</a></dd>
							<dd <?php if(ACTION_NAME=='pwd' ) { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Profile/pwd');?>">修改密码</a></dd>
							<dd <?php if(ACTION_NAME=='bindtaobao' ) { ?> class="active" <?php } ?>><a href="<?php echo U('Member/Attesta/bindtaobao');?>">账号绑定</a></dd>
						</dl>
					</div>
					
					<script type="text/javascript">
						$(function(){
							$('.i_u_s_b li').mouseover(function(){
								$(this).addClass('active').siblings('li').removeClass('active');
							});
						});
					</script>
					<ul class="i_u_s_b clear">
						<li  <?php if(ACTION_NAME=='announce' ) { ?> class="active" <?php } ?>>
							<a href="<?php echo U('Member/Announce/announce',array('type'=>1));?>">
								<p class="ico i1">
									<span></span>
									<?php if(message_count($this->userinfo['userid']) > 0) { ?>
									<strong><?php echo message_count($this->userinfo['userid']);?></strong>
									<?php } ?>
								</p>
								<p class="mess_txt">消息提醒</p>
							</a>
						</li>
						<?php if(C('COMMISSION_ISOPEN') == 1) { ?>
					<!--	<li <?php if(ACTION_NAME=='manage' && $mod=='commission' ) { ?> class="active" <?php } ?>>
							<a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'commission','com_status'=>2));?>">
								<p class="ico i2">
									<span></span>
								</p>
								<p class="mess_txt">原闪电佣金</p>
							</a>
						</li>
						<?php } ?>
						<li <?php if(ACTION_NAME=='work_log') { ?> class="active"<?php } ?>>
							<a href="<?php echo U('Member/Financial/work_log');?>">
								<p class="ico i3">
									<span></span>
								</p>
								<p class="mess_txt">日赚任务</p>
							</a>
						</li>-->
						<li <?php if(ACTION_NAME=='index' && strtolower(CONTROLLER_NAME == 'recommend')) { ?> class="active" <?php } ?>>
							<a href="<?php echo U('Member/recommend/index');?>">
								<p class="ico i4">
									<span></span>
								</p>
								<p class="mess_txt">推荐好友</p>
							</a>
						</li>
					</ul>
				</div>