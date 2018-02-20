<?php

namespace BourneSuper\FrontRe\Components\FirstComponent\DAO;

use BourneSuper\FrontRe\Core\SqlHelper;
use BourneSuper\FrontRe\Components\FirstComponent\Entity\User;

class UserDAO{
    
    public function findUser($userId){
        $user = new User();
        
        $sqlHelper = SqlHelper::getSqlHelper();
        $sql = "Select * from user where user_id ='"
                . $userId ."'";
        $res = $sqlHelper->query($sql);
        
        while(!empty($row = mysql_fetch_array($res))){
            $user->setId($row['id']);
            $user->setUserId($row['user_id']);
            $user->setName($row['user_name']);
            $user->setPassword($row['user_password']);
            
        }

        return $user;
        
    }
}

?>