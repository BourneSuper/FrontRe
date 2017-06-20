<?php

namespace core;

/*
 * 单例实现数据库工具
 */
class Message
{
    private $msg;
    private $latestInfoArray;
    private $msgCount;
    private $dataArr;
    
    //待解耦
    public function __construct(){
        $this->msg = '';
        $latestInfoArray = array();
        $msgCount = 0;
        
        
        session_start();
        $_SESSION['message'] = $this;
        
    }
    
    public static function getMessage(){
        
        session_start();
        
        if(!$_SESSION['message']){
            $temp = new Message();
            return $temp;
        }
        
        return $_SESSION['message'];
    }
    
    public function appendMsg($appendStr){
        $this->msg .= $appendStr;
        $this->msgCount++;
    }
    
    public function pushInfo($str){
        array_push($this->latestInfoArray, $str);
    }
    
    public function popInfo(){
        return array_pop($this->latestInfoArray);
    }
    
    public function pushData($key, $data){
        $this->dataArr[$key] = $data;
    }
    
    public function findData($key){
        return $this->dataArr[$key];
    }
    
    
 /**
     * @return the $msg
     */
    public function getMsg()
    {
        return $this->msg;
    }

 /**
     * @return the $latestInfoArray
     */
    public function getLatestInfoArray()
    {
        return $this->latestInfoArray;
    }

 /**
     * @return the $msgCount
     */
    public function getMsgCount()
    {
        return $this->msgCount;
    }

 /**
     * @return the $dataArr
     */
    public function getDataArr()
    {
        return $this->dataArr;
    }

 /**
     * @param Ambigous <string, unknown> $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

 /**
     * @param field_type $latestInfoArray
     */
    public function setLatestInfoArray($latestInfoArray)
    {
        $this->latestInfoArray = $latestInfoArray;
    }

 /**
     * @param field_type $msgCount
     */
    public function setMsgCount($msgCount)
    {
        $this->msgCount = $msgCount;
    }

 /**
     * @param field_type $dataArr
     */
    public function setDataArr($dataArr)
    {
        $this->dataArr = $dataArr;
    }

    
    
    
    
    
    
    
    
    
    
}

?>