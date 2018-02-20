<?php
namespace Core;

interface  ShowPropertiesInterface
{
    /*
     * return an array , like properyName => propertyValue
     * 
     * //implement
     * public function getProperties(){
     *      $arr = array();
     *      
     *      foreach($this as $key => $value){
     *          $arr[$key] = $value;
     *      }
     *      
     *      return $arr;
     *      
     * } 
     * 
     */
    public function getProperties();
}

?>