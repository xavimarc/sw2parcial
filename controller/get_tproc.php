<?php
include '../model/proyectoModel.php';
session_start(); $adm=$_SESSION['idu']; $proy=$_POST['pry'];
	
        $project=new proyectoModel();
        /*$idpr=$project->get_idpro();
        echo json_encode($idpr).'<br>';
        
        $proc = $idpr[0][0];*/
        //echo $proc.'<br>';
        $new=$project->all_tproc($adm, $proy);
        //echo json_encode($new).'<br>';
        
        $process = array();
        foreach ($new as &$valor) {
            $process[] = $valor[3];
        }
        //echo json_encode($process).'<br>';
        $leyenda = $process; //array("Rubias","Pelirrojas");
        
        $new2=$project->all_tcant($adm, $proy); //echo json_encode($new2);
        $porcent = array(); $s=0;
        foreach ($new as &$valor) {
            if($valor[4]!=0) $p=$valor[4]/$valor[5]; 
            else $p=0; //echo 'c/t '.$p.'<br>';
            foreach ($new2 as &$valor2) {
                if($valor[2]==$valor2[1]){
                    $r=intval($valor2[3]*$p); //echo 'cant '.$valor2[3].' p/t '.$r.'<br>';
                    $porcent[] = $r; $s+=$r;
                }    
            }
        }
        //$s=100-$s; //echo 'sum '.$s.'<br>';
        //$porcent[] = $s;
        //echo json_encode($porcent).'<br>';
	$datos = $porcent; //array(80,120);
        
        $result = array(); $i=0;
        foreach ($process as &$valor) {
            $result[] = $process[$i];
            $result[] = $porcent[$i]; $i+=1;
        }
        echo json_encode($result);