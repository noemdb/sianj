<?include ("../class/conect.php");  include ("../class/funciones.php");  
$codigo_mov=$_POST["txtcodigo_mov"]; $fecha=$_POST["txtfecha"]; $observacion=$_POST["txtobservacion"];
$equipo = getenv("COMPUTERNAME"); $MInf_Usuario=$equipo." ".date("d/m/y H:i a"); echo "ESPERE POR FAVOR INCLUYENDO....","<br>";
$url="Det_inc_hoja_vida.php?codigo_mov=".$codigo_mov;  $cod_empleado="";
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");  $error=0;
if (pg_ErrorMessage($conn)){$error=1; ?><script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script><?}
 else{ if(checkData($fecha)=='1'){$error=0;} else{$error=1; ?> <script language="JavaScript">muestra('FECHA NO ES VALIDA');</script><? } }
 if($error==0){
  $sSQL="Select * from NOM071 WHERE codigo_mov='$codigo_mov' and cod_empleado='$cod_empleado' and fecha='$fecha'";
  $resultado=pg_query($sSQL);  $filas=pg_num_rows($resultado);
  if ($filas>=1){$error=1; ?> <script language="JavaScript"> muestra('HOJA DE VIDA YA EXISTE');</script><? }
   else{$sfecha=formato_aaaammdd($fecha);
      $sSQL="SELECT ACTUALIZA_NOM071(1,'$codigo_mov','$cod_empleado','$sfecha','$observacion')";
      $resultado=pg_exec($conn,$sSQL); $error=pg_errormessage($conn); $error="ERROR GRABANDO: ".substr($error, 0, 61); if (!$resultado){?><script language="JavaScript">muestra('<? echo $error; ?>');</script><? }
  }
}
pg_close(); if($error==0){?><script language="JavaScript">document.location ='<? echo $url; ?>';</script><?}else{?><script language="JavaScript">history.back();</script><?}?>