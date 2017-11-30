<?php

class proyectoModel {
    private $con;

    public function __construct() {
        require_once('conexion.php');
        $this->con = new conexion();
        $this->con->conectar();
    }

    function registrar($nombrepro,$prioridad,$porcentaje,$idg,$idcat,$idpla) {
        $sql = "INSERT INTO proyecto VALUES(0,'$nombrepro','$prioridad','$porcentaje','$idg','$idcat','$idpla')";
        if($this->con->conexion->query($sql)) 
        return true; else return false;
        $this->con->cerrar();
    }
    
    function actualizarproyecto($idpro,$nombrepro,$prioridad) {
        $sql = "UPDATE proyecto SET nombrepro='$nombrepro',prioridad='$prioridad' WHERE idpro='$idpro'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function act_porcent($idpro, $porc) {
        $sql = "UPDATE proyecto SET porcentaje='$porc' WHERE idpro='$idpro'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function add_id($idpro) {
        $sql = "UPDATE grafico SET cod='$idpro'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
    
    function get_idpro(){
        $sql="SELECT cod FROM grafico";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
        
    function consultar($admin){
        $sql="SELECT distinct p.idpro,p.nombrepro,p.prioridad,p.porcentaje,g.nombreg,c.nombrecat,pla.fechaini,pla.fechafin
        FROM proyecto p, categoria c, grupo g, plazo pla ,detalle_grupo dg 
        where p.idg=g.idg and g.idg=dg.idg and p.idcat=c.idcat  and p.idpla=pla.idpla and  g.idadm='$admin'
                      ";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        } //echo json_encode($arreglo);
        return $arreglo;
        $this->con->cerrar();
    }
     
    function eliminarproyecto($idpro) {        
        $sql = "DELETE FROM proyecto WHERE idpro='$idpro'";
        if ($this->con->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->con->cerrar();
    }
     function getproyecto($adm){
        $sql="SELECT p.idpro, p.nombrepro FROM proyecto p, grupo g
              WHERE p.idg=g.idg and g.idadm='$adm' ";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
        function inproyecto($admin){
        $sql="SELECT p.idpro, p.nombrepro ,u.nombre
                FROM proyecto p, grupo g ,detalle_grupo dg, administrador ad,usuario u            
                    WHERE p.idg=g.idg and g.idg=dg.idg and g.idadm=ad.idadm and ad.idadm=u.iduser
                        and dg.idcon='$admin' ";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }

    function consult_proc($idp){
        $sql="SELECT d.idpro, d.nombrepro, p.idp, p.nombrep, p.avance, COUNT(t.idt)AS cont 
              FROM proceso p, proyecto d, subtarea t 
              WHERE d.idpro=p.idpro AND p.idp=t.idp AND d.idpro='$idp' 
              GROUP BY d.idpro, d.nombrepro, p.idp, p.nombrep, p.avance UNION
              SELECT d.idpro, d.nombrepro, '0' AS idp, 'En Proceso' AS nombrep, '0' AS avance, '0' AS cont 
              FROM proyecto d WHERE d.idpro='$idp' ORDER BY 1";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        } //echo json_encode($arreglo);
        return $arreglo;
        $this->con->cerrar();
    }
    
    function cant_proc($idp){
        $sql="SELECT d.idpro ,p.idp, p.nombrep, COUNT(idt)AS cont FROM proceso p, proyecto d, subtarea t 
             WHERE d.idpro=p.idpro AND p.idp=t.idp AND t.estado='Terminado' AND d.idpro='$idp' 
             GROUP BY d.idpro ,p.idp, p.nombrep UNION SELECT pr.idpro ,s.idp, s.nombrep, '0' AS cont 
             FROM proceso s, proyecto pr WHERE pr.idpro='$idp' AND pr.idpro=s.idpro AND s.idp NOT IN 
             (SELECT p.idp FROM proceso p, proyecto d, subtarea t WHERE d.idpro=p.idpro AND p.idp=t.idp 
             AND t.estado='Terminado' GROUP BY p.idp, p.nombrep) ORDER BY 1";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }

    function process_end($idp){
        $sql="SELECT p.idp, p.nombrep, p.avance, COUNT(idt)AS cont 
              FROM proceso p, proyecto d, subtarea t  
              WHERE d.idpro=p.idpro AND p.idp=t.idp AND t.estado='Terminado' AND d.idpro='$idp' 
              GROUP BY p.idp, p.nombrep, p.avance ORDER BY 1";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function all_proc($adm){
        $sql="SELECT d.idpro, d.nombrepro, p.idp, p.nombrep, p.avance, COUNT(t.idt)AS cont FROM proceso p, proyecto d, subtarea t WHERE d.idpro=p.idpro AND p.idp=t.idp AND p.idp IN(SELECT p.idp FROM proceso p,proyecto pr,plazo pl ,grupo g where p.idpro=pr.idpro and p.idpla=pl.idpla and pr.idg=g.idg and g.idadm='$adm') GROUP BY d.idpro, d.nombrepro, p.idp, p.nombrep, p.avance ORDER BY 1 LIMIT 4";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function all_cant($adm){
        $sql="SELECT * FROM(SELECT d.idpro ,p.idp, p.nombrep, COUNT(idt)AS cont FROM proceso p, proyecto d, subtarea t 
              WHERE d.idpro=p.idpro AND p.idp=t.idp AND t.estado='Terminado' GROUP BY d.idpro ,p.idp, p.nombrep UNION 
              SELECT pr.idpro ,s.idp, s.nombrep, '0' AS cont FROM proceso s, proyecto pr 
              WHERE pr.idpro=s.idpro AND s.idp NOT IN (SELECT p.idp FROM proceso p, proyecto d, subtarea t 
              WHERE d.idpro=p.idpro AND p.idp=t.idp AND t.estado='Terminado' GROUP BY p.idp, p.nombrep))AS tab1 
			  WHERE tab1.idp IN(SELECT p.idp FROM proceso p,proyecto pr,plazo pl ,grupo g where p.idpro=pr.idpro and p.idpla=pl.idpla and pr.idg=g.idg and g.idadm='$adm') ORDER BY 1 LIMIT 4";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function all_tproc($adm, $proy){
        $sql="SELECT d.idpro, d.nombrepro, p.idp, p.nombrep, p.avance, COUNT(t.idt)AS cont FROM proceso p, proyecto d, subtarea t WHERE d.idpro=p.idpro AND p.idp=t.idp AND p.idp IN(SELECT p.idp FROM proceso p,proyecto pr,plazo pl ,grupo g where p.idpro=pr.idpro and p.idpla=pl.idpla and pr.idg=g.idg and g.idadm='$adm' AND pr.idpro='$proy') GROUP BY d.idpro, d.nombrepro, p.idp, p.nombrep, p.avance ORDER BY 1 LIMIT 4";
        $this->con->conexion->set_charset('utf8');
        $resultados = $this->con->conexion->query($sql);
        $arreglo = array();
        while ($re = $resultados->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        return $arreglo;
        $this->con->cerrar();
    }
    
    function all_tcant($adm, $proy){
        $sql="SELECT * FROM(SELECT d.idpro ,p.idp, p.nombrep, COUNT(idt)AS cont FROM proceso p, proyecto d, subtarea t 
              WHERE d.idpro=p.idpro AND p.idp=t.idp AND t.estado='Terminado' GROUP BY d.idpro ,p.idp, p.nombrep UNION 
              SELECT pr.idpro ,s.idp, s.nombrep, '0' AS cont FROM proceso s, proyecto pr 
              WHERE pr.idpro=s.idpro AND s.idp NOT IN (SELECT p.idp FROM proceso p, proyecto d, subtarea t 
              WHERE d.idpro=p.idpro AND p.idp=t.idp AND t.estado='Terminado' GROUP BY p.idp, p.nombrep))AS tab1 
			  WHERE tab1.idp IN(SELECT p.idp FROM proceso p,proyecto pr,plazo pl ,grupo g where p.idpro=pr.idpro and p.idpla=pl.idpla and pr.idg=g.idg and g.idadm='$adm' AND pr.idpro='$proy') ORDER BY 1 LIMIT 4";
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
//$cont=new proyectoModel(); $r=$cont->consultar(33);
//echo json_encode($r);
?>