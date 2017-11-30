<?php

require_once('../model/usuarioModel.php');

$funcion = $_POST['funcion'];

switch ($funcion) {
    case 'cerrar':
        session_start();
        session_destroy();
        echo 'Cerrando sesion...';
        break;
    case 'ingresar':
        $email = $_POST['user'];
        $password = $_POST['pass'];

        $notif = new usuarioModel();
        $array = $notif->identificar($email, $password);
        if ($array == NULL) {
            echo 'fallo';
        } else {
            session_start();
            $_SESSION['idu']=$array[0][0];
            $_SESSION['name']=$array[0][1];
            $_SESSION['cel']=$array[0][2];
            $_SESSION['user']=$array[0][3];
            $_SESSION['pass']=$array[0][4];
            $_SESSION['saludo']='Bienvenid@ Administrador';
            echo 'exito';
        }
        break;
    case 'actualizar':
        $iduser = $_POST['adm'];
        $nombre = $_POST['name'];
        $celular = $_POST['cel'];
        $usuario = $_POST['user'];;

        $notif = new usuarioModel();
        if ($notif->actualizar($iduser, $nombre, $celular, $usuario)) {
            echo 'exito';
        } else {
            echo 'No se registro los datos';
        }
        break;    
    case 'registrar':
        $nombre = $_POST['name'];
        $celular = $_POST['cel'];
        $usuario = $_POST['user'];;
        $password = $_POST['pass'];
        $instancia = new usuarioModel();
        if(!empty($nombre) && !empty($celular) && !empty($usuario) && !empty($password)){
            if ($instancia->registrar($nombre, $celular, $usuario, $password)){
                echo 'exito';
            }else
                echo "No se registro correctamente";
        } else {
            echo "Ingrese todos los datos";
        }
        break;
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
    default:
        break;
}
?>