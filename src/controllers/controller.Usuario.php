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
function form($method){
    match($method){
        'GET' => include(dirname(__DIR__)."/views/form.php"),
        'POST' => agregar(),
    };
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

function agregar(){
    $model_us = new Model();
    $body = file_get_contents('php://input');
    $data = json_decode($body, true);
    $nombre = $data['nombre'];
    $correo = $data['correo'];
    $matricula = $data['matricula'];
    $contrasena = $data['contrasena'];
    $imagen = $data['imagen'];
    echo $model_us->insUsu($nombre,$correo,$matricula,$contrasena,$imagen);
}
?>