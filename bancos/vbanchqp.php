<?php include ("../class/conect.php");  include ("../class/funciones.php"); $codigo_mov=$_GET["codigo_mov"]; $cod_banco=$_GET["cbanco"]; $nro_cheque=$_GET["ncheque"]; $tipo_pago=$_GET["tpago"]; $fecha=$_GET["fecha"]; $fechad=$_GET["fechad"]; $fechah=$_GET["fechah"]; $fechah=$_GET["fechah"]; $orden=$_GET["norden"]; $password=$_GET["password"]; $user=$_GET["user"];$dbname=$_GET["dbname"];
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname.""); $ult_ref="00000000";
$fecha=formato_aaaammdd($fecha); $fechad=formato_aaaammdd($fechad);  $fechah=formato_aaaammdd($fechah);
$StrSQL="select * from ban030 where codigo_mov='$codigo_mov'"; $resultado=pg_query($StrSQL);$filas=pg_num_rows($resultado);
$sql="SELECT INCLUYE_BAN030 (1,'$codigo_mov','$cod_banco','$nro_cheque','$tipo_pago','$fecha','$fechad','$fechah','N','N','','$orden',0,0,'')";$resultado=pg_exec($conn,$sql);
pg_close();?>NUMERO DE CHEQUE: