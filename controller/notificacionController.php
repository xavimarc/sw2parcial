<?php

require_once('../model/notificacionModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $valor = $_POST['val'];
        $notif = new notificacionModel();
        $array = $notif->consultar($valor);
        echo json_encode($array);
        break;
    case 'consultarall':
        $valor = $_POST['val'];
        $notif = new notificacionModel();
        $array = $notif->consultarall($valor);
        echo json_encode($array);
        break;
    case 'countmsg':
        $idadm = $_POST['val'];
        $notif = new notificacionModel();
        $array = $notif->cantmensajes($idadm);
        echo json_encode($array);
        break;
    case 'cambiarest':
        $idnot = $_POST['idn'];
        $notif = new notificacionModel();
        $notif->cambiar_estado($idnot);
        break;
    case 'registrar':
        $mensaje = $_POST['msg'];
        $fecha = $_POST['fecn'];
        $hora = $_POST['hora'];
        $estado = $_POST['estn'];
        $asunto = $_POST['ast'];
        $admin = $_POST['admn'];
        $contact = $_POST['contn'];
        $notif = new notificacionModel();
        if(!empty($mensaje) && !empty($fecha) && !empty($hora) && !empty($estado) && !empty($asunto) && !empty($admin)){
            if ($notif->registrar($mensaje, $fecha, $hora, $estado, $asunto, $admin, $contact)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'getasunt':
        $notif = new notificacionModel();
        $array = $notif->get_asunto();
        echo json_encode($array);
        break;    
    case 'actualizar':
        $idg = $_POST['grupo'];
        $nombreg = $_POST['nameg'];
        $notif = new notificacionModel();
        if ($notif->actualizargrupo($idg, $nombreg )) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;
    case 'eliminar':
        $idg = $_POST['idgrupo'];
        $cont = new notificacionModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminargrupo($idg)) echo 'exito'; else echo 'falla';
        break;
    case 'ingroup':
        $valor = $_POST['val'];
        $notif = new notificacionModel();
        $array = $notif->ingroup($valor);
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
            $notif=new notificacionModel();
            if($notif->regdetgrupo($detalle)) echo 'exito'; else echo 'No se guardo los datos';
        } else echo 'Seleccione algun contacto';
        break;
    case 'geteam':
        $idg = $_POST['idg'];
        $notif = new notificacionModel();
        $array = $notif->get_team($idg);
        echo json_encode($array);
        break;
    default:
        break;
}
?>