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
</body>
</html>