<?include ("../class/conect.php");  include ("../class/funciones.php");
$password=$_GET["password"];$user=$_GET["user"]; $dbname=$_GET["dbname"]; $mes=$_GET["mes"]; $ano=$_GET["ano"]; $solo_fact=$_GET["solo_fact"]; $codigo_mov=$_GET["codigo_mov"];
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
$fecha_d="01-".$mes."-".$ano; $fecha_h=colocar_udiames($fecha_d); $fecha_1=formato_aaaammdd($fecha_d);  $fecha_2=formato_aaaammdd($fecha_h);
if($solo_fact=="SI"){$fecha_3=$fecha_1;}else{$fecha_3="1990-01-01"; $fecha_4="4999-12-31";}
$resultado=pg_exec($conn,"SELECT BORRAR_BAN029('$codigo_mov')"); $error=pg_errormessage($conn); $error=substr($error, 0, 61);
$tipo_r=0; $sql = "SELECT * From ban027 where (mes_fiscal='$mes') order by fecha_emision,nro_operacion";
$sql="SELECT ban027.fecha_emision,ban027.ced_rif,ban027.nro_operacion,ban027.ano_fiscal,ban027.mes_fiscal,ban027.nro_comprobante,ban027.tipo_operacion,ban027.tipo_documento,ban027.fecha_documento,ban027.nro_documento,ban027.nro_con_documento,ban027.nro_doc_afectado,ban027.tipo_transaccion,ban027.monto_documento,ban027.monto_exento_iva,ban027.base_imponible,ban027.tasa_iva,ban027.monto_iva,ban027.tasa_retencion,ban027.monto_iva_retenido,ban027.tipo_mov,ban027.referencia,ban027.cod_banco from ban027 where (monto_iva_retenido<>0) and (text(ced_rif)||text(nro_documento)||text(tipo_documento) not in (select text(ced_rif)||text(nro_documento)||text(tipo_documento) from pag032)) and (mes_fiscal='$mes') order by nro_comprobante,fecha_emision,nro_operacion";$res=pg_query($sql);
while($registro=pg_fetch_array($res)){ $fechad=$registro["fecha_documento"];  $cotinua=0; 

  //if($solo_fact=="SI"){if((substr($fechad,5,2)==$mes)and(substr($fechad,0,4)==$ano)){$cotinua=0;}else{$cotinua=1;}}
  
  if($cotinua==0){ $concepto=""; $tipo_mov=$registro["tipo_mov"]; $referencia=$registro["referencia"]; $cod_banco=$registro["cod_banco"];
    if($tipo_mov=='O/P'){ $sqlo="Select concepto from pag001 where substr(tipo_causado,1,1)<>'A' and nro_orden='$referencia'"; $reso=pg_query($sqlo); $filaso=pg_num_rows($reso);  if($filaso>0){$rego=pg_fetch_array($reso); $concepto=$rego["concepto"]; }	}
    else{ $sqlo="Select descrip_mov_libro from ban004 where cod_banco='$cod_banco' and referencia='$referencia' and tipo_mov_libro='$tipo_mov'"; $reso=pg_query($sqlo); $filaso=pg_num_rows($reso);  if($filaso>0){$rego=pg_fetch_array($reso); $concepto=$rego["descrip_mov_libro"]; } }	
    $tipo_r=$tipo_r+1; $tipo_ret=substr($tipo_r,0,3); $nro_d=$registro["nro_documento"]; $nro_con_fac=$registro["nro_con_documento"]; $monto_p=$registro["monto_documento"];   $monto1=$registro["monto_exento_iva"]; $monto_o=$registro["base_imponible"];  $tasa=$registro["tasa_iva"]; $monto2=$registro["monto_iva"]; $monto3=$registro["tasa_retencion"]; $monto_r=$registro["monto_iva_retenido"]; $ssql="SELECT INCLUYE_BAN029('$codigo_mov','".$registro["ano_fiscal"]."','".$registro["mes_fiscal"]."','".$registro["nro_comprobante"]."','$mes','".$registro["tipo_transaccion"]."','".$registro["ced_rif"]."','".$registro["fecha_emision"]."','$tipo_r','00000000','".$registro["tipo_operacion"]."','$tipo_ret','".$registro["tipo_documento"]."','$nro_d','$nro_con_fac','".$registro["nro_doc_afectado"]."','$fechad','".$registro["nro_comprobante"]."','$concepto',$monto_p,$monto_o,$tasa,$monto_r,$monto1,$monto2,$monto3)";$resultado=pg_exec($conn,$ssql); $error=pg_errormessage($conn);}
}
$sql="SELECT pag001.nro_orden,pag001.ced_rif,pag001.fecha,pag001.concepto,pag016.nro_factura,pag016.nro_con_factura,pag016.fecha_factura,pag016.monto_sin_iva,pag016.monto_iva1_so,pag016.tasa_iva1,pag016.monto_iva1,pag016.monto_factura,pag016.rif_factura,pag016.campo_str2 FROM pag001,pag016 WHERE (pag001.nro_orden=pag016.nro_orden) And (pag001.anulado='N') And (pag001.fecha>='$fecha_1') And (pag001.fecha<='$fecha_2') and (pag016.status_2='N') Order by pag016.fecha_factura"; $res=pg_query($sql);
while($registro=pg_fetch_array($res))
{ $fechad=$registro["fecha_factura"]; $nro_orden=$registro["nro_orden"]; $cotinua=0; 

   //if($solo_fact=="SI"){if(substr($fechad,3,2)==$mes){$cotinua=0;}else{$cotinua=1;}}
   
  $tipo_mov="01-REG";
  if($cotinua==0){ $nro_d=$registro["nro_factura"]; if(is_numeric($nro_d)){$nro_d=elimina_ceros($nro_d);}  $ced_rif=$registro["ced_rif"]; $concepto=$registro["concepto"]; $tipo_doc='01'; $monto_p=$registro["monto_factura"]; $nro_doc_afec=""; if($monto_p<0){$tipo_doc="03"; $tipo_mov="03-REG"; $nro_doc_afec=$registro["campo_str2"]; }
  $ssql="SELECT codigo_mov,ced_rif  FROM BAN029 WHERE codigo_mov='$codigo_mov' and ced_rif='$ced_rif' and nro_documento='$nro_d' and tipo_documento='$tipo_doc'"; $resultado=pg_query($ssql);  $filas=pg_num_rows($resultado);
  if ($filas>0){$cotinua=1;} }
  if($cotinua==0){  
	  $tipo_r=$tipo_r+1; $tipo_ret=substr($tipo_r,0,3); $ced_rif=$registro["rif_factura"]; $nro_con_fac=$registro["nro_con_factura"]; 	  if(is_numeric($nro_con_fac)) {$nro_con_fac=elimina_ceros($nro_con_fac);}
	  $monto_p=$registro["monto_factura"]; $monto1=$registro["monto_sin_iva"];  $tasa=$registro["tasa_iva1"];  $monto_o=$registro["monto_iva1_so"]; $monto1=$monto1-$monto_o; $iva_fact=$registro["monto_factura"]-$registro["monto_sin_iva"]; $monto_r=0;  $monto2=cambia_coma_numero($iva_fact); $monto3=0;
	  if($tasa==0){$monto1=$monto_p; $monto_o=0; }
	  $ssql="SELECT INCLUYE_BAN029('$codigo_mov','$ano','$mes','".$registro["nro_orden"]."','$mes','$tipo_mov','".$ced_rif."','".$registro["fecha"]."','$tipo_r','00000000','C','$tipo_ret','$tipo_doc','$nro_d','$nro_con_fac','$nro_doc_afec','$fechad','','$concepto',$monto_p,$monto_o,$tasa,$monto_r,$monto1,$monto2,$monto3)";
	  $resultado=pg_exec($conn,$ssql); $error=pg_errormessage($conn);  
  }
}

