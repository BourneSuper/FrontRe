<?php

// namespace components\fisrtComponent;
require_once '/components/fisrtComponent/service/UserService.class.php';

// use components\fisrtComponent\servisce\UserService;

class FirstComponentController{
    
    public function login(){
        $userService = new UserService();
        $userService->login($_REQUEST['userId']);
    }

}

?>