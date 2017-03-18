<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<?php include $this->admin_tpl('header', 'admin');?>
<script type="text/javascript" src="/static/js/dialog/jquery.artDialog.js?skin=default"></script>
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
                收入时间：
                <?php echo $form::date('start_time', $info[start_time])?>-
                <?php echo $form::date('end_time', $info[end_time])?>
                <?php echo $form::select($grouplist, $groupid, 'name="groupid"', L('member_group'))?>               
                <select name="p_type">
                    <option value='1' <?php if(isset($_GET['p_type']) && $_GET['p_type']==1){?>selected<?php }?>><?php echo '昵称';?></option>
                    <option value='2' <?php if(isset($_GET['p_type']) && $_GET['p_type']==2){?>selected<?php }?>><?php echo "会员Id"?></option>
                </select>               
                <input name="keyword" type="text" value="<?php if(isset($_GET['keyword'])) {echo $_GET['keyword'];}?>" class="input-text" />
                <input type="submit" name="search" class="button" value="<?php echo L('search')?>" />

                <button type="button" onclick="fresh_yeb_money()">更新生成所有用户的淘金呗数据</button>

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
            <th align="left"  width="8%">余宝额</th>
            <th align="left" width="8%">日期</th>
            <th align="left" width="8%">当天存入金额</th>
            <th align="left" width="8%" >当日利润比例</th>
            <th align="left"  width="8%">收益</th>
            <th align="left" >操作</th>
        </tr>
    </thead>
<tbody id="test">
<?php
    if(is_array($lists)){
     //print_r($lists);
    foreach($lists as $k=>$v) {
?>
    <tr>
       <td align="left"><?php echo $v['b_id']?></td>
        <td align="left"><a href="<?php echo U('Member/Member/memberinfo',array('userid'=>$v['b_uid']));?>"><?php echo $v['b_uid']?></a></td>
        <td align="left"><?php if($v['modelid'] == 1) {?>会员<?php }else{?>商家<?php }?></td>

        <td align="left"><?php echo $v['nickname'];?></td>
        <td align="left">￥<?php echo $v['b_money'];?></td>
        <td align="left"><?php echo $v['b_day'];?></td>
        <td align="left"><?php echo $v['b_add_money'];?></td>
        <td align="left">
            <?php echo $v['b_rate'];?>
        </td>
        <td align="left">
            <?php
                $money = bcmul($v['b_money'],$v['b_rate'],2);
                echo $money;
            ?> +
            <?php
                $add_money = bcmul($v['b_add_money'],$v['b_rate'],2);
                echo $add_money;
            ?> =
            <?php echo bcadd($money,$add_money,2);?>
        </td>
        <td align="left">
            <?php
                if($v['b_is_finish']==0){
            ?>
            <button type="button" onclick="set_yeb_money(<?=$v['b_id']?>,1)">确认收入</button>
            <button type="button" onclick="set_yeb_money(<?=$v['b_id']?>,2)">设定无效</button>
            <?php
                }
                else{
                       echo  $v['b_is_finish']==1?'确认收入,'.bcadd($money,$add_money,2):'无效收入';

                }
            ?>
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

    function set_yeb_money(id,type){
        var _type =  '确认！';
        var content = '确认淘金呗收益为'+(type==1?'有效':'<del class="red">无效</del>');
        var _icon = (type==1?'succeed':'error');

        var dialog = art.dialog({
            content: content ,
            fixed: true,
            id: 'Fm7',
            icon: _icon,
            okVal: '确认',
            title: _type,
            ok: function () {
                var postData = {
                    type:type,
                    id:id
                }
                $.post('<?php echo U('Pay/Setting/set_yeb_money') ?>&t='+ Math.random(), postData, function(data){
                    if(data.id==1001){
                        art.dialog({content: data.msg, lock: true});
                    }
                    else{
                        window.location.reload();
                    }
                },'json');
                return false;
            },
            lock: true,
            cancel: true
        });
    }


    function fresh_yeb_money(){
        var _type =  '确认！';
        var content = '更新生成所有用户的淘金呗数据';
        var _icon = 'succeed';

        var dialog = art.dialog({
            content: content ,
            fixed: true,
            id: 'Fm7',
            icon: _icon,
            okVal: '确认',
            title: _type,
            ok: function () {
                var postData = {};
                $.post('<?php echo U('Pay/Setting/fresh_yeb_money') ?>&t='+ Math.random(), postData, function(data){
                    if(data.id==1001){
                        art.dialog({content: data.msg, lock: true});
                    }
                    else{
                        window.location.reload();
                    }
                },'json');
                return false;
            },
            lock: true,
            cancel: true
        });
    }

</script>
</body>
</html>