<?php

namespace BourneSuper\FrontRe\Core;

/*
 * 单例实现数据库工具
 */
class SqlHelper{
    private $host = '';
    private $user = '';
    private $password = '';
    private $dbname = '';
    private $link;
    
    //待解耦
    public function __construct(){
        $this->host = 'localhost:3306';
        $this->user = 'root';
        $this->password = 'root';
        $this->dbname = 'front_re';
        
        @$this->link = mysqli_connect($this->host, $this->user, $this->password)
                or die("数据库连接失败:" . iconv("GBK", "UTF-8", mysql_error()) );
        
        mysqli_select_db($this->dbname, $this->link)
                or die("数据库连接失败:" . mysqli_error());
        
        @session_start();
        
        $_SESSION['sqlHelper'] = $this;
        
        
    }
    
    public static function getSqlHelper(){
        
        @session_start();
        
        if( !isset($_SESSION['sqlHelper']) ){
            $temp = new SqlHelper();
            return $temp;
        }
        
        return $_SESSION['sqlHelper'];
    }
    
    public function query($sql){
        $this->keepLink();
        
        mysqli_query("set NAMES 'utf8'");
        
        $res = mysqli_query($sql, $this->link);
        
        if($res === false){
            die("<hr/>" . __FILE__ . '错误<hr/>' . $sql . '<hr/>' . mysqli_error() . "<hr/>");
        }
        
        return $res;
        
    }
    
    public function queryNoBreak($sql){
        $this->keepLink();
    
        //         mysql_query("set NAMES 'utf8'");
    
        $res = mysqli_query($sql, $this->link);
    
        if($res === false){
            print_r("<hr/>" . __FILE__ . '错误<hr/>' . $sql . '<hr/>' . mysqli_error() . "<hr/>");
        }
    
        return $res;
    
    } 
    
    public function queryPlain($sql){
        $this->keepLink();
    
        //         mysql_query("set NAMES 'utf8'");
    
        $res = mysqli_query($sql, $this->link);
    
//         if($res === false){
//             die("<hr/>" . __FILE__ . '错误<hr/>' . $sql . '<hr/>' . mysql_error() . "<hr/>");
//         }
    
        return $res;
    
    }
    
    public function close(){
        if($this->link){
            mysqli_close($this->link);
            
            $this->null;
        }
        
    }
    
    
    
    public function getLink(){
        return $this->Link();
    }
    
    public function keepLink(){
        if(!$this->link){
            $this->__construct();
        }
    }
    
    
    
    
}

?>