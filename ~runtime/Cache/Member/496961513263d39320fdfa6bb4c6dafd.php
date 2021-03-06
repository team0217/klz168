<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css2/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css2/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css2/win2k.css"/>
<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css2/personal_member_finance_list.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js2/calendar.js"></script>
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js2/en.js"></script>


<style>
.pages .active {
    color: #00a9fe;
    border: 1px solid #00a9fe;
}
.pages a {
    width: 28px;
    height: 100%;
    line-height: 28px;
}
.pages a, .pages span {
    margin: 0 5px;
}
.textAlgin1 {
    text-align: center;
}
.border_ddd {
    border: solid 1px #ddd;
}
.floatLeft {
    float: left;
}

.right_title .a_link {
    color: #009ee7;
    border-bottom: solid 2px #30bbfe;
    outline: none;
}
.right_title a {
    font-weight: 100;
    height: 100%;
    display: inline-block;
    padding: 0 5px;
    margin-left: 5px;
}
a {
    text-decoration: none;
    color: #666;
    hide-focus: expression(this.hideFocus=true);
    outline: none;
}
* {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 12px;
}
</style>
</head>
<body>
<!-- wrap 内容页盒模型 -->
<?php if($userinfo['modelid'] == 1) { ?>
    <?php include template('v2_header','member/common'); ?>
	<?php } else { ?>
    <?php include template('v2_merchant_header','member/common'); ?>
	<?php } ?>
<?php if($userinfo['modelid'] != 1) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
<?php } ?>

<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b>充值记录</b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php if($userinfo['modelid'] == 1) { ?>
			    <?php include template('v2_member_left','member/common'); ?>
				<?php } else { ?>
		        <?php include template('v2_merchant_left','member/common'); ?>

			<?php } ?>


			<div class="fr u_index_mess user_pd_1">

				<dl class="u_i_form">
					<dt>充值记录</dt>
					<h2 class="right_title border_bottom_efefef">
					<a href="<?php echo U('Member/Financial/pay_log',array('type'=>1));?>" 
						<?php if($type == 1) { ?> class="a_link"<?php } ?>>普通充值</a>
						<a href="<?php echo U('Member/Financial/pay_log',array('type'=>2));?>" <?php if($type == 2) { ?> class="a_link"<?php } ?>>快速充值</a>
					</h2>
					<br/>
					<form method="get">
						<input type="hidden" name="m" value="Member">
						<input type="hidden" name="c" value="Financial">
						<input type="hidden" name="a" value="pay_log">
						<input type="hidden" name="type" value="<?php echo $type;?>">
					<div class="order_type">
						<table width="100%" cellspacing="0" class="search-form">
						    <tbody>
								<tr>
									<td>
										<div class="explain-col">				
											充值查询
											<input type="text" name="start_time" id="start_time" value="" size="10" class="date" readonly>
											<script type="text/javascript">
												Calendar.setup({
												weekNumbers: true,
											    inputField : "start_time",
											    trigger    : "start_time",
											    dateFormat: "%Y-%m-%d",
											    showTime: false,
											    minuteStep: 1,
											    onSelect   : function() {this.hide();}
												});
								       		</script>-
											<input type="text" name="end_time" id="end_time" value="" size="10" class="date" readonly>&nbsp;
											<script type="text/javascript">
												Calendar.setup({
												weekNumbers: true,
											    inputField : "end_time",
											    trigger    : "end_time",
											    dateFormat: "%Y-%m-%d",
											    showTime: false,
											    minuteStep: 1,
											    onSelect   : function() {this.hide();}
												});
								        	</script>
											<input type="submit" name="search" class="button" value="搜索" />
										</div>
									</td>
								</tr>
						    </tbody>
						</table>
					</div>
				</form>

				<?php if($type == 1) { ?>
					<div class="order_list">
						<table>
							<tbody>
								<tr>
									<th style='text-align:center;'>充值金额</th>
									<th style='text-align:center;'>状态</th>
									<th style='text-align:center;'>原因</th>
									<th style='text-align:center;'>交易号</th>
									<th style='text-align:center;'>充值时间</th>
									<th style='text-align:center;'>审核时间</th>
									
								</tr>
								<?php if($pay_log) { ?>
								<?php $n=1;if(is_array($pay_log)) foreach($pay_log AS $v) { ?>
								<tr>
									<td <?php if($v[money] >0 ) { ?> class="income" <?php } else { ?> class="expenditure"<?php } ?>>
										<?php echo $v['money'];?>
									</td>
								
									<td><?php if($v[status == 0]) { ?>未审核<?php } elseif ($v[status] == 1) { ?>已审核<?php } else { ?>未通过<?php } ?></td>
									<td><?php echo $v['cause'];?></td>
									<td><?php echo $v['tran_number'];?></td>
									<td><?php echo dgmdate($v['inputtime']); ?></td>
									<td><?php if(empty($v['check_time'])){echo "-";}else{ echo dgmdate($v['check_time']);} ?></td>

								</tr>
								<?php $n++;}unset($n); ?>

								<?php } ?>
								
							</tbody>
						</table>
						<p class="pages wiHe3 floatLeft">
							<?php echo $pages;?>
						</p>
					</div>

					<?php } else { ?>
					 <div class="order_list">
						<table>
							<tbody>
								<tr>
									<th style='text-align:center;'>交易订单号</th>
									<th style='text-align:center;'>充值金额</th>
									<th style='text-align:center;'>手续费</th>
									<th style='text-align:center;'>状态</th>
									<th style='text-align:center;'>支付方式</th>
									<th style='text-align:center;'>原因</th>
									<th style='text-align:center;'>完成时间</th>
									
								</tr>
								<?php if($pay_log) { ?>
								<?php $n=1;if(is_array($pay_log)) foreach($pay_log AS $v) { ?>
								<tr>
									<td><?php echo $v['trade_sn'];?></td>
									<td class="income"><?php echo $v['total_fee'];?></td>		
									<td><?php echo $v['fee'];?></td>						
									<td><?php if($v[status] == 0) { ?>待支付<?php } else { ?>已完成<?php } ?></td>
									<td> <?php echo $v['code'];?></td>
									<td><?php echo $v['cause'];?></td>									
									<td><?php if(empty($v['notify_time'])){echo "-";}else{ echo dgmdate($v['notify_time']);} ?></td>
								</tr>
								<?php $n++;}unset($n); ?>

								<?php } ?>
								
							</tbody>
						</table>
						<p class="pages wiHe3 floatLeft">
							<?php echo $pages;?>
						</p>
					</div>
					<?php } ?>
				 </dl></div>
			</div>
		</div>

<?php include template('footer','common'); ?>