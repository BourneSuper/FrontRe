<?php
require_once 'components/firstComponent/entity/User.php';
require_once 'components/firstComponent/dao/UserDao.class.php';

class UserService
{
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