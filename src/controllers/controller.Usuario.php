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
    //creamos un objeto de nuestro modelo
    $model_us = new Model();
    //obtenemos los datos del body de la petición
    $body = file_get_contents('php://input');
    //decode de los datos json obtenidos del body
    $data = json_decode($body, true);
    //almacenamiento de los datos de manera individual
    //junto con la sanitización de cada uno para evitar XSS con htmlsepecialchars
    $nombre = htmlspecialchars($data['nombre'], ENT_QUOTES, 'UTF-8');
    $correo = htmlspecialchars($data['correo'], ENT_QUOTES, 'UTF-8');
    $matricula = htmlspecialchars($data['matricula'], ENT_QUOTES, 'UTF-8');
    //Encriptación de la contraseña para no ser alacenada en texto plano 
    $contrasena = password_hash(htmlspecialchars($data['contrasena'], ENT_QUOTES, 'UTF-8'),PASSWORD_BCRYPT);
    $imagen = htmlspecialchars($data['imagen'], ENT_QUOTES, 'UTF-8');
    echo $model_us->insUsu($nombre,$correo,$matricula,$contrasena,$imagen);
}
?>