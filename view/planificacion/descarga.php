<?php session_start();
$res=preg_replace('[\s+]', "", $_SESSION['name']); 
//echo $res;

//Si la variable archivo que pasamos por URL no esta 
//establecida acabamos la ejecucion del script.
//if (!isset($_GET['archivo']) || empty($_GET['archivo'])) {
//   exit();
//}

//Utilizamos basename por seguridad, devuelve el 
//nombre del archivo eliminando cualquier ruta. 
$archivo = basename($_GET['archivo']);
//include '../../resource/recurso/';
$ruta = '../../resource/recurso/'.$res.'/'.$archivo;
//echo $ruta;
if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archivo);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));

   readfile($ruta);
}
else
   exit();
