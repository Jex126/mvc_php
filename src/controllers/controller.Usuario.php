<?php 
require_once dirname(__DIR__)."/models/usuarios.Model.php";
class controllers{
    function __construct(){

    }
    //Respuesta para la ruta /usuarios
    function respUsu($metodo){
    header("Content-Type:application/json");
    header("Access-Control-Allow-Origin: *");  // Permite el acceso desde cualquier origen
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  // Métodos permitidos
    header("Access-Control-Allow-Headers: Content-Type, Authorization");  
    $model_us = new Model();
    $queryRes = $model_us->queryUsu();
    if($metodo === 'GET'){
    echo json_encode($queryRes);
}
}
    function respPrin($method){
        return include(dirname(__DIR__)."/views/principal.php");
    }
    //Respuesta cuando no se encuentra la ruta
    function resp404($metodo){  
        header("Content-Type:application/json"); 
        if($metodo === 'GET'){
        echo json_encode(["msj"=>"404"]);
    }
}

}
?>