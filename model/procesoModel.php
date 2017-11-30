<?php

class procesoModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($nombrep,$avance,$idpro,$idpla) {
        $sql = "INSERT INTO proceso VALUES(0,'$nombrep','$avance','$idpro','$idpla')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizarproceso($idp,$nombrep,$avance) {
        
        $sql = "UPDATE proceso SET nombrep='$nombrep',avance='$avance' WHERE idp='$idp'";
        if ($this->con->conexion->query($sql)) {
 
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
        
    function consultar($admin){
        $sql="SELECT p.idp,p.nombrep,p.avance,pr.nombrepro,pl.fechaini,pl.fechafin 
                FROM proceso p,proyecto pr,plazo pl ,grupo g
                    where p.idpro=pr.idpro and p.idpla=pl.idpla and pr.idg=g.idg and g.idadm='$admin'";

        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
     function eliminarproceso($idp) {        
        $sql = "DELETE FROM proceso WHERE idp='$idp'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
     function getprocess($adm){
        $sql="SELECT p.idp,p.nombrep,p.avance,pr.nombrepro,pl.fechaini,pl.fechafin 
                FROM proceso p,proyecto pr,plazo pl ,grupo g
                    where p.idpro=pr.idpro and p.idpla=pl.idpla and pr.idg=g.idg and g.idadm='$adm'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    function inproceso($admin){
        $sql="SELECT p.idp, p.nombrep ,s.nombret
                FROM proceso p, subtarea s          
                    WHERE p.idp=s.idp 
                        and s.idcon='$admin' ";
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
/*$cont=new usuarioModel(); $r=$cont->registrar('Lucas Duran',74154963,'lucas@gmail.com','7777');
echo json_encode($r);*/
?>