<?php

class foroModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($nombre, $descripcion, $estado, $grupo) {
        $sql = "INSERT INTO foro VALUES(0, '$nombre', '$descripcion', '$estado', 0, 'Ninguna', '$grupo')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
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
        
    function consultar($idu){
        $sql="SELECT f.*, g.nombreg FROM foro f, grupo g WHERE f.idg=g.idg AND g.idg IN(SELECT idg FROM grupo WHERE idadm='$idu' UNION SELECT idg FROM detalle_grupo WHERE idcon='$idu')";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function consultar_topic($idu, $idf){
        $sql="SELECT t.*, f.nombref FROM foro f, topico t, grupo g WHERE f.idg=g.idg AND t.idf=f.idf AND f.idf='$idf' AND g.idg IN(SELECT idg FROM grupo WHERE idadm='$idu' UNION SELECT idg FROM detalle_grupo WHERE idcon='$idu')";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
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