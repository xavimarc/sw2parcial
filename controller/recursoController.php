<?php

require_once('../model/recursoModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $adm = $_POST['val'];
        $rec = new recursoModel();
        $array = $rec->consultar($adm);
        echo json_encode($array);
        break;
    case 'newrecurso':
        session_start();
        $id=$_SESSION['idu'];
        $n3 = 'sbr'.$id;    
        $_SESSION[".$n3."] = $_POST['sbr'];
        break;
    case 'actualizar':
        $idr = $_POST['idr'];
        $nombrer = $_POST['nombr'];
        $tipo = $_POST['tpr'];
        $rec = new recursoModel();
        if(!empty($idr) && !empty($nombrer) && !empty($tipo) && !empty($tarea)){
            if ($rec->actualizar($idr, $nombrer, $tipo)) echo 'exito'; else echo 'No se registro los datos';
        } else {
            echo 'Ingrese todos los datos';
        }
        break;
    case 'eliminar':
        $idr = $_POST['idr'];
        $rec = new recursoModel(); //echo $admin.' '.$iduser;
        if ($rec->eliminar($idr)) echo 'exito'; else echo 'falla';
        break;
    case 'allres':
        $adm = $_POST['adm'];
        $rec = new recursoModel();
        $array = $rec->all_resource($adm);
        echo json_encode($array);
        break;    
    default:
        break;
}
?>