<? error_reporting(E_ALL ^ E_NOTICE); include ("../../class/conect.php"); include("../../class/fun_fechas.php"); include("../../class/fun_numeros.php");   include ("../../class/configura.inc");  

   $tipo_nominad=$_GET["tipo_nominad"];   $tipo_nominah=$_GET["tipo_nominah"];   $cod_empleado_d=$_GET["cod_empleado_d"]; $tipo_rpt=$_GET["tipo_rpt"];
   $cod_empleado_h=$_GET["cod_empleado_h"];   $cedula_d=$_GET["cedula_d"];   $cedula_h=$_GET["cedula_h"];
   $sexo=$_GET["sexo"];   $estado_civil=$_GET["estado_civil"];   $fecha_d=$_GET["fecha_d"];   $fecha_h=$_GET["fecha_h"];
   $edad_d=$_GET["edad_d"];   $edad_h=$_GET["edad_h"];   $fecha_ingreso_d=$_GET["fecha_ingreso_d"];   $fecha_ingreso_h=$_GET["fecha_ingreso_h"];
   $estatus=$_GET["estatus"];   $codigo_cargo_d=$_GET["codigo_cargo_d"];   $codigo_cargo_h=$_GET["codigo_cargo_h"];
   $codigo_departamentod=$_GET["codigo_departamentod"];   $codigo_departamentoh=$_GET["codigo_departamentoh"];   $inf_per=$_GET["inf_per"];   $inf_car=$_GET["inf_car"];
   $date = date("d-m-Y");   $hora = date("H:i:s a");   $Sql="";
   if (!(empty($fecha_d))){$ano1=substr($fecha_d,6,9);$mes1=substr($fecha_d,3,2);$dia1=substr($fecha_d,0,2);}else{$fecha_d='';}  $fecha_desde=$ano1.$mes1.$dia1;
   if (!(empty($fecha_h))){$ano1=substr($fecha_h,6,9);$mes1=substr($fecha_h,3,2);$dia1=substr($fecha_h,0,2);} else{$fecha_h='';} $fecha_hasta=$ano1.$mes1.$dia1;
   if (!(empty($fecha_ingreso_d))){$ano1=substr($fecha_ingreso_d,6,9);$mes1=substr($fecha_ingreso_d,3,2);$dia1=substr($fecha_ingreso_d,0,2);}else{$fecha_ingreso_d='';} $fecha_desde_ing=$ano1.$mes1.$dia1;
   if (!(empty($fecha_ingreso_h))){$ano1=substr($fecha_ingreso_h,6,9);$mes1=substr($fecha_ingreso_h,3,2);$dia1=substr($fecha_ingreso_h,0,2);} else{$fecha_ingreso_h='';} $fecha_hasta_ing=$ano1.$mes1.$dia1;

   $crit_st="and nom007.sexo ='".$sexo."' and nom007.edo_civil='".$estado_civil."' and  nom006.status ='".$estatus."'"; $crit_st="";
   if($sexo<>"TODOS"){$crit_st=$crit_st."and nom007.sexo ='".$sexo."' ";}
   if($estado_civil<>"TODOS"){$crit_st=$crit_st."and nom007.edo_civil='".$estado_civil."' ";}
   if($estatus<>"TODOS"){if($estatus=="ACTIVO/VACACIONES/PERMISO"){ $crit_st=$crit_st."and (nom006.Status='ACTIVO' or nom006.Status='VACACIONES' or nom006.Status='PERMISO')";}	 else{$crit_st=$crit_st."and nom006.status='".$estatus."'";}   }
   
