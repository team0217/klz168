<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		 <title>商家个人中心-<?php echo C('WEBNAME');?></title>
  	  <meta name="keywords" content="商家个人中心,<?php echo C('WEBNAME');?>" />
        <meta name="description" content="商家个人中心,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />

		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="/static/js/dialog/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src="/static/js/dialog/plugins/iframeTools.js"></script>
	</head>
	<body>
		<style type="text/css">
		.user_i_mess_c .yhtx .img{ height:166px; }
		.user_i_mess_c .yhtx .img img{ width:166px; min-height:166px; }
		.cf {font-size: 20px;color: #309b00;font-weight:bold}
		.ce {font-size: 16px;color: #FF6C00;font-weight:bold}
		.cg {font-size: 16px;color:#888}
		.operate-log {
		max-width: 520px;
		_width: 520px;
		max-height: 420px;
		_height: 420px;
		padding: 1px;
		overflow: auto;
		}
		.aui_state_focus .aui_content {
		color: #000;
		}
		.ui-table {
		border: 1px solid #ccc;
		table-layout: fixed;
		width: 500px;
		text-align: center;
		}
		table {
		border-collapse: collapse;
		border-spacing: 0;
		}
		.ui-table th {
		height: 35px;
		font-size: 12px;
		color: #4c4c4c;
		text-shadow: 0 1px 1px #fff;
		background-color: #CCCCCC;
		background-image: -webkit-linear-gradient(#eaeaea, #eaeaea 25%, #CCCCCC);
		background-image: -moz-linear-gradient(top, #eaeaea, #eaeaea 25%, #CCCCCC);
		background-image: -o-linear-gradient(#eaeaea, #eaeaea 25%, #CCCCCC);
		background-image: linear-gradient(#eaeaea, #eaeaea 25%, #CCCCCC);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eaeaea', endColorstr='#CCCCCC', GradientType=0);
		}
		.ui-table th {
			text-align: center;
			vertical-align: middle;
		}
		textarea {
		font: 12px/1.5 tahoma, arial, \5b8b\4f53;
		}
		.ui-table td {
			font-size:12px;
		border: 1px solid #ccc;
		border-bottom-style: dotted;
		border-top: none;
		padding: 12px 0;
		word-break: break-all;
		word-wrap: break-word;
		text-align: center;
		vertical-align: middle;
		}

		.CPM_style .hint_text_2 li{
			height: auto;
		}
		</style>
		
				<?php include template('v2_merchant_header','member/common'); ?>

		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>商家中心</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
					<?php include template('v2_merchant_left','member/common'); ?>
				
				<div class="fr u_index_mess user_r_w_2">
					
					<div class="u_index_bor">
						<div class="user_i_mess_c user_pd_2" style="border-bottom:none;">
									<div class="yhtx fl clear">
										<div class="img fl">
											<img src="<?php echo $this->userinfo['avatar'];?>"/>
										</div>
										<dl class="fl txt s_set_a">
											<dt><?php echo nickname($this->userinfo['userid']);?><span><?php
												
													$h=date("H");
													if($h<11) echo "早上好!";
													else if($h<13) echo "中午好！";
													else if($h<18) echo "下午好！";
													else echo "晚上好！";
												?></span></dt>
											<dd>商家类型:<?php echo $groupname;?>

												<a href="<?php echo U('Member/Merchant/becomevip');?>">[成为VIP会员]</a><a href="<?php echo U('document/index/lists',array('catid'=>87));?>">[了解VIP]</a>
											</dd>
											<dd>
												<strong>账户余额：<span class="cd" style="margin-right:5px;"><?php echo $this->userinfo['money'];?></span>元</strong>
											</dd>
											<dd class="gn clear">
												<a href="<?php echo U('Pay/Index/deposite');?>" class="tx">提现</a>
												<a href="<?php echo U('Pay/Index/pay');?>" class="cz">充值</a>
												<a href="<?php echo U('Member/Financial/index');?>" class="zhmx">账户明细</a>
											</dd>
										</dl>
									</div>
								</div>
					</div>
					
					<div class="s_user_kj_nav clear">
						<div class="box">
							<div class="fl ico syhd"></div>
							<dl class="fl">
								<dt>闪电佣金</dt>
								<dd>
								<ul>

									<li>待审核资格:
									<?php if($z_zg) { ?>
									<a href="javascript:;" onclick="_order_status('trial',1)"  class="ce"> <?php echo $z_zg;?></a>
									<?php } else { ?>
									<a class="cg"> <?php echo $z_zg;?></a>
									<?php } ?>
									</li>

									<li>待审核订单号:
                                    <?php if($z_order) { ?>
									<a href="javascript:;" onclick="_order_status('trial',2)" class="ce"> <?php echo $z_order;?></a>
									<?php } else { ?>
									<a class="cg"><?php echo $z_order;?></a>
									<?php } ?>
									</li>

									<li>待审核好评报告:
                                     <?php if($z_bg) { ?>
									 <a href="javascript:;" onclick="_order_status('trial',3)"  class="ce"> <?php echo $z_bg;?></a>
									 <?php } else { ?>
									 <a class="cg"><?php echo $z_bg;?></a>
									 <?php } ?>
									</li>

								</ul>

									<ul>

										<li>已下架的活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'trial','activity_state'=>2));?>" class="cf"> <?php echo activity_count($this->userid,'trial',2);?></a></li>
										<li>已结束的活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'trial','activity_state'=>3));?>" class="cf"> <?php echo activity_count($this->userid,'trial',3);?></a></li>
										<li>待付款的活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'trial','activity_state'=>-3));?>" class="cf"> <?php echo activity_count($this->userid,'trial',-3);?></a></li>
									</ul>

								</dd>
							</dl>
						</div>
					<!--原闪电试用-->
						<!--<div class="box">
							<div class="fl ico sdsy"></div>
							<dl class="fl">
								<dt>闪电试用</dt>
								<dd>
									<ul>
										<li>待审核订单号:
										<?php if($s_order) { ?>
										<a href="javascript:;" onclick="_order_status('commission',3)"  class="ce"> <?php echo $s_order;?></a>
										<?php } else { ?>
										<a class="cg"> <?php echo $s_order;?></a>
										<?php } ?>
										</li>

										<li>待付款订单:
	                                    <?php if($s_pay_order) { ?>
										<a href="javascript:;" onclick="_order_status('commission',5)" class="ce"> <?php echo $s_pay_order;?></a>
										<?php } else { ?>
										<a class="cg"><?php echo $s_pay_order;?></a>
										<?php } ?>
										</li>

									</ul>
									<ul>
										<li>进行中活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'commission','activity_state'=>1));?>" class="cd"> <?php echo activity_count($this->userid,'commission',1);?></a></li>
										<li>已下架的活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'commission','activity_state'=>2));?>" class="cd"> <?php echo activity_count($this->userid,'commission',2);?></a></li>
										<li>已结束的活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'commission','activity_state'=>3));?>" class="cd"> <?php echo activity_count($this->userid,'commission',3);?></a></li>
										<li>待付款的活动:<a href="<?php echo U('Member/MerchantProduct/activity',array('mod'=>'commission','activity_state'=>-3));?>" class="cd"> <?php echo activity_count($this->userid,'commission',-3);?></a></li>
									</ul>
								</dd>
							</dl>
						</div>-->
						<?php  

						$in_count = model('task_day')->where(array('company_id'=>$this->userid,'status'=>1))->count();
						$end_count = model('task_day')->where(array('company_id'=>$this->userid,'status'=>2))->count();


						 ?>
						<div class="box">
							<div class="fl ico zyj"></div>
							<dl class="fl">
								<dt>开心任务</dt>
								<dd>
									<ul>
										<li>进行中的活动:<a href="<?php echo U('Member/MerchantTask/task_list',array('task_state'=>1));?>" class="cd"> <?php echo $in_count;?></a></li>
										<li>已结束的活动:<a href="<?php echo U('Member/MerchantTask/task_list',array('task_state'=>2));?>" class="cd" > <?php echo $end_count;?></a></li>
										
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					
					<!-- 公告 -->
					<div class="s_u_hint clear">
						<div class="long_linear"></div>
						
						<div class="hint fl">
							<p class="clear s_title">商家公告<a href="<?php echo U('Announce/Index/lists',array('type'=>2));?>"  class="fr">更多>></a></p>
							<ul class="s_list">
								  <?php require_once('E:\WWW\klz168.com/Application/Announce\Taglib\announce.class.php');$announce_tag = new announce();if(method_exists($announce_tag, 'lists')) {$data = $announce_tag->lists(array('type'=>'2','limit'=>'5',));} ?>
								  <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>

								<li>
									<b class="ico"></b>
									<a href="<?php echo U('Announce/Index/show',array('id'=>$r[announceid]));?>" target="_blank">
										<span class="fl s_txt txt-flow"><?php echo $r['title'];?></span>
										<span class="fr s_time"><?php echo dgmdate($r['starttime'],"Y/m/d H:i:s");?></span>
									</a>
								</li>
								<?php $n++;}unset($n); ?>
								
							</ul>
						</div>
						
						<div class="hint fr">
							<p class="clear s_title">官方公告<a href="<?php echo U('Announce/Index/lists',array('type'=>3));?>" class="fr">更多>></a></p>
							<ul class="s_list">
								  <?php require_once('E:\WWW\klz168.com/Application/Announce\Taglib\announce.class.php');$announce_tag = new announce();if(method_exists($announce_tag, 'lists')) {$data = $announce_tag->lists(array('type'=>'3','limit'=>'5',));} ?>
								  <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>

								<li>
									<b class="ico"></b>
									<a href="<?php echo U('Announce/Index/show',array('id'=>$r[announceid]));?>" target="_blank">
										<span class="fl s_txt txt-flow"><?php echo $r['title'];?></span>
										<span class="fr s_time"><?php echo dgmdate($r['starttime'],"Y/m/d H:i:s");?></span>
									</a>
								</li>
								<?php $n++;}unset($n); ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php include template('footer','common'); ?>
	</body>

	<script type="text/javascript">
       function  _order_status(mod,status){

        var g_text;
       	if(mod == 'trial'){
           if(status == 1) g_text ='试用资格';
           if(status == 2) g_text ='订单号';
           if(status == 3) g_text ='试用报告';
       	}

       	if(mod == 'commission'){
       		if(status == 3) g_text ='订单号';
       		if(status == 5) g_text ='返款';

       	}

         $.getJSON('<?php echo U('product/api/status_goods');?>',{'mod':mod,'status':status},function(ret){

         	console.log(ret);
         	if(ret.status == 1){
                    var html = [];
         			for (var i = 0, l = ret.info.length; i < l; i++) {
         				html.push('<tr><td>' + ret.info[i]['goods'][0]['id'] + '</td><td>' + ret.info[i]['goods'][0]['title'] + '</td><td>' + ret.info[i]['status_name'] + '</td><td>'+ret.info[i].order_num+'</td><td><a style="color:#1c6a9e" target="_blank"  href="'+ret.info[i].url+'">去审核'+g_text+'</a></td></tr>');
         			}

         			html = '<div class=""><table class="ui-table"><tr><th width="10%">活动id</th><th width="40%">活动名称</th><th width="15%">活动状态</th><th width="20%">待审核'+g_text+'</th><th width="20%">操作</th></tr>' + html.join('') + '</table></div>';
         			art.dialog({
         				lock : true,
         				fixed : true,
         				title : '活动订单汇总 (为保证性能，只显示前10条活动)',
         				id:'view_log',
         				width:500,
         				content : html,
         				ok : true
         			});
         		} else {
         				art.dialog({
						lock: true,
						fixed: true,
						icon: 'face-sad',
						title: '错误提示',
						content: ret.info,
						ok: true
					    });

         		}
         })

       }

	</script>
</html>