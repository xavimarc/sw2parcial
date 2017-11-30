<?php   session_start(); $proc=$_SESSION['proc']; 
	require_once ("../../jpgraph/src/jpgraph.php");
	require_once ("../../jpgraph/src/jpgraph_pie.php");
	include '../../model/proyectoModel.php'; 
	// Se define el array de valores y el array de la leyenda
        $project=new proyectoModel();
        /*$idpr=$project->get_idpro();
        //echo json_encode($idpr).'<br>';
        
        $proc = $idpr[0][0];*/
        //echo $proc.'<br>';
        $new=$project->consult_proc($proc);
        //echo json_encode($new).'<br>';
        
        $process = array();
        foreach ($new as &$valor) {
            $process[] = $valor[3];
        }
        //echo json_encode($process).'<br>';
        $leyenda = $process; //array("Rubias","Pelirrojas");
        
        $new2=$project->cant_proc($proc); //echo json_encode($new2);
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
        $project->act_porcent($proc, $s);
        $s=100-$s; //echo 'sum '.$s.'<br>';
        $porcent[] = $s;
        //echo json_encode($porcent);
	$datos = $porcent; //array(80,120);
	 
	//Se define el grafico
	$grafico = new PieGraph(450,300);
	
	//Definimos el titulo 
	$grafico->title->Set("Avance por Proceso");
	$grafico->title->SetFont(FF_FONT1,FS_BOLD);
	 
	//Añadimos el titulo y la leyenda
	$p1 = new PiePlot($datos);
	$p1->SetLegends($leyenda);
	$p1->SetCenter(0.4);
	 
	//Se muestra el grafico
	$grafico->Add($p1);
	$grafico->Stroke();
        
        //unset($_SESSION['proc']);
?>
