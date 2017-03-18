<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><style type="text/css">
.ui-table {
    border: 1px solid #ccc;
    table-layout: fixed;
    width: 100%;
    font-size: 12px;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
.ui-table th {
    background-color: #cccccc;
    background-image: linear-gradient(#eaeaea, #eaeaea 25%, #cccccc);
    color: #4c4c4c;
    font-size: 12px;
    text-shadow: 0 1px 1px #fff;
}
.ui-table th, .ui-table td {
    text-align: center;
    vertical-align: middle;
}
.ui-table th {
    height: 35px;
}
.ui-table td {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color #ccc #ccc;
    border-image: none;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-style: none solid dotted;
    border-width: medium 1px 1px;
    padding: 12px 0;
    word-break: break-all;
    word-wrap: break-word;
}
.ui-table th, .ui-table td {
    text-align: center;
    vertical-align: middle;
}
</style>
<table class="ui-table">
	<colgroup><col span="1">
	<col style="width:60%">
	<col span="1">
			</colgroup><thead>
			<tr>
				<th>操作用户</th>
				<th>操作内容</th>
				<th>操作时间</th>
			</tr>
		</thead>
		<tbody>
        <?php if($result) { ?>
    		<?php $n=1;if(is_array($result)) foreach($result AS $r) { ?>
    			<tr>
    				<td><?php echo $r['nickname'];?></td>
    				<td><?php echo $r['msg'];?></td>
    				<td><?php echo date('Y-m-d H:i:s',$r[dateline]);?></td>
    			</tr>
    		<?php $n++;}unset($n); ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">暂无相关记录</td>               
            </tr>
        <?php } ?>
		</tbody>
		<tfoot>
	</tfoot>
</table>