<?php
require_once dirname(__DIR__)."/bd/conexion.php";
class Model{
    function __construct()
    {
        
    }
    function queryUsu(): array{
        $bd = new bd();
        $objResp = [];
        $mysqlcon = $bd->con();
        $query = $mysqlcon->query('CALL usuarios()'); 
        foreach( $query as $fila) {
            array_push($objResp,$fila);
        }
        $mysqlcon = null;
        $query = null;
        return $objResp;
    }
    function insUsu(string $nombre,string $correo,string $matricula,string $contrasena,string $imagen){
        $bd = new bd();
        $mysqlcon = $bd->con();
        $sql = 'CALL insertar_alumno(:nombre,:correo,:matricula,:contrasena,:imagen)'; 
        $stmt = $mysqlcon->prepare($sql);
        /*$nombre = "joaf";
        $correo= "afjafk@djglksd";
        $matricula = "29293844";
        $contrasena = "124";
        $imagen = "/img/joaf.jpg";*/
        $stmt->bindParam('nombre',$nombre,PDO::PARAM_STR);
        $stmt->bindParam('correo',$correo,PDO::PARAM_STR);
        $stmt->bindParam('matricula',$matricula,PDO::PARAM_STR);
        $stmt->bindParam('contrasena',$contrasena,PDO::PARAM_STR);
        $stmt->bindParam('imagen',$imagen,PDO::PARAM_STR);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $resultados[0]['status'];
    }

}
?>