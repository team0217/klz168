<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo get_seo('activity_seo','activity_title','');?></title>
<meta name="keywords" content="<?php echo get_seo('activity_seo','activity_keyword','');?>" />
<meta name="description" content="<?php echo get_seo('activity_seo','activity_description','');?>" /><link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/task.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
</head>

<body>
<div class="i_canvassBusinessOrdersIndex">
  <div class="s_top">
    <div class="ibody">
      <div class="L"><a href="<?php echo __APP__;?>"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" style="margin-top:25px;"/></a></div>
      <div class="R"> <a href="<?php echo __APP__;?>" class="sel">首页</a><a href="#join">活动报名</a><a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'trial'));?>">已报商品</a><a href="<?php echo U('document/Index/lists',array('catid'=>88));?>">联系我们</a> </div>
      <div class="clear"></div>
    </div>
    <!--ibody--> 
  </div>
  <!--s_top-->
  <div class="s_part1">
    <div class="ibody">
      <div class="co">
        <div class="p1">我们在线等待着您来咨询喔！</div>
        <div class="p2"> <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_complain_qq");?>&site=qq&menu=yes"><img src="<?php echo THEME_STYLE_PATH;?>style/images/a11.jpg" alt=""/></a> </div>
        <div class="p3"> 您还可以 </div>
        <div class="p2"> <a href="<?php echo U('Member/Index/userregister',array('modelid'=>2));?>" target="_blank"><img src="<?php echo THEME_STYLE_PATH;?>style/images/a12.jpg" alt=""/></a> </div>
        <div class="p3">咨询电话：<span><?php echo C('site_contact_tel');?></span></div>
      </div>
    </div>
    <!--ibody--> 
  </div>
  <!--s_part1-->
  <div class="s_part2">
    <div class="ibody">
      <div class="L"> 
        <span class="a1">招商公告</span> 
            <?php require_once('E:\WWW\klz168.com/Application/Announce\Taglib\announce.class.php');$announce_tag = new announce();if(method_exists($announce_tag, 'lists')) {$data = $announce_tag->lists(array('type'=>'2','order'=>'listorder','limit'=>'2',));} ?>
            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
       
         <a href="<?php echo U('Announce/Index/show',array('id'=>$d[announceid],'type'=>2));?>"><?php echo $d['title'];?><i><?php echo dgmdate($d['starttime']);?></a>

         <?php $n++;}unset($n); ?>
            
       </div>
      <div class="R"> <a href="<?php echo U('Announce/Index/lists',array('type'=>2));?>" target="_blank">更多>></a> </div>
      <div class="clear"></div>
    </div>
    <!--ibody--> 
  </div>
  <!--s_part2-->
  <div class="s_part3">
    <div class="ibody">
      <div class="p1">合作流程</div>
      <div class="p2"><img src="<?php echo THEME_STYLE_PATH;?>style/images/a14.jpg" alt=""/></div>
    </div>
    <!--ibody--> 
  </div>
  <!--s_part3-->
    <?php if(is_activity_open('rebate') == 1) { ?>
  <!-- <div class="s_part4">
    <div class="ibody">
      <div class="co">
        <div class="p1"><?php echo $act_name['rebate'];?></div>
        <div class="p2">活动时间:<?php echo $activityarr['rebate']['seller_start_time'];?>~<?php echo $activityarr['rebate']['seller_end_time'];?></div>
        <div class="p3"><?php echo $activityarr['rebate']['seller_activity_desc'];?></div>
        <div class="p4"> <a href="<?php echo U('Member/EnterActivity/detail_activity',array('mod'=>'rebate'));?>"  class="a1">马上报名</a>
          <a href="<?php echo U('Product/Index/lists',array('mod'=>'rebate'));?>" target="_blank" class="a2">查看展位</a> </div>
      </div> -->
      <!--co--> 
   <!--  </div> -->
    <!--ibody--> 
  <!-- </div> -->
    <?php } ?>


  <!--s_part4-->
  <?php if(is_activity_open('trial') == 1) { ?>
  <a name="join">
  <div class="s_part5">
    <div class="ibody">
      <div class="co">
        <div class="p1"><?php echo $act_name['trial'];?></div>
        <div class="p2">活动时间:<?php echo $activityarr['trial']['seller_start_time'];?>~<?php echo $activityarr['trial']['seller_end_time'];?></div>
        <div class="p3"><?php echo $activityarr['trial']['seller_activity_desc'];?></div>
        <div class="p4"> <a href="<?php echo U('Member/MerchantProduct/select_trial',array('mod'=>'trial'));?>"  class="a1">马上报名</a>
          <a href="<?php echo U('Product/Index/lists',array('mod'=>'trial'));?>" target="_blank" class="a2">查看展位</a> </div>
      </div>
      <!--co--> 
    </div>
    <!--ibody--> 
  </div>
</a>
  <?php } ?>



