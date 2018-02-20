
<?php
    //require_once 'src/Components/FirstComponent/FirstComponentController.php';
    use BourneSuper\FrontRe\Components\FirstComponen\FirstComponentController;
    
    
    //
    require_once 'src/Core/PSR4AutoLoader';
    $loader = new \Core\PSR4AutoLoader;
    $loader->register();
    $loader->addNamespace('Bourne\FrontRe', '/src');
    
    //传入类名和方法名，实现反射调用
    if(empty($_REQUEST['cotrollerName']) && empty($_REQUEST['cotrollerMethod']) ){
       die("<br/>请先传入cotrollerName，cotrollerMethod"); 
    }
    
    $controllerName = $_REQUEST['cotrollerName'];
    $controllerMethod = $_REQUEST['cotrollerMethod'];
    
    $controller = new $controllerName();        
    
    $res = $controller->$controllerMethod();
    
?>





