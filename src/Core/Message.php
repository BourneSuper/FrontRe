<?php

namespace BourneSuper\FrontRe\Core;

/**
 * 单例实现信息传递工具
 * 
 * @author Bourne
 */
class Message{
    private $msg;
    private $latestInfoArray;
    private $msgCount;
    private $dataArr;
    
    /**
     * 
     */
    public function __construct(){
        $this->msg = '';
        $latestInfoArray = array();
        $msgCount = 0;
        
        session_start();
        $_SESSION[ 'message' ] = $this;
    }
    
    /**
     * @return \BourneSuper\FrontRe\Core\Message
     */
    public static function getMessage(){
        session_start();
        
        if( !isset( $_SESSION[ 'message' ] ) ){
            $temp = new Message();
            return $temp;
        }
        
        return $_SESSION[ 'message' ];
    }
    
    /**
     * @param string $appendStr
     */
    public function appendMsg( $appendStr ){
        $this->msg .= $appendStr;
        $this->msgCount++;
    }
    
    /**
     * @param string $str
     */
    public function pushInfo( $str ){
        array_push( $this->latestInfoArray, $str );
    }
    
    /**
     * @return mixed
     */
    public function popInfo(){
        return array_pop( $this->latestInfoArray );
    }
    
    /**
     * @param string $key
     * @param mixed $data
     */
    public function pushData( $key, $data ){
        $this->dataArr[ $key ] = $data;
    }
    
    /**
     * @param string $key
     * @return mixed
     */
    public function findData( $key ){
        return $this->dataArr[ $key ];
    }
    
    /**
     *
     * @return the $msg
     */
    public function getMsg(){
        return $this->msg;
    }
    
    /**
     *
     * @return the $latestInfoArray
     */
    public function getLatestInfoArray(){
        return $this->latestInfoArray;
    }
    
    /**
     *
     * @return the $msgCount
     */
    public function getMsgCount(){
        return $this->msgCount;
    }
    
    /**
     *
     * @return the $dataArr
     */
    public function getDataArr(){
        return $this->dataArr;
    }
    
    /**
     * @param string $msg
     */
    public function setMsg( $msg ){
        $this->msg = $msg;
    }
    
    /**
     *
     * @param array $latestInfoArray            
     */
    public function setLatestInfoArray( $latestInfoArray ){
        $this->latestInfoArray = $latestInfoArray;
    }
    
    /**
     *
     * @param int $msgCount            
     */
    public function setMsgCount( $msgCount ){
        $this->msgCount = $msgCount;
    }
    
    /**
     *
     * @param array $dataArr            
     */
    public function setDataArr( $dataArr ){
        $this->dataArr = $dataArr;
    }
}

?>