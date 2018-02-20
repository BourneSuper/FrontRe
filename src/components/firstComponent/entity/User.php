<?php
use core\ShowPropertiesInterface;
require_once 'core/ShowPropertiesInterface.class.php';

class User implements ShowPropertiesInterface
{
    private $id;
    private $userId;
    private $name;
    private $password;
    
    
    
 /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

 /**
     * @return the $user_id
     */
    public function getUserId()
    {
        return $this->userId;
    }

 /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

 /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

 /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

 /**
     * @param field_type $user_id
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

 /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

 /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    
    //implement
    public function getProperties(){
        $arr = array();
        
        foreach($this as $key => $value){
              $arr[$key] = $value;
        }
        
        return $arr;
        
    }
    
    
}

?>