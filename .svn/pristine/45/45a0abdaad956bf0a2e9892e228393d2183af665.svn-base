<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!-- 查看申诉 -> 弹窗 --> 
<style>
.appeal-details{position: relative;width: 500px; height: 450px; overflow:auto; padding: 20px 25px;}
.appeal-details img{width: 80px;height: 80px;}
.appeal-details th{font-weight: normal; vertical-align: top; text-align: right; width: 70px; padding: 3px 15px 3px 0; }
.appeal-details td{word-wrap:break-word; word-break:break-all; padding: 3px 0; }
.appeal-info, .appeal-reply, .appeal-manage{position: relative;	border-radius: 5px;padding: 10px 5px 5px 5px;}
.appeal-info{background-color: #F0F9FF; border: 1px solid #BCE3FE; }
.appeal-reply{background-color: #FFF; border: 1px solid #D3D3D3; margin-top: 24px; }
.appeal-reply .ui-form-text{width: 300px;}
.appeal-reply .disabled{background-color:#999;cursor: default;}
.appeal-reply .disabled:hover{background-color:#999;cursor: default;}
.appeal-manage{background-color: #EEE; border: 1px solid #C9C9C9; margin-top: 24px; }
.appeal-manage .waitng{font-size: 20px; padding: 30px; text-align: center; }
 .appeal-details h2{position: absolute; font-weight: bold; padding: 1px 8px; top: -12px; left: 10px; font-size: 12px; border-radius: 5px; }
.appeal-info h2{background-color: #F0F9FF; border: 1px solid #BCE3FE; }
.appeal-reply h2{background-color: #FFF; border: 1px solid #D3D3D3; }
.appeal-manage h2{background-color: #EEE; border: 1px solid #C9C9C9; }
</style>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>/dialog.css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>/table_form.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>/dialog.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>/content_addtop.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>/admin_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>/swfupload/swf2ckeditor.js"></script>
<?php $memberInfo = is_login(); ?>
<tr>
<td class="aui_main" style="width: auto; height: auto;">
	<div class="aui_content" style="padding: 0px;">
		<div class="appeal-details">
			<div class="appeal-info">
				<h2>申诉方</h2>
				<table cellspacing="0">
					<tbody>
						<tr>
							<th>商品名称:</th>
							<td class="ui-table-statusB">
								<a href="<?php echo $proInfo['url'];?>" target="_blank" style="color:blue;"><?php echo $proInfo['title'];?></a>
							</td>
						</tr>
						<tr>
							<th>申诉人:</th>
							<td>
								<span class="ui-table-statusB"><?php echo $userInfo['nickname'];?></span> <em class="ui-table-statusGray">(买家)</em>
							</td>
						</tr>
						<tr>
							<th>申诉时间:</th>
							<td><?php echo dgmdate($appeal['buyer_time']);?></td>
						</tr>
						<tr>
							<th>申诉类型:</th>
							<td><?php echo $appealtypes[$appeal['appeal_type']];?></td>
						</tr>
						<tr>
							<th>订单号:</th>
							<td><?php echo $appeal['order_sn'];?></td>
						</tr>
						<tr>
							<th>申诉凭证:</th>
							<td>
							<?php $n=1; if(is_array($appeal['buyer_imgs_url'])) foreach($appeal['buyer_imgs_url'] AS $k => $r) { ?>
								<a href="<?php echo $r;?>" target="_black"><img src="<?php echo $r;?>"></a>
							<?php $n++;}unset($n); ?>
							</td>
						</tr>
						<tr>
							<th>申诉理由:</th>
							<td><?php echo $appeal['buyer_cause'];?></td>
						</tr>
						<tr>
							<th>电话:</th>
							<td><?php echo $appeal['buyer_phone'];?></td>
						</tr>				
						<tr>
							<th>Q Q:</th>
							<td><?php echo $appeal['buyer_qq'];?></td>
						</tr>
						<tr>
							<th>旺旺:</th>
							<td><?php echo $appeal['buyer_ww'];?></td>
						</tr>
						<?php if($appeal['appeal_status']==3) { ?>
						<tr>
							<th>当前状态:</th>
							<td style="color:red;"><?php echo $appealstatus[$appeal['appeal_status']];?>(操作者：申诉者本人)</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!--被申诉方已回应时候打开显示回应内容-->
			<div class="appeal-reply">
				<h2>被申诉方</h2>
					<form action="<?php echo U("company_post");?>" method="post" enctype="multipart/form-data">
					<table cellspacing="0">
					<input type='hidden' name="id" value="<?php echo $appeal['id'];?>"/>
					<input type='hidden' name="goods_id" value="<?php echo $appeal['goods_id'];?>"/>
					<input type='hidden' name="appeal_uid" value="<?php echo $appeal['appeal_uid'];?>"/>
					<tbody>
						<tr>
							<th>被申诉人:</th>
							<td>
								<span class="ui-table-statusB"><?php echo $sellerInfo['nickname'];?></span> <em class="ui-table-statusGray">(商家)</em>
							</td>
						</tr>
						<?php if($memberInfo['modelid']=='2') { ?>
						<!--商家会员-->
							<?php if($appeal['appeal_status']==0) { ?>
							<!--商家未回复时-->
								<tr>
									<th>当前结果:</th>
									<td>待商家处理!</td>
								</tr>
							<?php } else { ?>
								<tr>
									<th>商家凭证:</th>
									<td>
									<?php $n=1; if(is_array($appeal['seller_imgs_url'])) foreach($appeal['seller_imgs_url'] AS $k => $r) { ?>
										<a href="<?php echo $r;?>" target="_black"><img src="<?php echo $r;?>"></a>
									<?php $n++;}unset($n); ?>
									</td>
								</tr>
								<tr>
									<th>商家理由:</th>
									<td><?php echo $appeal['seller_cause'];?></td>
								</tr>
							<?php } ?>
						<?php } else { ?><!--买家会员-->
							<?php if($appeal['appeal_status'] == 0) { ?>
								<tr><td colspan="2" align="center">未作回应</td></tr>
							<?php } else { ?><!--商家回复时-->
								<tr>
									<th>商家凭证:</th>
									<td>
									<?php $n=1; if(is_array($appeal['seller_imgs_url'])) foreach($appeal['seller_imgs_url'] AS $k => $r) { ?>
										<a href="<?php echo $r;?>" target="_black"><img src="<?php echo $r;?>"></a>
									<?php $n++;}unset($n); ?>
									</td>
								</tr>
								<tr>
									<th>商家理由:</th>
									<td><?php echo $appeal['seller_cause'];?></td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				</form>
			</div>
			<div class="appeal-manage">
				<h2>管理员审核</h2>
				<table cellspacing="0">
					<tbody>
						<tr>
							<th>审核结果:</th>
							<td><?php echo $appealstatus[$appeal['appeal_status']];?></td>
						</tr>
						<?php if($appeal['appeal_status']==2) { ?>
							<tr>
								<th>审核时间:</th>
								<td><?php echo dgmdate($appeal['admin_time']);?></td>
							</tr>
							<tr>
								<th>管理员描述:</th>
								<td>
									<?php echo $appeal['admin_cause'];?>
								</td>
							</tr>
							<?php if($memberInfo['modelid']==1) { ?>
							<tr>
								<th>管理员操作:</th>
								<?php if($orderInfo['order_state']==2) { ?>
									<td><p class="ui-table-statusR" style="font-weight: bold;">请尽快去完成操作<a href='<?php echo U("Member/Order/manage");?>' style="color:blue;">  >>去修改订单号</a></p></td>
								<?php } elseif ($orderInfo['order_state']==6) { ?>
									<td><a href='<?php echo U("Member/Usercp/account_detail");?>' style="color:blue;">  >>去查看账户明细</a></td>
								<?php } ?>
							</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</td>
</tr>