<?if (!$_GET){$criterio='';$cod_estructura='';} else{$criterio=$_GET["criterio"];$cod_estructura=substr($criterio,0,8);}?>
<iframe src="Det_ret_estructura.php?criterio=<?echo $cod_estructura?>"  width="845" height="290" scrolling="auto" frameborder="1"> </iframe>