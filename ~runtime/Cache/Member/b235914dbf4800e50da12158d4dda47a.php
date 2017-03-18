<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>我的推荐好友-买家个人中心-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="推荐好友,<?php echo C('WEBNAME');?>" />
		<meta name="description" content="推荐好友,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery.zclip.min.js"></script>

		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
         <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/taobao.js"></script>
	</head>
	<body>
		
		<script type="text/javascript">
			$(function(){
				$('.lj_copy').zclip({
					path: '<?php echo THEME_STYLE_PATH;?>style/js/ZeroClipboard.swf',
					copy: function (){
						return $(this).parents('dd').find('input').val();
					},
					setHandCursor : true,
					clickAfter : true,
					beforeCopy : function(){},  
					afterCopy : function(data){
						var str = $(this).html();
						$(this).html('复制成功').one('mouseout',function(){
							$(this).html(str);
						});
					},
				});
			});
		</script>
		
				<?php include template('v2_header','member/common'); ?>

		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>好友推荐</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				
								<?php include template('v2_member_left','member/common'); ?>

				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">好友推荐</h2>
					<!-- 正文 -->
					<ul class="sy_list_btn clear">
						<li <?php if($type == 1) { ?> class="active"<?php } ?>><a href="<?php echo U('Member/Recommend/index',array('type'=>1));?>">我要推荐</a></li>
						<li <?php if($type == 2) { ?> class="active"<?php } ?>><a href="<?php echo U('Member/Recommend/index',array('type'=>2));?>">我的合伙人</a></li>
						<li <?php if($type == 3) { ?> class="active"<?php } ?>><a href="<?php echo U('Member/Recommend/index',array('type'=>3));?>">我的现金奖励</a></li>
						<li <?php if($type == 4) { ?> class="active"<?php } ?>><a href="<?php echo U('Member/Recommend/index',array('type'=>4));?>">我的积分奖励</a></li>
					</ul>
					<?php if($type == 1) { ?>
					<div class="jt_fx_wrap clear">
						<div class="jt_fx_wrap_l fl">
							<div class="list clear">
								<div class="fx_ico fx_ico_qq fl"></div>
								<dl class="fr fx_txt">
									<dt>通过QQ或旺旺等邀请好友</dt>
									<dd class="clear">
										<input class="fl" type="text" readonly="readonly" value="<?php echo U('Member/Index/userregister',array('agent_id'=>$this->userid),'',TRUE,TRUE); ?>"/>
										<a class="fr lj_copy" href="javascript:;">复制</a>
									</dd>
								</dl>
							</div>
							<div class="list clear">
								<div class="fx_ico fx_ico_lt fl"></div>
								<dl class="fr fx_txt">
									<dt>在自己常去的论坛上挂签名</dt>
									<dd class="clear">
										<input class="fl" type="text" readonly="readonly" value="[url=<?php echo U('Member/Index/userregister',array('agent_id'=>$this->userid),'',TRUE,TRUE); ?>]<?php echo C('WEBNAME');?>分享[/url]"/>
										<a class="fr lj_copy" href="javascript:;">复制</a>
									</dd>
								</dl>
							</div>
							<div class="list clear">
								<div class="fx_ico fx_ico_html fl"></div>
								<dl class="fr fx_txt">
									<dt>在自己微博上架友情链接或任何支持HTML的地方</dt>
									<dd class="clear">
										<input class="fl" type="text" readonly="readonly" value="<a href='<?php echo U('Member/Index/userregister',array('agent_id'=>$this->userid),'',TRUE,TRUE); ?>'><?php echo C('WEBNAME');?>分享</a>"/>
										<a class="fr lj_copy" href="javascript:;">复制</a>
									</dd>
								</dl>
							</div>
							
							<dl class="fx_lj_2">
								<dt>分享</dt>
								<dd><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
								<script>


								window._bd_share_config={"common":{
									 "bdSnsKey":{},
									 "bdText":"发现一个免费拿商品的网站，我已经领取了多个商品，小伙伴们快来拿吧",
								     "bdMini":"1",
								     "bdMiniList":false,
								     "bdUrl":"<?php echo U('Member/Index/userregister',array('agent_id'=>$this->userid),'',TRUE,TRUE); ?>",
								     "bdPic":"http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo C('SITE_LOGO_ZHU');?>",
								     "bdStyle":"0",
								     "bdSize":"32",
								     "bdDesc":"发现一个免费拿商品的网站，我已经领取了多个商品，小伙伴们快来拿吧",
								 },"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"32"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];



								</script>


								</dd>
							</dl>
							
						</div>
						<dl class="jt_fx_wrap_r fr">
							<dt>注意事项</dt>
							<dd>不要为了获得小小的邀请奖励而失掉了自己的诚信，我们会人工核查，对于查实的作弊行为，我们将收回该帐号全部的邀请奖励，严重者将冻结所有收入并永久封号；</dd>
							<dd>当好友通过您的邀请链接访问给<?php echo C('WEBNAME');?>后，只要TA在1个小时内注册，均为有效；</dd>
							<dd>不要以注册送钱或注册送积分等利益诱导来吸引注册，否则将给予处罚；</dd>
							<dd>为了合作商城的正常利益,请不要到给利伴网的合作商城进行推广；</dd>
							<dd class="red">作弊行为：包括但不限于使用相同的电脑、相同的IP地址在同一天内注册多个帐号，以骗取邀请奖励的行为。</dd>
						</dl>
					</div>
					<?php } ?>
					<?php if($type == 2) { ?>
					<div class="jt_fx_wrap clear">


					<table class="jf_tab jf_tab_2" width="100%">
						<thead>
							<tr>
								<th>等级</th>
								<th>人数</th>
								<th>奖励佣金</th>
								<!--<th>登录次数</th>
								<th>邀请时间</th>-->
							</tr>
						</thead>
						<tbody class="border_none">
					        <?php if($agentCount) { ?>
                                <?php $n=1;if(is_array($agentCount)) foreach($agentCount AS $v) { ?>
                                <tr>
                                    <td class="c_3"><?php echo $v['key'];?></td>
                                    <td class="jia"><?php echo $v['count'];?></td>
                                    <td class="jia"><?php echo $v['award'];?></td>
                                    <!--<td class="jian"><?php echo $v['order_count'];?></td>
                                    <td class="c_3"> <?php echo $v['loginnum'];?>次</td>
                                    <td class="c_3"><?php echo dgmdate($v['regdate'],'Y年m月d日');?><span class="time"><?php echo dgmdate($v['regdate'],'H:i');?></span></td>-->
                                </tr>
                                <?php $n++;}unset($n); ?>
						    <?php } ?>
							
						
						</tbody>
					</table>
					<div id="page" class="mt30 clear" style="margin-top:20px;">
							<!--<?php echo $v2_pages;?>	-->
						</div>
					</div>
					<?php } ?>

					<?php if($type == 3 || $type == 4) { ?>
					<div class="jt_fx_wrap clear">


					<table class="jf_tab jf_tab_2" width="100%">
						<thead>
							<tr>
								<th>创建时间</th>
								<th>收入</th>
								<th>支出</th>
								<th>名称/备注</th>
							</tr>
						</thead>
						<tbody class="border_none">
								<?php $n=1;if(is_array($reword_list)) foreach($reword_list AS $v) { ?>


							<tr>
								<td class="c_3"><?php echo dgmdate($v['dateline'],'Y年m月m日'); ?><span class="time"><?php echo dgmdate($v['dateline'],'H:i'); ?></span></td>
								<td class="jia"><?php if($v[num] > 0 && $v[type] == 'money') { ?><?php echo $v['num'];?><?php } elseif ($v[num] > 0 && $v[type] == 'point') { ?><?php echo substr($v[num],0,-3);?><?php } else { ?>--<?php } ?></td>
								<td class="jian"><?php if($v[num] < 0) { ?><?php echo $v['num'];?><?php } else { ?>--<?php } ?></td>
								<td class="c_3"><?php echo str_cut($v[cause],30);?></td>
							</tr>
						<?php $n++;}unset($n); ?>

							
						</tbody>
					</table>
					<div id="page" class="mt30 clear" style="margin-top:20px;">
							<?php echo $v2_reword_page;?>
						</div>
					<?php } ?>


					
				</div>
			</div>

		</div>	</div>
		
						<?php include template('footer','common'); ?>

	</body>
</html>