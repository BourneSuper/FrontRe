
<?php
    //主控制器

    //require_once 'src/Components/FirstComponent/FirstComponentController.php';
  
    //1.普通类由 类加载器自动加载
    require_once 'src/Core/PSR4AutoLoader.php';
    $loader = new BourneSuper\FrontRe\Core\PSR4AutoLoader;
    $loader->register();
    $loader->addNamespace('Bourne\FrontRe', '/src');
    
    //2.加载次级控制器
    loadSecondaryControllers("Bourne\FrontRe");
    
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
        
    	$arr = scanSecondaryControllers();
    	
    	foreach( $arr as $value ){
    		if( strpos($value, "mainController.php") === false ){
    			//require_once $value;
    		}
    		
    	}
    	
var_dump($arr);    	

    }
    
    /**
     * fn return an array of file name of controller
     * @return array
     */
    function scanSecondaryControllers(){
        $arr = array();
        if( file_exists("secondaryControllerMap.php") ){
            $arr = require_once 'secondaryControllerMap.php';
        }else{
        	
        	$fileArr = [];
        	recursionFindFile( '.', $fileArr );
        	
        	foreach( $fileArr as $value ){
        		if( strpos($value, "Controller.php") !== false ){
        			$contollerNamePosition = strrpos($value, '\\');
        			$contollerName = substr($value, $contollerNamePosition + 2, -4);
        			$arr[$contollerName] = $value;
				}
        	}
            
        }
        
        return $arr;
        
    }
    
//------------------------    
    //执行遍历
    
    /**
     *@summary  递归读取目录
     *@param $dirPath 目录
     *@param $Deep=0 深度，用于缩进,无需手动设置
     *@return 无
     */
    function recursionFindFile( $dirPath, &$resArr){
        $resDir = opendir( $dirPath );
        while( $baseName = readdir($resDir) ){
            //当前文件路径
            $path = $dirPath . '/' . $baseName;
            if(is_dir($path) && $baseName!='.' && $baseName!='..'){
            	recursionFindFile( $path, $resArr );
            }else if(basename($path)!='.' AND basename($path)!='..'){
                //不是文件夹，打印文件名
            	//echo $path . '<br/>';
            	$resArr[] = $path;
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





