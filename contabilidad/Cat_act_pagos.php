<?include ("../class/conect.php");  error_reporting(E_ALL ^ E_NOTICE); $Gtipo_pago='0006';
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA CONTABILIDAD PRESUPUESTARIA (Catalogo de Pagos)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/JavaScript">
function CargarUrl(mclave) {
var murl;
   murl="Act_pagos.php?Gcriterio="+mclave;
   document.location = murl;
}
</script></head>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">CATAL0GO PAGOS </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:978px; height:448px; z-index:1; top: 70px; left: 1px;">
<?
        $criterio = "where modulo='P' and refierea='NINGUNO'";
        if ($_GET){if ($_GET["criterio"]!=""){$txt_criterio = $_GET["criterio"];$txt_criterio = strtoupper ($txt_criterio);
        $criterio = " where modulo='P' and refierea='NINGUNO' and tipo_pago like '%" . $txt_criterio . "%' or referencia_pago like '%" . $txt_criterio . "%' or descripcion_pago like '%" . $txt_criterio . "%'";}}
        $sql="SELECT * FROM PAGOS ".$criterio;$res=pg_query($sql);$numeroRegistros=pg_num_rows($res);
        if($numeroRegistros<=0){echo "<font face='verdana' size='-2'>No se encontraron Pagos</font>";$pagina=1; $inicio=1; $final=1; $numPags=1;
        }else{
              if ($_GET["orden"]!=""){$orden="tipo_pago,referencia_pago";}else{$orden=$_GET["orden"];} $tamPag=10;
                if ($_GET["pagina"]==""){$pagina=1;$inicio=1;$final=$tamPag;} else{$pagina=$_GET["pagina"];}  $limitInf=($pagina-1)*$tamPag; $numPags=ceil($numeroRegistros/$tamPag);
                if(!isset($pagina)){$pagina=1;$inicio=1;$final=$tamPag;}
                 else{ $seccionActual=intval(($pagina-1)/$tamPag);  $inicio=($seccionActual*$tamPag)+1; if($pagina<$numPags){$final=$inicio+$tamPag-1;}else{$final=$numPags;}  if ($final>$numPags){$final=$numPags;} }
                $sql="SELECT * FROM PAGOS ".$criterio." ORDER BY ".$orden;
                $res=pg_query($sql);
                echo "<table align='center' width='98%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000033' >";
                echo "<th bgcolor='#99CCFF' ><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=tipo_pago,referencia_pago&criterio=".$txt_criterio."'>Tipo</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=referencia_pago&criterio=".$txt_criterio."'>Referencia</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=fecha_pago,referencia_pago&criterio=".$txt_criterio."'>Fecha</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=descripcion_pago&criterio=".$txt_criterio."'>Descripci&oacute;n</a></th>";
                $linea=0;
                $Salir=false;
                while($registro=pg_fetch_array($res))
                {
                $linea=$linea+1;
                $descripcion=$registro["descripcion_pago"];
                $sfecha=$registro["fecha_pago"];
                $descripcion=substr($descripcion,0,150);
                $fecha = substr($sfecha,8,2)."/".substr($sfecha,5,2)."/".substr($sfecha,0,4);
                if  ($linea>$limitInf+$tamPag){$Salir=true;}
                if  (($linea>=$limitInf) and ($linea<=$limitInf+$tamPag)){
?>
  <tr bgcolor='#FFFFFF' bordercolor='#000000' onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#FFFFFF'"o"];" onDblClick="javascript:CargarUrl('<? echo $registro["tipo_pago"].$registro["referencia_pago"].$registro["tipo_causado"].$registro["referencia_caus"].$registro["tipo_compromiso"].$registro["referencia_comp"].$registro["cod_banco"]; ?>');" >
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $registro["tipo_pago"]; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $registro["referencia_pago"]; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $fecha; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $descripcion; ?></b></font></td>
  </tr>
<?}} echo "</table>"; }
?>
        <br>
        <table border="0" cellspacing="0" cellpadding="0" align="center"  bordercolor='#000033'>
        <tr><td align="center" valign="top">
  <?    if($pagina>1){
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=1&orden=".$orden."&criterio=".$txt_criterio."'>";
          echo "<font face='verdana' size='-2'>Principio</font>";
          echo "</a>&nbsp;";
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
          echo "<font face='verdana' size='-2'>Anterior</font>";
          echo "</a>&nbsp;"; }
        for($i=$inicio;$i<=$final;$i++) {
          if($i==$pagina){ echo "<font face='verdana' size='-2'><b>".$i."</b>&nbsp;</font>";}
            else{echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>";
                 echo "<font face='verdana' size='-2'>".$i."</font></a>&nbsp;"; } }
        if($pagina<$numPags){
          echo "&nbsp;<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
          echo "<font face='verdana' size='-2'>Siguiente</font></a>";
          echo " ";
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$numPags."&orden=".$orden."&criterio=".$txt_criterio."'>";
          echo "<font face='verdana' size='-2'>Final</font>";
          echo "</a>&nbsp;"; }?>
        </td></tr>
        </table>
<hr noshade style="color:CC6666;height:1px">

<form action="Cat_act_pagos.php" method="get">
Criterio de b&uacute;squeda:
<input type="text" name="criterio" size="22" maxlength="150">
<input type="submit" class="button" value="Buscar">
</div>
</form>

</body>
</html>
<?
  pg_close();
?>