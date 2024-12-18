<?php
class bd{
    
    function __construct()
    {
    }
    //Para separar creé una función solo para la conexión
    function con(){
        $usuario = $_ENV[0]["DB_USER"];
        $pass = $_ENV[0]["DB_PASS"];
        $name = $_ENV[0]["DB_NAME"];
        try{
        $mysqlcon = new PDO("mysql:host=localhost;dbname=$name",$usuario,$pass);
        return $mysqlcon;
        }catch(PDOException $ex){
            die("Error al establecer conexión con la base de datos $_ENV[0]['DB_NAME']: ".$ex);
        }
    }
}

?>
