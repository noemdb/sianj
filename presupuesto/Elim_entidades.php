<?include ("../class/conect.php");  include ("../class/funciones.php");
if (!$_GET){$cod_entidad='';} else {$cod_entidad=$_GET["Gentidad"];}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIA CONTABILIDAD PRESUPUESTARIA (Eliminar Entidad)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../class/sia.js" type=text/javascript></SCRIPT>
<script language="JavaScript" type="text/JavaScript">
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
</script>
<script language="JavaScript" type="text/JavaScript">
function LlamarURL(url){  document.location = url; }
function revisar(){var f=document.form1;var Valido;
    if(f.txtCodigo_Entidad.value==""){alert("C�digo de la Entidad no puede estar Vacio");return false;}
    if(f.txtNombre_Entidad.value==""){alert("Denominaci�n de la entidad no puede estar Vacia"); return false; }
       else{f.txtNombre_Entidad.value=f.txtNombre_Entidad.value.toUpperCase();}
    if(f.txtCodigo_Municipio.value.length==2){f.txtCodigo_Entidad.value=f.txtCodigo_Entidad.value.toUpperCase();}
       else{alert("Longitud C�digo de Fuente Invalida");return false;}
document.form1.submit;
return true;}
</script>
<?
$conn = pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
$den_estado="";$sql="Select cod_estado,estado from pre091 where cod_estado='$cod_entidad'";$res=pg_query($sql);
if ($registro=pg_fetch_array($res,0)){  $cod_estado=$registro["cod_estado"];   $den_estado=$registro["estado"]; }
?>
</head>
<body>
<table width="977" height="38" border="0" bgcolor="#000066" id="tablaencabezado">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">ELIMINAR ENTIDAD</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9"> </strong></td>
  </tr>
</table>
<table width="977" height="349" border="1">
  <tr>
    <td width="92"><table width="92" height="350" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onclick="javascript:LlamarURL('Act_entidades.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="Act_entidades.php">Atras</A></td>
      </tr>
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="menu.php">Menu</A></td>
      </tr>
  <td>&nbsp;</td>
  </tr>
    </table></td>
    <td width="869"><div id="Layer1" style="position:absolute; width:868px; height:335px; z-index:1; top: 67px; left: 112px;">
      <form name="form1" method="post" action="Delete_entidades.php" onSubmit="return revisar()">
        <table width="865" border="0">
          <tr>
            <td><table width="825" height="231" border="0" align="center" id="tabcampos">
              <tr><td>&nbsp;</td></tr>
              <tr><td>&nbsp;</td></tr>
              <tr>
                <td><table width="816" border="0">
                  <tr>
                    <td width="96"><span class="Estilo5">C&Oacute;DIGO :</span></td>
                    <td width="720"><span class="Estilo5">
                      <input name="txtCodigo_Entidad" type="text" id="txtCodigo_Entidad" title="Registre el C&oacute;digo de la Entidad" size="10" maxlength="2"  readonly value="<?ECHO $cod_entidad?>">
                    </span></td>
                  </tr>
                </table></td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              <tr>
                <td>
                  <table width="816" border="0">
                    <tr>
                      <td width="96"><span class="Estilo5">NOMBRE :</span></td>
                      <td width="720"><input name="txtNombre_Entidad" type="text" id="txtNombre_Entidad" title="Registre el Nombre de la Entidad" size="100" maxlength="200"  value="<?ECHO $den_estado?>" readonly ></td>
                    </tr>
                  </table>                  </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              <tr><td>&nbsp;</td></tr>
              <tr><td>&nbsp;</td></tr>
              <tr><td>&nbsp;</td></tr>
            </table>
            </td>
          </tr>
        </table>
        <table width="768">
          <tr>
            <td width="664">&nbsp;</td>
            <td width="88" valign="middle"><input name="Eliminar" type="submit" id="Eliminar"  value="Eliminar" onclick="Llamar_Ventana('Delete_entidad.php?Gentidad=')"></td>
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