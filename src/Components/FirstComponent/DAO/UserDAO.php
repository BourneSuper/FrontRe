<?php

namespace BourneSuper\FrontRe\Components\FirstComponent\DAO;

use BourneSuper\FrontRe\Components\FirstComponent\Entity\User;
use BourneSuper\FrontRe\Core\SqlHelper;




/**
 * @author Bourne
 */
class UserDAO{
    
    /**
     * @param string $userId
     * @return \BourneSuper\FrontRe\Components\FirstComponent\Entity\User
     */
    public function findUser($userId){
        $user = new User();
        
        $sqlHelper = SqlHelper::getSqlHelper();
        $sql = "Select * from t_user where `user_id` ='" . addslashes($userId) ."'";
        $res = $sqlHelper->query($sql);
        
        while(!empty($row = mysqli_fetch_array($res))){
            $user->setId($row['id']);
            $user->setUserId($row['user_id']);
            $user->setName($row['user_name']);
            $user->setPassword($row['user_password']);
            
        }

        return $user;
        
    }
}

?>