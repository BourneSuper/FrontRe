
<?php
    //主控制器

    //require_once 'src/Components/FirstComponent/FirstComponentController.php';
  
    //1.普通类由 类加载器自动加载
    require_once 'src/Core/PSR4AutoLoader.php';
    $loader = new BourneSuper\FrontRe\Core\PSR4AutoLoader;
    $loader->register();
    $loader->addNamespace('Bourne\FrontRe', '/src');
    
    //2.加载次级控制器
recursionReadDir('.');
    
    
    //传入类名和方法名，实现反射调用
    if(empty($_REQUEST['cotrollerName']) && empty($_REQUEST['cotrollerMethod']) ){
       die("<br/>请先传入cotrollerName，cotrollerMethod"); 
    }
    
    $controllerName = $_REQUEST['cotrollerName'];
    $controllerMethod = $_REQUEST['cotrollerMethod'];
var_dump($_REQUEST);    
    $controller = new $controllerName();        
var_dump($controller);   
    $res = $controller->$controllerMethod();
    
    
    
    
    function loadSecondaryControllers($prefix){
        
    }
    
    function scanSecondaryControllers(){
        $arr = array();
        if( file_exists("secondaryControllerMap.php") ){
            $arr = require_once 'secondaryControllerMap.php';
        }else{
            
            scandir($directory);
            
        }
        
        return $arr;
        
    }
    
//------------------------    
    //执行遍历
    
    
    /**
     *@summary 重复times次字符char
     *@param $char 需要重复的字符
     *@param $times 重复次数
     *@return 返回重复字符组成的字符串
     */
    function forChar($char='-',$times=0){
        $result='';
        for($i=0;$i<$times;$i++){
            $result.=$char;
        }
        return $result;
    }
    
    /**
     *@summary  递归读取目录
     *@param $dirPath 目录
     *@param $Deep=0 深度，用于缩进,无需手动设置
     *@return 无
     */
    function recursionReadDir( $dirPath, $deep=0 ){
        $resDir = opendir( $dirPath );
        while( $baseName = readdir($resDir) ){
            //当前文件路径
            $path = $dirPath . '/' . $baseName;
            if(is_dir($path) && $baseName!='.' AND $baseName!='..'){
                //是目录，打印目录名，继续迭代
                echo forChar('-',$deep).$baseName.'/<br/>';
                $deep++;//深度+1
                recursionReadDir($path,$deep);
            }else if(basename($path)!='.' AND basename($path)!='..'){
                //不是文件夹，打印文件名
            	echo $path . basename ( $path ) . '<br/>';
            }
            
        }
        closedir($resDir);
    }
    
    exit;
    
$classmapFile = <<<EOF
<?php
    
return array(

EOF;
    
    
    foreach ($classMap as $class => $code) {
        $classmapFile .= '    '.var_export($class, true).' => '.$code;
    }
    $classmapFile .= ");\n";
    
    
    
?>





