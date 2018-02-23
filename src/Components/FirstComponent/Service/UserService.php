<?php

namespace BourneSuper\FrontRe\Components\FirstComponent\Service;

use BourneSuper\FrontRe\Components\FirstComponent\Entity\User;
use BourneSuper\FrontRe\Components\FirstComponent\DAO\UserDao;

class UserService{
    
    public function login($userId, $password){
        $userDAO = new UserDAO();
        $user = $userDAO->findUser($userId);
        
        if( empty($user->getId()) || $user->getPassword() !== $password){
            
            return false;
        }
        
        return $user;
        
    }
}

?>