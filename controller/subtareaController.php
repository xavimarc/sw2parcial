<?php

require_once('../model/subtareaModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $admin = $_POST['val'];
        $inst = new subtareaModel();
        $array = $inst->consultar($admin);
        echo json_encode($array);
        break;
    case 'registrar':
        $nombre = $_POST['nombt'];
        $estado = $_POST['est'];
        $proceso = $_POST['proc'];
        $contacto = $_POST['cont'];
        $plazo = $_POST['pla'];
        $inst = new subtareaModel();
        if(!empty($nombre) && !empty($estado) && !empty($proceso) && !empty($contacto) && !empty($plazo)){
            if ($inst->registrar($nombre, $estado, $proceso, $contacto, $plazo)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'actualizar':
        $idt = $_POST['idt'];
        $nombre = $_POST['nombt'];
        $estado = $_POST['est'];
        $inst = new subtareaModel();
        if(!empty($idt) && !empty($nombre) && !empty($estado)){
            if ($inst->actualizar($idt, $nombre, $estado)) echo 'exito'; else echo 'No se registro los datos';
        } else {
            echo 'Ingrese todos los datos';
        }
        break;
    case 'eliminar':
        $idt = $_POST['idt'];
        $cont = new subtareaModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminar($idt)) echo 'exito'; else echo 'falla';
        break;
    case 'detgrupo':
        $idadm = $_POST['val'];
        $idg = $_POST['idg'];
        $ins = new grupoModel();
        $array = $ins->detgrupo($idadm, $idg);
        echo json_encode($array);
        break;    
    case 'ingroup':
        $valor = $_POST['val'];
        $ins = new grupoModel();
        $array = $ins->ingroup($valor);
        echo json_encode($array);
        break;
    case 'addcontact':
        $idg = $_POST['idg'];
        $detalle=array();
        $detalle[]=$idg;
        if (isset($_POST['check'])) {
            foreach ($_POST['check'] as $index => $valor) {
                $detalle[]=$valor; 
            }
            $inst=new grupoModel();
            if($inst->regdetgrupo($detalle)) echo 'exito'; else echo 'No se guardo los datos';
        } else echo 'Seleccione algun contacto';
        break;
    case 'geteam':
        $idg = $_POST['idg'];
        $ins = new grupoModel();
        $array = $ins->get_team($idg);
        echo json_encode($array);
        break;
    case 'contgroup':
        $adm = $_POST['adm'];
        $proc = $_POST['proc'];
        $inst = new subtareaModel();
        $array = $inst->contactGroup($proc, $adm);
        echo json_encode($array);
        break;
    case 'workasign':
        $adm = $_POST['adm'];
        $inst = new subtareaModel();
        $array = $inst->work_asign($adm);
        echo json_encode($array);
        break;
    default:
        break;
}
?>