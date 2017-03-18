<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html >
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
  <meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src  'self' 'unsafe-inline' *">
  <title>邀请好友</title>
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
    <h1 class="title">您收到好友 <?php echo $name;?> 邀请</h1>
  </div>
<body ng-app="MyApp">
  <div ng-controller="MyCtrl" >
    <img width="100%"  ng-src="<?php echo IMG_PATH;?>banner.png"/>

    <div class="padding-left padding-right padding-top"  >
      <p>
        您的好友 <i class="cc" ><?php echo $name;?></i>
        邀请您来一起加入快乐挣!
      </p>
      <p>偷偷告诉您 每天轻松赚取佣金1-500元！</p>
      <p >只需二步 轻松获取奖励</p>
      <p class="cc">第一步：输入手机号，5秒成为快乐挣会员</p>
    </div>
    <div class="list list-inset new-form ">
      <form id="myform" name="myform">

        <label class="item item-input"> <i style="font-size:18px;color:#66ccee" class="icon ion-iphone dark placeholder-icon" ></i>
          <input type="text" ng-pattern="/^1[3|4|5|8][0-9]\d{4,8}$/" ng-model="user_phone" name="user_phone" placeholder="您的手机号" ng-maxlength="11" ng-minlength="11" required></label>

        <div class="padding-top paidding-left "></div>
        <button ng-disabled="myform.$invalid" class="button button-block button-assertive button-outline" ng-click="register(user_phone)">下一步</button>

      </form>
    </div>
  </div>

</body>
</html>

<script type="text/javascript">
      var app = angular.module("MyApp", ['ionic'] );

     app.controller('MyCtrl', function($scope, $ionicLoading) {

            $scope.register =function(register){

              $.post("<?php echo U('public_checkphone_ajax');?>",{phone:register}, function(data) {
                console.log(data);

               if(data.status == 0){

                $ionicLoading.show({
                  noBackdrop: true,
                  template: "亲 手机号被占用 请更换",
                  duration: 2000
                });

                    return false;
               }

               if(data.status  == 1){

                var userid = "<?php echo $userid;?>";
                $.post("<?php echo U('friends/Index/submit');?>",{phone:register,userid:userid}, function(ret) {
                    if (ret.status==1) {
                      location.href=ret.url;
                    }else{
                        $("#phoneError").html(ret.info);
                    }
                });


               }

              });
              
          

        }
     });

  </script>