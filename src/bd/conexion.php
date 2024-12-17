<?php
class bd{
    
    function __construct()
    {
    }
    //Para separar creé una función solo para la conexión
    function con(){
        $usuario = $_ENV[0]["DB_USER"];
        $pass = $_ENV[0]["DB_PASS"];
        $mysqlcon = new PDO('mysql:host=localhost;dbname=itp_share',$usuario,$pass);
        return $mysqlcon;
    }
}

?>