<?php if(is_activity_open('commission') == 1) { ?>
  <!--s_part5-->
  <div class="s_part6">
    <div class="ibody">
      <div class="co">
        <div class="p1"><?php echo $act_name['commission'];?></div>
        <div class="p2">活动时间:无限制</div>
        <div class="p3"><?php echo $activityarr['commission']['seller_activity_desc'];?></div>
        <div class="p4"> <a href="<?php echo U('Member/MerchantProduct/add',array('mod'=>'commission'));?>"  class="a1">马上报名</a>
          <a href="<?php echo U('Product/Index/lists',array('mod'=>'commission'));?>" target="_blank" class="a2">查看展位</a> </div>
      </div>
      <!--co--> 
    </div>
    <!--ibody--> 
  </div>
  <?php } ?>


<?php if(is_activity_open('task') == 1) { ?>

  <!--s_part6-->
  <div class="s_part7">
    <div class="ibody">
      <div class="co">
        <div class="p1">日赚任务</div>
        <div class="p2">活动时间:无限制</div>
        <div class="p3"><?php echo $activityarr['task']['task_content'];?></div>
        <div class="p4"> <a href="<?php echo U('Member/MerchantTask/task_add');?>"  class="a1">马上报名</a>
          <a href="<?php echo U('task/index/broke');?>"  target="_blank" class="a2">查看展位</a> </div>
      </div>
      <!--co--> 
    </div>
    <!--ibody--> 
  </div>
  <?php } ?>
  <!--s_part7-->
<?php if(is_activity_open('postal') == 1) { ?>
  <div class="s_part8">
    <div class="ibody">
      <div class="co">
        <div class="p1"><?php echo $act_name['postal'];?></div>
        <div class="p2">活动时间:<?php echo $activityarr['postal']['seller_start_time'];?>~<?php echo $activityarr['postal']['seller_end_time'];?></div>
        <div class="p3"><?php echo $activityarr['postal']['seller_activity_desc'];?></div>
        <div class="p4"> <a href="<?php echo U('Member/MerchantProduct/add',array('mod'=>'postal'));?>"  class="a1">马上报名</a>
          <a href="<?php echo U('Product/Index/lists',array('mod'=>'postal'));?>" target="_blank" class="a2">查看展位</a> </div>
      </div>
      <!--co--> 
    </div>
    <!--ibody--> 
  </div>
<?php } ?>

  <style>
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p1 .a2{ background:#8d7515; }
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p1 .a3{ background:#445715; }
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p1 .a4{ background:#744815; }
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p2 .a1{ background:#696969; }
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p2 .a2{ background:#3a3a3a; }
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p2 .a3{ background:#343434; }
    body .i_canvassBusinessOrdersIndex .s_part9 .hang3 .p2 .a4{ background:#343434; }
    .i_canvassBusinessOrdersIndex .s_part9{ background:#282828; }
  </style>
  <!--s_part8-->
  <div class="s_part9">
    <div class="ibody">
      <div class="hang1">商家入驻标准</div>
      <div class="hang2">
      <?php if(C('TRIAL_ISOPEN') == 1) { ?>
      <div class="btn sel"><?php echo C('TRIAL_NAME');?></div>
      <?php } ?>

       <?php if(C('REBATE_ISOPEN') == 1) { ?>
        <div class="btn "> <?php echo C('REBATE_NAME');?> </div>
       <?php } ?>

         <?php if(C('COMMISSION_ISOPEN') == 1) { ?>
        <div class="btn"><?php echo C('COMMISSION_NAME');?></div>
        <?php } ?>

      </div>

      <?php if(C('TRIAL_ISOPEN') == 1) { ?>

      <div class="hang3" >
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="p1">
          <tbody>
            <tr>
              <td  class="a1">专享权利</td>

              <td  class="a2"><?php echo $levels_1['name'];?></td>
              <td  class="a3"><?php echo $levels_2['name'];?></td>
              <td  class="a4"><?php echo $levels_3['name'];?></td>

            </tr>
          </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="p2">
          <tbody>
            <tr>
              <td  class="a1">收费方式</td>
              <td  class="a2"> 
                <?php if($levels_1['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_1['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_1['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_1['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_1['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

                  </td>
              <td  class="a3">

               <?php if($levels_2['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_2['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_2['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_2['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_2['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

              </td>
              <td  class="a4">
                <?php if($levels_3['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_3['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_3['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_3['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_3['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

              </td>
            </tr>

             <tr>
              <td  class="a1">参与活动</td>
              <td  class="a2"> <?php if($levels_1['trial']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
              <td  class="a3"><?php if($levels_2['trial']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
              <td  class="a4"><?php if($levels_3['trial']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">活动推广费</td>
              <td  class="a2"> 
                      <?php if($setting['seller_charge_money'] == 0) { ?>
                         <span>单份</span>
                         <?php echo $levels_1['trial']['cost']['product_cost'];?>
                        <span>/元</span>
                        <br>
                        <?php } ?>
                        <?php if($setting['seller_charge_money'] == 1) { ?>
                         <span>单场</span>
                         <?php echo $levels_1['trial']['cost']['activity_cost'];?>
                        <span>/元</span>
                        <?php } ?>
              </td>
              <td  class="a3">
                       <?php if($setting['seller_charge_money'] == 0) { ?>
                         <span>单份</span>
                         <?php echo $levels_2['trial']['cost']['product_cost'];?>
                        <span>/元</span>
                        <br>
                        <?php } ?>
                        <?php if($setting['seller_charge_money'] == 1) { ?>
                         <span>单场</span>
                         <?php echo $levels_2['trial']['cost']['activity_cost'];?>
                        <span>/元</span>
                        <?php } ?>
               </td>
              <td  class="a4">
                     <?php if($setting['seller_charge_money'] == 0) { ?>
                         <span>单份</span>
                         <?php echo $levels_3['trial']['cost']['product_cost'];?>
                        <span>/元</span>
                        <br>
                        <?php } ?>
                        <?php if($setting['seller_charge_money'] == 1) { ?>
                         <span>单场</span>
                         <?php echo $levels_3['trial']['cost']['activity_cost'];?>
                        <span>/元</span>
                        <?php } ?>
                </td>
            </tr>


             <tr>
              <td  class="a1">普通下单</td>
              <td  class="a2"> <?php if((in_array('1',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('1',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('1',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">搜索下单</td>
              <td  class="a2"><?php if((in_array('2',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('2',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('2',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">答案下单</td>
              <td  class="a2"><?php if((in_array('3',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('3',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('3',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>
             <tr>
              <td  class="a1">二维码下单</td>
              <td  class="a2"><?php if((in_array('4',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('4',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('4',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>
            
            <tr>
              <td  class="a1">报名活动天数</td>

              <td  class="a2"><?php echo $levels_1['trial']['activitydays'];?>/天</td>
              <td  class="a3"><?php echo $levels_2['trial']['activitydays'];?>/天</td>
              <td  class="a4"><?php echo $levels_3['trial']['activitydays'];?>/天</td>
            </tr>

             <tr>
              <td  class="a1">报名商品件数</td>

              <td  class="a2">
                <?php if(($levels_1['trial']['goods_number']['radio'] == 0) ) { ?>
                  不限
                  <?php } else { ?>
                  <?php echo $levels_1['trial']['goods_number']['min'];?>-<?php echo $levels_1['trial']['goods_number']['max'];?>
                  <span>件</span>
                  <?php } ?>
                        
                </td>
              <td  class="a2">
                <?php if(($levels_2['trial']['goods_number']['radio'] == 0) ) { ?>
                不限
                <?php } else { ?>
                <?php echo $levels_2['trial']['goods_number']['min'];?>-<?php echo $levels_2['trial']['goods_number']['max'];?>
                <span>件</span>
                <?php } ?>
                        

              </td>
              <td  class="a2">
                <?php if(($levels_3['trial']['goods_number']['radio'] == 0) ) { ?>
                  不限
                  <?php } else { ?>
                  <?php echo $levels_3['trial']['goods_number']['min'];?>-<?php echo $levels_3['trial']['goods_number']['max'];?>
                  <span>件</span>
                  <?php } ?>
                        
              </td>
            </tr>


             <tr>
              <td  class="a1">是否允许拍A发B</td>

              <td  class="a2">
                <?php if($levels_1['trial']['is_a_b'] == 1) { ?>
                否
                
                <?php } else { ?>
               是
                <?php } ?>
                            
              </td>
              <td  class="a3">
                <?php if($levels_2['trial']['is_a_b'] == 1) { ?>
                否
                
                <?php } else { ?>
               是
                <?php } ?>
                            
              </td>

               <td  class="a4">
                <?php if($levels_3['trial']['is_a_b'] == 1) { ?>
                否
                
                <?php } else { ?>
               是
                <?php } ?>
                            
              </td>
            </tr>

            <tr>
              <td  class="a1">拍A发B收费规则</td>

              <td  class="a2">
               <?php if($levels_1['trial']['is_a_b'] == 2) { ?>

                <?php if(($levels_1['trial']['a_b_cost'] == 1)) { ?>
                收费
                
                <?php } else { ?>
               免费
                <?php } ?>
                <?php } else { ?>
                --
                <?php } ?>


                            
              </td>
              <td  class="a3">
                 <?php if($levels_2['trial']['is_a_b'] == 2) { ?>

                <?php if(($levels_2['trial']['a_b_cost'] == 1)) { ?>
                收费
                
                <?php } else { ?>
               免费
                <?php } ?>
                <?php } else { ?>
                --
                <?php } ?>
                            
              </td>

               <td  class="a4">
                <?php if($levels_3['trial']['is_a_b'] == 2) { ?>

                <?php if(($levels_3['trial']['a_b_cost'] == 1)) { ?>
                收费
                
                <?php } else { ?>
               免费
                <?php } ?>
                <?php } else { ?>
                --
                <?php } ?>
                            
              </td>
            </tr>

             <tr>
              <td  class="a1">是否允许红包试用</td>

              <td  class="a2">
                <?php if(($levels_1['trial']['is_red'] == 1)) { ?>
                否
                
                <?php } else { ?>
               是
                <?php } ?>
                            
              </td>
              <td  class="a3">
                <?php if(($levels_2['trial']['is_red'] == 1)) { ?>
                否
                
                <?php } else { ?>
               是
                <?php } ?>
                            
              </td>

               <td  class="a4">
                <?php if(($levels_3['trial']['is_red'] == 1)) { ?>
                否
                
                <?php } else { ?>
               是
                <?php } ?>
                            
              </td>
            </tr>

             <tr>
              <td  class="a1">红包试用收费规则</td>

              <td  class="a2">
               <?php if($levels_1['trial']['is_red'] == 2) { ?>

                <?php if(($levels_1['trial']['red_cost'] == 1)) { ?>
                收费
                
                <?php } else { ?>
               免费
                <?php } ?>
                <?php } else { ?>
                --
                <?php } ?>


                            
              </td>
              <td  class="a3">
                <?php if($levels_2['trial']['is_red'] == 2) { ?>

                <?php if(($levels_2['trial']['red_cost'] == 1)) { ?>
                收费
                
                <?php } else { ?>
               免费
                <?php } ?>
                <?php } else { ?>
                --
                <?php } ?>
                            
              </td>

               <td  class="a4">
                 <?php if($levels_3['trial']['is_red'] == 2) { ?>

                <?php if(($levels_3['trial']['red_cost'] == 1)) { ?>
                收费
                
                <?php } else { ?>
               免费
                <?php } ?>
                <?php } else { ?>
                --
                <?php } ?>
                            
              </td>
            </tr>



             <tr>
              <td  class="a1">报名商品次数</td>

              <td  class="a2">
                <?php if(($levels_1['trial']['apply']['radio'] == 1)) { ?>
                <?php echo $levels_1['trial']['apply']['times'];?> 次
                
                <?php } else { ?>
                不限
                <?php } ?>
                            
              </td>
              <td  class="a3">
                <?php if(($levels_2['trial']['apply']['radio'] == 1)) { ?>
                <?php echo $levels_2['trial']['apply']['times'];?> 次
                
                <?php } else { ?>
                不限
                <?php } ?>
                            
              </td>

               <td  class="a4">
                <?php if(($levels_3['trial']['apply']['radio'] == 1)) { ?>
                <?php echo $levels_3['trial']['apply']['times'];?> 次
                
                <?php } else { ?>
                不限
                <?php } ?>
                            
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php } ?>


      <?php if(C('REBATE_ISOPEN') == 1) { ?>

      <!--hang2-->
      <div class="hang3 " style="display:none">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="p1">
          <tbody>
            <tr>
              <td  class="a1">专享权利</td>
              <td  class="a2"><?php echo $levels_1['name'];?></td>
              <td  class="a3"><?php echo $levels_2['name'];?></td>
              <td  class="a4"><?php echo $levels_3['name'];?></td>
            </tr>
          </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="p2">
          <tbody>
            <tr>
              <td  class="a1">收费方式</td>
              <td  class="a2"> 
                <?php if($levels_1['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_1['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_1['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_1['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_1['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

                  </td>
              <td  class="a3">

               <?php if($levels_2['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_2['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_2['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_2['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_2['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

              </td>
              <td  class="a4">
                <?php if($levels_3['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_3['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_3['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_3['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_3['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

              </td>
            </tr>



            <tr>
              <td  class="a1">参与活动</td>


              <td  class="a2"> <?php if($levels_1['rebate']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
              <td  class="a3"><?php if($levels_2['rebate']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
              <td  class="a4"><?php if($levels_3['rebate']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>


            </tr>



             <tr>
              <td  class="a1">活动服务费</td>
              <td  class="a2"> 
                <?php if($levels_1['rebate']['service'] >0) { ?>
                         <?php echo $levels_1['rebate']['service'];?>%
                        <span>服务费</span>
                        <?php } else { ?>
                         不收费
                        <?php } ?>
              </td>
              <td  class="a3">
               <?php if($levels_2['rebate']['service'] >0) { ?>
                         <?php echo $levels_2['rebate']['service'];?>%
                        <span>服务费</span>
                        <?php } else { ?>
                         不收费
                        <?php } ?>
               </td>
              <td  class="a4"> <?php if($levels_3['rebate']['service'] >0) { ?>
                         <?php echo $levels_3['rebate']['service'];?>%
                        <span>服务费</span>
                        <?php } else { ?>
                         不收费
                        <?php } ?>
                </td>
            </tr>

             <tr>
              <td  class="a1">普通下单</td>
              <td  class="a2"> <?php if((in_array('1',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('1',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('1',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">搜索下单</td>
              <td  class="a2"><?php if((in_array('2',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('2',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('2',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">答案下单</td>
              <td  class="a2"><?php if((in_array('3',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('3',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('3',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>
             <tr>
              <td  class="a1">二维码下单</td>
              <td  class="a2"><?php if((in_array('4',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('4',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('4',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">报名活动天数</td>

              <td  class="a2"><?php echo $levels_1['rebate']['activitydays'];?>/天</td>
              <td  class="a3"><?php echo $levels_2['rebate']['activitydays'];?>/天</td>
              <td  class="a4"><?php echo $levels_3['rebate']['activitydays'];?>/天</td>
            </tr>


            <tr>
              <td  class="a1">报名商品件数</td>

              <td  class="a2">
                <?php if(($levels_1['rebate']['goods_number']['radio'] == 0) ) { ?>
                  不限
                  <?php } else { ?>
                  <?php echo $levels_1['rebate']['goods_number']['min'];?>-<?php echo $levels_1['rebate']['goods_number']['max'];?>
                  <span>件</span>
                  <?php } ?>
                        
                </td>
              <td  class="a3">
                <?php if(($levels_2['rebate']['goods_number']['radio'] == 0) ) { ?>
                不限
                <?php } else { ?>
                <?php echo $levels_2['rebate']['goods_number']['min'];?>-<?php echo $levels_2['rebate']['goods_number']['max'];?>
                <span>件</span>
                <?php } ?>
                        

              </td>
              <td  class="a4">
                <?php if(($levels_3['rebate']['goods_number']['radio'] == 0) ) { ?>
                  不限
                  <?php } else { ?>
                  <?php echo $levels_3['rebate']['goods_number']['min'];?>-<?php echo $levels_3['rebate']['goods_number']['max'];?>
                  <span>件</span>
                  <?php } ?>
                        
              </td>
            </tr>


               <tr>
              <td  class="a1">报名商品次数</td>

              <td  class="a2">
                <?php if(($levels_1['rebate']['apply']['radio'] == 1)) { ?>
                <?php echo $levels_1['rebate']['apply']['times'];?> 次
                
                <?php } else { ?>
                不限
                <?php } ?>
                            
              </td>
              <td  class="a3">
                <?php if(($levels_2['rebate']['apply']['radio'] == 1)) { ?>
                <?php echo $levels_2['rebate']['apply']['times'];?> 次
                
                <?php } else { ?>
                不限
                <?php } ?>
                            
              </td>

               <td  class="a4">
                <?php if(($levels_3['rebate']['apply']['radio'] == 1)) { ?>
                <?php echo $levels_3['rebate']['apply']['times'];?> 次
                
                <?php } else { ?>
                不限
                <?php } ?>
                            
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <?php } ?>
      <!--hang3--> 

      <!--hang3--> 
      <?php if(C('COMMISSION_ISOPEN') == 1) { ?>
       <div class="hang3" style="display:none">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="p1">
          <tbody>
            <tr>
              <td  class="a1">专享权利</td>

              <td  class="a2"><?php echo $levels_1['name'];?></td>
              <td  class="a3"><?php echo $levels_2['name'];?></td>
              <td  class="a4"><?php echo $levels_3['name'];?></td>

            </tr>
          </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="p2">
          <tbody>
            <tr>
              <td  class="a1">收费方式</td>
              <td  class="a2"> 
                <?php if($levels_1['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_1['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_1['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_1['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_1['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

                  </td>
              <td  class="a3">

               <?php if($levels_2['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_2['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_2['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_2['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_2['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

              </td>
              <td  class="a4">
                <?php if($levels_3['pricetype'][1] == 0) { ?>
                    免费
                    <?php } else { ?>
                    <?php echo $levels_3['pricetype']['1'];?>/元
                <?php } ?>

                <?php if($levels_3['pricetype'][0] == 1) { ?>
                       一个月
                       <?php } elseif ($levels_3['pricetype'][0] == 2 ) { ?>
                      一季度
                       <?php } elseif ($levels_3['pricetype'][0] == 3) { ?>
                       一年
                <?php } ?>

              </td>
            </tr>

             <tr>
              <td  class="a1">参与活动</td>
              <td  class="a2"> <?php if($levels_1['commission']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
              <td  class="a3"><?php if($levels_2['commission']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
              <td  class="a4"><?php if($levels_3['commission']['isopen'] == 1) { ?>可参与<?php } else { ?>--<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">活动推广费</td>
              <td  class="a2"> 
                        <?php if($levels_1['commission']['cost'] == 0) { ?>
                        免费
                        <?php } ?>
                        
                        <?php if($levels_1['commission']['cost'] == 1) { ?>
                         收费
                       
                        <?php } ?>
              </td>
              <td  class="a3">
                        <?php if($levels_2['commission']['cost'] == 0) { ?>
                        免费
                        <?php } ?>
                        
                        <?php if($levels_2['commission']['cost'] == 1) { ?>
                         收费
                       
                        <?php } ?>
               </td>
              <td  class="a4">
                      <?php if($levels_3['commission']['cost'] == 0) { ?>
                        免费
                      <?php } ?>
                        
                        <?php if($levels_3['commission']['cost'] == 1) { ?>
                         收费
                       
                        <?php } ?>
                </td>
            </tr>


             <tr>
              <td  class="a1">普通下单</td>
              <td  class="a2"> <?php if((in_array('1',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('1',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('1',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">搜索下单</td>
              <td  class="a2"><?php if((in_array('2',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('2',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('2',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>

             <tr>
              <td  class="a1">答案下单</td>
              <td  class="a2"><?php if((in_array('3',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('3',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('3',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>
             <tr>
              <td  class="a1">二维码下单</td>
              <td  class="a2"><?php if((in_array('4',$levels_1['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a3"><?php if((in_array('4',$levels_2['ordertype']))) { ?>√<?php } ?></td>
              <td  class="a4"><?php if((in_array('4',$levels_3['ordertype']))) { ?>√<?php } ?></td>
            </tr>
            
            <tr>
              <td  class="a1">报名活动天数</td>

              <td  class="a2"><?php echo $levels_1['commission']['activitydays'];?>/天</td>
              <td  class="a3"><?php echo $levels_2['commission']['activitydays'];?>/天</td>
              <td  class="a4"><?php echo $levels_3['commission']['activitydays'];?>/天</td>
            </tr>

           
          </tbody>
        </table>
      </div>
      <?php } ?>


      <script type="text/javascript">


	  
    $(".i_canvassBusinessOrdersIndex .s_part9 .hang2 .btn").on("click", function(){
	  $(".i_canvassBusinessOrdersIndex .s_part9 .hang2 .btn").removeClass('sel'); 
	  $(this).addClass('sel'); 
	  $(".i_canvassBusinessOrdersIndex .s_part9 .hang3").hide(); 
	  $(".i_canvassBusinessOrdersIndex .s_part9 .hang3:eq("+ $(this).index()+")") .show(); 
	
	
    });
      
      
      </script>

      
    </div>
    <!--ibody--> 
  </div>
  <!--s_part9--> 
  
  
  
  
  
</div>
<!--i_canvassBusinessOrders-->
  <?php include template('footer','common'); ?>

</body>
</html>