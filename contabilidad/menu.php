<?include ("../class/seguridad.inc"); include ("../class/conects.php");  include ("../class/funciones.php"); include ("../class/configura.inc");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?><script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script><?} else{ $Nom_Emp=busca_conf(); }
if($dbname<>"DATOS"){ $Nom_Emp=$Nom_Emp." (".$dbname.")"; }  $nombre_menu="stmenu.js"; if($Cod_Emp=="57"){$nombre_menu="stmenu_con.js";}  if($Cod_Emp=="95"){$nombre_menu="stmenu_vi.js";} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA CONTABILIDAD FISCAL</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../class/sia.js"  type="text/javascript"></script>
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
 if (def=="N"){ alert('ETAPA DE DEFINICION INICIAL ABIERTA'); } else {document.location = url;}
}
</script>
<style type="text/css">
<!--
.Estilo4 {font-size: 14pt; font-weight: bold;}
.Estilo6 {font-size: 16pt}
.Estilo8 {color: #FFFFFF; font-weight: bold; }
.Estilo14 {font-size: 9px}
.Estilo15 {color: #000066}
.Estilo10 {color: #000066}
-->
</style>
<script type="text/javascript" language="JavaScript1.2" src="../class/tree-menu/dtree1.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="<?php echo $nombre_menu ?>"></script>
</head>
<?$sql="SELECT campo103, campo104 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U";
if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $Nom_usuario=$registro["campo104"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN";
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
    <td width="786"><div align="center"><span class="Estilo2 Estilo4 Estilo6">CONTABILIDAD FISCAL</span></div></td>
    <td width="85"><span class="Estilo8">VER 6.0 </span></td>
  </tr>
</table>
<table width="955" height="400" border="1">
  <tr>
    <td><table width="943" height="623" border="0">
      <tr>
        <td width="176"><table width="256" height="610"  id="tablamenu">
        <td>&nbsp;</td>
        </tr>
        </table></td>
        <td width="823" align="center" valign="middle"><div id="Layer3" style="position:absolute; width:573px; height:65px; z-index:3; left: 190px; top: 83px;">
            <div align="center" class="Estilo4"> <? echo $Nom_Emp ?></div>
            </div>
            <div>
              <div id="Layer4" style="position:absolute; width:229px; height:33px; z-index:4; left: 690px; top: 640px;" class="Estilo9  Estilo14 Estilo15"><? echo $Nom_usuario ?></div>
            </div>
			<div id="Layer5" style="position:absolute; width:83px; height:294px; z-index:4; left: 861px; top: 75px;">
              <table width="140" height="146" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="55" align="center"><img src="../imagenes/note.gif" width="24" height="26" border="0" title="Cuentas" onclick="document.location='Act_cuentas.php';"></td>
                </tr>				
				<tr>
                  <td height="55" align="center"><img src="../imagenes/scrollbu.gif" width="25" height="25" title="Comprobantes" onclick="javascript:Llamar_comp('<? echo $SIA_Definicion ?>','Act_comprobantes.php');"></td>
                </tr>
				<tr>
                  <td height="55" align="center"><img src="../imagenes/printer.gif" width="30" height="30" title="Reporte Diario General" onclick="javascript:document.location='/sia/contabilidad/rpt/Rpt_Diario_General.php';"></td>
                </tr>
				<tr>
                  <td height="55" align="center"><img src="../imagenes/printer.gif" width="30" height="30" title="Reporte Mayor Analitico" onclick="document.location='/sia/contabilidad/rpt/Rpt_Mayor_Analitico.php';"></td>
                </tr>				
                <tr>
                  <td height="55" align="center"><img src="../imagenes/printer.gif" width="30" height="30" title="Reporte Balance General" onclick="javascript:document.location='/sia/contabilidad/rpt/Rpt_Balance_General.php';"></td>
                </tr>
                <tr>
                  <td height="55" align="center"><img src="../imagenes/printer.gif" width="30" height="30" title="Reporte Balance de Comprobacion" onclick="javascript:document.location='/sia/contabilidad/rpt/Rpt_Balance_Comprobacion.php';"></td>
                </tr>
				<tr>
                  <td height="50" align="center"><img src="../imagenes/hejmpn.gif" width="30" height="30" title="Actualizar Diferidos" onclick="document.location='Act_Mov_Diferido.php';"></td>
                </tr>
				<tr>
                  <td height="50" align="center"><img src="../imagenes/trabajo.gif" width="30" height="30" title="Actualizar Maestro" onclick="javascript:VentanaCentrada('Act_maestro.php','Actualizar Maestro','','600','260','true');"></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                </tr>
              </table>
            </div>
            <div id="Layer1" style="position:absolute; width:264px; height:127px; z-index:1; left: 694px; top: 520px;">
              <div align="center">
                <table width="251" height="123" border="0">
                  <tr>
                    <td width="131" rowspan="3"><img src="../imagenes/Logo_sia.gif" alt="Ceinco Logo" width="126" height="99" longdesc="http://www.ceinco.com/"></td>
                    <td width="99" height="20">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="71" align="center" valign="middle" class="Estilo9  Estilo14"><span class="Estilo14 Estilo9"><strong><span class="Estilo9  Estilo14 Estilo15">SISTEMA INTEGRADO ADMINISTRATIVO SIA 6.0 </span></strong></span></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                  </tr>
                </table>
              </div>
            </div>
            <div align="left"></div>
            <div align="center"></div>
            <div id="Layer2" style="position:absolute; width:230px; height:226px; z-index:2; left: 360px; top: 200px;"><img src="../imagenes/Logo_empresa.gif" width="204" height="221" border="0"></div></td>
            <div id="Layer6" style="position:absolute; width:300px; height:33px; z-index:4; left: 26px; top: 630px;" class="Estilo9  Estilo14 Estilo15"><? echo $var_so ?></div>
	  </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<? pg_close();?>