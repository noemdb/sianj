<?include ("../class/seguridad.inc");include ("../class/conects.php"); include ("../class/funciones.php");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
$sql="SELECT campo103 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U";if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN";
if($tipo_u=="A"){$Mcamino="SSSSSSSSSSSSSSSSSSSS";}  else{$modulo="13"; $opcion="01-0000006"; $sql="select * from sia006 where campo601='$usuario_sia' and campo602='$modulo' and campo603='$opcion'";$res=pg_exec($conn,$sql);$filas=pg_numrows($res);
 if ($filas>0){$reg=pg_fetch_array($res); $Mcamino=$reg["campo607"].$reg["campo608"].$reg["campo609"].$reg["campo610"].$reg["campo611"].$reg["campo612"].$reg["campo613"].$reg["campo614"].$reg["campo615"].$reg["campo616"].$reg["campo617"].$reg["campo618"].$reg["campo619"].$reg["campo620"].$reg["campo621"].$reg["campo622"].$reg["campo623"].$reg["campo624"].$reg["campo625"].$reg["campo626"]; }
}$posicion=strpos($Mcamino,'S'); if(is_numeric($posicion)){$Mcamino=$Mcamino;}else{?><script language="JavaScript"> document.location='menu.php';</script><?}
$equipo = getenv("COMPUTERNAME"); $cod_dependen="";  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA CONTROL DE BIENES NACIONALES (Actualiza Direcciones)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK  href="../class/sia.css" type="text/css" rel="stylesheet">
<script language="Javascript" src="../class/sia.js" type="text/javascript"></script>
<script language="javascript" src="ajax_bien.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
var muser='<?php echo $user ?>';
var mpassword='<?php echo $password ?>';
var mdbname='<?php echo $dbname ?>';
function Cargar_Dependencia(mform){ var mref;
   mref=mform.txtcod_dependencia.value;
   ajaxSenddoc('GET', 'cargadependencia.php?cod_dependen='+mref+'&password='+mpassword+'&user='+muser+'&dbname='+mdbname, 'T11', 'innerHTML');
return true;}
</script>
</head>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">DEFINICION DE DIRECCIONES</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="978" height="520" border="1" id="tablacuerpo">
  <tr>
    <td width="890">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:945px; height:491px; z-index:1; top: 71px; left: 20px;">
        <form name="form1" method="post">
          <table width="922" border="0" >
                <tr>
                  <td><table width="920">
                        <tr>
                          <td width="130"><p><span class="Estilo5">C&Oacute;DIGO DEPENDENCIA :</span></p></td>
                          <td width="60"><input class="Estilo10" name="txtcod_dependencia" type="text" id="txtcod_dependencia" onFocus="encender(this)" onBlur="apagar(this)" size="5" maxlength="4"></td>
                          <td width="40"><span class="Estilo5"> <input class="Estilo10" name="btdependencia" type="button" id="btdependencia" title="Abrir Catalogo de Dependencias" onClick="VentanaCentrada('Cat_dependenciasd.php?criterio=','SIA','','750','500','true')" value="..."> </span></td>
                          <td width="590"><input class="Estilo10" name="txtdenominacion_dep" type="text"  size="110" maxlength="250" readonly></td>
                        </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="920">
                    <tr>
                      <td width="720">&nbsp;</td>
                      <td width="200"><span class="Estilo5"> <input type="button" name="btcarga_ret" value="Cargar Direcciones" title="Cargar Direcciones de la Dependencias" onClick="javascript:Cargar_Dependencia(this.form)" > </span></td>
                    </tr>
                  </table></td>
                </tr>
          </table>

              <div id="T11" class="tab-body">
              <iframe src="Det_direcciones.php?cod_dependen=<?echo $cod_dependen?>" width="940" height="350" scrolling="auto" frameborder="1"></iframe>
              </div>
         <table width="863" border="0"> <tr> <td height="10">&nbsp;</td> </tr> </table>
        <table width="923">
          <tr>
            <td width="626"><input class="Estilo10" name="txtcod_dependen" type="hidden" id="txtcod_dependen" value="<?echo $cod_dependen?>"></td>
            <td width="139"><input class="Estilo10" name="Submit" type="reset" value="Blanquear"></td>
            <td width="142" valign="middle"><input class="Estilo10" name="button" type="button" id="button" title="Retornar al menu principal" onclick="javascript:LlamarURL('menu.php')" value="Menu Principal"></td>
          </tr>
        </table>
        </form>
      </div>
    </td>
</tr>
</table>
</body>
</html>
