<?include ("../../class/seguridad.inc");include ("../../class/conects.php");  include ("../../class/funciones.php");include ("../../class/configura.inc");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?> <script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script> <? } else { $Nom_Emp=busca_conf(); }
$sql="SELECT campo103 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U";
if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN";
if($tipo_u=="A"){$Mcamino="SSSSSSSSSSSSSSSSSSSS";}  else{$modulo="13"; $opcion="03-0000100"; $sql="select * from sia006 where campo601='$usuario_sia' and campo602='$modulo' and campo603='$opcion'";$res=pg_exec($conn,$sql);$filas=pg_numrows($res);
 if ($filas>0){$reg=pg_fetch_array($res); $Mcamino=$reg["campo607"].$reg["campo608"].$reg["campo609"].$reg["campo610"].$reg["campo611"].$reg["campo612"].$reg["campo613"].$reg["campo614"].$reg["campo615"].$reg["campo616"].$reg["campo617"].$reg["campo618"].$reg["campo619"].$reg["campo620"].$reg["campo621"].$reg["campo622"].$reg["campo623"].$reg["campo624"].$reg["campo625"].$reg["campo626"]; }
}$posicion=strpos($Mcamino,'S'); if(is_numeric($posicion)){$Mcamino=$Mcamino;}else{?><script language="JavaScript"> document.location='../menu.php';</script><?}
$cod_bien_mued=""; $cod_bien_mueh="";   $cedulad=""; $cedulah=""; $fecha_d=formato_ddmmaaaa($Fec_Ini_Ejer);$fecha_d="01/01/1900"; $fecha_h=formato_ddmmaaaa($Fec_Fin_Ejer);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../../imagenes/sia.ico">
<html>
<head>
<title>SIA CONTROL DE BIENES NACIONALES (Reportes Listado de Bienes Inmuebles)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../../class/sia.css" type="text/css" rel="stylesheet">
<script language="Javascript" src="../../class/sia.js" type="text/javascript"></script>
<script language="javascript" src="../../class/cal2.js"></script>
<script language="javascript" src="../../class/cal_conf2.js"></script>
<script language="JavaScript" type="text/JavaScript">
function checkrefechad(mform){var mref;var mfec;  mref=mform.txtFechad.value;
  if(mform.txtFechad.value.length==8){   mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7);     mform.txtFechad.value=mfec;}
return true;}
function checkrefechah(mform){var mref;var mfec;  mref=mform.txtFechah.value;
  if(mform.txtFechah.value.length==8){  mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7);   mform.txtFechah.value=mfec;}
return true;}
function Llama_Rpt_lista_bie_mue_proveedor_repor_bie(murl){var url;var r;
  r=confirm("Desea Generar el Reporte Listado Bienes Muebles por Proveedor?");
  if (r==true){url=murl+"?&cod_bien_mued="+document.form1.txtcod_bien_mue_d.value+"&cod_bien_mueh="+document.form1.txtcod_bien_mue_h.value+
"&cedulad="+document.form1.txtced_provee_d.value+"&cedulah="+document.form1.txtced_provee_h.value+
"&fecha_d="+document.form1.txtFechad.value+"&fecha_h="+document.form1.txtFechah.value+"&denominacion="+document.form1.txtdenominacion.value+"&tipo_rep="+document.form1.txttipo_rep.value;
  window.open(url,"Reporte Listado Bienes Muebles por Proveedor")}
}
function Llama_Menu_Rpt(murl){var url;url="../"+murl;LlamarURL(url);}
</script>

