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
        $query = $mysqli->query('CALL usuarios()'); 
        foreach( $query as $fila) {
            array_push($objResp,$fila);
        }
        return $objResp;
    }
}
?>