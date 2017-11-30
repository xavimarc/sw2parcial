<?php

class subtareaModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($nombre, $estado, $proc, $cont, $plazo) {
        $sql = "INSERT INTO subtarea VALUES(0, '$nombre', '$estado', '$proc', '$cont', '$plazo')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizar($idt, $nombre, $estado) {
        $sql = "UPDATE subtarea SET nombret='$nombre', estado='$estado' WHERE idt='$idt'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function consultar($admin){
        $sql="SELECT s.idt, s.nombret, s.estado, s.idp, s.idcon, s.idpla, p.nombrep, c.nombre, t.fechaini, t.fechafin 
              FROM subtarea s, proceso p, usuario c, plazo t 
              WHERE s.idp=p.idp AND s.idcon=c.iduser AND s.idpla=t.idpla AND s.estado='Activo' AND s.idcon='$admin'";
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
        $sql="SELECT g.idg, g.nombreg, g.idadm, a.nombre
              FROM (SELECT DISTINCT d.idg 
                    FROM detalle_grupo d 
                    WHERE d.idcon='$admin' AND d.idg NOT IN(SELECT idg 
                                                     FROM grupo g WHERE g.idadm='$admin'))as t, grupo g, usuario a
              WHERE t.idg=g.idg AND g.idadm=a.iduser";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function eliminar($idt) {        
        $sql = "DELETE FROM subtarea WHERE idt='$idt'";
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
    
    function contactGroup($proc, $adm){
        $sql="SELECT DISTINCT(gr.nombreg), adcon.idcon, u.nombre FROM usuario u, proceso prc, proyecto pry, grupo gr, detalle_grupo dgr, (SELECT DISTINCT(dg.idcon) FROM proceso pr, proyecto py, grupo g, detalle_grupo dg, contacto c, administrador a WHERE pr.idpro=py.idpro AND py.idg=g.idg AND dg.idg=g.idg AND g.idadm=a.idadm AND pr.idp='$proc' AND a.idadm='$adm') AS adcon WHERE adcon.idcon=u.iduser AND prc.idpro=pry.idpro AND pry.idg=gr.idg AND dgr.idg=gr.idg AND prc.idp='$proc'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function work_asign($adm){
        //$sql="SELECT st.idt, st.nombret, st.estado, st.nombre, pl.fechaini, pl.fechafin, pc.nombrep FROM plazo pl, proceso pc, (SELECT resp.idt, resp.nombret, resp.estado, resp.idpla, resp.idp, u.nombre FROM usuario u, (SELECT DISTINCT(s.idt), s.nombret, s.estado, s.idcon, s.idpla, s.idp FROM administrador a, subtarea s, proceso pr, proyecto p, grupo g WHERE s.idp=pr.idpro AND p.idg=g.idg AND g.idadm=a.idadm AND a.idadm='$adm') AS resp WHERE u.iduser=resp.idcon)AS st WHERE st.idpla=pl.idpla AND st.idp=pc.idp";
        $sql="SELECT v.idt, v.nombret, v.estado, proceso.nombrep, v.nombre, v.fechaini, v.fechafin FROM proceso, (SELECT t.idt, t.nombret, t.estado, t.idp, usuario.nombre, t.fechaini, t.fechafin FROM usuario, (SELECT r.idt, r.nombret, r.estado, r.idp, r.idcon, plazo.fechaini, plazo.fechafin FROM plazo, (SELECT DISTINCT(subtarea.idt), subtarea.nombret, subtarea.estado, subtarea.idp, subtarea.idcon, subtarea.idpla FROM subtarea, proceso, proyecto, grupo, administrador WHERE subtarea.idp=proceso.idp AND proceso.idpro=proyecto.idpro AND proyecto.idg=grupo.idg AND grupo.idg IN(SELECT grupo.idg FROM grupo WHERE grupo.idadm='$adm'))AS r WHERE r.idpla=plazo.idpla)AS t WHERE t.idcon=usuario.iduser)AS v WHERE v.idp=proceso.idp ORDER BY 1 DESC";
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