<?php 
require_once dirname(__DIR__)."/models/usuarios.Model.php";
class controllers{
    function __construct(){

    }
    //Respuesta para la ruta /usuarios
    function respUsu($metodo){
    $model_us = new Model();
    $queryRes = $model_us->queryUsu();
    if($metodo === 'GET'){
    echo json_encode($queryRes);
}
}

    //Respuesta cuando no se encuentra la ruta
    function resp404($metodo){  
        if($metodo === 'GET'){
        echo json_encode(["msj"=>"404"]);
    }
}

}
?>