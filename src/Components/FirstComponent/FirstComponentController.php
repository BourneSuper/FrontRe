<?php
namespace BourneSuper\FrontRe\Components\FirstComponent;

use BourneSuper\FrontRe\Core\JSONUtil;

use BourneSuper\FrontRe\Components\FirstComponent\Service\UserService;


class FirstComponentController{
    
    public function login(){
        $userService = new UserService();
        $user = $userService->login($_REQUEST['userId'], $_REQUEST['password']);
        
        if($user != false){
            echo $user->getName()."登录成功。";
        }else{
            echo "登录失败。";
        }
        
        echo "<script>setTimeout(function(){window.history.back(-1);},2000)</script>";
    }
    
    public function ajaxLogin(){
        $userService = new UserService();
        $user = $userService->login($_REQUEST['userId'], $_REQUEST['password']);
        
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