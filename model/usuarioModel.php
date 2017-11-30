<?php

class usuarioModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function identificar($email, $password) {
        $sql="SELECT u.iduser, u.nombre, u.celular, u.email, a.password FROM usuario u, administrador a 
              WHERE a.idadm=u.iduser AND u.email='$email' AND a.password='$password'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        /*$totalrows=mysqli_fetch_array($resultados);
        $i=0;
        foreach ($totalrows as $clave => $valor) {
            if($i%2==0) $arreglo=$valor;
            $i++;
        }
        echo json_encode($arreglo);*/
        return $arreglo;
        //echo json_encode($arreglo);
        $this->con->cerrar();
    }

    function registrar($nombre, $celular, $email, $password) {
        /*$pass = sha1($password);*/ //echo $nombre.'__'.$celular.'__'.$email.'__'.$password.'<br>';
        $sql = "INSERT INTO usuario VALUES(0, '$nombre', '$celular', '$email')"; //echo 'SQL '.$sql.'<br>';
        $sql2 = "SELECT iduser FROM usuario WHERE celular='$celular' AND email='$email'"; //echo 'SQL2 '.$sql2.'<br>';
        $res=$this->con->conexion->query($sql2); //echo 'Res '.json_encode($res).'<br>';
        $res2 = $res->fetch_array(); $codu=$res2; //echo 'Exist '.json_encode($res2).'<br>';
        //echo 'Code '.json_encode($codu).'<br>';
        if ($codu === null) {
            if($this->con->conexion->query($sql)){
                $rs=$this->con->conexion->query($sql2);
                $res3 = $rs->fetch_array(); $cod=$res3; //echo 'codi '.json_encode($cod).'<br>';
            }
        } else $cod=$codu; //echo 'codi '.json_encode($cod).'<br>';
        $idadm=$cod['iduser']; //echo 'adm '.$idadm.'<br>';
        $sql3 = "INSERT INTO administrador VALUES('$idadm', '$password')"; //echo 'Exist '.json_encode($sql3).'<br>';
        if($this->con->conexion->query($sql3)){
            $sql4 = "INSERT INTO contacto VALUES('$idadm')";
            $this->con->conexion->query($sql4);
            return true;
        }else return false;
        $this->con->cerrar();
    }
    
    function actualizar($idu, $nombre, $celular, $usuario, $password) {
        
        $sql = "UPDATE usuario SET nombre='$nombre', celular='$celular', email='$usuario' WHERE iduser='$idu'";
        if ($this->con->conexion->query($sql)) {
            $sql2 = "UPDATE administrador SET password='$password' WHERE idadm='$idu'";
            $this->con->conexion->query($sql2);
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function recuperar($nombre, $email, $celular, $asunto, $destino, $contenido) {
        $sql="SELECT * FROM usuario WHERE email='$email' AND celular='$celular'";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        
        if ($resultados->num_rows > 0) {
            mail($destino, $asunto, $contenido); 
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function consultar($name){
        $sql="SELECT u.coduser, p.nombre, p.direccion, p.celular, c.email FROM persona p, cliente c, 
              usuario u WHERE u.codp=p.codp AND c.codc=p.codp AND p.nombre='$name'";
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
//$cont=new usuarioModel(); $r=$cont->identificar('adam@gmail.com','4444');
//echo json_encode($r);
?>