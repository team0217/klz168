<?php defined('IN_ADMIN') or exit('No permission resources.');?>

<?php
$show_header = TRUE;
 include $this->admin_tpl('header', 'admin');?>

<div class="pad_10">
	<form action="<?php echo U('check'); ?>" method="post" name="myform" id="myform" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id;?>" />                                                  
		<table cellpadding="2" cellspacing="1" class="table_form" width="100%">
				<tr>
					<td width="120">实际支付给会员金额：</td> 
					<td> <?php echo $rs['totalmoney'];?> ( 提现总额:<?php echo $rs['money'];?> - 手续费<?php echo $rs['fee'];?>)</td>
				</tr>
				<tr>
					<td width="120">返现账号：</td> 
					<td>
					   <select name="cashier">
					       <option value="18229301102">18229301102</option>
					       <option value="957979348@qq.com">957979348@qq.com</option>
					       <option value="15886557806">15886557806</option>
					       <option value="838014045@qq.com">838014045@qq.com</option>
					       <option value="15675714993">15675714993</option>
					       <option value="18175515391">18175515391</option>
					       <option value="13875519664">13875519664</option>
					   </select>
					</td>
				</tr>
				<tr>
					<td width="120">备注银行交易成功单号:</td> 
					<td><input type="text" name="success_order" value=""></td>
					<td><input type="hidden" name="forward" value="<?php echo U('check');?>"> <input
					type="submit" name="dosubmit" id="dosubmit" class="dialog"
					value="<?php echo L('submit')?> "></td>
				</tr>
		</table>
	</form>
</div>
</body>
</html>