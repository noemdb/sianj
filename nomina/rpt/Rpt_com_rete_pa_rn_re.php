<?include ("../../class/seguridad.inc");include ("../../class/conects.php");  include ("../../class/funciones.php");include ("../../class/configura.inc");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?> <script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script> <? } else { $Nom_Emp=busca_conf(); }
$sql="SELECT campo103 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U";
if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN";
if($tipo_u=="A"){$Mcamino="SSSSSSSSSSSSSSSSSSSS";}  else{$modulo="04"; $opcion="03-0000107"; $sql="select * from sia006 where campo601='$usuario_sia' and campo602='$modulo' and campo603='$opcion'";$res=pg_exec($conn,$sql);$filas=pg_numrows($res);
 if ($filas>0){$reg=pg_fetch_array($res); $Mcamino=$reg["campo607"].$reg["campo608"].$reg["campo609"].$reg["campo610"].$reg["campo611"].$reg["campo612"].$reg["campo613"].$reg["campo614"].$reg["campo615"].$reg["campo616"].$reg["campo617"].$reg["campo618"].$reg["campo619"].$reg["campo620"].$reg["campo621"].$reg["campo622"].$reg["campo623"].$reg["campo624"].$reg["campo625"].$reg["campo626"]; }
}$posicion=strpos($Mcamino,'S'); if(is_numeric($posicion)){$Mcamino=$Mcamino;}else{?><script language="JavaScript"> document.location='../menu.php';</script><?}
   $cod_empleado_d="";  $cod_rem="001"; $cod_ret=""; $fecha_d=formato_ddmmaaaa($Fec_Ini_Ejer);  $fecha_h=formato_ddmmaaaa($Fec_Fin_Ejer);
   $cod_arch_banco="CPISLR";
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../../imagenes/sia.ico">
<html>
<head>
<title>SIA N&Oacute;MINA Y PERSONAL (Reportes Comprobante Retenciones)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../../class/sia.js" type="text/javascript"></script>
<script language="javascript" src="../../class/cal2.js"></script>
<script language="javascript" src="../../class/cal_conf2.js"></script>
<script language="JavaScript" type="text/JavaScript">
function checkrefechad(mform){var mref;var mfec; mref=mform.txtFechad.value;
  if(mform.txtFechad.value.length==8){ mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7);mform.txtFechad.value=mfec;}
return true;}
function checkrefechah(mform){var mref;var mfec; mref=mform.txtFechah.value;
  if(mform.txtFechah.value.length==8){ mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7); mform.txtFechah.value=mfec;}
