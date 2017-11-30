<?php

class contactoModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function consultarcont($valor) {
        $sql="SELECT d.idcon, u.nombre, u.celular, u.email FROM usuario u, detalle_contacto d WHERE u.iduser=d.idcon AND d.idadm='$valor'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }

    function registrarcont($nombre, $celular, $email, $admin) {
        /*$pass = sha1($password);*/ //echo $nombre.'__'.$celular.'__'.$email.'__'.$admin.'<br>';
        $sql = "INSERT INTO usuario VALUES(0, '$nombre', '$celular', '$email')";
        $sql2 = "SELECT iduser FROM usuario WHERE email='$email' AND celular='$celular'"; //echo 'SQL2 '.$sql2.'<br>';
        $idu=$this->con->conexion->query($sql2); //echo 'idu '.json_encode($idu).'<br>';
        $res3 = $idu->fetch_array(); $codu=$res3; //echo 'Exist '.json_encode($res3).'<br>';
        //echo 'code '.json_encode($codu).'<br>';
        
        if ($codu === null) {
            if($this->con->conexion->query($sql)){
                $res=$this->con->conexion->query($sql2);
                $res2 = $res->fetch_array(); $cod=$res2;
            }
        } else $cod=$codu; //echo 'cod '.json_encode($cod).'<br>';
        $idcon=$cod['iduser']; //echo 'idcon '.$idcon.'<br>';
        $sql3 = "INSERT INTO contacto VALUES('$idcon')";
        $this->con->conexion->query($sql3); //echo 'consult '.json_encode($sql3).'<br>';
        $sql4 = "INSERT INTO detalle_contacto VALUES('$admin', '$idcon')"; //echo 'code '.json_encode($sql4).'<br>';
        //$tr=$this->con->conexion->query($sql4); echo 'consult '.json_encode($tr).'<br>';
        if($this->con->conexion->query($sql4)) return true; else false;            
        $this->con->cerrar();
    }
    
    function actualizarcont($idu, $nombre, $celular, $usuario) {        
        $sql = "UPDATE usuario SET nombre='$nombre', celular='$celular', email='$usuario' 
                WHERE iduser='$idu'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function eliminarcont($adm, $idcon) {        
        $sql = "DELETE FROM detalle_contacto WHERE idadm='$adm' AND idcon='$idcon'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    function consulteam($valor) {
        $sql="SELECT iduser, nombre, celular, email FROM usuario WHERE iduser='$valor' 
              UNION SELECT d.idcon, u.nombre, u.celular, u.email FROM usuario u, detalle_contacto d WHERE u.iduser=d.idcon AND d.idadm='$valor'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
}/*
$cont=new contactoModel(); $r=$cont->registrarcont('Adriana Hurtado',70009877,'adriana@gmail.com',1);
echo json_encode($r);*/
?>