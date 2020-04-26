<?php

namespace BourneSuper\FrontRe\Components\FirstComponent;

use BourneSuper\FrontRe\Core\JSONUtil;
use BourneSuper\FrontRe\Components\FirstComponent\Service\UserService;

/**
 *
 * @author Bourne
 */
class FirstComponentController{
    
    /**
     * 
     */
    public function login(){
        $userService = new UserService();
        $user = $userService->login( $_REQUEST[ 'userId' ], $_REQUEST[ 'password' ] );
        
        if( $user != false ){
            echo $user->getName() . "登录成功。";
        }else{
            echo "登录失败。";
        }
        
        echo "<script>setTimeout(function(){window.history.back(-1);},2000)</script>";
    }
    
    /**
     * 
     */
    public function ajaxLogin(){
        $userService = new UserService();
        $user = $userService->login( $_REQUEST[ 'userId' ], $_REQUEST[ 'password' ] );
        
        if( $user != false ){
            $userJsonStr = JSONUtil::encode( $user, false );
            
            $arr = [
                    'msg' => $user->getName(),
                    'user' => $userJsonStr
            ];
            
        }else{
            $arr = [
                    'msg' => '登录失败！',
            ];
        }
        
        echo json_encode( $arr, JSON_UNESCAPED_UNICODE );
        
    }

}

?>