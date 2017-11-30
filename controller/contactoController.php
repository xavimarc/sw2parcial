<?php

require_once('../model/contactoModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'consultar':
        $valor = $_POST['val'];

        $notif = new contactoModel();
        $array = $notif->consultarcont($valor);
        echo json_encode($array);
        break;
    case 'actualizar':
        $iduser = $_POST['adm'];
        $nombre = $_POST['name'];
        $celular = $_POST['cel'];
        $usuario = $_POST['user'];

        $notif = new contactoModel();
        if ($notif->actualizarcont($iduser, $nombre, $celular, $usuario)) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $nombre = $_POST['name'];
        $celular = $_POST['cel'];
        $usuario = $_POST['user'];;
        $admin = $_POST['adm'];
        $instancia = new contactoModel();
        if(!empty($nombre) && !empty($celular) && !empty($usuario) && !empty($admin)){
            if ($instancia->registrarcont($nombre, $celular, $usuario, $admin)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'eliminar':
        $admin = $_POST['adm'];
        $iduser = $_POST['idcon'];
        $cont = new contactoModel(); //echo $admin.' '.$iduser;
        if ($cont->eliminarcont($admin, $iduser)) echo 'exito'; else echo 'falla';
        break;    
    default:
    case 'recuperar':
        $asunto = $_POST['asunto'];
        $nombre = $_POST['name'];
        $email = $_POST['pass'];
        $celular = $_POST['phone'];
        $destino="ghostbank4ll@gmail.com";
        
        $contenido="Nombre: ".$nombre."\nEmail: ".$email."\nCelular: ".$celular;
        
        
        $instancia = new usuario();
        if(!empty($asunto) && !empty($email) && !empty($celular)){
            //if($ins->recuperar($nombre, $email, $celular, $asunto, $destino, $contenido)) echo "exito";
            if(mail($destino, $asunto, $contenido)) echo "exito";else "No se envio el mensaje";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'sencont':
        $asunto = $_POST['subject'];
        $nombre = $_POST['name'];
        $email = $_POST['email'];
        $mensaje = $_POST['message'];
        $destino=$_POST['destino'];
        
        $contenido="Nombre: ".$nombre."\nEmail: ".$email."\nMensaje: ".$mensaje;
        
        
        $instancia = new usuario();
        if(!empty($asunto) && !empty($email) && !empty($mensaje)){
            //if($ins->recuperar($nombre, $email, $celular, $asunto, $destino, $contenido)) echo "exito";
            if(mail($destino, $asunto, $contenido)) echo "exito"; else "No se envio el mensaje";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
    case 'consultar':
        $nombre = $_POST['user'];
        
        $instancia = new usuario();
        $array = $instancia->consultar($nombre);
        if ($array == NULL){    
            echo 'Falla';
        } else {
            echo json_encode($array);
        }
        break;
    case 'consulteam':
        $valor = $_POST['val'];
        $notif = new contactoModel();
        $array = $notif->consulteam($valor);
        echo json_encode($array);
        break;    
    default:
        break;
}
?>