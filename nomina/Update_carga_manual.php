<?include ("../class/conect.php");  include ("../class/funciones.php"); include ("../class/configura.inc"); 
$tipo_nomina=$_POST["txttipo_nomina"]; $cod_concepto=$_POST["txtcod_concepto"]; $cod_empleado=$_POST["txtcod_empleado"]; $criterio=$_POST["txtcriterio"]; $observacion=$_POST["txtobservacion"];
$activo=$_POST["txtactivo"]; $calculable=$_POST["txtcalculable"]; $frec=$_POST["txtfrecuencia"];  $cantidad=$_POST["txtcantidad"]; $monto=$_POST["txtmonto"];
if($frec=="PRIMERA QUINCENA"){$frecuencia="1";} if($frec=="SEGUNDA QUINCENA"){$frecuencia="2";} if($frec=="PRIMERA Y SEGUNDA QUINCENA"){$frecuencia="3";}
if($frec=="PRIMERA SEMANA"){$frecuencia="4";} if($frec=="SEGUNDA SEMANA"){$frecuencia="5";} if($frec=="TERCERA SEMANA"){$frecuencia="6";}
if($frec=="CUARTA SEMANA"){$frecuencia="7";} if($frec=="QUINTA SEMANA"){$frecuencia="8";} if($frec=="TODAS LAS SEMANAS"){$frecuencia="9";} if($frec=="ULTIMA SEMANA"){$frecuencia="0";}
$fecha_hoy=asigna_fecha_hoy(); $cantidad=formato_numero($cantidad); if(is_numeric($cantidad)){$cantidad=$cantidad;}else{$cantidad=0;} $monto=formato_numero($monto); if(is_numeric($monto)){$monto=$monto;}else{$monto=0;}
$equipo = getenv("COMPUTERNAME"); $minf_usuario=$usuario_sia." ".$equipo." ".date("d/m/y H:i a");echo "ESPERE POR FAVOR MODIFICANDO....","<br>";
//if($_SERVER["HTTP_X_FORWARDED_FOR"]){$ip=$_SERVER["HTTP_X_FORWARDED_FOR"];}else{$ip=$_SERVER["REMOTE_ADDR"];} if($equipo==""){$equipo=$ip;}
$url="Det_carga_manual.php?criterio=".$criterio; $conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");  $error=0;
if (pg_ErrorMessage($conn)){$error=1; ?><script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script><?}
 else{ $Nom_Emp=busca_conf();  $sSQL="Select cod_concepto,cantidad,monto,activo,calculable,frecuencia from NOM011 WHERE tipo_nomina='$tipo_nomina' and cod_empleado='$cod_empleado' and cod_concepto='$cod_concepto'"; $resultado=pg_query($sSQL);  $filas=pg_num_rows($resultado);
   if($filas==0){$error=1; ?> <script language="JavaScript"> muestra('ASIGNACION DE CONCEPTO NO EXISTE');</script><? } else{$registro=pg_fetch_array($resultado); $acantidad=$registro["cantidad"]; $amonto=$registro["monto"]; $aactivo=$registro["activo"]; $acalculable=$registro["calculable"]; }
   if($error==0){ if ($gnomina=="00"){$error=0;} else {  if($tipo_nomina<>$gnomina) {$error=1; ?> <script language="JavaScript"> muestra('TIPO DE NOMINA NO ACTIVA PARA EL USUARIO');</script><?}  } } 
   if($error==0){$sSQL="Select cod_concepto from NOM002 WHERE tipo_nomina='$tipo_nomina' and cod_concepto='$cod_concepto'"; $resultado=pg_query($sSQL);  $filas=pg_num_rows($resultado); if($filas==0){$error=1; ?> <script language="JavaScript"> muestra('CODIGO DE CONCEPTO NO EXISTE');</script><? }}
   if($error==0){$sSQL="Select tipo_nomina,descripcion,con_sue_bas,con_compen,g_orden_pago,frecuencia from NOM001 WHERE tipo_nomina='$tipo_nomina'"; $resultado=pg_query($sSQL); $filas=pg_num_rows($resultado); if($filas==0){$error=1;?><script language="JavaScript">muestra('TIPO DE NOMINA NO EXISTE');</script><?}else{$registro=pg_fetch_array($resultado); $g_orden_pago=$registro["g_orden_pago"]; $frec_nom=$registro["frecuencia"]; $cod_conc_s=$registro["con_sue_bas"]; $cod_conc_c=$registro["con_compen"];}}
   if($error==0){if($frec_nom=="Q"){ if(($frecuencia=="1")or($frecuencia=="2")or($frecuencia=="3")){$error=0;}else{$error=1;?><script language="JavaScript">muestra('FRECUENCIA NO VALIDA PARA ESTE TIPO DE NOMINA');</script><?}}}
   if($error==0){if($frec_nom=="M"){ if(($frecuencia=="1")or($frecuencia=="2")or($frecuencia=="3")){$error=0;}else{$error=1;?><script language="JavaScript">muestra('FRECUENCIA NO VALIDA PARA ESTE TIPO DE NOMINA');</script><?}}}
   if($error==0){if($frec_nom=="S"){ if(($frecuencia=="4")or($frecuencia=="5")or($frecuencia=="6")or($frecuencia=="7")or($frecuencia=="8")or($frecuencia=="9")or($frecuencia=="0")){$error=0;}else{$error=1;?><script language="JavaScript">muestra('FRECUENCIA NO VALIDA PARA ESTE TIPO DE NOMINA');</script><?}}}
   if($error==0){$sql="SELECT NOM006.cod_empleado,NOM006.tipo_nomina,NOM006.fecha_ingreso,NOM006.cod_categoria FROM NOM006 Where cod_empleado='$cod_empleado'"; $resultado=pg_query($sql);  $filas=pg_num_rows($resultado); if($filas==0){$error=1;?> <script language="JavaScript"> muestra('CODIGO DE TRABAJADOR NO EXISTE');</script><? }
     else{$registro=pg_fetch_array($resultado); $nom_emp=$registro["tipo_nomina"]; if($tipo_nomina!=$nom_emp){$error=1;?><script language="JavaScript"> muestra('TRABAJADOR NO PERTENECE A ESTA N�MINA');</script><? } } }
   if($error==0){$sfecha=formato_aaaammdd($fecha_hoy);
    $sSQL="SELECT ACT_MOV_NOM011(1,'$tipo_nomina','$cod_empleado','$cod_concepto',$cantidad,$monto,'$activo','$calculable','$frecuencia','$observacion')";
   if($Cod_Emp=="71"){  $sSQL="SELECT act_movimiento_nom011(1,'$tipo_nomina','$cod_empleado','$cod_concepto',$cantidad,$monto,'$activo','$calculable','$frecuencia')"; }
   $resultado=pg_exec($conn,$sSQL); $error=pg_errormessage($conn); $error="ERROR GRABANDO: ".substr($error, 0, 61); if (!$resultado){?><script language="JavaScript">muestra('<? echo $error; ?>');</script><?}else{$error=0;?><script language="JavaScript">muestra('MODIFICO EXITOSAMENTE');</script><?
    $desc_doc="MOVIMIENTO DE NOMINA, TIPO NOMINA:".$tipo_nomina.", CODIGO TRABAJADOR:".$cod_empleado.", CODIGO CONCEPTO:".$cod_concepto.", CANTIDAD:".$acantidad.", MONTO:".$amonto.", ACTIVO:".$aactivo.", CALCULABLE:".$acalculable; $resultado=pg_exec($conn,"SELECT INCLUYE_SIA004('04','$usuario_sia','$usuario_sia','$equipo','Modifico','$sfecha','$desc_doc')");
      $error=pg_errormessage($conn); $error=substr($error, 0, 61);  if (!$resultado){?><script language="JavaScript">muestra('<?echo $error;?>');</script><? }}
  }
}pg_close();  if($error==0){?><script language="JavaScript">document.location ='<? echo $url; ?>';</script><?}else{?><script language="JavaScript">history.back();</script><?}?>

