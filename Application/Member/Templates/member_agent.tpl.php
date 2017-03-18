<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<?php include $this->admin_tpl('header', 'admin');?>
<div class="pad-lr-10">
<form action="<?php echo __APP__;?>" method="get" name="searchform">
<input type="hidden" value="<?php echo MODULE_NAME; ?>" name="m">
<input type="hidden" value="<?php echo CONTROLLER_NAME; ?>" name="c">
<input type="hidden" value="<?php echo ACTION_NAME; ?>" name="a">
<input type="hidden" value="<?php echo MENUID; ?>" name="menuid">
<input type="hidden" value="<?php echo $t; ?>" name="modelid">
<input type="hidden" value="<?php echo $t; ?>" name="t">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td>
		<div class="explain-col">								
				<select name="type">
					<option value='3' <?php if(isset($_GET['type']) && $_GET['type']==3){?>selected<?php }?>><?php echo L('email')?></option>
					<option value='4' <?php if(isset($_GET['type']) && $_GET['type']==4){?>selected<?php }?>><?php echo L('regip')?></option>
					<option value='5' <?php if(isset($_GET['type']) && $_GET['type']==5){?>selected<?php }?>><?php echo L('nickname')?></option>
					<option value='6' <?php if(isset($_GET['type']) && $_GET['type']==6){?>selected<?php }?>>手机号</option>
				    <option value='7' <?php if(isset($_GET['type']) && $_GET['type']==7){?>selected<?php }?>>用户id</option>

				</select>				
				<input name="keyword" type="text" value="<?php if(isset($_GET['keyword'])) {echo $_GET['keyword'];}?>" class="input-text" />
				<input type="submit" name="search" class="button" value="<?php echo L('search')?>" />
	</div>
		</td>
		</tr>
    </tbody>
</table>
</form>

<form name="myform" action="<?php echo U('delete');?>" method="post" onsubmit="checkuid();return false;">
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th align="center" width="30">UID</th>
			<th align="left" width="60"><?php echo '会员等级';?></th>
			<th align="left"><?php echo L('nickname')?></th>
			<th align="left"><?php echo '手机';?></th>
			<th align="left"><?php echo L('email')?></th>
			<th align="left"><?php echo '推荐人id';?></th>
			<th align="left"><?php echo '参与活动次数';?></th>
			<th align="left"><?php echo '可用金额';?></th>
			<th align="left"><?php echo '淘金呗';?></th>
			<th align="left"><?php echo '可用积分'?></th>
			<th align="left" width="70"><?php echo '注册时间'?></th>
			<th align="left" ><?php echo '登录次数';?></th>
			<th align="left" width="70"><?php echo '最近登录';?></th>
			<th align="left"><?php echo L('operation')?></th>
		</tr>
	</thead>
<tbody>
<?php
	if(is_array($memberlist)){
	foreach($memberlist as $k=>$v) {
	    $nickname=$v['nickname'];
?>
    <tr>
		<!-- <td align="left"><?php if($v['islock']) {?><img title="<?php echo L('lock')?>" src="<?php echo IMG_PATH?>icon/icon_padlock.gif"><?php }?></td> -->
		<td align="left"><?php echo $v['userid']?></td>
		<td align="left"><?php echo member_group_name($v['userid'])?></td>
		<td align="left"><?php if(empty($v['nickname'])) {echo '-';}else{echo $v['nickname'];}?></td>
		<td align="left"><?php echo $v['phone']?></td>
		<td align="left"><?php echo $v['email']?></td>
		<td align="left"><?php if(empty($v['agent_id'])) {echo '-';}else{echo nickname($v['agent_id'],1);}?></td>
		<td align="left"><?php echo $v['success_order_count'].'/'.$v['order_count'];?></td>
		<td align="left">￥<?php echo $v['money']?></td>
		<td align="left">￥<?php echo $v['yeb_money']?></td>
		<td align="left"><?php echo $v['point']?></td>
		<td align="left"><?php echo dgmdate($v['regdate'], 'Y-m-d');?></td>
		<td align="left"><?php echo $v['loginnum'] ?></td>
		<td align="left"><?php echo dgmdate($v['lastdate'], 'Y-m-d');?></td>
		<td align="left">
			<a href="<?php echo U('Member/Member/memberinfo',array('userid'=>$v['userid']));?>" >[<?php echo '查看';?>]</a> |
			<a href="<?php echo U('edit', array('userid' => $v['userid'])) ?>" onclick="javascript:edit(this, '<?php echo $v['username']?>');return false;">[<?php echo L('edit')?>]</a> |
			<?php if($t== 1){?>
			<a href="<?php echo U('aword', array('userid' => $v['userid'])) ?>" onclick="javascript:aword(this, '<?php echo $v['username']?>');return false;">[<?php echo '奖励';?>]</a> |
			<?php }?>
			
			<?php if($v['islock'] == 1){?>
			<a href="<?php echo U('unlock', array('userid' => $v['userid'])) ?>" >[<?php echo '解锁';?>]</a> |
			<?php }else{?>
			<a href="<?php echo U('lock', array('userid' => $v['userid'])) ?>" onclick="javascript:lock(this,'<?php echo $v['nickname']?>');return false;">[<?php echo '冻结';?>]</a> |
			<?php }?>
			<a href="<?php echo U('detail', array('userid' => $v['userid'])) ?>">[<?php echo '账户明细';?>]</a>
		</td>
    </tr>
<?php
	}
}
?>
</tbody>
</table>

