<?php

require_once('../model/grupoModel.php');
require_once('../model/notificacionModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $valor = $_POST['val'];
        $ins = new grupoModel();
        $array = $ins->consultar($valor);
        echo json_encode($array);
        break;
    case 'detgrupo':
        $idadm = $_POST['val'];
        $idg = $_POST['idg'];
        $ins = new grupoModel();
        $array = $ins->detgrupo($idadm, $idg);
        echo json_encode($array);
        break;
    case 'registrar':
        $grupo = $_POST['grupo'];
        $admin = $_POST['adm'];
        $inst = new grupoModel();
        if(!empty($grupo) && !empty($admin)){
            if ($inst->registrar($grupo, $admin)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'actualizar':
        $idg = $_POST['grupo'];
        $nombreg = $_POST['nameg'];
        $ins = new grupoModel();
        if ($ins->actualizargrupo($idg, $nombreg )) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;
    case 'eliminar':
        $idg = $_POST['idgrupo'];
        $cont = new grupoModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminargrupo($idg)) echo 'exito'; else echo 'falla';
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
    case 'consulgrupo':
        $valor = $_POST['val'];
        $ins = new grupoModel();
        $array = $ins->consulgrupo($valor);
        echo json_encode($array);
        break;    
    default:
        break;
}
?>