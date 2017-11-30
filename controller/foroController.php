<?php

require_once('../model/foroModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $ins = new foroModel();
        $idu = $_POST['idu'];
        $array = $ins->consultar($idu);
        echo json_encode($array);
        break;
    case 'consult_topic':
        $ins = new foroModel();
        $idu = $_POST['idu'];
        $idf = $_POST['idf'];
        $array = $ins->consultar_topic($idu, $idf);
        echo json_encode($array);
        break;
    case 'actualizar':
        $idc = $_POST['idcat'];
        $nombrec = $_POST['namecat'];


        $ins = new foroModel();
        if ($ins->actualizarcategoria($idc, $nombrec )) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $nombre = $_POST['namef'];
        $descripcion = $_POST['descf'];
        $estado = $_POST['estf'];
        $grupo = $_POST['addgrp'];

        $inst = new foroModel();
        if(!empty($nombre) && !empty($descripcion)){
            if ($inst->registrar($nombre, $descripcion, $estado, $grupo)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'reg_topic':
        $titulo = $_POST['titp'];
        $bloqueado = $_POST['btp'];
        $fecha = $_POST['fectp'];
        $foro = $_POST['idforo'];
        $admin = $_POST['idadm'];

        $inst = new foroModel();
        if(!empty($titulo) && !empty($fecha)){
            if ($inst->registrar_topico($titulo, $bloqueado, $fecha, $foro, $admin)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;    
    case 'eliminar':
        $idc = $_POST['idcat'];
        $cont = new foroModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarcategoria($idc)) echo 'exito'; else echo 'falla';
        break;    
    default:
        break;
}
?>