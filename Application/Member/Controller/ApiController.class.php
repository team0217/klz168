<?php
namespace Member\Controller;
use \Admin\Controller\InitController;
/* 后台活动管理 */
class ApiController extends InitController{

  public  function index(){

     $data =array();
     $data['username'] = '335815198@qq.com';
     $data['password'] = '123456';

      $ret = _ps_send('login',$data);

    switch ($ret) {
      case 1:
         echo '登录成功！';
        break;
      
      default:
         echo '登录失败！';
        break;
    }
      
  }





   }
