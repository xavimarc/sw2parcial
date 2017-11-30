<?php

class mensajeModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($contenido, $idrp, $fecha, $idtp, $idadm) {
        $sql = "INSERT INTO post VALUES(0, '$contenido', 0, '$idrp', '$fecha', '$idtp', '$idadm')";
        $msg=$this->get_msgtp($idtp); $cant=$msg[0][0]+1;
        $sql2 = "UPDATE topico SET mensajes='$cant' WHERE idtp='$idtp'";
        if($idrp > 0){
            $msg2=$this->get_msgpb($idrp); $cant2=$msg2[0][0]+1;
            $sql3 = "UPDATE post SET cant_mensaje='$cant2' WHERE idmp='$idrp'";
            $this->con->conexion->query($sql3);
        }else $this->con->conexion->query($sql2);    
        if($this->con->conexion->query($sql)){
            return true;
        } else return false;
        $this->con->cerrar();
    }
    
    function registrar_topico($titulo, $bloqueado, $fecha, $idf, $idadm) {
        $sql = "INSERT INTO topico VALUES(0, '$titulo', '$bloqueado', '$fecha', '$idf', '$idadm')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizarcategoria($idc, $nombrec) {
        $sql = "UPDATE categoria SET nombrecat='$nombrec' WHERE idcat='$idc'";
        if ($this->con->conexion->query($sql)) {
 
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function consultar($idt){
        $sql="SELECT p.*, t.titulotp, u.nombre, f.idf FROM post p, topico t, usuario u, foro f WHERE p.idtp=t.idtp AND t.idtp='$idt' AND p.idrp=0 AND u.iduser=p.idadm AND t.idf=f.idf";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }

    function sub_message($idmp){
        $sql="SELECT p.*, mp.contenido as msg, u.nombre, f.idf FROM post p, topico t, usuario u, post mp, foro f WHERE p.idrp='$idmp' AND p.idtp=t.idtp AND p.idadm=u.iduser AND p.idrp=mp.idmp AND t.idf=f.idf";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function get_msgtp($idt) {
        $sql = "SELECT mensajes AS cant FROM topico WHERE idtp='$idt'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }

    function get_msgpb($idmp) {
        $sql = "SELECT cant_mensaje AS cant FROM post WHERE idmp='$idmp'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
     function eliminarcategoria($idc) {        
        $sql = "DELETE FROM categoria WHERE idcat='$idc'";
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