<?include ("../class/ventana.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIA CONTROL DE BIENES NACIONALES (Incluir Ocupantes Del Bien Inmueble)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK
href="../class/sia.css" type=text/css
rel=stylesheet>
<SCRIPT language=JavaScript
src="../class/sia.js"
type=text/javascript></SCRIPT>
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
function revisar(){
var f=document.form1;
    if(f.txtced_rif.value==""){alert("Cedula no puede estar Vacio");return false;}else{f.txtced_rif.value=f.txtced_rif.value.toUpperCase();}
    if(f.txtnombre_ocupante.value==""){alert("Nombre no puede estar Vacio"); return false; } else{f.txtnombre_ocupante.value=f.txtnombre_ocupante.value.toUpperCase();}
    if(f.txtcedula.value==""){alert("Cedula no puede estar Vacio"); return false; } else{f.txtcedula.value=f.txtcedula.value.toUpperCase();}
    if(f.txtrif.value==""){alert("Rif no puede estar Vacio");return false;}else{f.txtrif.value=f.txtrif.value.toUpperCase();}
    if(f.txtnit.value==""){alert("Nit no puede estar Vacio"); return false; } else{f.txtnit.value=f.txtnit.value.toUpperCase();}
    if(f.txtobservacion.value==""){alert("Observacion no puede estar Vacio"); return false; } else{f.txtobservacion.value=f.txtobservacion.value.toUpperCase();}
document.form1.submit;
return true;}
</script>
<style type="text/css">
<!--
.Estilo5 {font-size: 10px}
.Estilo2 {color: #FFFFFF}
.Estilo6 {
        font-size: 16pt;
        font-weight: bold;
}
.Estilo9 {font-size: 8pt}
.Estilo10 {font-size: 12px}
-->
</style>
</head>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">INCLUIR OCUPANTES DEL BIEN INMUEBLE</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="978" height="204" border="1" id="tablacuerpo">
  <td ><tr>
    <td width="92" height="194"><table width="92" height="213" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onclick="javascript:LlamarURL('Act_ocupa_bien_inmu_ar.php?Gced_rif=U')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="Act_ocupa_bien_inmu_ar.php?Gced_rif=U">Atras</A></td>
      </tr>
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
              onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="menu.php">Menu</A></td>
      </tr>
  <td height="139">&nbsp;</td>
  </tr>
    </table></td>
    <td width="870">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:828px; height:164px; z-index:1; top: 83px; left: 123px;">
            <form name="form1" method="post" action="Insert_ocupa_bien_inmu_ar.php" onSubmit="return revisar()">
        <table width="828" border="0" align="center" >
          <tr>
            <td><table width="836">
              <tr>
                <td width="100" scope="col"><div align="left"><span class="Estilo5">C&Eacute;DULA/RIF :</span></div></td>
                <td width="741" scope="col"><div align="left"><span class="Estilo5">
                    <input name="txtced_rif" type="text" id="txtced_rif" size="15" maxlength="12"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5">
                </span></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="834">
              <tr>
                <td width="120" scope="col"><div align="left"><span class="Estilo5">NOMBRE :</span></div></td>
                <td width="761" scope="col"><div align="left"><span class="Estilo5">
                    <input name="txtnombre_ocupante" type="text" id="txtnombre_ocupante" size="80" maxlength="80"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5">
                </span></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="827">
              <tr>
                <td width="110" scope="col"><span class="Estilo5">C&Eacute;DULA : </span></td>
                <td width="122" scope="col"><div align="left"><span class="Estilo5"><span class="Estilo10">
                    <input name="txtcedula" type="text" id="txtcedula" size="15" maxlength="12"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5">
                    <span class="menu"><strong><strong> </strong></strong></span> </span></span></div></td>
                <td width="45" scope="col"><span class="Estilo5">R.I.F :</span></td>
                <td width="129" scope="col"><div align="left"><span class="Estilo5">
                    <input name="txtrif" type="text" id="txtrif" size="15" maxlength="12"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5">
                </span></div></td>
                <td width="43" scope="col"><div align="left"><span class="Estilo5">N.I.T :</span></div></td>
                <td width="401" scope="col"><div align="left"><span class="Estilo5">
                    <input name="txtnit" type="text" id="txtnit" size="15" maxlength="15"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5">
                </span></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="819">
              <tr>
                <td width="100" scope="col"><div align="left"><span class="Estilo5">OBSERVACI&Oacute;N :</span></div></td>
                <td width="713" scope="col"><div align="left">
                    <textarea name="txtobservacion" cols="70" onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5" class="headers" id="txtobservacion"></textarea>
                </div></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <table width="812">
          <tr>
            <td width="664">&nbsp;</td>
            <td width="88"><input name="Submit" type="submit" id="Submit"  value="Grabar"></td>
            <td width="88"><input name="Submit2" type="reset" value="Blanquear"></td>
          </tr>
        </table>
            </form>
      </div>
    </td>
</tr>
</table>
</body>
</html>