if($solo_fact=="SI"){$sql="SELECT ced_rif_f,nro_factura,nro_orden,tipo_compromiso,nro_con_factura,fecha_factura,monto_sin_iva,monto_iva1_so,tasa_iva1,monto_iva1,monto_factura FROM comp048 where (fecha_factura>='$fecha_1') And (fecha_factura<='$fecha_2') Order by fecha_factura"; $res=pg_query($sql);}
else{$sql="SELECT ced_rif_f,nro_factura,nro_orden,tipo_compromiso,nro_con_factura,fecha_factura,monto_sin_iva,monto_iva1_so,tasa_iva1,monto_iva1,monto_factura FROM comp048 where (fecha_factura<='$fecha_2') Order by fecha_factura"; $res=pg_query($sql);}
while($registro=pg_fetch_array($res))
{ $fechad=$registro["fecha_factura"];  $cotinua=0; if($solo_fact=="SI"){if(substr($fechad,3,2)==$mes){$cotinua=0;}else{$cotinua=1;}}
  else{ $nro_d=$registro["nro_factura"]; if(is_numeric($nro_d)){$nro_d=elimina_ceros($nro_d);} $ced_rif=$registro["ced_rif"]; $ssql="SELECT codigo_mov,ced_rif  FROM PAG032 WHERE ced_rif='$ced_rif' and nro_documento='$nro_d' and tipo_documento='01'"; $resultado=pg_query($ssql);  $filas=pg_num_rows($resultado); if ($filas>0){$cotinua=1;} }
  if($cotinua==0){ $nro_d=$registro["nro_factura"]; if(is_numeric($nro_d)){$nro_d=elimina_ceros($nro_d);}$ced_rif=$registro["ced_rif"];  $ssql="SELECT codigo_mov,ced_rif  FROM BAN029 WHERE codigo_mov='$codigo_mov' and ced_rif='$ced_rif' and nro_documento='$nro_d' and tipo_documento='01'"; $resultado=pg_query($ssql);  $filas=pg_num_rows($resultado); if ($filas>0){$cotinua=1;} }
  if($cotinua==0){ $tipo_r=$tipo_r+1; $nro_con_fac=$registro["nro_con_factura"]; if(is_numeric($nro_con_fac)){$nro_con_fac=elimina_ceros($nro_con_fac);}
  $monto_p=$registro["monto_factura"]; $monto1=$registro["monto_sin_iva"];  $tasa=$registro["tasa_iva1"];  $monto_o=$registro["monto_iva1_so"]; $monto1=$monto1-$monto_o;  $iva_fact=$registro["monto_factura"]-$registro["monto_sin_iva"]; $monto_r=0;  $monto2=$iva_fact; $monto3=0;
  $ssql="SELECT INCLUYE_BAN029('$codigo_mov','$ano','$mes','".$registro["nro_orden"]."','$mes','01-REG','".$registro["ced_rif"]."','".$registro["fecha_factura"]."','$tipo_r','00000000','C','$tipo_r','01','$nro_d','$nro_con_fac','','$fechad','','',$monto_p,$monto_o,$tasa,$monto_r,$monto1,$monto2,$monto3)";$resultado=pg_exec($conn,$ssql); $error=pg_errormessage($conn);}
}
pg_close();?><iframe src="Det_inc_libro_comp.php?codigo_mov=<?echo $codigo_mov?>&agregar=S" width="870" height="360" scrolling="auto" frameborder="1"></iframe>