return true;}
function Llama_Rpt_com_rete_pa_rn(murl){var url;var r;
  r=confirm("Desea Generar el Reporte de Comprobante de Retencion y Pago?");
  if (r==true){url=murl+"?cod_empleado_d="+document.form1.txtcod_empleado_d.value+"&cod_empleado_h="+document.form1.txtcod_empleado_h.value+"&cod_conceptod="+document.form1.txtcod_concepto.value+"&cod_conceptor="+document.form1.txtcod_concepto_d.value+"&fecha_d="+document.form1.txtFechad.value+"&fecha_h="+document.form1.txtFechah.value+"&tipo_rpt="+document.form1.tipo_rpt.value+"&tipo_conc="+document.form1.tipo_conc.value+"&cod_arch_banco=<?php echo $cod_arch_banco ?>";
  window.open(url,"Reporte de Comprobante de Retencion y Pago")}
}
function Llama_Menu_Rpt(murl){var url;url="../"+murl;LlamarURL(url);}
</script>
</head>
<?  $cod_concepto=$cod_rem; $denominacion_concep=""; $cod_conceptod=$cod_ret; $denominacion_concep_d="";
$sql="SELECT cod_concepto,denominacion FROM nom002 where cod_concepto='$cod_concepto'"; $res=pg_query($sql); if($registro=pg_fetch_array($res,0)){$denominacion_concep=$registro["denominacion"];}
$sql="SELECT cod_concepto,denominacion FROM nom002 where cod_concepto='$cod_conceptod'"; $res=pg_query($sql); if($registro=pg_fetch_array($res,0)){$denominacion_concep_d=$registro["denominacion"];}
?>
<body>
<table width="977" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6"> REPORTE DE COMPROBANTE DE RETENCION Y PAGO </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="977" height="423" border="1" id="tablacuerpo">
  <tr>
   <td width="888" height="410"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
         <form name="form1" method="post" action="">
       <div id="Layer1" style="position:absolute; width:504px; height:294px; z-index:1; top: 81px; left: 42px;">
         <table width="828" border="0" align="center" >
		   <tr>
             <td><table width="898">
               <tr>
                 <td width="401" scope="col"><div align="left"></div></td>
                 <td width="141" scope="col"><div align="left"><span class="Estilo13">CRITERIOS</span></div></td>
                 <td width="173" scope="col"><div align="left"></div></td>
                 <td width="163" scope="col">&nbsp;</td>
               </tr>
             </table></td>
           </tr>
           
           <tr>
             <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="190" align="center" class="Estilo5"><div align="left">CODIGO TRABAJADOR DESDE :</div></td>
                 <td width="160" align="left"><span class="Estilo5"><input class="Estilo10" name="txtcod_empleado_d" type="text" id="txtcod_empleado_d" onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">    </span></td>
                 <td width="100" align="left"><span class="Estilo5"><input class="Estilo10" name="Catalogo3" type="button" id="Catalogo3" title="Abrir Catalogo de Trabajadores" onClick="VentanaCentrada('../Cat_trabajadores_d.php?criterio=','SIA','','650','500','true')" value="...">  </span></td>
                 <td width="450"></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="900">
               <tr>
                 <td width="140" align="left"><span class="Estilo5">NOMBRE TRABAJADOR :</span></td>
                 <td width="760" align="left"><span class="Estilo5"><input class="Estilo10" name="txtnombre_d" type="text" id="txtnombre_d" size="80" maxlength="100" readonly></span></td>
               </tr>
             </table></td>
           </tr>
		   
		   <tr>
             <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="190" align="center" class="Estilo5"><div align="left">CODIGO TRABAJADOR HASTA :</div></td>
                 <td width="160" align="left"><span class="Estilo5"><input class="Estilo10" name="txtcod_empleado_h" type="text" id="txtcod_empleado_h" onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">    </span></td>
                 <td width="100" align="left"><span class="Estilo5"><input class="Estilo10" name="Catalogo4" type="button" id="Catalogo4" title="Abrir Catalogo de Trabajadores" onClick="VentanaCentrada('../Cat_trabajadores_h.php?criterio=','SIA','','650','500','true')" value="...">  </span></td>
                 <td width="450"></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="900">
               <tr>
                 <td width="140" align="left"><span class="Estilo5">NOMBRE TRABAJADOR :</span></td>
                 <td width="760" align="left"><span class="Estilo5"><input class="Estilo10" name="txtnombre_h" type="text" id="txtnombre_h" size="80" maxlength="100" readonly></span></td>
               </tr>
             </table></td>
           </tr>
		   
		    <tr>
             <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="200" align="left" class="Estilo5">CONCEPTO REMUNERACION :</td>
                 <td width="50" align="left"><span class="Estilo5"><input class="Estilo10" name="txtcod_concepto" type="text" id="txtcod_concepto" onFocus="encender(this)" onBlur="apagar(this)" size="3" maxlength="3" value="<?echo $cod_concepto?>"> </span></td>
                 <td width="40" align="left"><span class="Estilo5"><input class="Estilo10" name="Catalogo1" type="button" id="Catalogo1" title="Abrir Catalogo de Conceptos" onClick="VentanaCentrada('../Cat_conceptos.php?criterio=','SIA','','650','500','true')" value="..."></span></td>
                <td width="600" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdenominacion" type="text" id="txtdenominacion" size="60" maxlength="100" readonly value="<?echo $denominacion_concep?>"> </span></td>
               </tr>
             </table></td>
           </tr>
		    <tr>
             <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="200" align="left" class="Estilo5">CONCEPTO RETENCION ISRL :</td>
                 <td width="50" align="left"><span class="Estilo5"><input class="Estilo10" name="txtcod_concepto_d" type="text" id="txtcod_concepto_d" onFocus="encender(this)" onBlur="apagar(this)" size="3" maxlength="3" value="<?echo $cod_conceptod?>"> </span></td>
                 <td width="40" align="left"><span class="Estilo5"><input class="Estilo10" name="Catalogod" type="button" id="Catalogod" title="Abrir Catalogo de Conceptos" onClick="VentanaCentrada('../Cat_conceptosd.php?criterio=','SIA','','650','500','true')" value="..."></span></td>
                 <td width="600" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdenominacion_d" type="text" id="txtdenominacion_d" size="60" maxlength="100" readonly value="<?echo $denominacion_concep_d?>"> </span></td>
               </tr>
             </table></td>
           </tr>           
		   
           
           <tr>
             <td><table width="900">
               <tr>
                 <td width="300" align="left"><span class="Estilo5">RANGO DE FECHA PARA COMPROBANTE DESDE : </span></td>
				 <td width="250" align="left"><span class="Estilo5"><input class="Estilo10" name="txtFechad" type="text" id="txtFechad" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_d?>" size="12" maxlength="10" onChange="checkrefechad(this.form)">
                     <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario1" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                onMouseOver="this.style.background='blue';" onMouseOut="this.style.background=''"  onClick="javascript:showCal('Calendario1')"  /></span></div></td>
                 <td width="50" align="left" class="Estilo5">HASTA :</td>
                 <td width="300" align="left"><span class="Estilo5"> <input class="Estilo10" name="txtFechah" type="text" id="txtFechah" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_h?>" size="12" maxlength="10" onChange="checkrefechah(this.form)">
                     <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario2" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                onMouseOver="this.style.background='blue';" onMouseOut="this.style.background=''"  onClick="javascript:showCal('Calendario2')"  /> </span></div></td>
               
               </tr>
             </table></td>
           </tr>
           <tr><td>&nbsp;</td> </tr>
		   <tr>
				 <td><table width="900">
					<tr>
					  <td width="200" class="Estilo5"> COLUMNA ABONADA A CUENTA :</td>
					  <td width="200"><span class="Estilo5"> <select class="Estilo10" name="tipo_conc" id="tipo_conc"><option value='R'>CONCEPTO REMUNERACION</option><option value='T'>TODOS</option> <option value='E'>ESPECIFICOS</option></select></span></td>
					  <td width="100" align="left"><span class="Estilo5"><input class="Estilo10" name="CatalogocE" type="button" id="CatalogocE" title="Abrir Catalogo Conceptos Especificos" onClick="VentanaCentrada('../Cat_conceptos_e.php?cod_arch_banco=<?echo $cod_arch_banco?>','SIA','','650','500','true')" value="...">  </span></td>
                 
					  <td width="140" class="Estilo5"> TIPO DE REPORTE :</td>
					  <td width="260"><span class="Estilo5"> <select class="Estilo10" name="tipo_rpt" id="tipo_rpt"><option value='HTML'>FORMATO HTML</option><option value='PDF'>FORMATO PDF</option></select></span></td>
					</tr>
				  </table></td>
				</tr>
<script language="JavaScript" type="text/JavaScript">var mpdf_rpt='<?php echo $pdf_rpt ?>';if(mpdf_rpt=="SI"){document.form1.tipo_rpt.options[1].selected = true;}else{document.form1.tipo_rpt.options[0].selected = true;} </script>
	
           <tr><td>&nbsp;</td> </tr>
           <tr>
             <td><table width="905">
               <tr>
                 <th width="446" align="center"><input name="btgenerar" type="button" id="btgenerar" value="GENERAR" onClick="javascript:Llama_Rpt_com_rete_pa_rn('Rpt_com_rete_pa_rn.php');">
                 </th>
                 <th width="447" ><input name="btcancelar" type="button" id="btcancelar" value="CANCELAR" onClick="javascript:Llama_Menu_Rpt('menu.php');"></th>
               </tr>
             </table></td>
           </tr>
         </table>
         <p align="left">&nbsp;</p>
       </div>
    </form>    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<? pg_close();?>
