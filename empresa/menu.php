<?php include ("../class/seguridad.inc");include ("../class/conects.php");include ("../class/funciones.php");include ("../class/configura.inc");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?><script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script><?} else{ $Nom_Emp=busca_conf(); }
if($dbname<>"DATOS"){ $Nom_Emp=$Nom_Emp." (".$dbname.")"; }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA CONFIGURACI&Oacute;N Y MANTENIMIENTO</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../class/sia.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
function Llamar_comp(def,url){
 if (def=="N"){ alert('ETAPA DE DEFINICION INICIAL ABIERTA'); }
  else {document.location = url;}
}
</script>
<style type="text/css">
<!--
.Estilo4 {font-size: 14pt;  font-weight: bold;}
.Estilo6 {font-size: 16pt}
.Estilo8 {color: #FFFFFF; font-weight: bold; }
.Estilo10 {color: #000066}
-->
</style>
</head>
<?
$sql="SELECT campo103, campo104 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U"; $Nom_usuario="";
if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $Nom_usuario=$registro["campo104"]; $tiene_acceso="S";} 
$Nom_usuario="USUARIO: ".$Nom_usuario;
error_reporting(E_ALL ^ E_NOTICE); $userAgent = $_SERVER[HTTP_USER_AGENT]; $nombre_serv=$_SERVER[SERVER_NAME]; error_reporting(E_ALL); 
$userAgent = strtolower ($userAgent); $var_so=""; $PHP_OS=PHP_OS; 
if(strpos($userAgent, "windows") !== false){ $var_so="Sistema Operativo Cliente : Windows"."<br>"; }
if(strpos($userAgent, "linux") !== false){ $var_so="Sistema Operativo Cliente : Linux ";}
$var_so=$var_so." Sistema Operativo Servidor : ". $PHP_OS." ".$nombre_serv;
?>
<body>
<table width="955" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="70"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="786"><div align="center"><span class="Estilo2 Estilo4 Estilo6">CONFIGURACI&Oacute;N Y MANTENIMIENTO (MENU PRINCIPAL) </span></div></td>
    <td width="85"><span class="Estilo8">VER 6.0 </span></td>
  </tr>
</table>
<table width="955" height="327" border="1">
  <tr>
    <td width="116"><table width="116" height="350" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
        <tr>
          <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu_conf.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu  href="menu_conf.php">Configuracion SIA</A></td>
        </tr>
        <tr>
          <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('usuarios.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="usuarios.php">Seguridad</A></td>
        </tr>
        <tr>
          <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu_aud.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu   href="menu_aud.php">Auditoria</A></td>
        </tr>
        <tr>
          <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';"  onClick="javascript:LlamarURL('menu_u.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu  href="menu_u.php">Utilidades</A></td>
        </tr>
        <tr>
          <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';"  onClick="javascript:LlamarURL('salir.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu  href="salir.php">Salir</A></td>
        </tr>
        <td>&nbsp;</td>
        </tr>
    </table></td>
    <td width="823" align="center" valign="middle"><div id="Layer1" style="position:absolute; width:264px; height:127px; z-index:1; left: 694px; top: 280px;">
      <div align="center">
        <table width="251" height="123" border="0">
          <tr>
            <td width="131" rowspan="3"><img src="../imagenes/Logo_sia.gif" alt="Ceinco Logo" width="106" height="90" longdesc="http://www.ceinco.com/"></td>
            <td width="99" height="20">&nbsp;</td>
          </tr>
          <tr>
            <td height="71" align="center" valign="middle" class="Estilo9 Estilo14"><span class="Estilo9  Estilo14"><span class="Estilo14 Estilo9"><strong><strong><span class="Estilo9  Estilo14 Estilo15 ">SISTEMA INTEGRADO ADMINISTRATIVO SIA 6.0 </span></strong></strong></span></span></td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
          </tr>
        </table>
        </div>
    </div>
      <div id="Layer3" style="position:absolute; width:804px; height:36px; z-index:3; left: 149px; top: 83px;">
        <div align="center" class="Estilo4"><? echo $Nom_Emp ?></div>
      </div>
      <div align="left"></div>
      <div align="center"></div>
    <div id="Layer2" style="position:absolute; width:330px; height:226px; z-index:2; left: 383px; top: 131px;"><img src="../imagenes/Logo_empresa.gif" width="304" height="221"></div></td>
	<div id="Layer6" style="position:absolute; width:300px; height:33px; z-index:4; left: 26px; top: 655px;" class="Estilo9  Estilo14 Estilo15"><? echo $var_so ?></div>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<? pg_close();?>