<?include ("../../class/seguridad.inc");include ("../../class/conects.php");  include ("../../class/funciones.php");include ("../../class/configura.inc");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)){ ?> <script language="JavaScript">muestra('OCURRIO UN ERROR CONECTANDO LA BASE DE DATOS');</script> <? } else { $Nom_Emp=busca_conf(); }
$sql="SELECT campo103 FROM sia001 where campo101='$usuario_sia'"; $resultado=pg_exec($conn,$sql);$filas=pg_numrows($resultado);  $tipo_u="U";
if ($filas>0){$registro=pg_fetch_array($resultado); $tipo_u=$registro["campo103"]; $tiene_acceso="S";} $Mcamino="NNNNNNNNNNNNNNNNNNNN";
if($tipo_u=="A"){$Mcamino="SSSSSSSSSSSSSSSSSSSS";}  else{$modulo="04"; $opcion="03-0000201"; $sql="select * from sia006 where campo601='$usuario_sia' and campo602='$modulo' and campo603='$opcion'";$res=pg_exec($conn,$sql);$filas=pg_numrows($res);
 if ($filas>0){$reg=pg_fetch_array($res); $Mcamino=$reg["campo607"].$reg["campo608"].$reg["campo609"].$reg["campo610"].$reg["campo611"].$reg["campo612"].$reg["campo613"].$reg["campo614"].$reg["campo615"].$reg["campo616"].$reg["campo617"].$reg["campo618"].$reg["campo619"].$reg["campo620"].$reg["campo621"].$reg["campo622"].$reg["campo623"].$reg["campo624"].$reg["campo625"].$reg["campo626"]; }
}$posicion=strpos($Mcamino,'S'); if(is_numeric($posicion)){$Mcamino=$Mcamino;}else{?><script language="JavaScript"> document.location='../menu.php';</script><?}
 $fecha_d=formato_ddmmaaaa($Fec_Ini_Ejer);   $fecha_h=formato_ddmmaaaa($Fec_Fin_Ejer);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../../imagenes/sia.ico">
<html>
<head>
<title>SIA N&Oacute;MINA Y PERSONAL (Reportes Trabajadores con Derecho Vacaciones)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../../class/sia.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../../class/sia.js" type="text/javascript"></script>
<script language="javascript" src="../../class/cal2.js"></script>
<script language="javascript" src="../../class/cal_conf2.js"></script>
<script language="JavaScript" type="text/JavaScript">
function checkrefechad(mform){var mref;var mfec;  mref=mform.txtFechad.value;
  if(mform.txtFechad.value.length==8){ mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7); mform.txtFechad.value=mfec;}
return true;}
function checkrefechah(mform){var mref;var mfec;  mref=mform.txtFechah.value;
  if(mform.txtFechah.value.length==8){ mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7); mform.txtFechah.value=mfec;}
return true;}
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
function chequea_tipo(mform){var mref;   mref=mform.txttipo_nomina_d.value; mref = Rellenarizq(mref,"0",2); mform.txttipo_nomina_d.value=mref; return true;}
function apaga_tipo(mthis){apagar(mthis);  document.form1.txttipo_nomina_h.value=mthis.value; document.form1.txtdescripcion_h.value=document.form1.txtdescripcion_d.value;  return true; }

function Llama_Rpt_derecho_vac(murl){var url; var r; 
  r=confirm("Desea Generar el Reporte Trabajadores con Derecho a Vacaciones ?");
  if (r==true) {url=murl+"?tipo_nominad="+document.form1.txttipo_nomina_d.value+"&tipo_nominah="+document.form1.txttipo_nomina_h.value+
        "&cod_empleado_d="+document.form1.txtcod_empleado_d.value+"&cod_empleado_h="+document.form1.txtcod_empleado_h.value+
		"&codigo_departamento_d="+document.form1.txtcodigo_departamento_d.value+"&codigo_departamento_h="+document.form1.txtcodigo_departamento_h.value+
        "&fechad="+document.form1.txtFechad.value+"&fechah="+document.form1.txtFechah.value+"&tipo_rpt="+document.form1.tipo_rpt.value; 
  window.open(url,"Reporte Trabajadores con Derecho a Vacaciones");
  }
}
function Llama_Menu_Rpt(murl){var url;  url="../"+murl;   LlamarURL(url);}
</script>
<?  $descripcion_d=""; $descripcion_h="";    $cod_empleado_d="";   $cod_empleado_h="zzzzzzzzzzzzzzz"; $codigo_departamento_d="";   $codigo_departamento_h="zzzzzzzzzzzzzzz";
 if ($gnomina=="00"){ $criterion=""; $criterioc=""; $temp_nomina="";$tipo_nomina_d="";$tipo_nomina_h="zzz";}else{ $temp_nomina=$gnomina; $criterion=" where tipo_nomina='$gnomina' ";  $criterioc=" and tipo_nomina='$gnomina' ";  $tipo_nomina_d=$gnomina;$tipo_nomina_h=$gnomina;}
