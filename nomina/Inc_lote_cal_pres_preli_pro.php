<?include ("../class/funciones.php");
$conn = pg_connect("host=localhost port=5432 password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
if (!$_GET){
  $ced_rif='';$p_letra="";
  $sql="SELECT * FROM PRE099 ORDER BY ced_rif";}
else {
  $ced_rif = $_GET["Gced_rif"];
  $p_letra=substr($ced_rif, 0, 1);
  if(($p_letra=="P")||($p_letra=="U")||($p_letra=="S")||($p_letra=="A")){$ced_rif=substr($ced_rif,1,12);}
   else{$ced_rif=substr($ced_rif,0,12);}
  $sql="Select * from PRE099 where ced_rif='$ced_rif' ";
  if ($p_letra=="P"){$sql="SELECT * FROM PRE099 ORDER BY ced_rif";}
  if ($p_letra=="U"){$sql="SELECT * From PRE099 Order by ced_rif desc";}
  if ($p_letra=="S"){$sql="SELECT * From PRE099 Where (ced_rif>'$ced_rif') Order by ced_rif";}
  if ($p_letra=="A"){$sql="SELECT * From PRE099 Where (ced_rif<'$ced_rif') Order by ced_rif desc";}
  //echo $sql,"<br>";
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIA CONTROL N&Oacute;MINA Y PERSONAL (Calculo de la Prestaciones)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK
href="../class/sia.css" type=text/css
rel=stylesheet>
<script language="JavaScript" type="text/JavaScript">
var Gced_rif = "";
function Llamar_Ventana(url)
{
var murl;
    Gced_rif=document.form1.txtced_rif.value;
    murl=url+Gced_rif;
    if (Gced_rif=="")
        {alert("C�dula/Rif debe ser Seleccionada");}
        else {document.location = murl;}
}
function Mover_Registro(MPos)
{
var murl;
   murl="Act_codigos.php";
   if(MPos=="P"){murl="Act_beneficiarios.php?Gced_rif=P"}
   if(MPos=="U"){murl="Act_beneficiarios.php?Gced_rif=U"}
   if(MPos=="S"){murl="Act_beneficiarios.php?Gced_rif=S"+document.form1.txtced_rif.value;}
   if(MPos=="A"){murl="Act_beneficiarios.php?Gced_rif=A"+document.form1.txtced_rif.value;}
   document.location = murl;
}
function Llama_Eliminar(){
var url;
var r;
  r=confirm("Esta seguro en Eliminar el Trabajador ?");
  if (r==true) {
    r=confirm("Esta Realmente seguro en Eliminar el Trabajador ?");
    if (r==true) {
       url="Delete_beneficiario.php?Gced_rif="+document.form1.txtced_rif.value;
       VentanaCentrada(url,'Eliminar Beneficiario','','400','400','true');}
    }
   else { url="Cancelado, no elimino"; }
}
</script>
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
.Estilo11 {
	font-size: 12pt;
	font-weight: bold;
}
-->
</style>
</head>
<?
$nombre="";$cedula="";
$rif="";$nit="";
$direccion="";$tipo_benef="";
$res=pg_query($sql);
$filas=pg_num_rows($res);
if ($filas==0){
  if ($p_letra=="S"){$sql="SELECT * From PRE099 ORDER BY ced_rif";}
  if ($p_letra=="A"){$sql="SELECT * From PRE099 ORDER BY ced_rif desc";}
  $res=pg_query($sql);
  $filas=pg_num_rows($res);
}
if($filas>=1){
  $registro=pg_fetch_array($res,0);
  $ced_rif=$registro["ced_rif"];
  $nombre=$registro["nombre"];$cedula=$registro["cedula"];
  $rif=$registro["rif"];$nit=$registro["nit"];
  $direccion=$registro["direccion"];$tipo_benef=$registro["tipo_benef"];
  $ced_rif_aut=$registro["ced_rif_autorizado"];$nombre_auto=$registro["nombre_autorizado"];
  $ciudad=$registro["ciudad"];$municipio=$registro["municipio"];
  $region=$registro["region"];$estado=$registro["estado"];
  $pais=$registro["pais"];$telefono=$registro["telefono"];
  $fax=$registro["fax"];$tlf_movil=$registro["tlf_movil"];
  $pasaporte=$registro["pasaporte"];$nacionalidad=$registro["nacionalidad"];
  $residente=$registro["residente"];$observaciones=$registro["observaciones"];
  $clasificacion=$registro["clasificacion"];$rep_legal=$registro["representante_legal"];
  $cod_postal=$registro["cod_postal"];$aptd_postal=$registro["aptd_postal"];
  $tipo_orden=$registro["tipo_orden"];
  $des_tipo_orden="";
  $inf_usuario=$registro["inf_usuario"];
}
?>
<body>
<table width="977" height="38" border="0" bgcolor="#000066">
  <tr>
    <td width="73"><div align="center" class="Estilo2 Estilo4"><img src="../imagenes/Logo_sia.gif" width="72" height="42"></div></td>
    <td width="836"><div align="center" class="Estilo2 Estilo6">INCLUIR - CALCULO DE PRESTACIONES POR LOTE </div></td>
    <td width="55" class="Estilo2"><strong class="Estilo2 Estilo9">VER 6.0 </strong></td>
  </tr>
</table>
<table width="977" height="472" border="1" id="tablacuerpo">
  <tr>
    <td width="92" height="466"><table width="92" height="479" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" id="tablamenu">
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('Act_cal_pres_preli_pro.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgcolor=#EAEAEA><div align="center"><a class=menu href="Act_cal_pres_preli_pro">Atras</a></div></td>
      </tr>
      <tr>
        <td onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onClick="javascript:LlamarURL('menu.php')";
          onMouseOut="this.style.backgroundColor='#EAEAEA'"o"];" height="35"  bgcolor=#EAEAEA><div align="center"><a class=menu href="menu.php">Menu</a></div></td>
      </tr>
      <tr>
        <td height="405">&nbsp;</td>
      </tr>
    </table></td>
    <td width="888"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000033"><b></b></font>
         <form name="form1" method="post" action="">
       <div id="Layer1" style="position:absolute; width:867px; height:238px; z-index:1; top: 68px; left: 115px;">
         <table width="828" border="0" align="center" >
           <tr>
             <td><table width="866">
               <tr>
                 <td width="122" scope="col"><div align="left"><span class="Estilo5">C&Oacute;DIGO EMPLEADO :</span></div></td>
                 <td width="96" scope="col"><div align="left"><span class="Estilo5"> <span class="menu"><strong><strong><strong><strong><span class="Estilo10"><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong>
                     <strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong>
                     <input name="txtcod_empleado" type="text" class="Estilo5" id="txtcod_empleado3"  size="15" maxlength="15" readonly>
                    </strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong>                 </strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></span></strong></strong></strong></strong></span> <span class="menu"><strong><strong> </strong></strong></span> </span></div></td>
                 <td width="51" scope="col"><span class="Estilo5"><span class="Estilo10">
                 </span></span></td>
                 <td width="121" scope="col"><span class="Estilo5">C&Eacute;DULA IDENTIDAD :</span></td>
                 <td width="107" scope="col"><span class="Estilo5"> <span class="Estilo10">
                 <input name="txttipo_nomina2" type="text" class="Estilo5" id="txttipo_nomina"  onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">
</span> </span></td>
                 <td width="57" scope="col"><span class="Estilo5">N&Oacute;MINA :</span></td>
                 <td width="80" scope="col"><span class="Estilo5"><span class="Estilo10">
                   <input name="txttipo_nomina22" type="text" class="Estilo5" id="txttipo_nomina22"  onFocus="encender(this)" onBlur="apagar(this)" size="10" maxlength="10">
                 </span></span></td>
                 <td width="102" scope="col"><div align="left"><span class="Estilo5">FECHA INGRESO : </span></div></td>
                 <td width="90" scope="col"><div align="left"><span class="Estilo5"> <span class="menu"><strong><strong><strong><strong><span class="Estilo10">
                     <input name="txtfecha_ingreso" type="text" class="Estilo5" id="txttipo_nomina2"  onFocus="encender(this)" onBlur="apagar(this)" size="10" maxlength="10">
                 </span></strong></strong> </strong></strong></span> </span></div></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td><table width="855">
               <tr>
                 <td width="124" scope="col"><div align="left"><span class="Estilo5">NOMBRE EMPLEADO : </span></div></td>
                 <td width="719" scope="col"><div align="left"><span class="Estilo5"> <span class="menu"><strong><strong><strong><strong><strong><strong><span class="Estilo10"><strong><strong><strong><strong><strong><strong><strong><strong> <strong><strong><strong><strong> <strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong>
                     <input name="txtnombre" type="text" class="Estilo5" id="txtnombre"  onFocus="encender(this)" onBlur="apagar(this)" size="138" maxlength="138">
                 </strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong> </strong></strong></strong></strong> </strong></strong></strong></strong> </strong></strong></strong></strong> </span></strong></strong></strong></strong> </strong></strong></span> </span></div></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td height="14">&nbsp;</td>
           </tr>
           <tr>
             <td height="14"><table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td width="39">&nbsp;</td>
                 <td width="821"><span class="Estilo11">CALCULO DE PRESTACIONES POR LOTE </span></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td height="14">&nbsp;</td>
           </tr>
           <tr>
             <td height="14"><table width="707" align="center">
               <tr>
                 <td width="39" scope="col"><div align="left"></div></td>
                 <td width="131" scope="col"><span class="Estilo5">TIPO N&Oacute;MINA DESDE  :</span></td>
                 <td width="84" scope="col"><span class="Estilo5"> <span class="Estilo10">
                   <input name="txttipo_nomina23" type="text" class="Estilo5" id="txttipo_nomina23"  onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">
                 </span> </span></td>
                 <td width="115" scope="col"><span class="Estilo5"><span class="Estilo10">
                   <input name="btcuentas2" type="button" id="btcuentas3" title="Abrir Catalogo de Trabajadores"  onClick="VentanaCentrada('../Nomina/Cat_cuentas_cargables.php?criterio=','SIA','','750','500','true')" value="...">
                 </span></span></td>
                 <td width="55" scope="col"><div align="left"><span class="Estilo5">HASTA :</span></div></td>
                 <td width="89" scope="col"><div align="left"><span class="Estilo5"> <span class="menu"><strong><strong><strong><strong><span class="Estilo10">
                     <input name="txttipo_nomina23223" type="text" class="Estilo5" id="txttipo_nomina23223"  onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">
                 </span></strong></strong> </strong></strong></span> </span></div></td>
                 <td width="162" scope="col"><span class="Estilo5"><span class="Estilo10">
                   <input name="btcuentas22" type="button" id="btcuentas22" title="Abrir Catalogo de Trabajadores"  onClick="VentanaCentrada('../Nomina/Cat_cuentas_cargables.php?criterio=','SIA','','750','500','true')" value="...">
                 </span></span></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td height="14"><table width="812" align="center">
               <tr>
                 <td width="60" scope="col"><div align="left"></div></td>
                 <td width="162" scope="col"><span class="Estilo5">C&Oacute;DIGO EMPLEADO DESDE :</span></td>
                 <td width="87" scope="col"><span class="Estilo5"> <span class="Estilo10">
                   <input name="txttipo_nomina2322" type="text" class="Estilo5" id="txttipo_nomina2322"  onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">
                 </span> </span></td>
                 <td width="114" scope="col"><span class="Estilo5"><span class="Estilo10">
                   <input name="btcuentas232" type="button" id="btcuentas232" title="Abrir Catalogo de Trabajadores"  onClick="VentanaCentrada('../Nomina/Cat_cuentas_cargables.php?criterio=','SIA','','750','500','true')" value="...">
                 </span></span></td>
                 <td width="55" scope="col"><div align="left"><span class="Estilo5">HASTA :</span></div></td>
                 <td width="87" scope="col"><div align="left"><span class="Estilo5"> <span class="menu"><strong><strong><strong><strong><span class="Estilo10">
                     <input name="txttipo_nomina23222" type="text" class="Estilo5" id="txttipo_nomina23222"  onFocus="encender(this)" onBlur="apagar(this)" size="15" maxlength="15">
                 </span></strong></strong> </strong></strong></span> </span></div></td>
                 <td width="215" scope="col"><span class="Estilo5"><span class="Estilo10">
                   <input name="btcuentas2222" type="button" id="btcuentas2222" title="Abrir Catalogo de Trabajadores"  onClick="VentanaCentrada('../Nomina/Cat_cuentas_cargables.php?criterio=','SIA','','750','500','true')" value="...">
                 </span></span></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td height="14"><table width="858" align="left">
               <tr>
                 <td width="236" height="19" scope="col"><span class="Estilo5">FECHA CALCULO PRESTACIONES HASTA  :</span></td>
                 <td width="610" scope="col"><span class="Estilo5"> <span class="Estilo10">
                   <input name="txttipo_nomina232" type="text" class="Estilo5" id="txttipo_nomina232"  onFocus="encender(this)" onBlur="apagar(this)" size="10" maxlength="10">
                 </span> </span></td>
                 </tr>
             </table></td>
           </tr></table>
         </div>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <table width="812">
           <tr>
             <td width="664">&nbsp;</td>
             <td width="88"><input name="Submit3" type="submit" id="Submit34"  value="Grabar"></td>
             <td width="88"><input name="Submit23" type="reset" value="Blanquear"></td>
           </tr>
         </table>
         <p>&nbsp;</p>
         </form>
    </td>
  </tr>
</table>
</body>
</html>
<? pg_close();?>