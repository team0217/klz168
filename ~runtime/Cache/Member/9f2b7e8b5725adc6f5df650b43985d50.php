<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!-- 追加商品库存 -> 弹窗 --> 
<style>
.appeal-details{position: relative;width: 400px; height: 240px; overflow:auto; padding: 20px 25px;font-size: 12px;}
.appeal-details img{width: 80px;height: 80px;}
.appeal-details th{font-weight: normal; vertical-align: top; text-align: right; width: 70px; padding: 3px 15px 3px 0; line-height: 25px;}
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

/*表单验证*/
.onShow,.onFocus,.onError,.onCorrect,.onLoad,.onTime{display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline; vertical-align:middle;background:url(<?php echo IMG_PATH;?>msg_bg.png) no-repeat;	color:#444;line-height:18px;padding:2px 10px 2px 23px; margin-left:10px;_margin-left:5px}
.onShow{background-position:3px -147px;border-color:#40B3FF;color:#959595}
.onFocus{background-position:3px -147px;border-color:#40B3FF;}
.onError{background-position:3px -47px;border-color:#40B3FF; color:red}
.onCorrect{background-position:3px -247px;border-color:#40B3FF;}
.onLamp{background-position:3px -200px}
.onTime{background-position:3px -1356px}

/* 提交按钮 */
input.dialog {height: 0;height: 0;font-size: 0;line-height: 0;border: none;}
</style>
<script type="text/javascript" src="<?php echo JS_PATH;?>/content_addtop.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>/admin_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>/swfupload/swf2ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<tr>
<td class="aui_main" style="width: auto; height: auto;">
	<div class="aui_content" style="padding: 0px;">
		<div class="appeal-details">
			<div class="appeal-info">
				<h2>追加商品时间</h2>
				<form id="myform" method="post">
				<table cellspacing="0">
					<tbody>
							<tr>
							<th style="width:80px;">提示:</th>
							<td class="ui-table-statusB">
								<a href="javascript;" style="color:red;">追加商品时间默认为7天，点击即可重新自动上架</a>
							</td>
						</tr>
						<tr>
							<th style="width:80px;">商品名称:</th>
							<td class="ui-table-statusB">
								<a href="<?php echo $proInfo['url'];?>" target="_blank" style="color:blue;"><?php echo $proInfo['title'];?></a>
							</td>
						</tr>
						<tr>
							<th>活动类型:</th>
							<td><?php if($proInfo['mod']=='commission') { ?>闪电试用<?php } else { ?>免费试用<?php } ?></td>
						</tr>
						<tr>
							<th>活动时间:</th>
							<td><?php echo dgmdate($proInfo['start_time']);?> - <?php echo dgmdate($proInfo['end_time']);?></td>
						</tr>
						<tr>
							<th>当前总份数:</th>
							<td><?php echo $proInfo['goods_number'];?>份</td>
						</tr>
						<tr>
							<th>已试用:</th>
							<td><?php echo $proInfo['already_num'];?>份</td>
						</tr>						
						<tr>
							<th>下单价:</th>
							<td><?php echo $proInfo['goods_price'];?>元</td>
						</tr>
						
						
						<tr>
							<th>追加天数:</th>
							<td><input type="text" id="com_day" disabled="disabled" name="com_day" value="7" maxlength="5" size="5"/> 天</td>
						</tr>
						
					</tbody>
				</table>
				</form>
			</div>
		</div>
	</div>
</td>
</tr>
<script type="text/javascript">
/* 校验输入的值 */
$(function(){
    $.formValidator.initConfig({
        formid:"myform",
        autotip:true,
        onerror:function(msg,obj){
            $(obj).focus();
        }
    });
    $("#com_day").formValidator({
    	defaultvalue:'7',
        empty:false,
        onempty:'追加天数不能为空',
        onshow:'请输入追加天数' ,
        onfocus:"请输入追加天数" 
    }).regexValidator({
        regexp:'intege1',
        datatype:'enum',
        onerror:'请输入追加天数'
    }).defaultPassed();
   
})
</script>