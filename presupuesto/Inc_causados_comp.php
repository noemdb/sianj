<?include ("../class/ventana.php");  include ("../class/fun_fechas.php"); $equipo = getenv("COMPUTERNAME"); $mcod_m="PRE007".$equipo; $codigo_mov=substr($mcod_m,0,49); $fecha_hoy=asigna_fecha_hoy(); $tipo_imput_presu="P";
 $user=$_POST["txtuser2"]; $password=$_POST["txtpassword2"]; $dbname=$_POST["txtdbname2"];  $codigo_mov=$_POST["txtcodigo_mov2"];  $fecha=$_POST["txtfechac2"]; $genera_comprobante="NO";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<LINK REL="SHORTCUT ICON" HREF="../imagenes/sia.ico">
<html>
<head>
<title>SIA CONTABILIDAD PRESUPUESTARIA (Causados Presupuestario)</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<LINK href="../class/sia.css" type="text/css" rel="stylesheet">
<SCRIPT language="JavaScript" src="../class/sia.js" type="text/javascript"></script>
<script language="javascript" src="ajax_comp.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
var muser='<?php echo $user ?>';
var mpassword='<?php echo $password ?>';
var mdbname='<?php echo $dbname ?>';
var mcodigo_mov='<?php echo $codigo_mov ?>';
function chequea_tipo(mform){
var mref;
   mref=mform.txttipo_causado.value;
   mref = Rellenarizq(mref,"0",4);
   mform.txttipo_causado.value=mref;
   if (mref == "0000" || mref=="A000" || mref.substring(0,1)=="A"){alert("Tipo de Causado No Aceptado"); return false;}
   ajaxSenddoc('GET', 'refcausaut.php?tipo_caus='+mref+'&password='+mpassword+'&user='+muser+'&dbname='+mdbname, 'refcaus', 'innerHTML');
return true;}
function apaga_doc(mthis){
var mref;
 apagar(mthis);
 mref=mthis.value;
 mref=Rellenarizq(mref,"0",4);
 ajaxSenddoc('GET', 'refcausaut.php?tipo_caus='+mref+'&password='+mpassword+'&user='+muser+'&dbname='+mdbname, 'refcaus', 'innerHTML');
}
function checkreferencia(mform){
var mref;
   mref=mform.txtreferencia_caus.value;
   mref = Rellenarizq(mref,"0",8);
   mform.txtreferencia_caus.value=mref;
return true;}
function checkrefecha(mform){
var mref;
var mfec;
  mref=mform.txtfecha.value;
  if(mform.txtfecha.value.length==8){
     mfec = mref.substring (0, 6) + "20" + mref.charAt(6)+mref.charAt(7);
     mform.txtfecha.value=mfec;}
return true;}
function checkrefe_comp(mform){
var mref;
   mref=mform.txtreferencia_comp.value;
   mref = Rellenarizq(mref,"0",8);
   mform.txtreferencia_comp.value=mref;
return true;}
function chequea_tipo_comp(mform){
var mref;
   mref=mform.txttipo_compromiso.value;
   mref=Rellenarizq(mref,"0",4);
   mform.txttipo_compromiso.value=mref;
   if (mref=="0000" || mref.substring(0,1)=="A"){alert("Tipo de Compromiso No Aceptado"); return false;}
return true;}
function chequea_genera(mform){
var mref;
   mref=mform.txtgenera_comprobante.value;
   ajaxSenddoc('GET', 'gencompcaus.php?gencomp='+mref+'&codigo_mov='+mcodigo_mov, 'gencomp', 'innerHTML');
return true;}
function Cargar_Cod_Comp(mform){
var mref;
   mref=mform.txttipo_compromiso.value+mform.txtreferencia_comp.value;
   ajaxSenddoc('GET', 'cargacodcomp.php?criterio='+mref+'&codigo_mov='+mcodigo_mov+'&password='+mpassword+'&user='+muser+'&dbname='+mdbname, 'codcomp', 'innerHTML');
return true;}
function revisar(){
var f=document.form1;
var Valido=true;
    if(f.txtfecha.value==""){alert("Fecha no puede estar Vacia");return false;}
    if(f.txtreferencia_caus.value==""){alert("Referencia no puede estar Vacia");return false;}
       else{f.txtreferencia_caus.value=f.txtreferencia_caus.value;}
    if(f.txttipo_causado.value==""){alert("Tipo de Causado no puede estar Vacio"); return false; }
      else{f.txttipo_causado.value=f.txttipo_causado.value.toUpperCase();}
    if(f.txtreferencia_comp.value==""){alert("Referencia no puede estar Vacio");return false;}
    if(f.txttipo_compromiso.value==""){alert("Tipo de Compromiso no puede estar Vacio"); return false; }
      else{f.txttipo_compromiso.value=f.txttipo_compromiso.value.toUpperCase();}
    if(f.txtdescripcion.value==""){alert("Descripci�n del Causado no puede estar Vacia"); return false; }
      else{f.txtdescripcion.value=f.txtdescripcion.value.toUpperCase();}
    if(f.txtreferencia_caus.value.length==8){f.txtreferencia_caus.value=f.txtreferencia_caus.value.toUpperCase();f.txtreferencia_caus.value=f.txtreferencia_caus.value;}
      else{alert("Longitud de Referencia Invalida");return false;}
    if(f.txtfecha.value.length==10){Valido=true;}
      else{alert("Longitud de Fecha Invalida");return false;}
    if(f.txttipo_causado.value=="0000" || f.txttipo_causado.value=="A000" ) {alert("Tipo de Causado No Aceptado");return false; }
document.form1.submit;
return true;}
</script>
</head>

