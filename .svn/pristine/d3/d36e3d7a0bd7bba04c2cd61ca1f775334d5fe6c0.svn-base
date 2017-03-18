<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_header = True;
include $this->admin_tpl('header','admin');?>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript">
$(function(){
    SwapTab('setting','on','',2, 'quick');
})
function SwapTab(name,cls_show,cls_hide,cnt,cur) {
    $('div.contentList').hide();
    $('ul.tabBut > li').attr('class', cls_hide);
    $('#div_'+name+'_'+cur).show();
    $('#tab_'+name+'_'+cur).attr('class',cls_show);
}
</script>
<form action="<?php echo U('update_yeb');?>" method="post" id="myform">
<div class="pad-10">
    <div class="col-tab">
        <ul class="tabBut cu-li">
            <li id="tab_setting_quick" <?php if ($this->type == 'quick'): ?>class="on"<?php endif ?> onclick="SwapTab('setting','on','',2, 'quick');"><?php echo L('淘金呗设置')?></li>
        </ul>
        <!-- 商家设置 -->
        <div id="div_setting_quick" class="contentList pad-10">
        <table width="100%"  class="table_form">

            <tr>
                <th width="150"><?php echo L('是否开启')?></th>
                <td class="y-bg">
                    <label><input type="radio" class="input-text" name="setting[is_open]" value="1" <?php if($is_open==1){?>checked<?php }?>/>是</label>&nbsp;&nbsp;
                    <label><input type="radio" class="input-text" name="setting[is_open]" value="2"  <?php if($is_open==2){?>checked<?php }?>/>否</label>
                </td>
            </tr>
            <tr>
                <th><?php echo L('当天利率')?></th>
                <td class="y-bg">
                    <input type="text" class="input-text" name="setting[rate]" value="<?php echo $rate;?>" />&nbsp;例如：0.0004=万分之4，一万块收入4块。请不要随便修改此数字，可能会造成系统无法计算！
                </td>
            </tr>


        </table>
        </div>
        <div class="bk15"></div>
        <input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="button">
    </div>
</div>
</form>
</body>
<script type="text/javascript">
// 表单校验
$(function(){
    $.formValidator.initConfig({
        formid:"myform",
        autotip:true,
        onerror:function(msg,obj){
            $(obj).focus();
        }
    });

})
</script>
</html>