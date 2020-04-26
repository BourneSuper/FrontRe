<?php

namespace BourneSuper\FrontRe\Components\FirstComponent\Service;

use BourneSuper\FrontRe\Components\FirstComponent\Entity\User;
use BourneSuper\FrontRe\Components\FirstComponent\DAO\UserDAO;

/**
 *
 * @author Bourne
 */
class UserService{
    
    /**
     * @param string $userId
     * @param string $password
     * @return boolean|\BourneSuper\FrontRe\Components\FirstComponent\Entity\User
     */
    public function login( $userId, $password ){
        $userDAO = new UserDAO();
        $user = $userDAO->findUser( $userId );
        
        if( empty( $user->getId() ) || $user->getPassword() !== $password ){
            
            return false;
        }
        
        return $user;
        
    }
}

?>