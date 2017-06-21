<?php
require_once 'components/firstComponent/entity/User.php';
require_once 'components/firstComponent/dao/UserDao.class.php';

class UserService
{
    public function login($userId){
        $userDAO = new UserDAO();
        $user = $userDAO->findUser($userId);
        
        if( empty($user->getId()) ){
            
            return false;
        }
        
        return $user;
        
    }
}

?>