$sql="SELECT MAX(tipo_nomina) As Max_tipo_nomina, MIN(tipo_nomina) As Min_tipo_nomina FROM nom001 ".$criterion." "; $res=pg_query($sql);
if ($registro=pg_fetch_array($res,0)){$tipo_nomina_d=$registro["min_tipo_nomina"];$tipo_nomina_h=$registro["max_tipo_nomina"];   }
$sql="SELECT tipo_nomina,descripcion FROM nom001 where tipo_nomina='$tipo_nomina_d'"; $res=pg_query($sql); if($registro=pg_fetch_array($res,0)){$descripcion_d=$registro["descripcion"];}
$sql="SELECT tipo_nomina,descripcion FROM nom001 where tipo_nomina='$tipo_nomina_h'"; $res=pg_query($sql); if($registro=pg_fetch_array($res,0)){$descripcion_h=$registro["descripcion"];}
$sql="SELECT MAX(cod_empleado) As Max_cod_empleado, MIN(cod_empleado) As Min_cod_empleado FROM nom006 ";$res=pg_query($sql);
if ($registro=pg_fetch_array($res,0)){$cod_empleado_d=$registro["min_cod_empleado"];  $cod_empleado_h=$registro["max_cod_empleado"];   }
$sql="SELECT MAX(codigo_departamento) As Max_codigo_departamento, MIN(codigo_departamento) As Min_codigo_departamento FROM nom005 ";$res=pg_query($sql);
if ($registro=pg_fetch_array($res,0)){$codigo_departamento_d=$registro["min_codigo_departamento"];$codigo_departamento_h=$registro["max_codigo_departamento"];   }
$sql="SELECT codigo_departamento,descripcion_dep FROM nom005 where codigo_departamento='$codigo_departamento_d'"; $res=pg_query($sql); if($registro=pg_fetch_array($res,0)){$descripcion_dep_d=$registro["descripcion_dep"];}
$sql="SELECT codigo_departamento,descripcion_dep FROM nom005 where codigo_departamento='$codigo_departamento_h'"; $res=pg_query($sql); if($registro=pg_fetch_array($res,0)){$descripcion_dep_h=$registro["descripcion_dep"];}

