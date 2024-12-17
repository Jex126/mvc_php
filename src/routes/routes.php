<?php
require_once "src/controllers/controller.Usuario.php";
class routes{
    function __construct()
    {
    }
    function routeRaiz(string $uri,string $method){
        $controller = new controllers();
        match($uri){
            '/usuarios' =>$controller->respUsu($method),
            default =>$controller->resp404($method),
        };
    }

   
}
?>