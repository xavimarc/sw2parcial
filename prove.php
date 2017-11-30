<?php session_start(); ?>
<script src="resource/js/jquery.js"></script>

<script language="javascript" type="text/javascript">
    function refnotify2(asunto) {
        alert(asunto);
        var adm = '<?php echo $_SESSION['idu']; ?>';
        var nref = '';
        if (asunto === 'Nuevo Grupo!!!')
            nref = "href='javascript:void(0)' onclick='showgroup(), listgrupo(" + adm + ");'";
        if (asunto === 'Nuevo Proyecto!!!')
            nref = "href='javascript:void(0)' onclick='showproyecto(), listproyecto(" + adm + "),get_grupo(" + adm + "),get_categ(),get_plazo();'";
        if (asunto === 'Nuevo Proceso!!!')
            nref = "href='javascript:void(0)' onclick='showproceso(), listproceso(),get_proyecto(" + adm + "),get_pla();'";
        if (asunto === 'Nueva Subtarea!!!')
            nref = "href='javascript:void(0)' onclick='showsubtarea(), lista_subtarea(" + adm + "), get_subcont(" + adm + "), get_subproc(" + adm + "), get_subplazo();'";
        if (asunto === 'Nuevo Recurso!!!')
            nref = "href='javascript:void(0)' onclick='shownotify(), listnotify(" + adm + "), get_notifcont(" + adm + "), get_asunt();";
        if (asunto === 'Notificacion!!!')
            nref = "href='javascript:void(0)' onclick='shownotify(), listnotify(" + adm + "), get_notifcont(" + adm + "), get_asunt();'";
        alert(nref);
    }
    alert(refnotify("Nuevo Grupo!!!");</script>

<?php

function refnotify4($asunto) {
    echo ($asunto);
    $adm = $_SESSION['idu'];
    $nref = '';
    if ($asunto === 'Nuevo Grupo!!!')
        $nref = "href='javascript:void(0)' onclick='showgroup(), listgrupo(" . $adm . ");'";
    if ($asunto === 'Nuevo Proyecto!!!')
        $nref = "href='javascript:void(0)' onclick='showproyecto(), listproyecto(" . $adm . "),get_grupo(" . $adm . "),get_categ(),get_plazo();'";
    if ($asunto === 'Nuevo Proceso!!!')
        $nref = "href='javascript:void(0)' onclick='showproceso(), listproceso(),get_proyecto(" . $adm . "),get_pla();'";
    if ($asunto === 'Nueva Subtarea!!!')
        $nref = "href='javascript:void(0)' onclick='showsubtarea(), lista_subtarea(" . $adm . "), get_subcont(" . $adm . "), get_subproc(" . $adm . "), get_subplazo();'";
    if ($asunto === 'Nuevo Recurso!!!')
        $nref = "href='javascript:void(0)' onclick='shownotify(), listnotify(" . $adm . "), get_notifcont(" . $adm . "), get_asunt();";
    if ($asunto === 'Notificacion!!!')
        $nref = "href='javascript:void(0)' onclick='shownotify(), listnotify(" . $adm . "), get_notifcont(" . $adm . "), get_asunt();'";
    echo $nref;
}

function refnotify3($asunto) {
    echo ($asunto).' asunt <br>';
    $adm = $_SESSION['idu']; $nref = '';
    switch ($asunto){
        case 'Nuevo Grupo!!!':
            $nref = "href='javascript:void(0)' onclick='showgroup(), listgrupo(" . $adm . ");'";
            break; 
        case 'Nuevo Proyecto!!!':
            $nref = "href='javascript:void(0)' onclick='showproyecto(), listproyecto(" . $adm . "),get_grupo(" . $adm . "),get_categ(),get_plazo();'";
            break; 
        case 'Nuevo Proceso!!!':
            $nref = "href='javascript:void(0)' onclick='showproceso(), listproceso(),get_proyecto(" . $adm . "),get_pla();'";
            break;
        case 'Nueva Subtarea!!!':
            $nref = "href='javascript:void(0)' onclick='showsubtarea(), lista_subtarea(" . $adm . "), get_subcont(" . $adm . "), get_subproc(" . $adm . "), get_subplazo();'";
            break; 
        case 'Nuevo Recurso!!!':
            $nref = "href='javascript:void(0)' onclick='shownotify(), listnotify(" . $adm . "), get_notifcont(" . $adm . "), get_asunt();";
            break; 
        case 'Notificacion!!!':
            $nref = "href='javascript:void(0)' onclick='shownotify(), listnotify(" . $adm . "), get_notifcont(" . $adm . "), get_asunt();'";
            break;
    }
    return $nref;
}

echo $_SESSION['idu'] . '<br>';
$val = 'Nuevo Grupo!!!';
echo $val . '<br>';
$notr = refnotify3($val);
echo $notr . '<br>';
//echo "<input type='button' value='Click' onClick='MiFuncionJS();' /><br>";
?>
<!--input type="button" value="Click" onclick="refnotify2('<?ph echo $val; ?>');" /><br-->
<?php
/**
 * Ejemplo del uso del datetime y datetimezone para obtener la fecha de cualquier
 * parte del mundo
 */
//# Mostramos la fecha de nuestro servidor
//echo "Fecha Actual: ".date("Y/m/d H:i:s");
//# Mostramos la fecha en UTC
//echo "Fecha UTC: ".gmdate("Y/m/d H:i:s");
//echo "<hr>";
// 
//# Mostramos la diferencia en segundos de Europe/Madrid en referencia al UTC
//# y mostramos la fecha de la zona horaria Europe/Madrid
//$timezone="Europe/Madrid";
//$dt=new datetime("now",new datetimezone($timezone));
////echo "Zona horaria: ".$dt->getTimezone()->getName();
////echo " Diferencia horaria con UTC (segundos): ".$dt->getOffset();
//echo "Fecha de la Zona horaria: ".gmdate("Y-m-d H:i:s",(time()+$dt->getOffset()));
// 
//echo "<hr>";
//# Mostramos la diferencia en segundos de Europe/Madrid en referencia al UTC
//# en una fecha dada
//$dateTimeUTC="2001-01-01 12:00:00";
//$dt=new datetime($dateTimeUTC,new datetimezone($timezone));
//echo "Zona horaria: ".$dt->getTimezone()->getName();
//echo "Diferencia horaria con UTC (segundos): ".$dt->getOffset();
//echo "Fecha de la Zona horaria: ".date("Y/m/d H:i:s",(strtotime($dateTimeUTC)+$dt->getOffset()));
// 
// 
//# Mostramos el listado de todas las zonas horarias con su hora actual
//echo "<hr>";
//echo "<p>Listado de las zonas horarias</p>";
// 
//echo "<div style='clear:both;float:left;width:200px;'>ZonaHoraria</div>";
//echo "<div style='float:left;width:70px;'>Dif. UTC</div>";
//echo "<div style='float:left;width:200px;text-align:center;'>Hora Actual</div>";
// 
//foreach(DateTimeZone::listIdentifiers() as $tz)
//{
//	echo "<div style='clear:both;float:left;width:200px;'>".$tz."</div>";
//	$dt=new datetime("now",new datetimezone($tz));
//	echo "<div style='float:left;width:70px;text-align:right;'>".$dt->getOffset()."</div>";
//	echo "<div style='float:left;width:200px;text-align:center;'>".gmdate("Y/m/d H:i:s",(time()+$dt->getOffset()))."</div>";
//}
?>




