<?include ("../../class/seguridad.inc");include ("../../class/conects.php");  include ("../../class/funciones.php"); include ("../../class/configura.inc");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?> <script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script> <? } else { $Nom_Emp=busca_conf(); }
$sql="SELECT campo103 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U";
if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN";
if($tipo_u=="A"){$Mcamino="SSSSSSSSSSSSSSSSSSSS";}  else{$modulo="03"; $opcion="03-0000015"; $sql="select * from sia006 where campo601='$usuario_sia' and campo602='$modulo' and campo603='$opcion'";$res=pg_exec($conn,$sql);$filas=pg_numrows($res);
 if ($filas>0){$reg=pg_fetch_array($res); $Mcamino=$reg["campo607"].$reg["campo608"].$reg["campo609"].$reg["campo610"].$reg["campo611"].$reg["campo612"].$reg["campo613"].$reg["campo614"].$reg["campo615"].$reg["campo616"].$reg["campo617"].$reg["campo618"].$reg["campo619"].$reg["campo620"].$reg["campo621"].$reg["campo622"].$reg["campo623"].$reg["campo624"].$reg["campo625"].$reg["campo626"]; }
}$posicion=strpos($Mcamino,'S');if(is_numeric($posicion)){$Mcamino=$Mcamino;}else{?><script language="JavaScript"> document.location='menu.php';</script><?}
 $fecha_d=formato_ddmmaaaa($Fec_Ini_Ejer);  $fecha_h=formato_ddmmaaaa($Fec_Fin_Ejer); $referencia_d=""; $referencia_h="zzzzzzzz";  $tipo_asiento_d="";  $tipo_asiento_h="zzz"; $cedula_d="";$cedula_h="zzzzzzzzzzzz";$cta_desde=""; $cta_hasta=""; $cta_unica=""; $vstatus="T";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIA CONTABILIDAD (Reporte Asientos Diarios)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../../class/sia.js" type="text/javascript"></script>
<script language="javascript" src="../../class/cal2.js"></script>
<script language="javascript" src="../../class/cal_conf2.js"></script>
<script language="JavaScript" type="text/JavaScript">
function checkrefechad(mform){var mref; var mfec;  mref=mform.txtFechad.value;
  if(mform.txtFechad.value.length==8){ mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7);mform.txtFechad.value=mfec;}
return true;}
function checkrefechah(mform){var mref; var mfec;  mref=mform.txtFechah.value;
  if(mform.txtFechah.value.length==8){mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7);mform.txtFechah.value=mfec;}
