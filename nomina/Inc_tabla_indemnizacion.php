<?include ("../class/ventana.php"); include ("../class/fun_fechas.php"); $fecha_hoy=asigna_fecha_hoy(); 
$desde=0;$hasta=0;$antiguedad=0;$preaviso=0;$vacaciones=0;$vac_adicional=0;$bono_vacacional=0;$auxiliar1=0;?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA N&Oacute;MINA Y PERSONAL (Tabla de Indemnizaci&oacute;n)</title>
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
</script>
<script language="JavaScript" type="text/JavaScript">
function validarNum(e){tecla=(document.all) ? e.keyCode : e.which;  if(tecla==0) return true;  if(tecla==8) return true;
    if((tecla<48||tecla>57)&&(tecla!=46&&tecla!= 44&&tecla!= 45)){alert('Por Favor Ingrese Solo Numeros ') };
    patron=/[0-9\,\-\.]/;  te=String.fromCharCode(tecla); return patron.test(te);
}
function daformatomonto (monto){var i; var str2 ="";
   for (i = 0; i < monto.length; i++){if ((monto.charAt(i) == '.')){str2 = str2 + ",";} else{if (((monto.charAt(i) >= '0') && (monto.charAt(i) <= '9')) || (monto.charAt(i) == '-') || (monto.charAt(i) == ',') ) {str2 = str2 + monto.charAt(i);} } }
return str2;}
function eliminapunto (monto){var i;var str2 =""; 
   for (i = 0; i < monto.length; i++){if((monto.charAt(i) == '.')){str2 = str2;} else{str2 = str2 + monto.charAt(i);}  }
return str2;} 
function apaga_monto(mthis){var mmonto;  apagar(mthis); mmonto=mthis.value;  mmonto=daformatomonto(mmonto);   mthis.value=mmonto; } 
function encender_monto(mthis){var mmonto; encender(mthis);   mmonto=mthis.value;  mmonto=eliminapunto(mmonto);  mthis.value=mmonto;  }
function chequea_tipo(mform){var mref;
   mref=mform.txttipo_nomina.value; mref = Rellenarizq(mref,"0",2); mform.txttipo_nomina.value=mref;
return true;}
function chequea_consecutivo(mform){ var mref;
 mref=mform.txtconsecutivo.value; mref = Rellenarizq(mref,"0",4); mform.txtconsecutivo.value=mref;
return true;}
function revisar(){var f=document.form1;
    if(f.txttipo_nomina.value==""){alert("Tipo de Nomina no puede estar Vacio");return false;}else{f.txttipo_nomina.value=f.txttipo_nomina.value.toUpperCase();}
    if(f.txtconsecutivo.value==""){alert("Consecutivo no puede estar Vacio"); return false; } else{f.txtconsecutivo.value=f.txtconsecutivo.value.toUpperCase();}
document.form1.submit;
return true;}
</script>
</head>
<body>
<table width="991" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="76"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="872"><div align="center" class="Estilo2 Estilo6">INCLUIR TABLA DE INDEMNIZACI&Oacute;N </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="992" height="381" border="1" id="tablacuerpo">
  <tr>
    <td width="92" height="375"><table width="92" height="384" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
       <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('Act_tabla_indemnizacion.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgcolor=#EAEAEA><a class=menu href="Act_tabla_indemnizacion.php">Atras</a></td>
     </tr>
     <tr>
       <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgcolor=#EAEAEA><a class=menu href="menu.php">Menu</a></td>
     </tr>
      <tr><td>&nbsp;</td> </tr>
    </table></td>
    <td width="869">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:850px; height:370px; z-index:1; top: 90px; left: 110px;">
        <form name="form1" method="post" action="Insert_tabla_indem.php" onSubmit="return revisar()">
          <table width="868" border="0" cellspacing="3" cellpadding="3">
           <tr>
             <td><table width="866">
                 <tr>
                   <td width="130"><span class="Estilo5">TIPO DE N&Oacute;MINA :</span></td>
                   <td width="60"><span class="Estilo5"> <input class="Estilo10" name="txttipo_nomina" type="text" id="txttipo_nomina" size="4" maxlength="4" onFocus="encender(this)" onBlur="apagar(this)" onchange="chequea_tipo(this.form);"> </span></td>
                   <td width="50"><input class="Estilo10" name="bttiponom" type="button" id="bttiponom" title="Abrir Catalogo Tipos de Nomina"  onClick="VentanaCentrada('Cat_tipo_nomina.php?criterio=','SIA','','750','500','true')" value="..."> </span></td>
                   <td width="645"><span class="Estilo5"> <input class="Estilo10" name="txtdes_nomina" type="text" id="txtdes_nomina" size="100" maxlength="100" readonly > </span></td>
                 </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="866">
                 <tr>
                   <td width="120"><span class="Estilo5">CONSECUTIVO :</span></td>
                   <td width="166"><span class="Estilo5"> <input class="Estilo10" name="txtconsecutivo" type="text" id="txtconsecutivo" size="5" maxlength="4" onFocus="encender(this)" onBlur="apagar(this)" onchange="chequea_consecutivo(this.form);"> </span></td>
                   <td width="100"><span class="Estilo5">RANGO DESDE :</span></td>
                   <td width="100"><span class="Estilo5"><input class="Estilo10" name="txtdesde" type="text" id="txtdesde" style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $desde?>"> </span></td>
                   <td width="100"><span class="Estilo5">MESES</span></td>
                   <td width="60"><span class="Estilo5">HASTA :</span></td>
                   <td width="100"><span class="Estilo5"><input class="Estilo10" name="txthasta" type="text" id="txthasta" style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $hasta?>"> </span></td>
                   <td width="120"><span class="Estilo5">MESES</span></td>
                  </tr>
             </table></td>
           </tr>
           <tr><td>&nbsp;</td> </tr>
           <tr>
             <td><table width="866">
                 <tr>
                   <td width="230"><span class="Estilo5">CANTIDAD DIAS ANTIGUEDAD  :</span></td>
                   <td width="200"><span class="Estilo5"> <input class="Estilo10" name="txtantiguedad" type="text" id="txtantiguedad"  style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $antiguedad?>"> </span></td>
                   <td width="280"><span class="Estilo5">CANTIDAD DIAS PREAVISO  :</span></td>
                   <td width="156"><span class="Estilo5"><input class="Estilo10" name="txtpreaviso" type="text" id="txtpreaviso" style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $preaviso?>"> </span></td>
                 </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="866">
                 <tr>
                   <td width="230"><span class="Estilo5">CANTIDAD DIAS VACACIONES :</span></td>
                   <td width="200"><span class="Estilo5"> <input class="Estilo10" name="txtvacaciones" type="text" id="txtvacaciones"  style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $vacaciones?>"> </span></td>
                   <td width="280"><span class="Estilo5">CANTIDAD DIAS VACACIONES ADICIONALES :</span></td>
                   <td width="156"><span class="Estilo5"><input class="Estilo10" name="txtvac_adicional" type="text" id="txtvac_adicional" style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $vac_adicional?>"> </span></td>
                 </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="866">
                 <tr>
                   <td width="230"><span class="Estilo5">CANTIDAD DIAS BONO VACACIONAL :</span></td>
                   <td width="200"><span class="Estilo5"> <input class="Estilo10" name="txtbono_vacacional" type="text" id="txtbono_vacacional"  style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $bono_vacacional?>"> </span></td>
                   <td width="280"><span class="Estilo5">DIAS ADICIONALES BONO VACACIONAL  :</span></td>
                   <td width="156"><span class="Estilo5"><input class="Estilo10" name="txtauxiliar1" type="text" id="txtauxiliar1" style="text-align:right" size="8" maxlength="8" onFocus="encender_monto(this)" onBlur="apaga_monto(this)" onKeypress="return validarNum(event)" value="<?echo $auxiliar1?>"> </span></td>
                 </tr>
             </table></td>
           </tr>
         </table>
         <p>&nbsp;</p>
         <table width="859">
                <tr>
                  <td width="600">&nbsp;</td>
                  <td width="88"><input name="Grabar" type="submit" id="Grabar"  value="Grabar"></td>
                  <td width="88"><input name="Blanquear" type="reset" value="Blanquear"></td>
                </tr>
          </table>
       </div>
     </form>
    </td>
  </tr>
</table>
</body>
</html>