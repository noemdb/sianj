<?php include ("../class/funciones.php"); $equipo=getenv("COMPUTERNAME");  $fecha_hoy=asigna_fecha_hoy();
if (!$_GET){$mcod_m="TRAB".$usuario_sia.$equipo;$codigo_mov=substr($mcod_m,0,49);}else{$codigo_mov=$_GET["codigo_mov"];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIA N&Oacute;MINA Y PERSONAL (Incluir Hoja de Vida)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK  href="../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../class/sia.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
function llamar_anterior(){ document.location ='Det_inc_hoja_vida.php?codigo_mov=<?echo $codigo_mov?>'; }
function revisar(){
var f=document.form1;
var Valido=true;
   if(f.txtfecha.value==""){alert("Fecha no puede estar Vacio");return false;}
   if(f.txtobservacion.value==""){alert("Observacion no puede estar Vacio");return false;} else{f.txtobservacion.value=f.txtobservacion.value.toUpperCase();}
document.form1.submit;
return true;}
</script>
<style type="text/css">
<!--
.Estilo9 {font-size: 16px; font-weight: bold; color: #FFFFFF;}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="Insert_hoja_vida.php" onSubmit="return revisar()">
  <table width="661" height="70" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="660" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="31" align="center" bgcolor="#000066"><span class="Estilo9">INCLUIR HOJA DE VIDA </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="660" border="0">
              <tr>
                <td width="126"><span class="Estilo5"> FECHA :</span> </td>
                <td width="534"><span class="Estilo5"><input class="Estilo10" name="txtfecha" type="text" id="txtfecha" size="15" maxlength="15"  onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_hoy?>"></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="660" border="0">
              <tr>
                <td width="126"><span class="Estilo5">OBSERVACION : </span></td>
                <td width="534"><textarea name="txtobservacion" cols="80" class="Estilo10" onFocus="encender(this)" onBlur="apagar(this)" id="txtobservacion"></textarea></td>
              </tr>
           </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p>&nbsp;</p> </td>
        </tr>
      </table>
        <table width="540" align="center">
          <tr>
            <td width="17"><input name="txtcodigo_mov" type="hidden" id="txtcodigo_mov" value="<?echo $codigo_mov?>"></td>
            <td width="100">&nbsp;</td>
            <td width="100" align="center" valign="middle"><input name="Aceptar" type="submit" id="Aceptar"  value="Aceptar"></td>
            <td width="100" align="center"><input name="Blanquear" type="reset" value="Blanquear"></td>
            <td width="100" align="center"><input name="Atras" type="button" id="Atras" value="Atras" onClick="JavaScript:llamar_anterior()"></td>
            <td width="117">&nbsp;</td>
          </tr>
        </table>      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>