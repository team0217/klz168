<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><div class="fl u_index_silde">
					
	<div class="user_bor">
	<?php if(C('TRIAL_ISOPEN') == 1) { ?>
		<dl class="i_u_s_list">
			<dt>闪电佣金</dt>
			<dd <?php if(ACTION_NAME == 'select_trial' && $_GET['mod'] == 'trial') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantProduct/select_trial',array('mod'=>'trial'));?>">发布闪电佣金</a></dd>
			<dd <?php if(ACTION_NAME == 'activity' && $_GET['mod'] == 'trial') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'trial'));?>">活动管理</a></dd>
		</dl>
	<?php } ?>

		<!--原闪电佣金-->
	<!-- <?php if(C('COMMISSION_ISOPEN') == 1) { ?>
		<dl class="i_u_s_list">
			<dt><?php echo C('COMMISSION_NAME');?>管理</dt>
			<dd <?php if(ACTION_NAME == 'add' && $_GET['mod'] == 'commission') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantProduct/add',array('mod'=>'commission'));?>">发1布<?php echo C('COMMISSION_NAME');?></a></dd>
			<dd <?php if(ACTION_NAME == 'activity' && $_GET['mod'] == 'commission') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'commission'));?>">活动管理</a></dd>
		</dl>
     <?php } ?>   -->

	<?php if(C('REBATE_ISOPEN') == 1) { ?>
		<dl class="i_u_s_list">
			<dt><?php echo C('REBATE_NAME');?>管理</dt>
			<dd <?php if(ACTION_NAME == 'add' && $_GET['mod'] == 'rebate') { ?> class="active" <?php } ?>><a href="<?php echo U('Member/MerchantProduct/add',array('mod'=>'rebate'));?>">发布返利活动</a></dd>
			<dd <?php if(ACTION_NAME == 'activity' && $_GET['mod'] == 'rebate') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'rebate'));?>">活动管理</a></dd>
		</dl>
	<?php } ?>

	<?php if(C('TASK_ISOPEN') == 1) { ?>
		<dl class="i_u_s_list">
			<dt>开心任务管理</dt>
			<dd <?php if(ACTION_NAME == 'task_add') { ?>class="active"<?php } ?> ><a href="<?php echo U('Member/MerchantTask/task_add');?>">发布开心任务</a></dd>
			<dd <?php if(ACTION_NAME == 'task_list') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantTask/task_list');?>">活动管理</a></dd>
		</dl>
	<?php } ?>


	<?php if(C('POSTAL_ISOPEN') == 1) { ?>
	<dl class="i_u_s_list">
		<dt>包邮活动管理</dt>
		<dd <?php if(ACTION_NAME == 'add' && $_GET['mod'] == 'postal') { ?>class="active" <?php } ?>><a href="<?php echo U('Member/MerchantProduct/add',array('mod'=>'postal'));?>">发布<?php echo C('POSTAL_NAME');?></a></dd>
		<dd <?php if(ACTION_NAME == 'activity' && $_GET['mod'] == 'postal') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'postal'));?>">活动管理</a></dd>
	</dl>
	<?php } ?>

		<dl class="i_u_s_list">
			<dt>申诉管理</dt>
			<dd <?php if(ACTION_NAME == 'appeal_manage' && I('state') == -1) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Appeal/appeal_manage',array('state'=>-1));?>">申诉管理</a></dd>
			<dd <?php if(ACTION_NAME == 'appeal_manage' && I('state') == 0) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Appeal/appeal_manage', array('state' => 0));?>">待商家处理</a></dd>
		</dl>
		
		<dl class="i_u_s_list">
			<dt>基本信息</dt>
			<dd <?php if(ACTION_NAME == 'index' && CONTROLLER_NAME=='Attesta') { ?>class="active"<?php } ?> ><a href="<?php echo U('Member/Attesta/index');?>">账号信息</a></dd>
			<dd <?php if(ACTION_NAME == 'complete' && CONTROLLER_NAME=='Merchant') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Merchant/complete');?>">店铺资料</a></dd>
			<dd <?php if(ACTION_NAME == 'pwd' && CONTROLLER_NAME=='Profile') { ?>class="active"<?php } ?> ><a href="<?php echo U('Member/Profile/pwd');?>">修改密码</a></dd>
			<dd <?php if(ACTION_NAME == 'get_blacklists') { ?>class="active"<?php } ?> ><a href="<?php echo U('Member/order/get_blacklists');?>">黑名单管理</a></dd>

		</dl>

		<dl class="i_u_s_list">
			<dt>财务管理</dt>
			<dd <?php if(ACTION_NAME == 'pay' && CONTROLLER_NAME=='Index') { ?>class="active"<?php } ?> ><a href="<?php echo U('Pay/Index/pay');?>">快速充值</a></dd>
			<dd <?php if(ACTION_NAME == 'deposite' && CONTROLLER_NAME=='Index') { ?>class="active"<?php } ?>><a href="<?php echo U('Pay/Index/deposite');?>">快速提现</a></dd>
			<dd <?php if(ACTION_NAME == 'index' && CONTROLLER_NAME =='Financial') { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Financial/index');?>" >账单明细</a></dd>
		</dl>
	</div>
</div>