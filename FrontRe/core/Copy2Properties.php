<?php
namespace core;

use core\ShowPropertiesInterface;

class Copy2Properties
{
    
    public static function copy($arr,ShowPropertiesInterface $destObj,
            ShowPropertiesInterface $srcObj ){
        //1.
        $rc = new \ReflectionClass($destObj);
        $methodsArr = $rc->getMethods();
        
        $methodNames = array();
        foreach($methodsArr as $method){
            $methodNames[] = $method->name;
        }
        
        //2.
        
        foreach($arr as $key => $value){
            $setMethodName = 'set'.ucfirst($key);
            
            if(array_search($setMethodName, $methodNames !== false)){                
                $destObj->$setMethodName($value);
            }
            
        }
        
        
        
    }
    
    public static function copyArr2Obj($arr , $obj , $fromCharacterType , $toCharacterType){
        //1.
        $rc = new \ReflectionClass($obj);
        $methodsArr = $rc->getMethods();
        
        $methodNames = array();
        foreach($methodsArr as $method){
            $methodNames[] = $method->name;
        }
        
        //2.
        
        foreach($arr as $key => $value){
            $setMethodName = 'set'.ucfirst($key);
        
            if(array_search($setMethodName, $methodNames !== false)){
                if(!empty($fromCharacterType) && !empty($toCharacterType)){
                    $obj->$setMethodName(iconv($fromCharacterType, $toCharacterType, $value));
                }else{
                    $obj->$setMethodName($value);
                    
                }
                
            }
        
        }
        
        
        
        
    }
    
    
    
    
}

?>