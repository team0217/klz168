<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>"/>
    <meta name="description" content="<?php echo $SEO['description'];?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/lyz.calendar.css"/>
    <?php if($userinfo['modelid'] == 2) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css"/>

    <?php } ?>
    <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
    <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/lyz.calendar.min.js"></script>
    <style>
        .ft12{font-size: 12px}
    </style>
</head>
<body>
<script type="text/javascript">
    $(function () {
        $('#time_select_1').calendar({
            Week: false   // 新添加属性允许显示星期信息
        });
        $('#time_select_2').calendar({
            Week: false   // 新添加属性允许显示星期信息
        });
    });
</script>

<?php if($userinfo['modelid'] == 1) { ?>
<?php include template('v2_header','member/common'); ?>
<?php } else { ?>
<?php include template('v2_merchant_header','member/common'); ?>
<?php } ?>


<div id="content">
    <div class="wrap">
        <p class="hint-wz clear hint_wz_2">
            当前位置：
            <b>首页 > </b>
            <b>淘金呗</b>
        </p>
    </div>

    <div class="user_index_content wrap-and clear">

        <?php if($userinfo['modelid'] == 1) { ?>
        <?php include template('v2_member_left','member/common'); ?>
        <?php } else { ?>
        <?php include template('v2_merchant_left','member/common'); ?>

        <?php } ?>


        <div class="fr u_index_mess user_pd_1">
            <h2 class="user_page_title">
                淘金呗
                <small class="ft12">
                    今日收益率：<?php echo bcmul($rate,100,2);?>%
                    ，昨日收益：￥<?=$yesterday_yeb?>
                    ，预计今日收益：
                    ￥<?php
                        $yeb_money =  $this->userinfo['yeb_money'];
                            echo bcmul($yeb_money,$rate,2);
                    ?>
                </small>
            </h2>

            <p class="wd_jf_dh">
                淘金呗余额
                <span class="cc">
                    <b><?php echo $this->userinfo['yeb_money'];?></b>元
                </span>

                帐户余额
                <span class="cc">
                    <b><?php echo $this->userinfo['money'];?></b>元
                </span>


                <a href="javascript:;" onclick="change_money(1,<?php echo $this->userinfo['money'];?>)" style="margin:0;background:#309b00;">转入</a>
                <a href="javascript:;" onclick="change_money(2,<?php echo $this->userinfo['yeb_money'];?>)">转出</a>
            </p>

            <div class="user_zh_time clear fl">
                <form method="get">
                    <input type="hidden" name="m" value="Member"/>
                    <input type="hidden" name="c" value="Yeb"/>
                    <input type="hidden" name="a" value="index"/>

                    <div class="user_zh_begin_time fl clear">
                        <p class="fl">起始时间：</p>

                        <div class="fl">
                            <input type="text" id="time_select_1" class="time_select" name="start_time"
                                   value="<?php echo $_GET['start_time'];?>"/>
                        </div>
                    </div>
                    <p class="fl"
                       style="width:10px; height:1px; background:#e9e9e9;margin-top:15px; margin-right:10px;"></p>

                    <div class="user_zh_begin_time fl clear">
                        <div class="fl">
                            <input type="text" id="time_select_2" class="time_select" name="end_time"
                                   value="<?php echo $_GET['end_time'];?>"/>
                        </div>
                    </div>
                    <input type="submit" class="fl re_btn" value="搜索">

                </form>
            </div>

            <table class="jf_tab jf_tab_2" width="100%">
                <thead>
                <tr>
                    <th>创建时间</th>
                    <th>收入</th>
                    <th>支出</th>
                    <th>余额</th>
                    <th>名称/备注</th>
                </tr>
                </thead>
                <tbody class="border_none">
                <?php $n=1;if(is_array($account)) foreach($account AS $v) { ?>

                <tr>
                    <td class="c_3" width="20%"><?php echo dgmdate($v['dateline'],'Y年m月d日'); ?><span
                            class="time"><?php echo dgmdate($v['dateline'],'H:i'); ?></span></td>
                    <td class="jia" width="10%"><?php if($v[num] > 0) { ?><?php echo $v['num'];?><?php } else { ?>--<?php } ?></td>
                    <td class="jian" width="10%"><?php if($v[num] < 0) { ?><?php echo $v['num'];?><?php } else { ?>--<?php } ?></td>
                    <td class="c_3" width="10%"> <?php echo $v['total_money'];?></td>
                    <td class="c_3" title="<?php echo $v['cause'];?>"><?php echo str_cut($v[cause],90);?></td>
                </tr>
                <?php $n++;}unset($n); ?>


                </tbody>
            </table>
            <div id="page" class="mt30 clear" style="margin-top:20px;">
                <?php echo $v2_pages;?>
            </div>
        </div>
    </div>

</div>

<?php include template('footer','common'); ?>
<script>
    function change_money(type,money){
        var _type = type==1 ? '将余额转入淘金呗':'将淘金呗转出到余额';
        var _type_t = type==1 ? '余额':'淘金呗';
        var dialog = art.dialog({
            content: ''
                    + '<p>金额：<input id="set_money" style="width:100px; padding:4px;font-size: 12px" /></p>' +
                    '<p class="grey" style="font-size: 12px;color: #999">' +
                    '   <small >当前'+_type_t+'：<span style="color: red">￥'+money+'</span></small>' +
                    '   <span style="cursor: pointer;color:#4da1ff;text-decoration: underline" onclick="set_all('+money+')">全部</span>' +
                    '</p>'
            ,
            fixed: true,
            id: 'Fm7',
            icon: 'succeed',
            okVal: '确认',
            title: _type,
            ok: function () {
                var _set_money = $.trim($('#set_money').val());
                if(_set_money<=0){
                    art.dialog({content: '请填写金额！', lock: true});
                    return false;
                }
                var postData = {
                    type:type,
                    money:_set_money
                }
                $.post('<?php echo U('Member/Yeb/toYeb');?>&t='+ Math.random(), postData, function(data){
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
    function set_all(money){
        $('#set_money').val(money);
    }
</script>

</body>
</html>