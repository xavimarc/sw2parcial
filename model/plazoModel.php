<?php

class plazoModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($fechaini, $fechafin) {
        $sql = "INSERT INTO plazo VALUES(0, '$fechaini', '$fechafin')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizarplazo($idp, $fechaini, $fechafin) {
        
        $sql = "UPDATE plazo SET fechaini='$fechaini', fechafin='$fechafin' WHERE idpla='$idp'";
        if ($this->con->conexion->query($sql)) {
 
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
        
    function consultar(){
        $sql="SELECT * FROM plazo";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQL_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
     function eliminarplazo($idp) {        
        $sql = "DELETE FROM plazo WHERE idpla='$idp'";
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