?>
</head>
<body>
<table width="977" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6"> REPORTE DE LISTADO TRABAJADORES DERECHO A VACACIONES </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="977" height="426" border="1" id="tablacuerpo">
  <tr>
   <td width="888" height="420"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
         <form name="form1" method="post" action="">
       <div id="Layer1" style="position:absolute; width:504px; height:394px; z-index:1; top: 81px; left: 42px;">
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
		   <tr><td>&nbsp;</td></tr>
		   <?if ($gnomina=="00"){?>
               <tr>
                 <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="131" align="left" class="Estilo5">TIPO N&Oacute;MINA DESDE :</td>
                     <td width="43" align="left"><span class="Estilo5"><input class="Estilo10" name="txttipo_nomina_d" type="text" id="txttipo_nomina_d" onFocus="encender(this)" onBlur="apaga_tipo(this)" size="2" maxlength="2"  value="<?echo $tipo_nomina_d?>" onchange="chequea_tipo(this.form);"> </span></td>
                     <td width="41" align="left"><span class="Estilo5"><input class="Estilo10" name="cat_tipod" type="button" id="cat_tipod" title="Abrir Catalogo Tipos de nominas" onClick="VentanaCentrada('../Cat_tipo_nominad.php?criterio=','SIA','','650','500','true')" value="...">  </span></td>
                     <td width="688" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion_d" type="text" id="txtdescripcion_d" size="100" maxlength="100" readonly value="<?echo $descripcion_d?>">  </span></td>
                   </tr>
                 </table></td>
               </tr>
			   <tr>
                 <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="131" align="left" class="Estilo5">TIPO N&Oacute;MINA HASTA :</td>
                     <td width="43" align="left"><span class="Estilo5"><input class="Estilo10" name="txttipo_nomina_h" type="text" id="txttipo_nomina_h" onFocus="encender(this)" onBlur="apagar(this)" size="2" maxlength="2" value="<?echo $tipo_nomina_h?>">  </span></td>
                     <td width="41" align="left"><span class="Estilo5"><input class="Estilo10" name="cat_tipoh" type="button" id="cat_tipoh" title="Abrir Catalogo Tipos de nominas" onClick="VentanaCentrada('../Cat_tipo_nominah.php?criterio=','SIA','','650','500','true')" value="..."> </span></td>
                     <td width="688" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion_h" type="text" id="txtdescripcion_h" size="100" maxlength="100" readonly value="<?echo $descripcion_h?>">  </span></td>
                   </tr>
                 </table></td>
               </tr>
			   <?}else{?>
			   <tr>
                 <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="131" align="left" class="Estilo5">TIPO N&Oacute;MINA DESDE :</td>
                     <td width="43" align="left"><span class="Estilo5"><input class="Estilo10" name="txttipo_nomina_d" type="text" id="txttipo_nomina_d" readonly size="2" maxlength="2"  value="<?echo $tipo_nomina_d?>"> </span></td>
                     <td width="41" align="left"><span class="Estilo5"><input class="Estilo10" name="cat_tipod" type="button" id="cat_tipod" title="Abrir Catalogo Tipos de nominas" onClick="VentanaCentrada('../Cat_tipo_nominad.php?criterio=','SIA','','650','500','true')" value="...">  </span></td>
                     <td width="688" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion_d" type="text" id="txtdescripcion_d" size="100" maxlength="100" readonly value="<?echo $descripcion_d?>">  </span></td>
                   </tr>
                 </table></td>
               </tr>
			   <tr>
                 <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="131" align="left" class="Estilo5">TIPO N&Oacute;MINA HASTA :</td>
                     <td width="43" align="left"><span class="Estilo5"><input class="Estilo10" name="txttipo_nomina_h" type="text" id="txttipo_nomina_h" readonly size="2" maxlength="2" value="<?echo $tipo_nomina_h?>">  </span></td>
                     <td width="41" align="left"><span class="Estilo5"><input class="Estilo10" name="cat_tipoh" type="button" id="cat_tipoh" title="Abrir Catalogo Tipos de nominas" onClick="VentanaCentrada('../Cat_tipo_nominah.php?criterio=','SIA','','650','500','true')" value="..."> </span></td>
                     <td width="688" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion_h" type="text" id="txtdescripcion_h" size="100" maxlength="100" readonly value="<?echo $descripcion_h?>">  </span></td>
                   </tr>
                 </table></td>
               </tr>
			   <?}?>
		   <tr>
             <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="196" align="left" class="Estilo5">C&Oacute;DIGO DEPARTAMENTO DESDE :</td>
                 <td width="110" align="left" ><span class="Estilo5"><input class="Estilo10" name="txtcodigo_departamento_d" type="text" id="txtcodigo_departamento_d" onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15" value="<?echo $codigo_departamento_d?>"> </span></td>
                 <td width="89" align="left"><span class="Estilo5"><input class="Estilo10" name="Cat_depd" type="button" id="Cat_depd" title="Abrir Catalogo de Departamentos" onClick="VentanaCentrada('../Cat_departamentod.php?criterio=','SIA','','650','500','true')" value="..."> </span></td>
                 <td width="509" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion_dep_d" type="text" id="txtdescripcion_dep_d" size="90" maxlength="120" readonly value="<?echo $descripcion_dep_d?>">  </span></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="196" align="left" class="Estilo5">C&Oacute;DIGO DEPARTAMENTO HASTA :</td>
                 <td width="110" align="left"><span class="Estilo5"><input class="Estilo10" name="txtcodigo_departamento_h" type="text" id="txtcodigo_departamento_h" onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15" value="<?echo $codigo_departamento_h?>"></span></td>
                 <td width="89" align="left"><span class="Estilo5"><input class="Estilo10" name="Cat_deph" type="button" id="Cat_deph" title="Abrir Catalogo de Departamentos" onClick="VentanaCentrada('../Cat_departamentoh.php?criterio=','SIA','','650','500','true')" value="..."> </span></td>
                 <td width="509" align="left"><span class="Estilo5"><input class="Estilo10" name="txtdescripcion_dep_h" type="text" id="txtdescripcion_dep_h" size="90" maxlength="120" readonly value="<?echo $descripcion_dep_h?>"> </span></td>
               </tr>
             </table></td>
           </tr>	   
           <tr>
             <td><table width="905">
               <tr>
                 <td width="200"><div align="left"><span class="Estilo5">CODIGO TRABAJADOR DESDE: </span></div></td>
                 <td width="140"><div align="left"><span class="Estilo5"><input class="Estilo10" name="txtcod_empleado_d" type="text" id="txtcod_empleado_d" onFocus="encender(this)" onBlur="apagar(this)" size="20" maxlength="15" value="<?echo $cod_empleado_d?>">   </span></div></td>
                 <td width="140"><span class="Estilo5"> <input class="Estilo10" name="Catalogo3" type="button" id="Catalogo3" title="Abrir Catalogo de Trabajadores" onClick="VentanaCentrada('../Cat_trabajadoresd.php?criterio=','SIA','','650','500','true')" value="...">  </span></td>
                 <td width="55"><span class="Estilo5">HASTA :</span></td>
                 <td width="140"><span class="Estilo5"> <input class="Estilo10" name="txtcod_empleado_h" type="text" id="txtcod_empleado_h" onFocus="encender(this)" onBlur="apagar(this)" size="20" maxlength="20" value="<?echo $cod_empleado_h?>"> </span></td>
                 <td width="240"><span class="Estilo5"><input class="Estilo10" name="Catalogo4" type="button" id="Catalogo4" title="Abrir Catalogo de Trabajadores" onClick="VentanaCentrada('../Cat_trabajadoresh.php?criterio=','SIA','','650','500','true')" value="...">  </span></td>
               </tr>
             </table></td>
           </tr>
		   <tr>
             <td><table width="905">
               <tr>
                 <td width="200"><div align="left"><span class="Estilo5">FECHA PROCESO DESDE:</span></div></td>
				 <td width="305" align="left"> <span class="Estilo5"> <input class="Estilo10" name="txtFechad" type="text" id="txtFechad" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_d?>" size="11" maxlength="10" onChange="checkrefechad(this.form)">
                     <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario1" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                     onMouseOver="this.style.background='blue';" onMouseOut="this.style.background=''"  onClick="javascript:showCal('Calendario1')"  /></span></td>
                 <td width="54"><span class="Estilo5">HASTA :</span></td>				 
				 <td width="338" align="left">  <span class="Estilo5"><input class="Estilo10" name="txtFechah" type="text" id="txtFechah" onFocus="encender(this)" onBlur="apagar(this)" value="<?echo $fecha_h?>" size="11" maxlength="10" onChange="checkrefechah(this.form)">
                     <img src="../../imagenes/img_cal.png" width="20" height="14" id="calendario2" style="cursor: pointer; border: 1px solid blue;" title="Seleccionar Fecha"
                     onMouseOver="this.style.background='blue';" onMouseOut="this.style.background=''"  onClick="javascript:showCal('Calendario2')"  /> </span></td>         
               </tr>
             </table></td>
           </tr>
           <tr><td>&nbsp;</td></tr>
		   <tr>
            <td><table width="903" border="0" align="center" cellpadding="0" cellspacing="0" >
               <tr>
                 <td width="200" align="left" class="Estilo5">TIPO SALIDA DEL REPORTE :</td>
				 <td width="700" align="left"><span class="Estilo5"><select class="Estilo10" name="tipo_rpt" id="tipo_rpt"> <option value='HTML'>FORMATO HTML</option><option value='PDF'>FORMATO PDF</option>  </select></span></td>
              </tr>
             </table></td>
           </tr>
           <script language="JavaScript" type="text/JavaScript">var mpdf_rpt='<?php echo $pdf_rpt ?>';if(mpdf_rpt=="SI"){document.form1.tipo_rpt.options[1].selected = true;}else{document.form1.tipo_rpt.options[0].selected = true;} </script>
           <tr><td>&nbsp;</td></tr>
           <tr>
             <td><table width="905">
               <tr>
                 <th width="446" scope="col"><div align="center"><input name="btgenerar" type="button" id="btgenerar" value="GENERAR" onClick="javascript:Llama_Rpt_derecho_vac('Rpt_derecho_vac.php');"> </div></th>
                 <th width="447" scope="col"><input name="btcancelar" type="button" id="btcancelar" value="CANCELAR" onClick="javascript:Llama_Menu_Rpt('menu.php');"></th>
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
