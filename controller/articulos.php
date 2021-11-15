<?php
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
      }
        header('Access-Control-Allow-Origin: *');
       

    require_once("../config/conexion.php");
    require_once("../models/Articulos.php");
    $articulos = new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetArticulos":
            $datos=$articulos->get_articulos();
            echo json_encode($datos);
        break;
        
        case "GetUno":
            $datos=$articulos->get_articulo($body["ID"]);
            echo json_encode($datos);
        break;
        
        case "InsertArticulo":
            $datos=$articulos->insert_articulo($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ID_SOCIO"]);
            echo json_encode("Articulo agregado");
        break;
        
        case "EliminarArticulo":
            $datos=$articulos->delete_articulo($body["ID"]);
            echo json_encode("Articulo Eliminado");
        break;
        
        case "ActualizarArticulo":
            $datos=$articulos->update_articulo($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ID_SOCIO"]);
            echo json_encode("Articulo Actualizado");
        break;
    }
?>