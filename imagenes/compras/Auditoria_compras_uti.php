<?include ("../class/conect.php");
$conn = pg_connect("host=localhost port=5432 password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
else{ $sql="SELECT campo103 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql); $filas=pg_numrows($resultado); $tipo_u="U"; if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN"; if($tipo_u=="A"){$Mcamino="SSSSSSSSSSSSSSSSSSSS";}
        else{$modulo="03"; $opcion="04-0000005"; $sql="select * from sia006 where campo601='$usuario_sia' and campo602='$modulo' and campo603='$opcion'"; $res=pg_exec($conn,$sql); $filas=pg_numrows($res); if ($filas>0){$reg=pg_fetch_array($res);
          $Mcamino=$reg["campo607"].$reg["campo608"].$reg["campo609"].$reg["campo610"].$reg["campo611"].$reg["campo612"].$reg["campo613"].$reg["campo614"].$reg["campo615"].$reg["campo616"].$reg["campo617"].$reg["campo618"].$reg["campo619"].$reg["campo620"].$reg["campo621"].$reg["campo622"].$reg["campo623"].$reg["campo624"].$reg["campo625"].$reg["campo626"]; }
      }$posicion=strpos($Mcamino,'S'); if(is_numeric($posicion)){$Mcamino=$Mcamino;}else{?><script language="JavaScript"> document.location='menu.php';</script><?}}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SIA COMPRAS,SERVICIOS Y AMAC&Eacute;N (AUDITORIA DE COMPRAS)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../class/sia.css" type=text/css rel=stylesheet>
<script language="JavaScript" type="text/JavaScript">
function LlamarURL(url){ document.location = url;}
</script></head>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">AUDITORIA DE COMPRAS </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:978px; height:448px; z-index:1; top: 70px; left: 1px;">
<?
        $criterio = " where modulo='09'"; if ($_GET){if ($_GET["criterio"]!=""){$txt_criterio = $_GET["criterio"];$txt_criterio = strtoupper ($txt_criterio);
        $criterio = " where modulo='09' and (usuario_sia like '%" . $txt_criterio . "%' or descrip_doc like '%" . $txt_criterio . "%' or operacion like '%" . $txt_criterio . "%')";}}
        $sql="SELECT * FROM SIA004 ".$criterio;  $res=pg_query($sql); $numeroRegistros=pg_num_rows($res);
        if($numeroRegistros<=0){echo "<font face='verdana' size='-2'>No se encontraron Comprobantes</font>";
        }else{
              if(!isset($orden)){$orden="usuario_sia,fecha_Op,hora_Op";}
                $tamPag=10;
                if(!isset($pagina)){$pagina=1;$inicio=1;$final=$tamPag;}
                $limitInf=($pagina-1)*$tamPag;
                $numPags=ceil($numeroRegistros/$tamPag);
                if(!isset($pagina)){$pagina=1;$inicio=1;$final=$tamPag;}
                 else{
                    $seccionActual=intval(($pagina-1)/$tamPag);
                    $inicio=($seccionActual*$tamPag)+1;
                    if($pagina<$numPags){$final=$inicio+$tamPag-1;}else{$final=$numPags;}
                    if ($final>$numPags){$final=$numPags;} }
                $sql="SELECT * FROM SIA004 ".$criterio." ORDER BY ".$orden;
                $res=pg_query($sql);
                echo "<table align='center' width='95%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000033' >";
                echo "<th bgcolor='#99CCFF' ><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=usuario_sia&criterio=".$txt_criterio."'>Usuario</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=fecha_op&criterio=".$txt_criterio."'>Fecha</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=hora_op&criterio=".$txt_criterio."'>Hora</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=fecha_doc&criterio=".$txt_criterio."'>Fecha Doc.</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=operacion&criterio=".$txt_criterio."'>Operacion</a></th>";
                echo "<th bgcolor='#99CCFF'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina=".$pagina."&orden=descrip_doc&criterio=".$txt_criterio."'>Descripci&oacute;n</a></th>";
                $linea=0; $Salir=false;
                while($registro=pg_fetch_array($res)){
                $linea=$linea+1;$descripcion=$registro["descrip_doc"]; $sfecha=$registro["fecha_op"];  $fecha = substr($sfecha,8,2)."/".substr($sfecha,5,2)."/".substr($sfecha,0,4);
                $descripcion=substr($descripcion,0,199);  $sfecha=$registro["fecha_doc"]; $fechad = substr($sfecha,8,2)."/".substr($sfecha,5,2)."/".substr($sfecha,0,4);
                if  ($linea>$limitInf+$tamPag){$Salir=true;} if  (($linea>=$limitInf) and ($linea<=$limitInf+$tamPag)){
?>
<!-- tabla de resultados -->
  <tr bgcolor='#FFFFFF' bordercolor='#000000' onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#FFFFFF'"o"];" >
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $registro["usuario_sia"]; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $fecha; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $registro["hora_op"]; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $fechad; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $registro["operacion"]; ?></b></font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b><? echo $descripcion; ?></b></font></td>
  </tr>
<!-- fin tabla resultados -->
<?}
                }//fin while
                echo "</table>";
        }//fin if
?>
        <br>
        <table border="0" cellspacing="0" cellpadding="0" align="center"  bordercolor='#000033'>
        <tr><td align="center" valign="top">
  <?    echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=1&orden=".$orden."&criterio=".$txt_criterio."'>";
        echo "<font face='verdana' size='-2'>Principio</font>";
        echo "</a>&nbsp;";
        if($pagina>1){
                echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
                echo "<font face='verdana' size='-2'>Anterior</font>";
                echo "</a>&nbsp;"; }
        for($i=$inicio;$i<=$final;$i++) {
                if($i==$pagina){ echo "<font face='verdana' size='-2'><b>".$i."</b>&nbsp;</font>";
                }else{
                   echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>";
                   echo "<font face='verdana' size='-2'>".$i."</font></a>&nbsp;"; } }
        if($pagina<$numPags){
                echo "&nbsp;<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
                echo "<font face='verdana' size='-2'>Siguiente</font></a>";  }
        echo " ";
        echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$numPags."&orden=".$orden."&criterio=".$txt_criterio."'>";
        echo "<font face='verdana' size='-2'>Final</font>";
        echo "</a>&nbsp;"; ?>
        </td></tr>
        </table>
<hr noshade style="color:CC6666;height:1px">

<form action="Auditoria_compras_uti.php" method="get">Criterio de b&uacute;squeda:<input type="text" name="criterio" size="22" maxlength="150">
<input type="submit" value="Buscar">
<input name="btVolver" type="button" id="btVolver" value="Volver al menu" onClick="javascript:LlamarURL('menu.php');" >
<input name="btImprimir" type="button" id="btImprimir" value="Imprimir" onClick="javascript:window.open('/sia/comprass/rpt/imprimir_auditoria.php?criterio=<? echo $txt_criterio ?>');" >
</div>
</form>

</body>
</html>
<?
  pg_close();
?>