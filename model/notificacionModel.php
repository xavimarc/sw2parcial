<?php

class notificacionModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($mensaje, $fecha, $hora, $estado, $idast, $idadm, $idcon) {
        $sql = "INSERT INTO notificacion VALUES(0, '$mensaje', '$fecha', '$hora', '$estado', '$idast', '$idadm')";
        if($this->con->conexion->query($sql)){ 
            $sql2="SELECT MAX(idnot)AS idnot FROM notificacion WHERE idadm='$idadm'";
            $res=$this->con->conexion->query($sql2);
            $code = array();
            while ($re = $res->fetch_array(MYSQLI_NUM)) {
                $code[] = $re;
            }
            $cod=$code[0][0];
            $sql3="INSERT INTO detalle_notificacion VALUES('$cod', '$idcon')";
            $this->con->conexion->query($sql3);
            return true;
        }else return false;
        $this->con->cerrar();
    }
    
    function cambiar_estado($idnot) {       
        $sql = "UPDATE notificacion SET estado='Leido' WHERE idnot='$idnot'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function consultar($admin){
        $sql="SELECT n.idnot, n.mensaje, n.fecha, n.hora, n.estado, a.nombrea, u.nombre 
              FROM notificacion n, detalle_notificacion d, asunto a, usuario u 
              WHERE n.idast=a.idast AND n.idadm=u.iduser AND d.idnot=n.idnot AND n.estado='No Leido' AND d.idcon='$admin' ORDER BY 1 DESC";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function consultarall($admin){
        $sql="SELECT n.idnot, n.mensaje, n.fecha, n.hora, n.estado, a.nombrea, u.nombre 
              FROM notificacion n, detalle_notificacion d, asunto a, usuario u 
              WHERE n.idast=a.idast AND n.idadm=u.iduser AND d.idnot=n.idnot AND d.idcon='$admin' ORDER BY 1 DESC";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function get_asunto(){
        $sql="SELECT * FROM asunto ORDER BY 1 DESC";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function cantmensajes($admin){
        $sql="SELECT COUNT(*)AS cantmsg FROM notificacion n, detalle_notificacion d 
                WHERE d.idnot=n.idnot AND n.estado='No Leido' AND d.idcon='$admin'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function detgrupo($idadm, $idg){
        $sql="SELECT u.iduser, u.nombre, u.celular, u.email FROM (SELECT c.idcon FROM detalle_contacto c 
              WHERE c.idadm='$idadm' AND c.idcon NOT IN(SELECT d.idcon FROM detalle_grupo d 
                                            WHERE d.idg='$idg' AND d.idcon))as r, usuario u WHERE r.idcon=u.iduser";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function get_team($idg){
        $sql="SELECT c.iduser, c.nombre, c.celular, c.email FROM detalle_grupo d, usuario c 
              WHERE d.idcon=c.iduser AND d.idg='$idg'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function ingroup($admin){
        $sql="SELECT g.idg, g.nombreg, g.idadm, a.nombre
              FROM (SELECT DISTINCT d.idg 
                    FROM detalle_grupo d 
                    WHERE d.idcon=1 AND d.idg NOT IN(SELECT idg 
                                                     FROM grupo g WHERE g.idadm=1))as t, grupo g, usuario a
              WHERE t.idg=g.idg AND g.idadm=a.iduser";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function eliminargrupo($idg) {        
        $sql = "UPDATE notificacion SET estado='Leido' WHERE idnot='$idnot'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function regdetgrupo($detalle) {
        $idg=$detalle[0];
        for($i=1; $i<count($detalle); $i++) {
            $idcon=$detalle[$i];
            $sql = "INSERT INTO detalle_grupo VALUES('$idg', '$idcon')";
            if(!$this->con->conexion->query($sql)) return false;
        }
        return true;
        $this->con->cerrar();
    }
    
    function countmessage($grupo){
        $sql="SELECT COUNT(*)AS cant FROM notificacion WHERE idpro='$grupo'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
}
//$cont=new notificacionModel(); $r=$cont->get_asunto(); echo json_encode($r);
?>