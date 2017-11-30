<?php
session_start();
$nom=$_SESSION['name'];
$ruta = '../resource/recurso/'.$nom.'/';
$mensaje = ''; $resp=''; $fail=''; $cal='';//echo $ruta;

include '../model/recursoModel.php';
$rec=new recursoModel(); 

function codeToMessage($code, $tam) {
    switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $message = "Tamaño maximo de archivo";
            break;
        case UPLOAD_ERR_FORM_SIZE || $tam>'8388608':
            $message = "Excede el tamaño maximo de archivo";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "Parcialmente subido";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "No pudo subirse";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Directorio perdido";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Falla al guardar";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "Fallo debido a la extension";
            break;
        default:
            $message = "Fallo, error desconocido";
            break;
    }
    return $message;
}

function getsize($val){
    switch ($val){
        case $val<1000:
            return 1;//'Baja';
            break;
        case $val>=1000 && $val<1000000:
            return 2;//'Media';
            break;
        case $val>=1000000:
            return 3;//'Alta';
            break;
    }
}

$sbr='';
if(isset($_SESSION['idu'])){
    $id=$_SESSION['idu'];
    $v3 = 'sbr'.$id;
    if(isset($_SESSION[".$v3."])){
        $sbr=$_SESSION[".$v3."];       
    }
}

 //else echo 'fail';
foreach ($_FILES as $key) {
    $nombreOriginal = $key['name']; $type = $key['type'];
    $size = $key['size']; $cal= getsize($size);
    if ($key['error'] === UPLOAD_ERR_OK) {
        $temporal = $key['tmp_name'];
        $destino = $ruta . $nombreOriginal;
        move_uploaded_file($temporal, $destino);
            if(isset($_SESSION[".$v3."])){
                if($rec->registrar($nombreOriginal, $type, $sbr, $destino)) $resp='exito';      
            }
        $resp='exito';    
    } else {
        $val =codeToMessage($key['error'],$size).' -> '.$nombreOriginal;
        $fail=$val.' ';
    }
}

if(isset($_SESSION[".$nom."])){
    unset($_SESSION[".$nom."]);
}
        
if($fail=='') echo $resp; else echo $fail;
