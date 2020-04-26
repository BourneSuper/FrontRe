<?php

namespace BourneSuper\FrontRe\Core;

/**
 * 单例实现数据库工具
 * @author Bourne
 */
class SqlHelper{
    private static $instance;
    
    private $host = '';
    private $user = '';
    private $password = '';
    private $dbname = '';
    private $link;
    
    
    private function __construct(){
        $this->host = 'localhost:3306';
        $this->user = 'root';
        $this->password = 'root';
        $this->dbname = 'front_re';
        
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->dbname)
                or die("数据库连接失败:" );
        
        //mysqli_select_db($this->link, $this->dbname )
                //or die("数据库连接失败:" . mysqli_error($this->link));
    }
    
    /**
     * private 防止误调用
     */
    private function __clone(){}
    
    /**
     * @return \BourneSuper\FrontRe\Core\SqlHelper
     */
    public static function getSqlHelper(){
        
        if( !isset( self::$instance ) ){
            self::$instance = new SqlHelper();
        }
        
        return self::$instance;
    }
    
    /**
     * @param string $sql
     * @return \mysqli_result
     */
    public function query( $sql ){
        $this->keepLink();
       
        mysqli_query( $this->link, "set NAMES 'utf8'" );
        
        $res = mysqli_query( $this->link, $sql );
        
        if($res === false){
            die("<hr/>" . __FILE__ . '错误<hr/>' . $sql . '<hr/>' . mysqli_error($this->link) . "<hr/>");
        }
        
        return $res;
        
    }
    
    /**
     * @param string $sql
     * @return \mysqli_result
     */
    public function queryNoBreak($sql){
        $this->keepLink();
    
        //         mysql_query("set NAMES 'utf8'");
    
        $res = mysqli_query($this->link, $sql);
    
        if($res === false){
            print_r("<hr/>" . __FILE__ . '错误<hr/>' . $sql . '<hr/>' . mysqli_error($this->link) . "<hr/>");
        }
    
        return $res;
    
    } 
    
    /**
     * @param string $sql
     * @return \mysqli_result
     */
    public function queryPlain($sql){
        $this->keepLink();
    
        //mysql_query("set NAMES 'utf8'");
    
        $res = mysqli_query( $this->link, $sql );
    
//         if($res === false){
//             die("<hr/>" . __FILE__ . '错误<hr/>' . $sql . '<hr/>' . mysql_error() . "<hr/>");
//         }
    
        return $res;
    
    }
    
    /**
     * 
     */
    public function close(){
        if($this->link){
            mysqli_close($this->link);
            
            $this->null;
        }
        
    }
    
    /**
     * 
     */
    public function getLink(){
        return $this->Link();
    }
    
    /**
     * 
     */
    public function keepLink(){
        if(!$this->link){
            $this->__construct();
        }
    }
    
    
    
    
}

?>