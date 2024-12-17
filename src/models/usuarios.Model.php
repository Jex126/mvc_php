<?php 
require_once "src/bd/conexion.php";
class Model{
    function __construct()
    {
        
    }
    function queryUsu(): array{
        $bd = new bd();
        $objResp = [];
        $mysqli = $bd->con();
        if ($resp = $mysqli->query("SELECT * FROM usuarios")) {
            while ( $fila = $resp->fetch_assoc()) {
                array_push($objResp,array("nombre"=>$fila["nombre"]));
            }
        }
        return $objResp;
    }
}
$medel = new Model();
$medel->queryUsu();
?>