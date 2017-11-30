<?php

require_once('../model/categoriaModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $ins = new categoriaModel();
        $array = $ins->consultar();
        echo json_encode($array);
        break;
    case 'actualizar':
        $idc = $_POST['idcat'];
        $nombrec = $_POST['namecat'];


        $ins = new categoriaModel();
        if ($ins->actualizarcategoria($idc, $nombrec )) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $nombrec = $_POST['namecat'];

        $inst = new categoriaModel();
        if(!empty($nombrec)){
            if ($inst->registrar($nombrec)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'eliminar':
        $idc = $_POST['idcat'];
        $cont = new categoriaModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarcategoria($idc)) echo 'exito'; else echo 'falla';
        break;    
    default:
    
            break;
}
?>