<div style="padding:20px 0 10px 0;">
    <div class="ib-a blue line-x">会员<span style="color:#ff0000;"><?php echo $nickname;?></span>共有合伙人<span style="color:#ff0000;"><?php echo $agentCount[1]['count']+$agentCount[2]['count']+$agentCount[3]['count'];?></span>人  &nbsp;&nbsp;1级合伙人共<span style="color:#ff0000;"><?php if(empty($agentCount[1]['count'])) {echo 0;}else{echo $agentCount[1]['count'];}?></span>人   &nbsp;&nbsp;2级合伙人共<span style="color:#ff0000;"><?php if(empty($agentCount[2]['count'])) {echo 0;}else{echo $agentCount[2]['count'];}?></span>人    &nbsp;&nbsp;3级合伙人共<span style="color:#ff0000;"><?php if(empty($agentCount[3]['count'])) {echo 0;}else{echo $agentCount[3]['count'];}?></span>人</div>
</div>

<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th align="center">UID</th>
			<th align="center"><?php echo '会员等级';?></th>
			<th align="center"><?php echo L('nickname')?></th>
			<th align="center"><?php echo '手机';?></th>
			<th align="center"><?php echo '合伙人级别';?></th>
			<th align="center"><?php echo '参与活动次数';?></th>
			<th align="center"><?php echo '注册时间'?></th>
			<th align="center"><?php echo '最近登录';?></th>
			<th align="center"><?php echo L('operation')?></th>
		</tr>
	</thead>
<tbody>
<?php  
	if(is_array($pagedata)){
	foreach($pagedata as $k=>$a) {
?>
    <tr>
		<td align="center"><?php echo $a['userid']?></td>
		<td align="center"><?php echo member_group_name($a['userid'])?></td>
		<td align="center"><?php if(empty($a['nickname'])) {echo '-';}else{echo $a['nickname'];}?></td>
		<td align="center"><?php echo $a['phone']?></td>
		<td align="center"><?php echo $a['level']?></td>
		<td align="center"><?php echo $a['success_order_count'].'/'.$a['order_count'];?></td>
		<td align="center"><?php echo dgmdate($a['regdate'], 'Y-m-d');?></td>
		<td align="center"><?php echo dgmdate($a['lastdate'], 'Y-m-d');?></td>
		<td align="center">
			<a href="<?php echo U('Member/Member/memberinfo',array('userid'=>$a['userid']));?>" >[<?php echo '查看';?>]</a> |
			<a href="<?php echo U('edit', array('userid' => $a['userid'])) ?>" onclick="javascript:edit(this, '<?php echo $a['username']?>');return false;">[<?php echo L('edit')?>]</a> |
			<?php if($t== 1){?>
			<a href="<?php echo U('aword', array('userid' => $a['userid'])) ?>" onclick="javascript:aword(this, '<?php echo $a['username']?>');return false;">[<?php echo '奖励';?>]</a> |
			<?php }?>
			
			<?php if($a['islock'] == 1){?>
			<a href="<?php echo U('unlock', array('userid' => $a['userid'])) ?>" >[<?php echo '解锁';?>]</a> |
			<?php }else{?>
			<a href="<?php echo U('lock', array('userid' => $a['userid'])) ?>" onclick="javascript:lock(this,'<?php echo $a['nickname']?>');return false;">[<?php echo '冻结';?>]</a> |
			<?php }?>
			<a href="<?php echo U('detail', array('userid' => $a['userid'])) ?>">[<?php echo '账户明细';?>]</a>
		</td>
    </tr>
<?php
	}
}
?>
</tbody>
</table>

<div id="pages"><?php echo $pages?></div>
</div>
</form>
</div>
<script type="text/javascript">
<!--
function edit(obj, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit').L('member')?>《'+name+'》',id:'edit',iframe:obj.href,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}

function lock(obj, name){
	window.top.art.dialog({id:'lock'}).close();
	window.top.art.dialog({title:'<?php echo L('lock').'会员'?>《'+name+'》',id:'lock',iframe:obj.href,width:'400',height:'150'}, function(){var d = window.top.art.dialog({id:'lock'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'lock'}).close()});
}
function checkuid() {
	var ids='';
	$("input[name='userid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:'<?php echo L('plsease_select').L('member')?>',lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	} else {
		myform.submit();
	}
}
function member_infomation(userid) {
	window.top.art.dialog({id:'modelinfo'}).close();
	window.top.art.dialog({title:'<?php echo L('memberinfo')?>',id:'modelinfo',iframe:'?m=Member&c=Member&a=memberinfo&userid='+userid,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'modelinfo'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'modelinfo'}).close()});
}

function aword(obj ,name){
	window.top.art.dialog({id:'aword'}).close();
	window.top.art.dialog({title:'<?php echo L('aword').L('member')?>《'+name+'》',id:'aword',iframe:obj.href,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'aword'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'aword'}).close()});
}
//-->
</script>
</body>
</html>