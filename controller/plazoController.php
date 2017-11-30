<?php

require_once('../model/plazoModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $ins = new plazoModel();
        $array = $ins->consultar();
        echo json_encode($array);
        break;
    case 'actualizar':
        $idp = $_POST['idp'];
        $fechaini = $_POST['fechaini1'];
        $fechafin = $_POST['fechafin1'];
        $ins = new plazoModel();
        if ($ins->actualizarplazo($idp, $fechaini ,$fechafin)) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $fechaini = $_POST['fechaini'];
        $fechafin = $_POST['fechafin'];
        $inst = new plazoModel();
        if(!empty($fechaini)&& !empty($fechafin)){
            if ($inst->registrar($fechaini, $fechafin)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'eliminar':
        $idp = $_POST['idp2'];
        $cont = new plazoModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarplazo($idp)) echo 'exito'; else echo 'falla';
        break;    
    default:
        break;
}
?>