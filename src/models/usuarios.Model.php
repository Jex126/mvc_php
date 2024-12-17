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
}
?>