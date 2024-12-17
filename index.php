<?php 
    require_once "env.php";
    //Asignación de tipo de contenido
    header("Content-Type:application/json");
    //Incluimos el archivo donde están las rutas
    require_once "src/routes/routes.php";
    //Creamos el enrutador
    $router = new routes();
    //Obtenemos el uri
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    //Obtenemos el método de la petición
    $method = $_SERVER['REQUEST_METHOD'];
    //agregamos el enrutador de la ruta raíz
    $router->routeRaiz($uri,$method);
    
?>