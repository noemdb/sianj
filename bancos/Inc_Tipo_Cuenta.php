<?include ("../class/seguridad.inc");include ("../class/ventana.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA CONTROL BANCARIO (Tipos de Cuentas)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type="text/css" rel=stylesheet>
<SCRIPT language="JavaScript" src="../class/sia.js"  type=text/javascript></SCRIPT>
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
function revisar(){var f=document.form1;
  if(f.txttipo_cuenta.value==""){alert("Tipo de Cuenta no puede estar Vacio");return false;}else{f.txttipo_cuenta.value=f.txttipo_cuenta.value.toUpperCase();}
  if(f.txtdescripcion_tipo.value==""){alert("Descripcion no puede estar Vacia"); return false; } else{f.txtdescripcion_tipo.value=f.txtdescripcion_tipo.value.toUpperCase();}
  document.form1.submit;
return true;}
</script>

</head>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">INCLUIR TIPOS DE CUENTAS</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="978" height="359" border="1" id="tablacuerpo">
  <tr>
    <td><table width="92" height="350" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('Act_Tipos_Cuentas.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="Act_Tipos_Cuentas.php">Atras</A></td>
      </tr>
  <tr>
    <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><a class=menu href="menu.php">Menu</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    </table></td>
    <td width="870">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:862px; height:343px; z-index:1; top: 70px; left: 116px;">
             <form name="form1" method="post" action="Insert_tipo_cuenta.php" onSubmit="return revisar()">
              <table width="839" height="110" border="0" align="center" >
                <tr><td>&nbsp;</td> </tr>
                <tr>
                  <td width="830" height="24"><table width="830" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="200"><span class="Estilo5">TIPO CUENTA :</span></td>
                        <td width="630"><span class="Estilo5"><input name="txttipo_cuenta" type="text"  id="txttipo_cuenta" onFocus="encender(this)" onBlur="apagar(this)" size="5" maxlength="3">
                        </span></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>  <td>&nbsp;</td>  </tr>
                <tr>
                  <td><table width="830" border="0" cellpadding="0" cellspacing="0" dwcopytype="CopyTableColumn">
                    <tr>
                      <td width="200"><span class="Estilo5">DESCRIPCI&Oacute;N TIPO CUENTA : </span></td>
                      <td width="630"><span class="Estilo5"><input name="txtdescripcion_tipo" type="text" id="txtdescripcion_tipo"  onFocus="encender(this)" onBlur="apagar(this)" size="100" maxlength="80">
                      </span></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>  <td>&nbsp;</td>  </tr>
                <tr>
                  <td><table width="830" border="0" cellpadding="0" cellspacing="0" dwcopytype="CopyTableColumn">
                    <tr>
                      <td width="200" height="22"><span class="Estilo5">CONCILIABLE :</span></td>
                      <td width="630"><span class="Estilo5"><select name="txtconciliable" size="1" id="txtconciliable" onFocus="encender(this)" onBlur="apagar(this)">
                         <option>SI</option> <option>NO</option> </select>  </span></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>  <td>&nbsp;</td>  </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            <table width="812">
              <tr>
                <td width="664">&nbsp;</td>
                <td width="88"><input name="Grabar" type="submit" id="submit"  value="Grabar"></td>
                <td width="88"><input name="Blanquear" type="reset" value="Blanquear"></td>
              </tr>
            </table>
            </form>
      </div>
    </td>
</tr>
</table>
</body>
</html>