<?php include ("../class/conect.php");  include ("../class/funciones.php"); $codigo_mov=$_GET["codigo_mov"]; $cod_banco=$_GET["cbanco"]; $num_nota=$_GET["nndb"]; $tipo_pago=$_GET["tpago"]; $fecha=$_GET["fecha"]; $fechad=$_GET["fechad"];$fechah=$_GET["fechah"];$password=$_GET["password"]; $user=$_GET["user"];$dbname=$_GET["dbname"];
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname.""); $ult_ref="00000000"; $sfecha=formato_aaaammdd($fecha); $sfechad=formato_aaaammdd($fechad);  $sfechah=formato_aaaammdd($fechah);
$StrSQL="select * from ban030 where codigo_mov='$codigo_mov'"; $resultado=pg_query($StrSQL);$filas=pg_num_rows($resultado);
if($filas==0){ $resultado=pg_exec($conn,"SELECT ACTUALIZA_BAN030(1,'$codigo_mov','$cod_banco','$num_nota','$tipo_pago','$sfecha','$sfechad','$sfechah','N','N','')"); }
else{$resultado=pg_exec($conn,"SELECT ACTUALIZA_BAN030(2,'$codigo_mov','$cod_banco','$num_nota','$tipo_pago','$sfecha','$sfechad','$sfechah','N','N','')");} pg_close();?>N&Uacute;MERO NOTA DEBITO: