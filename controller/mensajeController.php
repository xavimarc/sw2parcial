<?php

require_once('../model/mensajeModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $ins = new mensajeModel();
        $idt = $_POST['idtp'];
        $array = $ins->consultar($idt);
        echo json_encode($array);
        break;
    case 'consult_topic':
        $ins = new mensajeModel();
        $idu = $_POST['idu'];
        $idf = $_POST['idf'];
        $array = $ins->consultar_topic($idu, $idf);
        echo json_encode($array);
        break;
    case 'actualizar':
        $idc = $_POST['idcat'];
        $nombrec = $_POST['namecat'];


        $ins = new mensajeModel();
        if ($ins->actualizarcategoria($idc, $nombrec )) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $contenido = $_POST['contmp'];
        $idrp = $_POST['idrpm'];
        $fecha = $_POST['fecact'];
        $idtp = $_POST['idtop'];
        $idadm = $_POST['idmu'];

        $inst = new mensajeModel();
        if(!empty($contenido) && !empty($fecha)){
            if ($inst->registrar($contenido, $idrp, $fecha, $idtp, $idadm)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'sub_msg':
        $idmpb = $_POST['idmp'];
        
        $ins = new mensajeModel();
        $array = $ins->sub_message($idmpb);
        echo json_encode($array);
        break;   
    case 'eliminar':
        $idc = $_POST['idcat'];
        $cont = new mensajeModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarcategoria($idc)) echo 'exito'; else echo 'falla';
        break;    
    default:
        break;
}
?>