<body>
<table width="978" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">INCLUIR CAUSADOS REFIERE A COMPROMISO</div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="977" height="518" border="0" id="tablacuerpo">
  <tr>
     <td><table width="92" height="502" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="tablamenu">
        <td width="86">
      <td><table width="92" height="502" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('Act_causados.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><A class=menu href="Act_causados.php">Atras</A></td>
      </tr>
  <tr>
    <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgColor=#EAEAEA><a href="menu.php" class="menu">Menu</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    </table></td>
        </table></td>
    <td width="870">       <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
      <div id="Layer1" style="position:absolute; width:875px; height:495px; z-index:1; top: 60px; left: 114px;">
      <form name="form1" method="post" action="Insert_causados.php" onSubmit="return revisar()">
      <table width="867" >
              <tr>
                <td>
                  <table width="846" align="center">
                    <tr>
                      <td><table width="846" border="0">
                        <tr>
                          <td width="174"><p><span class="Estilo5">DOCUMENTO CAUSADO:</span></p></td>
                          <td width="65"><input name="txttipo_causado" type="text"  id="txttipo_causado" size="6" maxlength="4"  onFocus="encender(this); " onBlur="apaga_doc(this);"  onchange="chequea_tipo(this.form);"></td>
                          <td width="35"><span class="Estilo5"><input name="bttipo_dif" type="button" id="bttipo_dif" title="Abrir Catalogo Documentos Causados" onclick="VentanaCentrada('Cat_doc_caus.php?criterio=','SIA','','750','500','true')" value="...">
                          </span></td>
                          <td width="78"><span class="Estilo5"><input name="txtnombre_abrev_caus" type="text" id="txtnombre_abrev_caus" size="6" readonly>
                          </span></td>
                          <td width="85"><span class="Estilo5">REFERENCIA :</span> </td>
                          <td width="179"><div id="refcaus"><input name="txtreferencia_caus" type="text"  id="txtreferencia_caus" size="10" onFocus="encender(this); " onBlur="apagar(this);"  onchange="checkreferencia(this.form);"></div></td>
                          <td width="70"><span class="Estilo5">FECHA :</span> </td>
                          <td width="126"><span class="Estilo5"> <input name="txtfecha" type="text" id="txtfecha" size="12" maxlength="10" onFocus="encender(this); " onBlur="apagar(this);"  value="<?echo $fecha?>" onchange="checkrefecha(this.form)">
                          </span></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><table width="854" border="0">
                        <tr>
                          <td width="174">
                            <p><span class="Estilo5">DOCUMENTO COMPROMISO:</span></p></td>
                          <td width="67"><input name="txttipo_compromiso" type="text"  id="txttipo_compromiso" size="6" maxlength="4" onFocus="encender(this);" onBlur="apagar(this);"   onchange="chequea_tipo_comp(this.form);"></td>
                          <td width="35"><span class="Estilo5">
                            <input name="btdoc_comp" type="button" id="btdoc_comp" title="Abrir Catalogo Documentos Compromiso" onClick="VentanaCentrada('Cat_doc_comp.php?criterio=','SIA','','750','500','true')" value="...">
                          </span></td>
                          <td width="78"><span class="Estilo5">
                            <input name="txtnombre_abrev_comp" type="text" id="txtnombre_abrev_comp" size="6" readonly>
                          </span></td>
                          <td width="167"><span class="Estilo5">REFERENCIA COMPROMISO:</span> </td>
                          <td width="84"><div id="refer">
                              <input name="txtreferencia_comp" type="text" id="txtreferencia_comp" size="10" onFocus="encender(this);" onBlur="apagar(this);"  onchange="checkrefe_comp(this.form);">
                          </div></td>
                          <td width="75"><span class="Estilo5">
                            <input name="btref_comp" type="button" id="btref_comp" title="Abrir Catalogo de Compromisos" onClick="VentanaCentrada('Cat_compromisos.php?criterio=','SIA','','750','500','true')" value="...">
                          </span></td>
                          <td width="140"><span class="Estilo5">
</span></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><table width="845">
                        <tr>
                          <td width="173"><span class="Estilo5">CED./RIF BENEFICIARIO:</span></td>
                          <td width="119"><span class="Estilo5">
                            <input name="txtced_rif" type="text" id="txtced_rif" size="15" readonly>
                          </span></td>
                          <td width="537"><span class="Estilo5">
                            <input name="txtnombre" type="text" id="txtnombre" size="80" readonly>
                          </span></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><table width="827" border="0">
                        <tr>
                          <td width="106"><span class="Estilo5">DESCRIPCI&Oacute;N:</span></td>
                          <td width="694"><textarea name="txtdescripcion" cols="85" onFocus="encender(this); " onBlur="apagar(this);" class="headers" id="txtdescripcion"></textarea></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><table width="855">
                        <tr>
                          <td width="173"><span class="Estilo5">GENERA COMPROBANTE :</span></td>
                          <td width="126"><span class="Estilo5"><span class="Estilo10">
                            <select name="txtgenera_comprobante" size="1" id="select" onFocus="encender(this)" onBlur="apagar(this)" onchange="chequea_genera(this.form);">
                              <option>NO</option>
                              <option>SI</option>
                            </select>
                          </span> </span></td>
                          <script language="JavaScript" type="text/JavaScript"> document.form1.txtgenera_comprobante.options[0].selected = true; ;</script>
                          <td width="108"><span class="Estilo5">TIPO DE GASTO :</span></td>
                          <td width="173"><span class="Estilo5"><input name="txtfunc_inv" type="text" id="txtfunc_inv" size="15" readonly></span></td>
                          <td width="218" align="center"><span class="Estilo5">
                            <input name="btcarga_comp" type="button" id="btcarga_comp" title="Cargar C&oacute;digos del Compromiso a Causar" onClick="javascript:Cargar_Cod_Comp(this.form)" value="Cargar C&oacute;digos del  Compromiso">
                          </span></td>
                          <td width="29"><span class="Estilo5"> </span></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>  </td>
              </tr>
          </table>
        <div id="codcomp">
          <iframe src="Det_inc_causados_comp.php?codigo_mov=<?echo $codigo_mov?>" width="850" height="300" scrolling="auto" frameborder="1">
          </iframe>
        </div>
        <table width="870" border="0">
          <tr>
            <td width="864" height="5">&nbsp;</td>
         </tr>
        </table>
        <div id="gencomp">
          <? if($genera_comprobante=='S'){?>
             <iframe src="Det_inc_comp_caus.php?codigo_mov=<?echo $codigo_mov?>"  width="850" height="250" scrolling="auto" frameborder="1">
            </iframe>
          <? }else{?>&nbsp;<? }?>
        </div>
        <table width="768">
          <tr>
            <td width="331"><input name="txtcodigo_mov" type="hidden" id="txtcodigo_mov" value="<?echo $codigo_mov?>"></td>
            <td width="331"><input name="txtcodigo_comp" type="hidden" id="txtcodigo_comp"></td>
            <td width="331">&nbsp;</td>
            <td width="331"><input name="txtcaus_directo" type="hidden" id="txtcaus_directo" value="NO"></td>
            <td width="88" valign="middle"><input name="button" type="submit" id="button"  value="Grabar"></td>
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