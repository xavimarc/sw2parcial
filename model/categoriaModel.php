<?php

class categoriaModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($nombrec) {
        $sql = "INSERT INTO categoria VALUES(0,'$nombrec')";
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
        
    function consultar(){
        $sql="SELECT * FROM categoria";
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