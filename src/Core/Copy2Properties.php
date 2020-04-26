<?php

namespace BourneSuper\FrontRe\Core;

use BourneSuper\FrontRe\Core\ShowPropertiesInterface;

/**
 *
 * @author Bourne
 */
class Copy2Properties{
    
    /**
     * 复制对象的属性到另一个对象的属性
     * @param ShowPropertiesInterface $destObj            
     * @param ShowPropertiesInterface $srcObj            
     */
    public static function copy( ShowPropertiesInterface $destObj, ShowPropertiesInterface $srcObj ){
        //1.
        $rc = new \ReflectionClass( $destObj );
        $destObjMethodArr = $rc->getMethods();
        
        $destObjMethodNameArr = array();
        foreach( $destObjMethodArr as $method ){
            $destObjMethodNameArr[] = $method->name;
        }
        
        //2.
        $rc = new \ReflectionClass( $destObj );
        $srcObjMethodArr = $rc->getMethods();
        
        $srcObjMethodNameArr = array();
        foreach( $srcObjMethodArr as $method ){
            $srcObjMethodNameArr[] = $method->name;
        }
        
        //3.
        $srcPropArr = $srcObj->getProperties();
        foreach( $srcPropArr as $key => $value ){
            $setMethodName = 'set' . ucfirst( $key );
            
            if( array_search( $setMethodName, $destObjMethodNameArr ) !== false ){
                $destObj->$setMethodName( $value );
            }
        }
    }
    
    /**
     * 复制数组的值到一个对象的属性
     * @param array $arr
     * @param \stdClass $obj
     * @param string $fromCharacterType
     * @param string $toCharacterType
     */
    public static function copyArr2Obj( $arr, $obj, $fromCharacterType, $toCharacterType ){
        //1.
        $rc = new \ReflectionClass( $obj );
        $methodsArr = $rc->getMethods();
        
        $methodNames = array();
        foreach( $methodsArr as $method ){
            $methodNames[] = $method->name;
        }
        
        //2.
        foreach( $arr as $key => $value ){
            $setMethodName = 'set' . ucfirst( $key );
            
            if( array_search( $setMethodName, $methodNames !== false ) ){
                if( !empty( $fromCharacterType ) && !empty( $toCharacterType ) ){
                    $obj->$setMethodName( iconv( $fromCharacterType, $toCharacterType, $value ) );
                }else{
                    $obj->$setMethodName( $value );
                }
            }
        }
    }
}

?>