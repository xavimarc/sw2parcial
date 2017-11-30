<?php

require_once('../model/proyectoModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $admin = $_POST['val'];
        $ins = new proyectoModel();
        $array = $ins->consultar($admin);
        echo json_encode($array);
        break;
    case 'actualizar':
        $idpro = $_POST['idproy1'];
        $nombrepro = $_POST['nombreproy1'];
        $prioridad = $_POST['prioridadproy1'];
        $ins = new proyectoModel();
        if ($ins->actualizarproyecto( $idpro,$nombrepro,$prioridad)) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $nombrepro = $_POST['nombreproy'];
        $prioridad = $_POST['prioridadproy'];
        $porcentaje = $_POST['porcentaje'];
        $idg= $_POST['idgproy'];
        $idcat = $_POST['idcatproy'];
		$idpla = $_POST['idplaproy'];
        $inst = new proyectoModel();
        if(!empty($nombrepro)&& !empty($prioridad)&& !empty($idg)&& !empty($idcat)&& !empty($idpla)){
            if ($inst->registrar($nombrepro,$prioridad,$porcentaje,$idg,$idcat,$idpla)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'inproyecto':
        $valor = $_POST['val'];
        $ins = new proyectoModel();
        $array = $ins->inproyecto($valor);
        echo json_encode($array);
        break;
    case 'eliminar':
        $idpro = $_POST['idpro3'];
        $cont = new proyectoModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarproyecto($idpro)) echo 'exito'; else echo 'falla';
        break;  
    case 'getproyect':
        $adm = $_POST['adm'];
        $ins = new proyectoModel();
        $array = $ins->getproyecto($adm);
        echo json_encode($array);
        break;   
    case 'consultproc':
        $idp = $_POST['val'];
        $ins = new proyectoModel();
        $array = $ins->consult_proc($idp);
        echo json_encode($array);
        break;
    case 'procend':
        $idp = $_POST['val'];
        $ins = new proyectoModel();
        $array = $ins->process_end($idp);
        echo json_encode($array);
        break;
    case 'idpro':
        $idpro = $_POST['val'];
        $ins = new proyectoModel();
        if ($ins->add_id($idpro)) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;  
    default:
        break;
}
?>