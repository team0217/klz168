<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html >
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
  <meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src  'self' 'unsafe-inline' *">
  <title>邀请好友第二步</title>
  <link href="/static/lib/css/ionic.css" rel="stylesheet">
  <!-- ionic/angularjs js -->
  <script src="/static/lib/js/ionic.bundle.js"></script>
  <!-- your app's js -->
  <script src="/static/lib/js/angular/angular.min.js"></script>
  <script language="javascript" type="text/javascript" src="/static/js/jquery.min.js"></script>

</head>

  <style>
  .cc {
    color:red;
  }
  </style>

  <div class="bar bar-header bar-color ">
    <a href="#/tab/trial" style="color:#ffffff;" class="button icon ion-ios-arrow-back button-clear head_button1">返回</a>
    <h1 class="title">第二步 完善注册信息</h1>
  </div>
<body ng-app="MyApp">
  <div ng-controller="MyCtrl2" >
    <img width="100%"  ng-src="<?php echo IMG_PATH;?>banner.png"/>

    <div class="padding-left padding-right padding-top"  >
      <p class="cc">第二步：确认手机号码，输入收到的验证码</p>
      <p class="phone-number-p">您输入的手机号码为：<span id="you-number"><?php echo substr_replace($phone,'****',3,4);?></span></p>
    </div>
    <div class="list list-inset new-form ">
      <form id="myform" name="myform">

        <input type="hidden" name="phone"  id='phone' value="<?php echo $phone;?>">
        <input type="hidden" name="modelid" id='modelid' value="1">
        <input type="hidden" name="agent" id="agent" value="<?php echo $userid;?>">

        <label class="item item-input"  > <i style="font-size:18px;color:#f7ba5b" class="icon ion-unlocked placeholder-icon" ></i>
          <input  type="text" ng-model="user_sms" name="user_sms" placeholder="您收到的验证码" ng-maxlength="6" ng-minlength="6" required>
          <label  >
            <span class="input-label padding-right">
              <button name="user_getsms" id ="get_sns" class="button button-positive button-small " ng-click="getsms(user_phone)">{{test}}</button>

            </span>

          </label>
        </label>

        <label class="item item-input">
          <i style="font-size:18px;color:#8e8e93" class="icon  ion-locked placeholder-icon " style="font-size:15px;"></i>
          <input  ng-minlength="6" ng-maxlength="20" name="password" type="password" placeholder="请输入密码" ng-model="password" required ></label>

        <button ng-disabled="myform.$invalid" class="button button-full button-assertive padding-top" ng-click="register(user_sms,password)">确认注册</button>

      </form>
    </div>
  </div>

</body>
</html>

<script type="text/javascript">
      var app = angular.module("MyApp", ['ionic'] );

     app.controller('MyCtrl2', function($scope, $ionicLoading,$interval) {

         var curCount = 60;
         var InterValObj;

          $scope.test = '获取验证码';

          $scope.getsms =function(){

             var mobile = $("#phone").val();
             var modelid = $('#modelid').val();
           $('#get_sns').attr('disabled','disabled');
            $scope.test ="正在发送..";

             if(mobile == '') {
                 return false;
             };

               $.getJSON("<?php echo U('send_sms');?>", {mobile:mobile,modelid:modelid}, function(ret) {
              
                     if(ret.status == 1) {
                       $scope.test ="发送成功";  
                       InterValObj = $interval(function() {
                        $scope.SetRemainTime();
                      }, 1000);

                       $ionicLoading.show({
                         noBackdrop: true,
                         template: "手机验证码发送成功，请注意查收！",
                         duration: 2000
                       });

                     } else {
                      $scope.test ="发送失败";
                       $ionicLoading.show({
                         noBackdrop: true,
                         template: ret.info,
                         duration: 2000
                       });

                           return false;
                     }
               });               

          };


          $scope.SetRemainTime = function() {

              if (curCount == 1) {
                curCount = 60;
                  $interval.cancel(InterValObj);   
                  $scope.test ="重发验证码";
                  $("#get_sns").val("重发验证码").removeClass('disabled');  
                  $('#get_sns').removeAttr('disabled');
              }
              else {
                  curCount--;
                   $scope.test = curCount + "秒后重发";
                   $("#get_sns").addClass('disabled');
              }
          };

            $scope.register =function(sms,pwd){

              var phone = $("#phone").val();
              var modelid = $("#modelid").val();
              var agent_id = $("#agent").val();

            var parm = {
              phone:phone,
              password:pwd,
              sms:sms,
              pwdconfirm:pwd,
              modelid:modelid,
              agent_id:agent_id };
              $.post("/v2_register_phone/",parm,function(data){
                if (data.status == 1) {
                    location.href="<?php echo U('friend_success');?>";
                }else{
                   $ionicLoading.show({
                     noBackdrop: true,
                     template: data.info,
                     duration: 2000
                   });
                };
                          
              },'json');
            
          };
          


     });

  </script>
<style type="text/css" media="screen">
.js_css > div {
font-size: 18px;
color: #e42012;
float: left;
margin-left: -388px;
margin-top: 183px;
}
</style>