$nomb_rpt="Rpt_info_asig_carg_mp_mit_re.xml";
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?> <script language="JavaScript">  muestra('OCURRIO UN ERROR CONECTandO LA BASE DE DATOS'); </script> <?}
else{ $php_os=PHP_OS; $Nom_Emp=busca_conf(); if($utf_rpt=="SI"){if($php_os=="WINNT"){$php_os="LINUX";}else{$php_os="WINNT";}}

        $sSQL = "SELECT nom006.cod_empleado, nom006.Nombre, nom006.Cedula, nom006.Nacionalidad, nom006.Fecha_Ingreso, to_char(nom006.fecha_ingreso,'DD/MM/YYYY') as fechai, nom006.Status, nom006.Tipo_Nomina, nom001.Descripcion, nom006.Cod_Categoria, nom006.Tipo_Pago, nom006.Cta_Empleado, nom006.Cod_Banco, nom006.Nombre_Banco, nom006.Cta_Empresa, nom006.codigo_ubicacion, nom007.Sexo, nom007.Edo_Civil, nom007.rif_empleado, to_char(nom007.Fecha_Nacimiento,'DD/MM/YYYY') as fechanaci, nom007.Edad, nom007.Lugar_Nacimiento, nom007.Direccion, nom007.Cod_Postal, nom007.Telefono, nom007.Correo, nom007.Estado, nom007.Ciudad, nom007.profesion, nom008.Cod_Cargo, nom008.Des_Cargo, nom008.Cod_Departamento, nom008.Des_Departamento, nom008.Sueldo, to_char(nom008.Fecha_Asigna,'DD/MM/YYYY') as fechaa
                  FROM nom001, nom006, nom007, nom008 WHERE nom006.cod_empleado=nom007.cod_empleado and nom006.Tipo_Nomina=nom001.Tipo_Nomina and nom008.cod_empleado=nom006.cod_empleado and
                  nom006.Tipo_Nomina>='".$tipo_nominad."' and nom006.Tipo_Nomina<='".$tipo_nominah."' and
                  nom006.cod_empleado>='".$cod_empleado_d."' and nom006.cod_empleado<='".$cod_empleado_h."' and
                  nom006.cedula>='".$cedula_d."' and nom006.cedula<='".$cedula_h."' and
		          nom006.cod_cargo>='".$codigo_cargo_d."' and nom006.cod_cargo<='".$codigo_cargo_h."' and
		          nom006.cod_departam>='".$codigo_departamentod."' and nom006.cod_departam<='".$codigo_departamentoh."' and
                  nom007.Fecha_Nacimiento>='".$fecha_desde."' and nom007.Fecha_Nacimiento<='".$fecha_hasta."'and
                  nom007.Edad>='".$edad_d."' and nom007.Edad<='".$edad_h."' and
                  nom006.Fecha_Ingreso>='".$fecha_desde_ing."' and nom006.Fecha_Ingreso<='".$fecha_hasta_ing."' ".$crit_st." ORDER BY nom006.cod_empleado, nom008.Fecha_Asigna";
    if($tipo_rpt=="HTML"){ include ("../../class/phpreports/PHPReportMaker.php");     
		 $oRpt = new PHPReportMaker();
         $oRpt->setXML($nomb_rpt);
         $oRpt->setUser("$user");
         $oRpt->setPassword("$password");
         $oRpt->setConnection("localhost");
         $oRpt->setDatabaseInterface("postgresql");
         $oRpt->setSQL($sSQL);
         $oRpt->setDatabase("$dbname");
         $oRpt->setParameters(array("criterio1"=>$criterio1,"criterio2"=>$criterio2,"date"=>$date,"hora"=>$hora));
         $oRpt->putEnvObj("nombre_empresa",$Nom_Emp);
         $oRpt->run();
         $aBench = $oRpt->getBenchmark();
         $iSec   = $aBench["report_end"]-$aBench["report_start"];
	}
	if($tipo_rpt=="PDF"){$res=pg_query($sSQL);  $cod_empleado_grupo=""; 
      require('../../class/fpdf/fpdf.php');
      class PDF extends FPDF{
		function Header(){ global $criterio1; global $cod_empleado_grupo;  global $registro;
			$this->Image('../../imagenes/Logo_emp.png',7,7,20);
			$this->SetFont('Arial','B',10);
			$this->Cell(50);
			$this->Cell(100,10,'INFORMACION ASIGNACION DE CARGOS',1,0,'C');
			$this->Ln(15);
		}
		function Footer(){ $ffechar=date("d-m-Y");$fhorar=date("H:i:s a"); 
			$this->SetY(-10);
			$this->SetFont('Arial','I',5);
			$this->Cell(100,5,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
			$this->Cell(100,5,'Fecha: '.$ffechar.' Hora: '.$fhorar,0,0,'R');
		}
	  }	  
	  $pdf=new PDF('P', 'mm', Letter);
	  $pdf->AliasNbPages();
   	  $pdf->AddPage();
	  $pdf->SetFont('Arial','',8);
	  $i=0; $total_monto=0;  $prev_cod_empleado=""; 
	  while($registro=pg_fetch_array($res)){ $i=$i+1; $cod_empleado=$registro["cod_empleado"];  $nombre=$registro["nombre"]; 
          $cedula=$registro["cedula"];  $status=$registro["status"]; if($php_os=="WINNT"){$nombre=$nombre; }else{$nombre=utf8_decode($nombre);}
          $cod_empleado_grupo=$cod_empleado; $nombre_grupo=$nombre; $cedula_grupo=$cedula; $status_grupo=$status; 
          $fechai=formato_ddmmaaaa($fechai); $fechan=formato_ddmmaaaa($fechan); $monto_declaracion=formato_monto($monto_declaracion);

		   if($prev_cod_empleado<>$cod_empleado_grupo){ 
				$pdf->Ln(3);
			    $pdf->Cell(200,2,'_______________________________________________________________________________________________________________________________________________',0,1,'L');
			    $pdf->SetFont('Arial','B',8);
				$pdf->Cell(20,4,'CODIGO ',0,0,'L');  
				$pdf->Cell(140,4,'NOMBRE ',0,0,'L');  
				$pdf->Cell(20,4,'CEDULA ',0,0,'L');
				$pdf->Cell(20,4,'STATUS ',0,1,'L');
				$pdf->SetFont('Arial','',8);
				$pdf->Cell(20,4,$cod_empleado_grupo,0,0,'L');  
				$pdf->Cell(140,4,$nombre_grupo,0,0,'L');
				$pdf->Cell(20,4,$cedula_grupo,0,0,'L');
				$pdf->Cell(20,4,$status_grupo,0,1,'L');
		        $pdf->SetFont('Arial','B',8);
				$pdf->Cell(200,5,'DETALLE ',0,1,'C');  
		        $pdf->SetFont('Arial','B',7);
				$pdf->Cell(20,3,'Codigo',0,0,'L');
				$pdf->Cell(75,3,'Descripcion Cargo',0,0,'L');
				$pdf->Cell(70,3,'Departamento',0,0,'L');
				$pdf->Cell(15,3,'Fecha',0,0,'C');
				$pdf->Cell(20,3,'Sueldo Cargo',0,1,'R'); 
				$prev_cod_empleado=$cod_empleado_grupo; } 

            $cod_empleado=$registro["cod_empleado"]; $cod_concepto=$registro["cod_concepto"]; $nombre=$registro["nombre"]; 
            $cedula=$registro["cedula"]; $status=$registro["status"];  $cod_cargo=$registro["cod_cargo"]; $des_cargo=$registro["des_cargo"]; $cod_departamento=$registro["cod_departamento"];
	        $des_departamento=$registro["des_departamento"]; $fechaa=$registro["fechaa"]; $sueldo=$registro["sueldo"];
             $sueldo=formato_monto($sueldo); if($php_os=="WINNT"){$des_cargo=$des_cargo; }else{$des_cargo=utf8_decode($des_cargo);  $des_departamento=utf8_decode($des_departamento); }
            $pdf->SetFont('Arial','',7);
			$pdf->Cell(20,3,$cod_cargo,0,0,'L'); 			   
	        $pdf->Cell(75,3,$des_cargo,0,0,'L');
	        $pdf->Cell(70,3,$des_departamento,0,0,'L');
	        $pdf->Cell(15,3,$fechaa,0,0,'C');
	        $pdf->Cell(20,3,$sueldo,0,1,'R');
        } 		
		$pdf->Output();  
    }

}	
		
		
	
?>
