<?php

require_once('../model/procesoModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $admin = $_POST['val'];
        $ins = new procesoModel();
        $array = $ins->consultar($admin);
        echo json_encode($array);
        break;
    case 'actualizar':
        $idp = $_POST['idp1'];
        $nombrep = $_POST['nombrep1'];
        $avance = $_POST['avance1'];


        $ins = new procesoModel();
        if ($ins->actualizarproceso($idp, $nombrep ,$avance)) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $nombrep = $_POST['nombrep'];
        $avance = $_POST['avance'];
        $idpro = $_POST['idpro'];
        $idpla = $_POST['idpla'];

        $inst = new procesoModel();
        if(!empty($nombrep)&& !empty($avance)&& !empty($idpro)&& !empty($idpla)){
            if ($inst->registrar($nombrep ,$avance,$idpro,$idpla)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'inproceso':
        $valor = $_POST['val'];
        $ins = new procesoModel();
        $array = $ins->inproceso($valor);
        echo json_encode($array);
        break;
    case 'eliminar':
        $idp = $_POST['idp3'];
        $cont = new procesoModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarproceso($idp)) echo 'exito'; else echo 'falla';
        break;    
    default:
    
        break;
    case 'getproyect':
        $adm = $_POST['adm'];
        $ins = new procesoModel();
        $array = $ins->getproyecto($adm);
        echo json_encode($array);
        break;    
    default: 
    case 'getprocess':
        $adm = $_POST['adm'];
        $ins = new procesoModel();
        $array = $ins->getprocess($adm);
        echo json_encode($array);
        break;    
    default: 
      
}
?>