<?php

class grupoModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($grupo, $admin) {
        $sql = "INSERT INTO grupo VALUES(0, '$grupo', '$admin')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizargrupo($idg, $nombreg) {       
        $sql = "UPDATE grupo SET nombreg='$nombreg' WHERE idg='$idg'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function consultar($admin){
        $sql="SELECT * FROM grupo WHERE idadm='$admin'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
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
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
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
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function ingroup($admin){
        $sql="SELECT g.idg, g.nombreg,u.iduser, u.nombre
                FROM grupo g ,detalle_grupo dg, administrador ad, usuario u      
                    WHERE g.idg=dg.idg and g.idadm=ad.idadm and ad.idadm=u.iduser
                        and dg.idcon='$admin' ";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function eliminargrupo($idg) {        
        $sql = "DELETE FROM grupo WHERE idg='$idg'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function regdetgrupo($detalle) {
        session_start();
        //$adm=$_SESSION['idu']; $ida=1; 
        $mensaje='Eres parte de un nuevo grupo.'; $estado='No Leido';
        $timezone="America/La_Paz"; 
        $dt=new datetime("now",new datetimezone($timezone));
        $fecha=gmdate("Y-m-d",(time()+$dt->getOffset()));
        $hora=gmdate("H:i:s",(time()+$dt->getOffset()));
        
        $idg=$detalle[0];
        for($i=1; $i<count($detalle); $i++) {
            $idcon=$detalle[$i];
            $sql = "INSERT INTO detalle_grupo VALUES('$idg', '$idcon')";
            if(!$this->con->conexion->query($sql)) return false;
            /*$cont=new grupoModel(); 
            $cont->enviarnot(0, 'Eres parte de un nuevo grupo', '$fecha', '$hora', 'No Leido', 1, '1');*/
        }
        return true;
        $this->con->cerrar();
    }

    function enviarnot($mensaje, $fecha, $hora, $estado, $idast, $idadm, $idcon) {
        $sql = "INSERT INTO notificacion VALUES(0, '$mensaje', '$fecha', '$hora', '$estado', '$idast', '$idadm')";
        if($this->con->conexion->query($sql)){ 
            $sql2="SELECT MAX(idnot)AS idnot FROM notificacion WHERE idadm='$idadm'";
            $res=$this->con->conexion->query($sql2);
            $code = array();
            while ($re = $res->fetch_array(MYSQL_NUM)) {
                $code[] = $re;
            }
            $cod=$code[0][0];
            $sql3="INSERT INTO detalle_notificacion VALUES('$cod', '$idcon')";
            $this->con->conexion->query($sql3);
            return true;
        }else return false;
        $this->con->cerrar();
    }

    function consulgrupo($valor) {
        $sql="SELECT idg,nombreg FROM grupo WHERE idadm='$valor'" ;
            
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
}
/*$cont=new usuarioModel(); $r=$cont->registrar('Lucas Duran',74154963,'lucas@gmail.com','7777');
echo json_encode($r);*/
?>