return true;}
function Llama_Rpt_Asientos_D(murl){var url; var r; var st;
  if(document.form1.opcomprob[0].checked==true){st="A";}
  if(document.form1.opcomprob[1].checked==true){st="D";}
  if(document.form1.opcomprob[2].checked==true){st="T";}
  r=confirm("Desea Generar el Reporte Asientos Diarios ?");
  if (r==true) {url=murl+"?fecha_d="+document.form1.txtFechad.value+"&referencia_d="+document.form1.txtReferenciad.value+"&tipo_asiento_d="+document.form1.txtTipo_Asientod.value+"&ced_rif_d="+document.form1.txtcedula_d.value+"&fecha_h="+document.form1.txtFechah.value+"&referencia_h="+document.form1.txtReferenciah.value+"&tipo_asiento_h="+document.form1.txtTipo_Asientoh.value+"&ced_rif_h="+document.form1.txtcedula_h.value+"&cta_unica="+document.form1.txtCodigo_Cuenta.value+"&vstatus="+st+"&tipo_rep="+document.form1.tipo_rep.value;
  window.open(url,"Reporte Asientos Diarios") }
}
function Llama_Menu_Rpt(murl){var url;    url="../"+murl;  LlamarURL(url);}
</script>
</head>
<?
$sql="SELECT MAX(Referencia) As Max_Referencia, MIN(Referencia) As Min_Referencia,MAX(Tipo_Asiento) As Max_Tipo,MIN(Tipo_Asiento) As Min_Tipo FROM CON002";$res=pg_query($sql);
if ($registro=pg_fetch_array($res,0)){$referencia_d=$registro["min_referencia"];  $referencia_h=$registro["max_referencia"]; $tipo_asiento_d=$registro["min_tipo"]; $tipo_asiento_h=$registro["max_tipo"];}
$sql="SELECT MAX(ced_rif) As Max_Ced_Rif, MIN(ced_rif) As Min_Ced_Rif FROM PRE099";$res=pg_query($sql);if ($registro=pg_fetch_array($res,0)){$cedula_d=$registro["min_ced_rif"];$cedula_h=$registro["max_ced_rif"];}
?>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">REPORTE ASIENTOS DIARIOS</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="977" height="500" border="1" id="tablacuerpo">
  <tr>
    <td width="870">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:956px; height:432px; z-index:1; top: 65px; left: 18px;">
        <form method="get" name="form1" id="form1">
           <table width="950" height="423" border="0">
    <tr>
      <td width="958" height="419" align="center" valign="top"><table width="783" border="0" cellspacing="0" cellpadding="0">
       <tr> <td width="5" colspan="2" class="Estilo16">&nbsp;</td>	</tr>
		<tr><td colspan="2" class="Estilo16">&nbsp;</td>	</tr>
        <tr>
          <td colspan="2"><table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="170" align="center"><div align="left"><span class="Estilo5">FECHA DESDE: </span></div></td>
              <td width="160" align="center"> <div align="left"><span class="Estilo5">
                  <input name="txtFechad" type="text" id="txtFechad" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_d?>" size="12" maxlength="10" onchange="checkrefechad(this.form)">
                  <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario1" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                onmouseover="this.style.background='blue';" onmouseout="this.style.background=''"  onClick="javascript:showCal('Calendario1')"  /></span></div></td>
              <td width="70" align="center"><div align="left"><span class="Estilo5">HASTA:</span></div></td>
              <td width="190" align="center"> <div align="left"><span class="Estilo5">
                  <input name="txtFechah" type="text" id="txtFechah" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_h?>" size="12" maxlength="10" onchange="checkrefechah(this.form)">
                  <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario2" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                onmouseover="this.style.background='blue';" onmouseout="this.style.background=''"  onClick="javascript:showCal('Calendario2')"  /> </span></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="170" align="center"><div align="left"><span class="Estilo5">REFERENCIA DESDE: </span></div></td>
                <td width="160" align="center">
                  <div align="left"><span class="Estilo5">
                    <input name="txtReferenciad" type="text" id="txtReferenciad" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $referencia_d?>" size="12" maxlength="8">
                </span></div></td>
                <td width="70" align="center"><div align="left"><span class="Estilo5">HASTA:</span></div></td>
                <td width="190" align="center">
                  <div align="left"><span class="Estilo5">
                    <input name="txtReferenciah" type="text" id="txtReferenciah" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $referencia_h?>" size="12" maxlength="8">
                </span></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="170" align="center"><div align="left"><span class="Estilo5">TIPO ASIENTO  DESDE: </span></div></td>
                <td width="160" align="center">
                  <div align="left"><span class="Estilo5">
                    <input name="txtTipo_Asientod" type="text" id="txttipo_asientod" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $tipo_asiento_d?>" size="12" maxlength="3">
                    <input name="Catalogo1" type="button" id="Catalogo1" title="Abrir Catalogo Tipos de Asientos" onclick="VentanaCentrada('../Cat_tipo_asientod.php?criterio=','SIA','','650','500','true')" value="...">
</span></div></td>
                <td width="70" align="center"><div align="left"><span class="Estilo5">HASTA:</span></div></td>
                <td width="190" align="center">
                  <div align="left"><span class="Estilo5">
                    <input name="txtTipo_Asientoh" type="text" id="txttipo_asientoh" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $tipo_asiento_h?>" size="12" maxlength="3">
                    <input name="Catalogo2" type="button" id="Catalogo2" title="Abrir Catalogo Tipos de Asientos" onclick="VentanaCentrada('../Cat_tipo_asientoh.php?criterio=','SIA','','650','500','true')" value="...">
