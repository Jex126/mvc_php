<?php
require_once (dirname(__DIR__)).'/controllers/controller.Usuario.php';
class routes{
    function __construct()
    {
    }
    function routeRaiz(string $uri,string $method){
        $controller = new controllers();
        match($uri){
            '/usuarios' =>$controller->respUsu($method),
            '/' =>$controller->respPrin($method),
            default =>$controller->resp404($method),
        };
    }

}
?>