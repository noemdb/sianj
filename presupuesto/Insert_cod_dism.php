<?include ("../class/conect.php");  include ("../class/funciones.php");include ("Ver_dispon.php"); include ("../class/configura.inc");
$formato_presup="XX-XX-XX-XXX-XX-XX-XX";$codigo_mov=$_POST["txtcodigo_mov"];$cod_presup=$_POST["txtcod_presup"];
$fuente_financ=$_POST["txtcod_fuente"];$monto_c=$_POST["txtmonto"];$operacion="-";$grupo="01";
$fecha=asigna_fecha_hoy();$monto_c=formato_numero($monto_c); if(is_numeric($monto_c)){$monto=$monto_c;} else{$monto=0;}
$equipo = getenv("COMPUTERNAME");$MInf_Usuario = $equipo." ".date("d/m/y H:i a");
echo "ESPERE POR FAVOR INCLUYENDO....","<br>";
$url="Det_inc_disminuciones.php?codigo_mov=".$codigo_mov;
$conn = pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?><script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script><?}
 else{  $Nom_Emp=busca_conf();
  $sfecha=formato_aaaammdd($fecha); if($sfecha>$Fec_Fin_Ejer){ $fecha=formato_ddmmaaaa($Fec_Fin_Ejer);  }
  $sql="Select * from SIA005 where campo501='05'";  $resultado=pg_query($sql);  if ($registro=pg_fetch_array($resultado,0)){$formato_presup=$registro["campo504"];}   $error=0;
  $sSQL="Select * from PRE026 WHERE codigo_mov='$codigo_mov' and cod_presup='$cod_presup' and fuente_financ='$fuente_financ' and grupo='$grupo'";
  $resultado=pg_query($sSQL);   $filas=pg_num_rows($resultado);
  if ($filas>0){$error=1; ?> <script language="JavaScript"> muestra('CODIGO PRESUPUESTARIO YA EXISTE EN LA DISMINUCION');</script><? }
   else{  if(strlen($cod_presup)==strlen($formato_presup)){
      if (verifica_disponibilidad($conn,$cod_presup,$fuente_financ,$fecha,$monto_c)==0){$error=0;}else{$error=1;}}
       else{$error=1; ?> <script language="JavaScript"> muestra('LONGITUD DE CODIGO PRESUPUESTARIO INVALIDA');</script><? }
    if($error==0){  $sSQL="Select * from PRE095 WHERE cod_fuente_financ='$fuente_financ'";       $resultado=pg_query($sSQL);  $filas=pg_num_rows($resultado);
      if ($filas==0){$error=1; ?> <script language="JavaScript"> muestra('CODIGO DE FUENTE NO EXISTE');</script><? }
    }
    if($error==0){   $sfecha=formato_aaaammdd($fecha);
      $resultado=pg_exec($conn,"SELECT INCLUYE_PRE026('$codigo_mov','$cod_presup','$fuente_financ','$grupo','0000','','0000','','0000','','0000','$operacion','$grupo','','','','','$sfecha','C','P','$grupo','$sfecha',$monto,0,0,0)");
      $error=pg_errormessage($conn);  $error="ERROR GRABANDO: ".substr($error, 0, 61);
      if (!$resultado){?><script language="JavaScript">muestra('<? echo $error; ?>');</script><? }
    }
  }
}
pg_close();if ($error==0){?><script language="JavaScript">document.location ='<? echo $url; ?>';</script> <? } else {?>  <script language="JavaScript">history.back();</script> <? } ?>