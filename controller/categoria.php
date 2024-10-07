<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../model/Categoria.php");
    
    $categoria = new Categoria();

    //para poder enviar por post con json la variable
    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetAll":
            $datos = $categoria->get_categoria();
            echo json_encode($datos);
            break;

        case "GetId":
            //recibe la variable en el body
            $datos = $categoria->get_categoria_id($body["cat_id"]);
            echo json_encode($datos);
            break;
        
        case "Insert":
            //recibe la variable en el body
            $datos = $categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Insertado correctamente!");
            break;
        
        case "Update":
            //recibe la variable en el body
            $datos = $categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Actualizado correctamente!");
            break;
        
        case "Delete":
            //recibe la variable en el body
            $datos = $categoria->delete_categoria($body["cat_id"]);
            echo json_encode("Desactivado correctamente!");
            break;
        

    }

?>