</span></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
		<tr>
          <td colspan="2"><div align="center">
            <table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="170" align="left"><span class="Estilo5">CEDULA/RIF BENEFICIARIO : </span></td>
                <td width="160" align="left"><span class="Estilo5">
				  <input name="txtcedula_d" type="text" id="txtcedula_d" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $cedula_d?>" size="15" maxlength="12">
                    <input name="Catalogo1" type="button" id="Catalogo1" title="Abrir Catalogo Beneficiario" onclick="VentanaCentrada('../Cat_Beneficiariosd.php?criterio=','SIA','','650','500','true')" value="..."> </span></td>
            
				<td width="70" align="left"><span class="Estilo5">HASTA:</span></td>
                <td width="190" align="left"><span class="Estilo5"><input name="txtcedula_h" type="text" id="txtcedula_h" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $cedula_h?>" size="15" maxlength="12">
                    <input name="Catalogo2" type="button" id="Catalogo2" title="Abrir Catalogo Beneficiario" onclick="VentanaCentrada('../Cat_Beneficiariosh.php?criterio=','SIA','','650','500','true')" value="..."> </span></td>
              </tr>
            </table>
          </div></td>
        </tr>        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><table width="783" border="0">
            <tr>
              <td width="263"><div align="right"><span class="Estilo5">CODIGO DE CUENTA UNICA : </span></div></td>
              <td width="200"><span class="Estilo5">
                <input name="txtCodigo_Cuenta" type="text" id="txtCodigo_Cuenta" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $cta_unica?>" size="32" maxlength="32">
              </span></td>
              <td width="290"><span class="Estilo5">
                <input name="Catalogo3" type="button" id="Catalogo32" title="Abrir Catalogo de Cuentas" onClick="VentanaCentrada('../Cat_cuentas_cargables.php?criterio=','SIA','','750','500','true')" value="...">
              </span></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><blockquote> <span class="Estilo5">NOMBRE CUENTA : </span><input name="txtNombre_Cuenta" type="text" id="txtNombre_Cuenta" size="74" maxlength="250" readonly>
            </blockquote></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
		<tr><td>
		  <table width="582" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="180" valign="top"><div align="left"><span class="Estilo5">COMPROBANTES:</span></div></td>
               <td width="410" valign="top"><table width="379" height="30" border="1">
                 <tr><td colspan="2"><table width="364" height="20" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td><span class="Estilo5"><input type="radio" name="opcomprob" value="A">Actuales</span></td>
                     <td><input type="radio" name="opcomprob" value="D"><span class="Estilo5">Diferidos</span></td>
                     <td><input name="opcomprob" type="radio" value="T" checked><span class="Estilo5">Todos</span></td>
                   </tr>
                 </table></td>
					
                </tr>
              </table></td>
			</tr>
           </table>  </td>
        </tr>
       
        <tr>
		    <td width="5"><input name="txtdesccedrifbenefh" type="hidden" id="txtdesccedrifbenefh" ></td>
	        <td width="5"><input name="txtdesccedrifbenefd" type="hidden" id="txtdesccedrifbenefd"  ></td>
			<td>&nbsp;</td>
	    </tr>
        <tr>
           <td height="19" colspan="4">&nbsp;</td>
        </tr>
        
		<tr>
          <td ><table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="200" align="left"><span class="Estilo5">TIPO DE REPORTE :</span></td>
                <td width="290" align="left"><span class="Estilo5"><select name="tipo_rep" size="1" id="tipo_rep" onFocus="encender(this)" onBlur="apagar(this)">
				  <option value='HTML'>FORMATO HTML</option>  <option value='PDF'>FORMATO PDF</option> <option value='EXCEL'>FORMATO EXCEL</option> </select> </span></td>
			  <td width="100"></td>
              </tr>
            </table></td>
        </tr>
<script language="JavaScript" type="text/JavaScript">var mpdf_rpt='<?php echo $pdf_rpt ?>';if(mpdf_rpt=="SI"){document.form1.tipo_rep.options[1].selected = true;}else{document.form1.tipo_rep.options[0].selected = true;} </script>
	
	    <tr><td height="19" colspan="4">&nbsp;</td> </tr>
		<tr><td height="19" colspan="4">&nbsp;</td> </tr>
        <tr>
          <td colspan="2"><table width="454" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr align="center" valign="middle">
              <td><div align="center"><input name="btgenera" type="button" id="btgenera" value="GENERAR" onClick="javascript:Llama_Rpt_Asientos_D('Rpt_Asientos_D.php');">  </div></td>
              <td><div align="center"><input name="btcancelar" type="button" id="btcancelar" value="CANCELAR" onClick="javascript:Llama_Menu_Rpt('menu.php');">  </div></td>
			</tr>
          </table></td>
        </tr>
        <tr>
          <td height="18" colspan="2">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
        </form>
      </div>
    </td>
</tr>
</table>
</body>
</html>
<? pg_close();?>
