<?php


use core\JSONUtil;
require_once '/service/UserService.class.php';
require_once 'core/JSONUtil.php';

class FirstComponentController{
    
    public function login(){
        $userService = new UserService();
        $user = $userService->login($_REQUEST['userId']);
        
        if($user != false){
            echo $user->getName()."登录成功。";
        }else{
            echo "id not exists";
        }
    }
    
    public function ajaxLogin(){
        $userService = new UserService();
        $user = $userService->login($_REQUEST['userId']);
        
        //die('{"msg":"'.$user->getName().'"}');

//         die('{ s{"id":"1","userId":"admin","name":"管理员","password":"admin"}}');
        if($user != false){
            $userJsonStr = JSONUtil::encode($user, false);
            echo '{ "msg" : "' . $user->getName() . '登录成功！",'
                    . '"user":' . $userJsonStr . '}';
        }else{
            echo '{ "msg" : "登录失败！"}';
        }
        
        
    }

}

?>