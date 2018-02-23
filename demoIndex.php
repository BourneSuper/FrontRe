<!DOCTYPE html>
<html >
    <head>
        <script type="text/javascript" src="src/plugins/js/jquery-1.11.3.js" ></script>
        <script type="text/javascript" >

             function ajaxSubmit(){
            
                var cotrollerName = $("input[name=cotrollerName]")[0].value;
//                 var cotrollerMethod = $("input[name=cotrollerMethod]")[0].value;
                var cotrollerMethod = "ajaxLogin"
                
                var userId = $("input[name=userId]")[0].value;
                var password = $("input[name=password]")[0].value;
                                
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: "mainController.php",
                    data:{
                        "cotrollerName" : cotrollerName,
                        "cotrollerMethod" : cotrollerMethod,
                        "userId" : userId,
                        "password" : password,
                        
                    } ,
                    success: function(data, staus, xhr){
//                         console.dir(xhr)
//                         console.dir(data);
                        alert(data.msg);
                    
                    },
                    error : function(xhr,errorMsg,e){
                        alert(errorMsg + xhr.responseText );
                    }
                    ,
                    dataType : "json"
                    
           		});


             }
        </script>
    </head>
    <body>
        <form action="mainController.php" method="post">
                                类名：<input type="text" name='cotrollerName' value="FirstComponentController" size="30"/><br/>
                                方法名：<input type="text" name='cotrollerMethod' value="login"/><br/>
                                用户名：<input type="text" name='userId'  /><br/>
                                密码：<input type="password" name='password'  /><br/>
            
            <input type="submit" value="提交"/>
        </form>
        
        <br/>
        <br/>
        
        <input type="button" value='使用ajax提交' onclick="ajaxSubmit();"/>
    
    </body>
    
</html>


<?php

?>