<?include ("../class/conect.php");  include ("../class/funciones.php");
if (!$_GET){$Doc_causado='';} else { $Doc_causado = $_GET["GDoc_causado"];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIA CONTABILIDAD PRESUPUESTARIA (Documentos Causados)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../class/sia.js" type=text/javascript></SCRIPT>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
function Llamar_Ventana(nombre){var f=document.form1;var url;
    url="Delete_doc_causado.php?txtdoc_causado="+f.txtdoc_causado.value;    document.location = url;}
</script>

<?
$conn = pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
$sql="Select * from pre003 where tipo_causado='$Doc_causado'";$res=pg_query($sql);
if ($registro=pg_fetch_array($res,0)){  $Doc_causado=$registro["tipo_causado"];  $Nombre_doc_causado=$registro["nombre_tipo_caus"];
  $Nombre_Abrev=$registro["nombre_abrev_caus"];  $Refiera_a_Comp=$registro["ref_compromiso"];  $Afecta_Presup=$registro["afecta_presup"];}
?>
</head>

<body>
<table width="977" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">DOCUMENTOS CAUSADOS (Eliminar)</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9"> </strong></td>
  </tr>
</table>
<table width="977" height="349" border="1">
  <tr>
    <td width="92"><table width="92" height="350" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('Act_doc_causado.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="Act_doc_causado.php">Atras</A></td>
      </tr>
     <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="menu.php">Menu</A></td>
      </tr>
  <td>&nbsp;</td>
  </tr>
    </table></td>
    <td width="869"><div id="Layer1" style="position:absolute; width:868px; height:338px; z-index:1; top: 65px; left: 112px;">
      <form name="form1" method="post"  onSubmit="return revisar()">
        <p>&nbsp;</p>
        <table width="859" height="199" border="0" id="tabcampos">
          <tr>
            <td height="49" colspan="3" valign="middle"><blockquote>
              <p class="Estilo5">C&Oacute;DIGO :
                                <input name="txtdoc_causado" id="txtdoc_causado" value="<?ECHO $Doc_causado?>" size="10" readOnly>
                  </p>
                          </blockquote></td>
          </tr>
          <tr>
            <td height="49" colspan="3" valign="middle"><blockquote>
              <p align="left"><span class="Estilo5">NOMBRE DEL DOCUMENTO :</span>
                <input readOnly name="txtnombre_doc_causado" id="txtnombre_doc_causado" value="<?ECHO $Nombre_doc_causado?>" size="80">
</p>
            </blockquote></td>
          </tr>
          <tr>
            <td width="380" height="43" valign="middle"><blockquote>
              <p><span class="Estilo5">NOMBRE ABREVIADO DOCUMENTO :</span>
                    <input readOnly name="txtnombre_abrev" id="txtnombre_abrev" value="<?ECHO $Nombre_Abrev?>" size="6">
              </p>
            </blockquote></td>
            <td width="226" valign="middle"><span class="Estilo5">REFIERE A COMPROMISO :
                <input readOnly name="txtRefiere_comp" id="txtRefiere_comp" value="<?ECHO $Refiera_a_Comp?>" size="4">
            </span></td>
            <td width="239" valign="middle"><span class="Estilo5">AFECTA PRESUPUESTO:</span><span class="Estilo5">
              <input readOnly name="TxtAfecta" id="TxtAfecta" value="<?ECHO $Afecta_Presup?>" size="4">
            </span> </td>
          </tr>
          <tr>
            <td height="48" colspan="3" valign="middle">&nbsp;</td>
          </tr>
        </table>
        <div align="center">
          <p>&nbsp;</p>
          </div>
        <table width="768">
          <tr>
            <td width="664">&nbsp;</td>
            <td width="88" valign="middle"><input name="button" type="button" id="button"  value="Eliminar" onclick="Llamar_Ventana('Delete_doc_causado.php')"></td>
            <td width="88">&nbsp;</td>
          </tr>
        </table>
        <div align="right"></div>
        <div align="right"></div>
        <p>&nbsp;</p>
        </form>
    </div>

  </tr>
</table>
</body>
</html>
<? pg_close();?>