</head>
<?
//BIENES MUEBLES
$sql="SELECT MAX(cod_bien_mue) As Max_cod_bien_mue, MIN(cod_bien_mue) As Min_cod_bien_mue FROM bien015";
$res=pg_query($sql);if ($registro=pg_fetch_array($res,0)){$encontro=true;}else{$encontro=false;}
if($encontro=true){$cod_bien_mued=$registro["min_cod_bien_mue"];$cod_bien_mueh=$registro["max_cod_bien_mue"];}
//PROVEEDOR
$sql="SELECT MAX(ced_rif) As Max_ced_rif, MIN(ced_rif) As Min_ced_rif FROM pre099";
$res=pg_query($sql);if ($registro=pg_fetch_array($res,0)){$encontro=true;}else{$encontro=false;}
if($encontro=true){$cedulad=$registro["min_ced_rif"];$cedulah=$registro["max_ced_rif"];}
?>
<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../../imagenes/Logo_sia.gif" width="72" height="45"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">REPORTE LISTADO DE BIENES MUEBLES POR PROVEEDOR</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="977" height="422" border="1" id="tablacuerpo">
  <tr>
    <td width="870" height="416">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:956px; height:393px; z-index:1; top: 73px; left: 23px;">
        <form name="form1" method="get">
           <table width="950" height="388" border="0">
    <tr>
      <td width="958" height="384" align="center" valign="top"><table width="783" height="274" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="19">&nbsp;</td>
        </tr>
		<tr>
          <td height="19"><table width="850" border="0">
            <tr>
              <td width="230" height="26"><div align="right"> </div></td>
              <td width="320"><span class="Estilo13"><strong>DESDE</strong></span></td>
              <td width="300"><span class="Estilo13"><strong>HASTA</strong></span></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="19">&nbsp;</td>
        </tr>
           <tr>
             <td><table width="850">
               <tr>
                 <td width="230"><span class="Estilo5">C&Oacute;DIGO DEL BIEN MUEBLE :</span></td>
                 <td width="320"><span class="Estilo5"><input name="txtcod_bien_inm_d" type="text" class="Estilo5" id="txtcod_bien_mue_d" size="30" maxlength="30"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5" value="<?echo $cod_bien_mued?>">
                    <input name="btcat_biend" type="button" id="btcat_biend" title="Abrir Catalogo de Bienes Muebles" onClick="VentanaCentrada('Cat_bienes_mueblesd.php?criterio=','SIA','','750','500','true')" value="...">  </span></td>
                 <td width="300"><span class="Estilo5"><input name="txtcod_bien_inm_h" type="text" class="Estilo5" id="txtcod_bien_mue_h" size="30" maxlength="30"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5" value="<?echo $cod_bien_mueh?>">
                     <input name="btcat_bienh" type="button" id="btcat_bienh" title="Abrir Catalogo de Bienes Muebles" onClick="VentanaCentrada('Cat_bienes_mueblesh.php?criterio=','SIA','','750','500','true')" value="...">   </span></td>
                 </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="850">
               <tr>
                 <td width="230"><span class="Estilo5">CI/RIF PROVEEDOR :</span></td>
                 <td width="320"><span class="Estilo5"><input name="txtced_provee_d" type="text" id="txtced_provee_d" size="15" maxlength="12"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5" value="<?echo $cedulad?>">                    
                    <input name="btced_rifd" type="button" id="btced_rifd" title="Abrir Catalogo Proveedores" onClick="VentanaCentrada('Cat_proveedoresd.php?criterio=','SIA','','750','500','true')" value="...">   </span></td>
                 <td width="300"><span class="Estilo5"><input name="txtced_provee_h" type="text" id="txtced_provee_h" size="15" maxlength="12"  onFocus="encender(this)" onBlur="apagar(this)" class="Estilo5" value="<?echo $cedulah?>">
                    <input name="btced_rifd" type="button" id="btced_rifd" title="Abrir Catalogo Proveedores" onClick="VentanaCentrada('Cat_proveedoresh.php?criterio=','SIA','','750','500','true')" value="...">   </span></td>
               </tr>
             </table></td>
           </tr>		   
           <tr>
             <td><table width="850">
               <tr>
                 <td width="230"><span class="Estilo5">FECHA DE INCORPORACI&Oacute;N :</span></td>
                 <td width="320"><span class="Estilo5"> <input name="txtFechad" type="text" class="Estilo5" id="txtFechad" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_d?>" size="12" maxlength="10" class="Estilo5" onChange="checkrefechad(this.form)">
                    <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario1" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                        onMouseOver="this.style.background='blue';" onMouseOut="this.style.background=''"  onClick="javascript:showCal('Calendario1')"  /></span></div></td>
                <td width="300"><span class="Estilo5"><input name="txtFechah" type="text" class="Estilo5" id="txtFechah" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_h?>" size="12" maxlength="10" class="Estilo5" onChange="checkrefechah(this.form)">
                    <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario2" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                        onMouseOver="this.style.background='blue';" onMouseOut="this.style.background=''"  onClick="javascript:showCal('Calendario2')"  /> </span></div></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td height="19"><table width="850">
               <tr>
                 <td width="230"><span class="Estilo5">FILTRO DE DESCRIPCI&Oacute;N DEL BIEN :</span></div></td>
                 <td width="620"><span class="Estilo5"> <input name="txtdenominacion" type="text" class="Estilo5" id="txtdenominacion" size="70" maxlength="15"  onFocus="encender(this)" onBlur="apagar(this)">   </span></td>
               </tr>
             </table></td>
           </tr>
		   <tr><td height="19">&nbsp;</td></tr>
			<tr>
			  <td height="19"><table width="850" border="0">
				<tr>
				  <td width="230"><span class="Estilo5">TIPO DE REPORTE : </span></td>
				  <td width="620"><span class="Estilo5"><select name="txttipo_rep" size="1" id="txttipo_rep" onFocus="encender(this)" onBlur="apagar(this)">
				<option value='HTML'>FORMATO HTML</option>  <option value='PDF'>FORMATO PDF</option> </select></td>
				</tr>
			  </table></td>
			</tr>
<script language="JavaScript" type="text/JavaScript">var mpdf_rpt='<?php echo $pdf_rpt ?>';if(mpdf_rpt=="SI"){document.form1.txttipo_rep.options[1].selected = true;}else{document.form1.txttipo_rep.options[0].selected = true;} </script>
            <tr><td height="19">&nbsp;</td></tr>
			<tr><td height="19">&nbsp;</td></tr>		   
           <tr>
             <td><table width="454" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr align="center" valign="middle">
                 <td><div align="center"> <input name="btgenera" type="button" id="btgenera3" value="GENERAR" onClick="javascript:Llama_Rpt_lista_bie_mue_proveedor_repor_bie('Rpt_lista_bie_mue_proveedor_repor_bie.php');">   </div></td>
                 <td><div align="center"><input name="btcancelar" type="button" id="btcancelar3" value="CANCELAR" onClick="javascript:Llama_Menu_Rpt('menu.php');">    </div></td>
               </tr>
             </table></td>
           </tr>
         </table>
         <p>&nbsp;</p>
       </div>
    </form>    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<? pg_close();?>
