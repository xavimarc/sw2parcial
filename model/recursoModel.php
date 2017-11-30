<?php

class recursoModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($nombre, $tipo, $idt, $url) {
        $sql = "INSERT INTO recurso VALUES(0, '$nombre', '$tipo', '$idt', '$url')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizar($idr, $nombre, $tipo) {
        $sql = "UPDATE recurso SET nombrer='$nombre', tipo='$tipo' WHERE idr='$idr'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function consultar($admin){
        $sql="SELECT r.idr, r.nombrer, r.tipo, r.idt, t.nombret, f.nombrep, p.nombrepro, r.url 
              FROM recurso r, subtarea t, proceso f, proyecto p 
              WHERE p.idpro=f.idpro AND t.idp=f.idp AND t.idt=r.idt AND t.idcon='$admin' ORDER BY 1 DESC";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function all_resource($admin){
        $sql="SELECT r.idr, r.nombrer, r.url, f.nombret, f.estado, f.nombrep, f.nombre FROM recurso r, (SELECT v.idt, v.nombret, v.estado, proceso.nombrep, v.nombre, v.fechaini, v.fechafin FROM proceso, (SELECT t.idt, t.nombret, t.estado, t.idp, usuario.nombre, t.fechaini, t.fechafin FROM usuario, (SELECT r.idt, r.nombret, r.estado, r.idp, r.idcon, plazo.fechaini, plazo.fechafin FROM plazo, (SELECT DISTINCT(subtarea.idt), subtarea.nombret, subtarea.estado, subtarea.idp, subtarea.idcon, subtarea.idpla FROM subtarea, proceso, proyecto, grupo, administrador WHERE subtarea.idp=proceso.idp AND proceso.idpro=proyecto.idpro AND proyecto.idg=grupo.idg AND grupo.idg IN(SELECT grupo.idg FROM grupo WHERE grupo.idadm='$admin'))AS r WHERE r.idpla=plazo.idpla)AS t WHERE t.idcon=usuario.iduser)AS v WHERE v.idp=proceso.idp)AS f WHERE f.idt=r.idt ORDER BY 1 DESC";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function eliminar($idr) {        
        $sql = "DELETE FROM recurso WHERE idr='$idr'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
}
/*$cont=new usuarioModel(); $r=$cont->registrar('Lucas Duran',74154963,'lucas@gmail.com','7777');
echo json_encode($r);*/
?>