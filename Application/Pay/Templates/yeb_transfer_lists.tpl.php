<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<?php include $this->admin_tpl('header', 'admin');?>
<div class="pad-lr-10">
<!-- 后台待审核提现模板 -->
<form action="<?php echo __APP__;?>" method="get">
<input type="hidden" value="<?php echo MODULE_NAME; ?>" name="m">
<input type="hidden" value="<?php echo CONTROLLER_NAME; ?>" name="c">
<input type="hidden" value="<?php echo ACTION_NAME; ?>" name="a">
<input type="hidden" value="<?php echo MENUID; ?>" name="menuid">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
        <tr>
        <td>
        <div class="explain-col">  
        	<input type="hidden" name="status" value="<?php echo $status;?>" />
        		方式：
        		<select name="type">
        			<option value="1"  <?php if ($type == 1){?>selected<?php }?>>转入淘金呗</option>
        			<option value="2"  <?php if ($type == 2){?>selected<?php }?>>转出淘金呗</option>
        		</select>             
                操作时间：
                <?php echo $form::date('start_time', date('Y-m-d',$info[start_time]))?>-
                <?php echo $form::date('end_time', date('Y-m-d',$info[end_time]))?>
                <?php echo $form::select($grouplist, $groupid, 'name="groupid"', L('member_group'))?>               
                <select name="p_type">
                    <option value='1' <?php if(isset($_GET['p_type']) && $_GET['p_type']==1){?>selected<?php }?>><?php echo '昵称';?></option>
                    <option value='2' <?php if(isset($_GET['p_type']) && $_GET['p_type']==2){?>selected<?php }?>><?php echo "会员Id"?></option>
                </select>               
                <input name="keyword" type="text" value="<?php if(isset($_GET['keyword'])) {echo $_GET['keyword'];}?>" class="input-text" />
                <input type="submit" name="search" class="button" value="<?php echo L('search')?>" />
    </div>
        </td>
        </tr>
    </tbody>
</table>
</form>

<form name="myform" action="<?php echo U('delete');?>" method="post">
<div class="table-list">
<table width="100%" cellspacing="0">
    <thead>
        <tr>
            <th align="left" width="3%">ID</th>
            <th align="left" width="3%">userid</th>
            <th align="left" width="4%">会员类型</th>

            <th align="left" width="5%">用户人姓名</th>
            <th align="left">总额</th>
            <th align="left" width="8%">时间</th>
            <th align="left" >描述</th>
        </tr>
    </thead>
<tbody id="test">
<?php
    if(is_array($lists)){
        //print_r($lists);
    foreach($lists as $k=>$v) {
?>
    <tr>
       <td align="left"><?php echo $v['id']?></td>
        <td align="left"><a href="<?php echo U('Member/Member/memberinfo',array('userid'=>$v['userid']));?>"><?php echo $v['userid']?></a></td>
        <td align="left"><?php if($v['modelid'] == 1) {?>会员<?php }else{?>商家<?php }?></td>

        <td align="left"><?php echo $v['nickname'];?></td>
        <td align="left">￥<?php echo $v['num'];?></td>
        <td align="left"><?php echo dgmdate($v['dateline'], 'Y/m/d H:i');?></td>
        <td align="left">
            <?php echo $v['cause'];?>
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
$(function(){
	$("#test>tr").each(function(){
		$(this).children('td').eq(-1).find('#msg').blur(function(){
			var _this = $(this).val();
			var id = $(this).parents().find('#cashid').val();
			if(_this != ''){
				$.ajax({
					url:'<?php echo U('Member/Deposite/message');?>',
					type:'post',
					dataType:'json',
					data:{'msg':_this,'id':id},
					success:function(data){
						if(data.status == 1){
							alert(data.info);
						}
					}
				});
			}else{
				alert('请填写备注信息');
			}
		});
	});
});
function edit(obj, name) {
    window.top.art.dialog({id:'edit'}).close();
    window.top.art.dialog({title:'<?php echo L('edit').L('member')?>《'+name+'》',id:'edit',iframe:obj.href,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function member_infomation(userid) {
    window.top.art.dialog({id:'modelinfo'}).close();
    window.top.art.dialog({title:'<?php echo L('memberinfo')?>',id:'modelinfo',iframe:'?m=Member&c=Member&a=memberinfo&userid='+userid,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'modelinfo'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'modelinfo'}).close()});
}

function uncheck(obj, name){
	window.top.art.dialog({
        id:'uncheck'
    }).close();
	window.top.art.dialog({
        title:'审核提现',
        id:'uncheck',
        iframe:obj.href,
        width:'400',
        height:'150'}, 
        function(){
            var d = window.top.art.dialog({id:'uncheck'}).data.iframe;
            d.document.getElementById('dosubmit').click();
            return false;
        }, function(){
            window.top.art.dialog({
                id:'uncheck'
            }).close()
        });
}

function check(obj, name){
    window.top.art.dialog({
        id:'check'
    }).close();
    window.top.art.dialog({
        title:'审核提现',
        id:'check',
        iframe:obj.href,
        width:'400',
        height:'150'
       },
        function(){
            var d = window.top.art.dialog({id:'check'}).data.iframe;
            d.document.getElementById('dosubmit').click();
            return false;
        },function(){
            window.top.art.dialog({
                id:'check'
            }).close()
        });
}
</script>
</body>
</html>