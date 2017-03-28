<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>活动管理-商家个人中心-添加免费试用-<?php echo C('WEBNAME');?></title>
  <meta name="keywords" content="活动管理,商家个人中心,添加免费试用,<?php echo C('WEBNAME');?>" />
  <meta name="description" content="活动管理,商家个人中心,添加免费试用,<?php echo C('WEBNAME');?>" />
    <link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
  <link href="<?php echo THEME_STYLE_PATH;?>style/css/n_businessman.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

  <script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
  <script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
      <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/ajaxfileupload.js"></script>
          <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/activity.js"></script>



  <link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" />
  <script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>

  <style type="text/css">
   .onFocus,.onError,.onCorrect,.onLoad,.onTime{display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline; vertical-align:middle;background:url(<?php echo IMG_PATH;?>msg_bg.png) no-repeat; color:#444;line-height:18px;padding:2px 10px 2px 23px; margin-left:10px;_margin-left:5px}
    .onShow{background-position:3px -147px;border-color:#40B3FF;color:#959595}
    .onFocus{background-position:3px -147px;border-color:#40B3FF;}
    .onError{background-position:3px -47px;border-color:#40B3FF; color:red}
    .onCorrect{background-position:3px -247px;border-color:#40B3FF;}
    .onLamp{background-position:3px -200px}
    .onTime{background-position:3px -1356px}
    .aui_content ul li{font-size: 12px;}
  </style>

</head>

<body>
      <?php include template('v2_merchant_header','member/common'); ?>

  <div class="i_businessman">
    <!--s_nav-->
    <div class="ibody">
      <div class="s_weiz">
       当前位置：<a href="<?php echo __APP__;?>">首页</a> > <a href="<?php echo U('member/profile/index');?>">商家管理中心</a> > 填写试用信息
      </div>
      <!--s_weiz-->
      <?php include template('v2_merchant_left','member/common'); ?>
      <!--s_left-->
      <div class="s_right" >
        <div  class="title">发布试用</div>
        <div class="s_tryout5">
          <div class="part1">您发布的试用活动一旦系统审批，您将不能对此试用活动进行删除，只能修改关键词等信息，请慎重！</div>
          <div  class="part2">
            <div class="part">填写活动信息</div>
            <div class="jg3"></div>
            <div class="part sel">填写试用信息</div>
            <div class="jg1"></div>
            <div class="part">存入活动担保金</div>
            <div class="jg2"></div>
            <div class="part">发布结果</div>
          </div>
          <!--part2-->
          <div class="clear"></div>
          <div class="part3" >

            <form action="<?php echo U('Member/MerchantProduct/add');?>" name="myform" method="post" id="myform">
              <input type="hidden" name="info[type]" value="<?php if($new_ordertype == 'answer') { ?>ask<?php } else { ?><?php echo $new_ordertype;?><?php } ?>">
              <input type="hidden" name="info[trial_type]" value="<?php echo $trial_type;?>">

              <input type="hidden" name="info[source]" value="<?php echo $new_source;?>">
              <input type="hidden" name="mod" value="trial" />
              <input type="hidden" name="nojinlai" value="1" />
              <input type="hidden" name="info[goods_postage]" value="<?php echo $new_postal;?>" />
              <?php if($new_address) { ?>
              <input type="hidden" name="info[ctype]" value="<?php echo $new_address;?>">
              <?php } ?>

              <!--h1-->
              <div class="h1">
                <div class="L">
                  <span>*</span>
                  宝贝地址
                </div>
                <div class="R15 R1">
                  <label>
                    <input type="text" datatype='url' id="goods_url" value="请粘贴pc端宝贝地址" onclick="if(this.value=='请粘贴pc端宝贝地址'){this.value='';}" name="info[goods_url]" />
                  </label>
                </div>
                <div class="R7">
                  <a id="keyget" href="javascript:;" >一键获取</a>
                </div>
                <div class="clear"></div>
              </div>
                <script>
                    $("#keyget").click(function(){
                        var go_link = $("input:text[name='info[goods_url]']").val();
                        if(!go_link){
                            art.dialog({
                                lock: true,
                                fixed: true,
                                title: '错误提示',
                                content: '请输入地址',
                                ok: true
                            });
                            return false;
                        }

                        $.post('/index.php?m=Product&c=Api&a=go_link', {
                            go_link : go_link
                        }, function(ret) {
                           console.log(ret);
                            if(ret.status == 1) {

                                if(ret.title == ""){

                                  art.dialog({
                                      lock: true,
                                      fixed: true,
                                      icon: 'face-sad',
                                      title: '错误提示',
                                      content: '亲 一键获取失败 请手动发布<br/> 一键获取只支持大部分已加入淘宝课的淘宝商品',
                                      ok: true
                                  });

                                  return false;
                                }
                                $("input:text[name='info[title]']").val(ret.title);
                                $("input:text[name='info[keyword]']").val(ret.keyword);
                                $("input:text[name='info[goods_price]']").val(ret.goods_price);
                                $("input:text[name='info[goods_url]']").val(ret.url);

                                $("input[name='goods_albums_url[1]']").val(ret.img);
                                $("input[name='goods_albums_url[1]']").prev().attr("src",ret.img);
                            }else{
                                art.dialog({
                                    lock: true,
                                    fixed: true,
                                    icon: 'face-sad',
                                    title: '错误提示',
                                    content: ret.info,
                                    ok: true
                                });
                            }
                            return false;
                        }, 'JSON');
                    })
                </script>
              <!--h1-->

              <div class="h1">
                <div class="L">
                  <span>*</span>
                  活动标题
                </div>
                <div class="R1">
                  <input type="text"  name="info[title]" id="title" value="18个字以内" onclick="if(this.value=='18个字以内'){this.value='';}"  />
                </div>
                <div class="clear"></div>
              </div>
           

              <?php if($new_ordertype == 'answer') { ?>
                   <!--h1-->
                <div class="h1">
                  <div class="L"> <span>*</span> 请输入问题 </div>
                  <div class="R9 R1">
                    <input type="text" name="info[goods_rule][ask][question]">
                  </div>
                  <div class="clear"></div>
                </div>
                <!--h1-->
                    <div class="h1">
                  <div class="L"> <span>*</span> 请输入答案 </div>
                  <div class="R9 R1">
                    <input type="text" name="info[goods_rule][ask][answer]">
                  </div>
                  <div class="clear"></div>
                </div>
                <!--h1-->
                    <div class="h1">
                  <div class="L"> <span>*</span> 问题提示</div>
                  <div class="R9 R1">
                    <input type="text"  name="info[goods_rule][ask][tips]"   value="如第一页第二排左"  onclick="if(this.value=='如第一页第二排左'){this.value='';}"  >
                  </div>
                  <div class="clear"></div>
                </div>
          <!--h1-->
              <?php } ?>


              <?php if($new_ordertype == 'search') { ?>

                 <!--h1-->
              <div class="h1">
                <div class="L"> <span>*</span> 搜索关键字 </div>
                <div class="R9 R1">
                  <input type="text" name="info[goods_rule][keyword]"  />
                </div>
                <div class="clear"></div>
              </div>

                <div class="h1">
                <div class="L"> <span>*</span>搜索提示：</div>
                <div class="R9 R1">
                  <input type="text" name="info[goods_rule][keyword2]"  />
                </div>
                <div class="clear"></div>
              </div>
              <!--h1-->
              <div class="h1">
                <div class="L"> <span>*</span> 搜索排行要求 </div>
                <div class="R2 js_sort">
                 <span class="sel" data-id="综合">综合</span>
                 <span data-id="人气">人气</span>
                 <span data-id="销量">销量</span>
                 <span data-id="信用">信用</span>
                 <span data-id="最新">最新</span>
                 <span data-id="价格">价格</span> 
                 <input type="hidden" name="info[goods_rule][sort]" value="综合" id="sort">
               </div>
                <div class="clear"></div>
              </div>
              <!--h1-->
              <div class="h1">
                <div class="L"> <span>*</span> 是否需要收藏 </div>
                <div class="R2 js_collect"> 
                  <span class="sel" data-collect="1">是</span>
                  <span data-collect="0">否</span> 
                   <input type="hidden" name="info[goods_rule][collect]" value="0" id="collect">
                </div>
                <div class="clear"></div>
              </div>
              <!--h1-->
              <div class="h1">
                <div class="L"> <span>*</span> 关键词商品位置 </div>
                <div class="R9 R1">
                  <input type="text"  name="info[goods_rule][address]"   value="如第一页第二排左"  onclick="if(this.value=='如第一页第二排左'){this.value='';}"  />
                </div>
                <div class="clear"></div>
              </div>

              <script type="text/javascript">
                 $(".i_businessman  .s_tryout5 .part3 .h1 .R2 span").on("click", function(){
                       $(this).parent().find('span').removeClass('sel');
                       $(this).addClass('sel');
                      var sort = $('.js_sort > .sel').attr('data-id');
                      var collect = $('.js_collect > .sel').attr('data-collect');
                       $('#sort').val(sort);
                       $('#collect').val(collect);


                    });
                

                  </script>

              <?php } ?>

                  <script type="text/javascript">
                 $(".i_businessman  .s_tryout5 .part3 .h1 .js_tao span").on("click", function(){
                       $(this).parent().find('span').removeClass('sel');
                       $(this).addClass('sel');
                     
                      var taobao = $('.js_tao > .sel').attr('data-taobao');
                       $('#taobao').val(taobao);


                    });
                

                  </script>


              <?php if($new_ordertype == 'qrcode') { ?>

                 <!--h1-->
              <div class="h1 h2">
                <div class="L">
                  <span>*</span>
                  请上传二维码
                </div>
                <div class="R4">
                  <div class="a1">
                    <a href="javascript:;" ></a>
                  </div>
                  <div class="p2" >
                    <li  class="big_small_img float_left">
                      <span class="border_dddddd">
                        <img id="image" src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" width="100"  height="100" />
                        <input  id="file_upload"  name="Filedata" type="file" style="display:none;" onchange = "return ajaxFileUpload()"/>

                        <input type="hidden" id="file_url" name="info[goods_rule][qrcode]"  value=""/>
                      </span>
                    </li>
                  </div>
                </div>
                <div class="clear"></div>
              </div>
              <script type="text/javascript">
              $(document).ready(function(){
                $("#image").click(function (){
                  $("#file_upload").click();
                });
              });
                  function ajaxFileUpload(){
                      $.ajaxFileUpload ({
                         url:'<?php echo U('Member/MerchantProduct/code');?>',
                         secureuri:false,//是否启用安全提交
                         fileElementId:'file_upload',
                         dataType: 'json',
                         success: function (data){
                            $("#image").attr('src', data);

                           $('#file_url').val(data);
                         },
                         error:function(data){
           //                           console.log(data);
                           return false;
                         }
                       }) 
                       return false; 
                    }


              </script>

              <!--h1-->

              <?php } ?>






              <div class="h1">
                <div class="L">
                  <span>*</span>
                  产品类型
                </div>
                <div class="R3">
                  <?php echo $form::select_product_category("catid", 0);?></div>
                <div class="clear"></div>
              </div>

              <!--h1-->
              <div class="h1 h2">
                <div class="L">
                  <span>*</span>
                  宝贝主图
                </div>
                <input type="hidden" name="info[goods_albums]" value="1" />

                <div class="R4" id="goods_albums" >
                  <div class="a1">
                  </div>
                  <div class="p2" >
                    <li id="filePicker" class="big_small_img float_left">
                      <span class="border_dddddd">
                        <img id="imgurl" src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" />
                        <input type="hidden" name="goods_albums_url[1]" id="goods_albums_url" />
                        <input type="hidden" name="goods_albums_alt[1]" id="goods_albums_alt" />
                      </span>
                    </li>
                  </div>
                  <div class="p3">请上传实际赠送商品图片，如与实际不符将被退回</div>
                </div>
                <div class="clear"></div>
              </div>

              <!--h1-->
              <div class="h1">
                <div class="L">
                  <span>*</span>
                  下单价
                </div>
                <div class="R5 R1">
                  <input type="text" name="info[goods_price]"  id="goods_price"/>元
                </div>
                <?php if($new_red == 'red' && $activity_set['seller_bonus_isopen'] == 1) { ?>
                <div class="R6">&nbsp;&nbsp;&nbsp;加送红包：</div>
                <div class="R5 R1">
                  <input type="text"   name="info[goods_bonus]" id="field_goods_bonus" />
                </div>
                <div class="R6">&nbsp;元</div>

               
               <?php } ?>
                <div class="clear"></div>
              </div>

               <?php if($new_red == 'b' && $activity_set['seller_pat_isopen'] == 1) { ?>
                <div class="h1">
                <div class="L">
                  <span>*</span>
                  最终获的试用品
                </div>
                <div class="R10 R1">
                  <input type="text"  name="info[goods_tryproduct]" id="goods_tryproduct" />
                </div>
                <div class="R6"></div>
                <div class="clear"></div>
              </div>

              <?php } ?>

              <!--h1-->
              <div class="h1">
                <div class="L">
                  <span>*</span>
                  发放份数
                </div>
                <div class="R5 R1">
                  <input type="text"  name="info[goods_number]" style="float:left;" id="goods_number" />
                  <div class="R6">份</div>
                  <style type="text/css">
                    #goods_numberTip,
                    #activity_daysTip{ float:left; margin-top:10px; }

                  </style>
                </div>
                <div class="clear"></div>
              </div>

              <div class="h1">
                <div class="L">快速通道</div>
                <div class="R12">
                  <input type="checkbox" name="checkbox" id="check" value="1"/>
                  <input type="hidden" name="info[goods_vipfree]" value="0"  id="goods_vipfree">
                </div>
                <div class="R6">vip免审</div>
                <div class="R8">(vip买家可免审核 直接试用)&nbsp;</div>
                <div class="R12">
                  <input type="checkbox"  name="check_box" id="js_check"  value="1"/>
                  <input type="hidden" name="info[goods_point]" value="0"  id="goods_point">

                </div>
                <div class="R6">积分兑换</div>
                <div class="R8">（会员可用积分兑换资格 免审核资格）</div>
                <div class="clear"></div>
              </div>
           

              <!--h1-->
              <div class="h1">
                <div class="L">
                  <span>*</span>
                  活动时间
                </div>
                <div class="R10 R1">
                  <input type="text" style="float:left;" name="info[activity_days]" id="activity_days"/>
                  <div class="R6" >&nbsp;天</div>
                </div>
                <div class="clear"></div>
              </div>
              <!--h1-->

              <div class="h1">
                <div class="L">
                  <span>*</span>
                  掌柜旺旺
                </div>
                <div class="R9 R1">
                 <!--  <input type="text" name="info[goods_ww]" value="<?php echo $merchant['contact_want'];?>" /> -->
                 <select  name="info[goods_ww]" style="width: 125px;border: 1px solid #d7d7d7;height: 40px;line-height: 40px;padding-left: 10px;margin-right: 10px;">
                  <?php $n=1;if(is_array($store_info)) foreach($store_info AS $v) { ?>
                  <option value="<?php echo $v['contact_want'];?>"><?php echo $v['contact_want'];?></option>
                  <?php $n++;}unset($n); ?>
                </select>

                 &nbsp;&nbsp;&nbsp;<a href="/user/seller/profile/" target="_blank" style=" color:#309b00">添加旺旺号</a>
                    
                </div>
                <div class="clear"></div>
              </div>
              <!--h1-->

              <div class="h1 h2">
                <div class="L">
                  <span>*</span>
                  QQ
                </div>
                <div class="R11">
                  <div class="p1">
                    <input type="text"  name="info[goods_qq]" value="<?php echo $merchant['store_qq'];?>"/>
                  </div>
                  <div class="p2">为避免用户在旺旺上联系商家，请填写一个可以及时与店铺联系的QQ,方便用户联系[该QQ号不在前台活动中显示]</div>
                </div>
                <div class="clear"></div>
              </div>

              <!--h1-->                   
              <div class="h1">
                <div class="L">安全防护</div>
                <div class="R12">
                  <input type="checkbox"  name="js_join" value="1"  id="js_join" />
                      <input type="hidden" name="info[goods_tips][goods_order][is_join]"  value ="0" id="join"/>

                </div>
                <div class="R6">防重复参与</div>
                <div class="R8">(正在参与店铺其它活动,就不能参与本次)&nbsp;</div>
                <div class="R12">
                  <input type="checkbox" name="is_ip"  value ="1" id="join_ip"/>
                  <input type="hidden" name="info[goods_tips][goods_order][is_ip]"  value ="0" id="js_ip"/>
                </div>
                <div class="R6"> 防ip地址重复</div>
                <div class="R8">（同一ip买家只允许申请一次）</div>

                <div class="clear"></div>
              </div>

                    <div class="h1">
                      <div class="L">
                        特别注意：
                      </div>
                      <div class="R9 R1">
                       <input type="text" name="info[goods_tips][goods_order][remark]"/>
                      </div>
                      <div class="clear"></div>
                    </div>

                  <input type="hidden" name="info[goods_tips][goods_order][is_postal]" value="<?php echo $new_postal;?>">

                <div class="h1">
                <div class="L">拍下减价</div>
                   <div class="R12">
                  原价为：<input type="text" name="info[goods_tips][goods_order][price][cost]" style="width:50px;" />元，拍下后价格为：<input type="text" name="info[goods_tips][goods_order][price][after]" style="width:50px;" />元
                  </div>
                </div>
              <!--h1-->
              <div class="h1 h2">
                <div class="L">
                  <span>*</span>
                  活动说明
                </div>
                <div class="R13">
                  <li class="shop_soure set_line_height width_100 float_left w800">
                    <div style="width:652px;float:left;">
                      <textarea name="info[goods_content]" id="info[goods_content]"></textarea>
                      <?php echo $form::editor("info[goods_content]");?></div>
                  </li>
                </div>
                <div class="clear"></div>
              </div>

              <!--h1-->
              <div class="h1 h2">
                <div class="L">
                  <span>*</span>
                  增值服务
                </div>
                <div class="R14 js_shouquan">
                  <div class="p1">
                    <div class="iL sel" data-shen="1">授权代审</div>
                    <div class="iR">授权专员代审核买家试用资格,推广期免费服务！</div>
                    <div class="clear"></div>
                  </div>
                  <div class="p1">
                    <div class="iL" data-shen="0">不需要,我自己亲自来审核!</div>
                    <div class="clear"></div>
                  </div>

                    <input type="hidden" name="info[goods_impower]" value="1" id="impower">
                </div>
                <!--R14-->
                <div class="clear"></div>
              </div>
              <script type="text/javascript">
                       $(".js_shouquan .iL").on("click", function(){
                         $(this).parent().parent().find('.iL').removeClass('sel');
                         $(this).addClass('sel');
                         var shen = $('.js_shouquan .sel').attr('data-shen');
                          $('#impower').val(shen);
                         });

                      



              </script>
              <!--h1-->

              <div class="h3">
                <div class="L">
                  <input type="checkbox" checked="checked" />
                </div>
                <div class="R">
                  <a href="<?php echo U('document/Index/lists',array('catid'=>39));?>" target="_blank">试用活动违规处罚措施</a>
                </div>
                <div class="clear"></div>
              </div>

              <!--h3-->
              <div class="h4">
                <span class="a1" id="js_reset">重新填写</span>
                <input type="submit" class="submit" value="下一步">
<!--                 <span class="a2">下一步</span>
 -->              </div>
            </form>
          </div>
          <!--part3-->

    
        </div>
        <!--s_tryout3--> </div>
      <!--s_right-->

      <!--s_right-->
      <div class="clear"></div>
    </div>
  </div>
  <!--ibody-->
  <style type="text/css" media="screen">
    .i_businessman .s_tryout5 .part3 .h4 .submit {
    display: inline-block;
    width: 176px;
    text-align: center;
    height: 40px;
    line-height: 40px;
    background: #309b00;
    border-radius: 5px;
    color: #FFFFFF;
    font-size: 16px;
    cursor: pointer;
    }
  </style>

  <!--i_businessman-->

<script type="text/javascript"> 

$(document).ready(function(){

  linkage_catid.onChange(function() {
    var _cat_arr = this.getSelectedArr();
    $("#linkage_input_catid").attr("value", this.getSelectedValue());
    if(isNaN(parseInt(_cat_arr[_cat_arr.length - 1])) == true) {
      $("#linkage_input_catid").unFormValidator(false);//恢复校验
      $("#linkage_input_catidTip").attr('class', 'onError').text('请选择产品分类').show();
    } else {
      $("#linkage_input_catid").show().unFormValidator(true); //解除校验
    }
  });

   $("#js_reset").click(function(){
       history.back();
    });


    $('#check').click(function(){
    var check = $("[name='checkbox']:checked").val();
    if (check == 1) {
       $('#goods_vipfree').val(1);
     

    }else{
      $('#goods_vipfree').val(0);

    };
  });


    $('#js_check').click(function(){
    var checks = $("[name='check_box']:checked").val();
    if (checks == 1) {
       $('#goods_point').val(1);
     

    }else{
      $('#goods_point').val(0);

    };
  });

$('#js_join').click(function(){
      var is_join = "<?php echo $rebate['is_join'];?>";
      var name = "<?php echo $merchant_name;?>";
      if (parseInt(is_join) == 0) {
          art.dialog({
                  lock: true,
                  fixed: true,
                  title: '温馨提示',
                  content: '您目前是'+name+',不能参与该活动！需要更高的级别 ',
                  ok: true
              });
          $("[name='js_join']:checked").attr('disabled');
          return false;
      };
      var checks = $("[name='js_join']:checked").val();
      if (checks == 1) {
         $('#join').val(1);
       

      }else{
        $('#join').val(0);

      };
    }); 

$('#join_ip').click(function(){
      var is_ip = "<?php echo $rebate['is_ip'];?>";
      var name = "<?php echo $merchant_name;?>";
      if (parseInt(is_ip) == 0) {
          art.dialog({
                  lock: true,
                  fixed: true,
                  title: '温馨提示',
                  content: '您目前是'+name+',没有权限设置该活动项！',
                  ok: true
              });
          $("[name='is_ip']:checked").attr('disabled');
          return false;
      };
      var ip = $("[name='is_ip']:checked").val();
      if (ip == 1) {
         $('#js_ip').val(1);
       

      }else{
        $('#js_ip').val(0);

      };
    });
    


  $.formValidator.initConfig({
    formid:"myform",
    autotip:true,
    onerror:function(msg,obj){
      $(obj).focus();
    }
  });

/*最终试用商品*/
$("#field_goods_tryproduct").formValidator({
  empty:true,
  onshow:'请输入最终试用商品',
  onfocus:'请输入最终试用商品'
}).functionValidator({
  fun:function(val,elem){
    var re = new  RegExp("^\s*$/g");
    if(re.test(val) === false && $("input[name='info[goods_tryproduct]']:checked").val() == 1) {
      return '请输入最终试用商品';
    }
  }
}).regexValidator({
  regexp:'notempty',
  datatype:'enum',
  onerror:'请输入商品'
});
<?php if($new_red  == 'red') { ?>
var bonus_min =" <?php echo $bonus_price['min'];?>";
var bonus_max = "<?php echo $bonus_price['max'];?>";
/*每单赠送用户红包*/
$("#field_goods_bonus").formValidator({
  empty:false,
  //onempty:'不参与红包任务？',
  onshow:true,
  onfocus:'请输入赠送用户的红包,红包范围是'+bonus_min+'~'+bonus_max,
}).functionValidator({
  fun:function(val,elem){

    if(Number(val) < Number(bonus_min) || Number(val) > Number(bonus_max) ){
      return '赠送用户红包的范围是'+bonus_min+'~'+bonus_max;
    }else{
      return true;
    }
  }
}).regexValidator({
  regexp:'num',
  datatype:'enum',
  onerror:'用户红包只能为正数'
});
<?php } ?>

/*产品分类*/
$("#linkage_input_catid").formValidator({
  empty:false,
  onshow:true,
    onfocus: "请选择产品分类"
}).inputValidator({
    min: 1,
    onerror: "产品分类不能不选择"
}).regexValidator({
  regexp:'intege1',
  datatype:'enum',
  onerror:'请选择产品分类'
});

//商品件数判断
<?php if($goods_number['radio'] == 1) { ?>
  $("#goods_number").formValidator({

    onshow:true,
    onfocus:"请输入商品份数,范围<?php echo $goods_number['min'];?>~<?php echo $goods_number['max'];?>" 
  }).functionValidator({
    fun:function(val,elem){
      if(val < Number('<?php echo $goods_number['min'];?>') || val > Number('<?php echo $goods_number['max']?>')){
        return '请输入商品份数,范围<?php echo $goods_number['min'];?>~<?php echo $goods_number['max'];?>';
      }else{
        return true;
      }
    }
  }).regexValidator({
    regexp:'num1',
    datatype:'enum',
    onerror:'商品份数只能为正数'
  });
<?php } else { ?>
  $("#goods_number").formValidator({
    empty:false,
    onempty:'商品份数不能为空',
    onshow:true,
    onfocus:"请输入商品份数" 
  }).regexValidator({
    regexp:'decmal1',
    datatype:'enum',
    onerror:'商品份数只能为正数'
  });
<?php } ?>

$("#title").formValidator({
  empty:false,
  onshow:true ,
  onfocus:"请输入试用品名称,不能超过18个字呃 "
}).inputValidator({
  min:1,
  onerror:"输入试用品名称,"
});

console.log($("#title"));
//下单价 
<?php if($price_range['radio'] == 1) { ?>
  $("#goods_price").formValidator({
    empty:false,
    onshow:true,
    onfocus:"用户购买时的下单价,价格范围<?php echo $price_range['min']?>~<?php echo $price_range['max']?>" 
  }).functionValidator({
    fun:function(val,elem){
      if(val < Number('<?php echo $price_range['min'];?>') || val > Number('<?php echo $price_range['max']?>')){
        return '请输入价格,范围<?php echo $price_range['min'];?>~<?php echo $price_range['max'];?>';
      }else{
        return true;
      }
    }
  }).regexValidator({
    regexp:'decmal1',
    datatype:'enum',
    onerror:'下单价只能为正数'
  });
<?php } else { ?>
  $("#goods_price").formValidator({
    empty:false,
    onempty:'下单价不能为空',
    onshow:true ,
    onfocus:"请输入用户购买时的下单价" 
  }).regexValidator({
    regexp:'decmal1',
    datatype:'enum',
    onerror:'下单价只能为正数'
  });
<?php } ?>


/* 活动天数 */
var activitydays = <?php echo (int) $activitydays ?>;
$("#activity_days").formValidator({
  empty:false,
  onempty:'活动天数不能为空',
  onshow:true,
  onfocus:'请输入活动天数' 
}).functionValidator({
  fun:function(val,elem){
    if(activitydays > 0 && (val > activitydays || val < 1)){
      return '活动时间的范围是1~'+activitydays;
    }
    return true;
  }
}).regexValidator({
  regexp:'intege1',
  datatype:'enum',
  onerror:'活动天数只能为正整数'  
})

$("#goods_content").formValidator({
  onshow:true,
  onfocus:"内容不能为空"
}).functionValidator({
  fun:function(val,elem){
    var oEditor = CKEDITOR.instances.content;
    var data = oEditor.getData();
    if($('#islink').attr('checked')){
      return true;
    } else if(($('#islink').attr('checked')==false) && (data=='')){
      return "内容不能为空";
    } else if (data=='' || $.trim(data)=='') {
      return "内容不能为空";
    }
    return true;
  }
});

});
</script>

  <script type="text/javascript">

 var uploader = WebUploader.create({

    // 选完文件后，是否自动上传。
      auto:true,
      fileVal:'Filedata',
        // swf文件路径
        swf: '<?php echo JS_PATH;?>webuploader/webuploader.swf',
        // 文件接收服务端。
        server: "<?php echo U('Attachment/Attachment/swfupload');?>",
        // 选择文件的按钮。可选
        formData:{
          "module":"",
          "catid":"",
          "userid":"1",
          "dosubmit":"1",
          "thumb_width":"0",
          "thumb_height":"0",
          "watermark_enable":"1",
          "filetype_post":"jpg|jpeg|gif|png",
          "swf_auth_key":"57a39f6f7415ec2cdd2b8afd77b57c3f",
          "isadmin":"1",
          "groupid":"2"
        },
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick:'#goods_albums',
        accept:{
        title: '图片文件',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
        },
        thumb:{
          width: '110',
          height: '110'
        },
        chunked: false,
        chunkSize:1000000,
        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false
});

    uploader.onUploadSuccess = function( file, response ) {

      console.log(response._raw);
      var data = response._raw;
      var arr = data.split(',');
        $("#imgurl").attr('src', arr[1]);
        $('#goods_albums').parent('li').find('img').attr('src', arr[1]);
        //$('#goods_albums_url').attr('value', arr[1]);
          $('#goods_albums_url').val(arr[1]);
          $('#goods_albums_alt').val(arr[3]);

    }

    uploader.onUploadError = function(file, reason) {
      alert('文件上传错误：' + reason);
    }

</script>

</body>
    <?php include template('footer','common'); ?>