<?include ("../class/conect.php");  include ("../class/funciones.php");
$conn = pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
if (!$_GET){$codigo_mov='';}else{$codigo_mov=$_GET["codigo_mov"];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SIA CONTABILIDAD PRESUPUESTARIA (Detalles Incluir C&oacute;digos de la Adici&oacute;n)</title>
<LINK href="../class/sia.css" type=text/css rel=stylesheet>
</head>
<script language="JavaScript" type="text/JavaScript">
var Gcodigo = "";var Gfuente = "";var Gcodigo_mov = "";
function enviar(codigo_mov,codigo,fuente) {Gcodigo_mov=codigo_mov; Gcodigo=codigo; Gfuente=fuente;}
function Llama_Eliminar(){var murl;var r;
 if (Gcodigo=="") {alert("Codigo Presupuestario debe ser Seleccionada");}
  else { murl="Esta seguro en Eliminar el Codigo:"+Gcodigo+" Fuente:"+Gfuente+" de la Adicion ?";
  r=confirm(murl);
  if(r==true){
    r=confirm("Esta Realmente seguro en Eliminar el Codigo de la Adicion ?");
    if(r==true){murl="Delete_cod_adic.php?codigo_mov="+Gcodigo_mov+"&codigo="+Gcodigo+"&fuente="+Gfuente;document.location=murl;}
    }  else { url="Cancelado, no elimino"; }
  }
}
function Llama_Modificar(){var murl;
  if (Gcodigo=="") {alert("Codigo Presupuestario debe ser Seleccionada");}
  else{ murl="Mod_codigo_adic.php?codigo_mov="+Gcodigo_mov+"&codigo="+Gcodigo+"&fuente="+Gfuente; document.location=murl;}
}
</script>
<body>
 <table width="845" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td align="left"><table width="840" border="0" align="left">
          <tr>
            <td width="222" align="center" valign="middle"><input name="btAgregar" type="button" id="btAgregar" value="Agregar" title="Agregar Codigo a la Adicion" onclick="javascript:LlamarURL('Inc_codigo_adic.php?codigo_mov=<?echo $codigo_mov?>')"></td>
            <td width="255" align="center"><input name="btModificar" type="button" id="btModificar" value="Modificar" title="Modificar Codigo de la Adicion" onClick="JavaScript:Llama_Modificar()"></td>
            <td width="215" align="center"><input name="btEliminar" type="button" id="btEliminar" value="Eliminar" title="Eliminar Codigo de la Adicion" onClick="JavaScript:Llama_Eliminar()"></td>
            <td width="215" align="center"><input name="btRefrescar" type="button" id="btRefrescar" onClick="JavaScript:self.location.reload();" value="Refrescar" title="Refrescar los Codigos de la Adicion"></td>
          </tr>
      </table></td>
    </tr>
    <tr height="10">
      <td>
        <p>&nbsp;</p></td>
    </tr>
   <tr>
     <td>
       <? $sql="SELECT * FROM CODIGOS_PRE026  where codigo_mov='$codigo_mov' order by cod_presup"; $res=pg_query($sql); ?>
       <table width="840"  border="1" cellspacing='0' cellpadding='0' align="left" id="codigos">
         <tr height="20" class="Estilo5">
           <td width="200"  align="left" bgcolor="#99CCFF"><strong>C&oacute;digo</strong></td>
           <td width="40" align="left" bgcolor="#99CCFF"><strong>Fuente</strong></td>
           <td width="500" align="center" bgcolor="#99CCFF"><strong>Denominaci&oacute;n</strong></td>
           <td width="100" align="right" bgcolor="#99CCFF" ><strong>Monto </strong></td>
         </tr>
         <? $total=0;
while($registro=pg_fetch_array($res))
{ $monto=$registro["monto"]; $monto=formato_monto($monto);$total=$total+$registro["monto"];
?>
         <tr bgcolor='#FFFFFF' bordercolor='#000000' height="20" class="Estilo5" onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#FFFFFF'"o"];" onDblClick="javascript:enviar('<? echo $codigo_mov; ?>','<? echo $registro["cod_presup"]; ?>','<? echo $registro["fuente_financ"]; ?>');">
           <td width="200" align="left"><? echo $registro["cod_presup"]; ?></td>
           <td width="40" align="left"><? echo $registro["fuente_financ"]; ?></td>
           <td width="500" align="left"><? echo $registro["denominacion"]; ?></td>
           <td width="100" align="right"><? echo $monto; ?></td>
         </tr>
         <?}
 $total=formato_monto($total);
?>
       </table></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><table width="842" border="0">
       <tr>
         <td width="133">&nbsp;</td>
         <td width="438">&nbsp;</td>
         <td width="82"><span class="Estilo5">TOTAL :</span></td>
         <td width="160"><table width="151" border="1" cellspacing="0" cellpadding="0">
           <tr>
             <td align="right" class="Estilo5"><? echo $total; ?></td>
           </tr>
         </table></td>
       </tr>
     </table></td>
   </tr>
 </table>
 <p>&nbsp;</p>
</body>
</html>
<?  pg_close();?>