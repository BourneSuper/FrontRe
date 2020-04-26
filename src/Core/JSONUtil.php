<?php
namespace BourneSuper\FrontRe\Core;

use BourneSuper\FrontRe\Core\ShowPropertiesInterface;


/**
 * JSON 处理工具
 * @author Bourne
 *
 * usage:
 * 
 * 
 * public function updateOrInsertInfos(){
 *      //jsonArrInfos read from brower
 *      $jsonArrInfos = str_replace("\\", "", $_Request['jsonArrInfos']);
 *      $arr = JOSNUtil::decodeJSONArr($jsonArrInfos,"GBK");
 *      
 *      $dsiDTOArr = array();
 *      foreach($arr as $objArr){
 *          $dsiDTO = new DayliyShiftInfoDTO();
 *          Copy2Properties::copyArr2Obj($objArr, $dsiDTO , false , false);
 *      
 *          $dsiDTOArr[] = $dsiDTO;
 *      }
 *      
 *      $dsis = DayliyShiftInfoService();
 *      $jsonArr = $dsis->updateOrInsertInfos($dsiDTOArr);
 *      
 *      $message = Message::getMessage();
 *      $msg = $message->getMsg();
 *      echo '{"msg" : "' . $msg . '"}'
 *      
 *      
 * }
 * 
 */
class JSONUtil{
    /*
     * fn decode simple json string with character convert
     * return an array of key/value
     */
    public static function decode( $jsonString, $toCharacter ){
        $arr = array();
        
        $arr = json_decode( $jsonString, true );
        
        if( !empty( $toCharacter ) ){
            foreach( $arr as $key => $value ){
                $arr[ $key ] = iconv( "UTF-8", $toCharacter, $value );
            }
        }
        
        return $arr;
    }
    
    /*
     * fn decode arr json string with character converted
     * param $jsongString like '{{"a":"1","b":"2"}, json2, json3}'
     * return an two-demension array of key/value
     */
    public static function decodeJSONArr( $jsonString, $toCharacter ){
        $arr = array();
        
        $arr = json_decode( $jsonString, true );
        
        if( !empty( $toCharacter ) ){
            foreach( $arr as $key1 => $objArr ){
                foreach( $objArr as $key2 => $value ){
                    
                    $arr[ $key1 ][ $key2 ] = iconv( "UTF-8", $toCharacter, $value );
                }
            }
        }
        
        return $arr;
    }
    
    /*
     * fn encode object(ShowPropertiesInterface) with character converted
     * return simple json string
     */
    public static function encode( ShowPropertiesInterface $obj, $fromCharacter ){
        $arr = $obj->getProperties();
        
        foreach( $arr as $key => $value ){
            if( !empty( $fromCharacter ) ){
                $arr[ $key ] = iconv( $fromCharacter, "UTF-8", $value );
            }
        }
        
        return json_encode( $arr, JSON_UNESCAPED_UNICODE );
    }
    
    /*
     * fn encode an array of object(ShowPropertiesInterface) with character converted
     * return simple json string
     */
    public static function encodeObjArr( $arr, $fromCharacter ){
        $jsonArrStr = "[";
        foreach( $arr as $key => $obj ){
            $rc = new \ReflectionClass( $obj );
            
            if( !$rc->implementsInterface( ShowPropertiesInterface ) ){
                die( "must implements ShowPropertiesInterface" );
            }
            
            $arr[ $key ] = JSONUtil::encode( $obj, $fromCharacter );
        }
        $jsonArrStr .= implode( ",", $arr );
        $jsonArrStr .= "]";
        
        return $jsonArrStr;
    } 
    
    
    
    
    
    
    
}

?>