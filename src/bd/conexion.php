<?php
class bd{
    function __construct()
    {
    }
    //Para separar creé una función solo para la conexión
    function con(){
        $mysqli = new mysqli("localhost", "root", "Mysql_126", "itp_share");
        return $mysqli;
    }
}

?>
