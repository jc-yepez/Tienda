
<?php
session_start();
if(($_SESSION['MM_Username'])!= ''){
$_SESSION['ncar']=$_SESSION['MM_Username'];

?>
<?php require_once('Connections/conexion.php'); ?><?php
$colname_rsCompras = "-1";
if (isset($_GET['codigo'])) {
  $colname_rsCompras = (get_magic_quotes_gpc()) ? $_GET['codigo'] : addslashes($_GET['codigo']);
}
mysql_select_db($database_conexion, $conexion);
$query_rsCompras = sprintf("SELECT * FROM productos WHERE codigo_producto = %s", $colname_rsCompras);
$rsCompras = mysql_query($query_rsCompras, $conexion) or die(mysql_error());
$row_rsCompras = mysql_fetch_assoc($rsCompras);
$totalRows_rsCompras = mysql_num_rows($rsCompras);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<!--******************* Include the following in the head of your documents **********************-->
		
		<!-- NodeFire API Script Files [LightBox] -->

			<script type="text/javascript" src="js/nf_lightbox.js"></script>
			
			
		<!-- LightBox Customization (view files for additional customization and help) -->
		
			<script type="text/javascript" src="lb_params.js"></script>	
			<link rel="stylesheet" href="lb_styles1.css" type="text/css">
	
	<!--******************* End NodeFire head sections **********************-->
	
	
	<!-- Template CSS Styles [custom styles for displaying template content only] -->	
	
		<style type="text/css">
			a {text-decoration:none;color:#ccc}
			a:hover {text-decoration:underline;}
			.thumbs {border:2px solid #333;}
			.gallery_title {font-family:Arial;font-size:14px;color:#000;border-width:0px 0px 1px 0px;border-style:solid;border-color:#333;margin:0px 0px 40px 0px;padding:0px 0px 4px 0px;}
			.gallery_title span {color:#444;}
			.gallery_title span a {text-decoration:none;color:#333}
			.gallery_title span a:hover {text-decoration:underline;}
		</style>
	
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Compras</title>
<link rel="shortcut icon" type="image/x-icon" href="imagenes/market.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="imagenes/mm_travel2.css" type="text/css" />
<script language="javascript">
function validarCan() {
if(document.form1.txtCantidad.value == "" || document.form1.txtCantidad.value == null ) {
document.bandera=false;
alert("ingrese la cantidad");
document.form1.txtCantidad.focus();
}else{
document.bandera=true;
}
}
</script>
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>

<style type="text/css">
<!--
.Estilo4 {
	color: #FFFFFF;
	font-size: 12px;
}
.Estilo5 {color: #FFFFFF}
.Estilo7 {font-size: 14px}
.Estilo8 {
	color: #003366;
	font-weight: bold;
	font-size: 16;
}
.Estilo9 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>
<body bgcolor="#C0DFFD" style='margin:20px;color:#fff; repeat-x' >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td width="382" colspan="3" rowspan="2"><img src="imagenes/mm_travel_photo.png" alt="Header image" width="382" height="127" border="0" /></td>
    <td width="378" height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap"><div align="center">THURSDAYS.COM</div></td>
    <td width="100%" bgcolor="#3366CC">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center"><div align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO</div></td>
	<td width="100%"><div align="right">
	  <div align="right" class="Estilo4">Conectado como: 
	    <table width="208" border="0">
          <tr>
            <td width="202"><div align="right" class="Estilo5"><?php echo $_SESSION['MM_Username'] ?></div></td>
          </tr>
        </table>
	    <p><a href="cerrar_sesion.php">Cerrar Sesi&oacute;n</a></p>
	  </div>
	</div></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#003366"><img src="imagenes/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="7" id="dateformat" height="25">&nbsp;&nbsp;

      <div align="left">
  	      <script language="JavaScript" type="text/javascript">
      document.write(TODAY);</script>
      </div></td>
  </tr>
 <tr>
    <td colspan="7" bgcolor="#003366"><img src="imagenes/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td width="165" valign="top" bgcolor="#E6F3FF">
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td width="165">&nbsp;<br />
		 &nbsp;<br /></td>
        </tr>
        <tr>
          <td width="165"><a href="carrito.php" class="navText">Ver Carrito </a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">airfare</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">cruises</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">specials</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">contact</a></td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><span class="Estilo7"><img src="imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;
	</span>
      <form action="" method="post" name="form1" class="Estilo7" id="form1">
        <div align="center">
          <table width="200" border="0">
            <tr>
              <td><div align="center"><span class="Estilo8"><?php echo $row_rsCompras['nombre']; ?></span></div></td>
            </tr>
          </table>
        </div>
		</ul>

		<!-- Gallery Container: (make any element an inline gallery container by applying an ID that matches your gallery ID.) -->
		
		<div style="text-align:center;margin:0px 0px 0px 0px;">
		<!-- NEW GALLERY: Add the params function reference (function and settings in lb_params.js) to all 'rel' attributes or the first one in your gallery-->
			<a rel="NF.lightBox={id:'photos1',  params:nflbParams_simple()}" href="<?php echo $row_rsCompras['foto']; ?>"><img src="<?php echo $row_rsCompras['foto']; ?>" width="90" height="90" border="0" class="thumbs"></img></a>
			&nbsp;&nbsp;&nbsp;
			<a rel="NF.lightBox={id:'photos1'}" href="<?php echo $row_rsCompras['foto2']; ?>"><img src="<?php echo $row_rsCompras['foto2']; ?>" width="90" height="90" class="thumbs"></img></a>
			&nbsp;&nbsp;&nbsp;
			<a rel="NF.lightBox={id:'photos1'}" href="<?php echo $row_rsCompras['foto3']; ?>" ><img src="<?php echo $row_rsCompras['foto3']; ?>" width="90" height="90" class="thumbs"></img></a>
			</div>
		</p>
	    <table width="200" border="0">
          <tr>
            <td><div align="center" class="Estilo9"><?php echo $row_rsCompras['descripcion']; ?></div></td>
          </tr>
        </table>
	    <p align="justify">&nbsp; </p>
	</form>	</td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
        <td width="190" valign="top"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">THURSDAYS.COM</td>
			</tr>

			<tr>
			<td width="40"><img src="imagenes/mm_spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText"><br />
			<p align="center"><img src="imagenes/mm_travel_photo1.png" alt="Image 1" width="110" height="110" vspace="6" border="0" /><br />
			  Tu tienda favorita</p>

			<p align="center"><img src="imagenes/mm_travel_photo2.jpg" alt="Image 2" width="110" height="110" vspace="6" border="0" /><br />
			  Pasillo de Alimentos</p>			
			 </td>
			<td width="40">&nbsp;</td>
			</tr>
		</table>	</td>
	<td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="165">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="167">&nbsp;</td>
    <td width="138">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="190">&nbsp;</td>
	<td width="100%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsCompras);
}else{
header("Location: _adm/fLoginClientes.php");
}
?>
