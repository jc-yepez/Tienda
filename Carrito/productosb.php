<?php require_once('Connections/conexion.php'); ?>
<?php
$colname_rsProductos = "-1";
if (isset($_GET['buscar'])) {
  $colname_rsProductos = (get_magic_quotes_gpc()) ? $_GET['buscar'] : addslashes($_GET['buscar']);
}
mysql_select_db($database_conexion, $conexion);
$query_rsProductos = sprintf("SELECT * FROM productos WHERE nombre = '%s' ORDER BY nombre ASC", $colname_rsProductos);
$rsProductos = mysql_query($query_rsProductos, $conexion) or die(mysql_error());
$row_rsProductos = mysql_fetch_assoc($rsProductos);
$totalRows_rsProductos = mysql_num_rows($rsProductos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Productos</title>
<link href="imagenes/market.ico" rel="shortcut icon" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="imagenes/mm_travel2.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td width="382" colspan="3" rowspan="2"><img src="imagenes/mm_travel_photo.png" width="382" height="127" /></td>
    <td width="378" height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">THURSDAYS.COM</td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO</td>
	<td width="100%">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#003366"><img src="imagenes/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="7" id="dateformat" height="25">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
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
          <td width="165"><a href="clientes.php" class="navText">Clientes</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" target="_blank" class="navText">Usuarios</a></td>
        </tr>
        <tr>
          <td width="165"><a href="_adm/fingreso.php" class="navText">IngresoProductos</a></td>
        </tr>
        <tr>
          <td width="165"><a href="_adm/IngresoClientes.php">IngresoClientes </a></td>
        </tr>
        <tr>
          <td width="165"><a href="_adm/fmodificar.php" class="navText">ModificarProductos</a></td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><div align="center">
      <p><img src="imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
        &nbsp;<br />
        </p>
      <form id="form1" name="form1" method="get" action="productosb.php?$buscar=buscar">
        <label>Producto
          <input name="buscar" type="text" id="buscar" />
        </label>
        <a href="productosb.php?codigo=<?php echo $row_srProductos['codigo_producto']; ?>">
        <label>
        <input type="submit" name="Submit" value="Buscar" />
        </label>
        </a>
        <label>
        <div align="right"><br />
        <br />
            <br />
        </div>
        </label>
        <label> </label>
        <table width="304" height="68" border="1">
          <tr>
            <td><div align="center">CODIGO</div></td>
            <td><div align="center">NOMBRE</div></td>
            <td><div align="center">PRECIO</div></td>
            <td><div align="center">DESCRIPCION</div></td>
            <td><div align="center">FOTO</div></td>
            </tr>
          <tr>
            <td><?php echo $row_rsProductos['codigo_producto']; ?></td>
            <td><?php echo $row_rsProductos['nombre']; ?></td>
            <td><?php echo $row_rsProductos['precio']; ?></td>
            <td><?php echo $row_rsProductos['descripcion']; ?></td>
            <td><img src="<?php echo $row_rsProductos['foto']; ?>" alt="CLIENTES" width="75" height="75" /></td>
            </tr>
        </table>
        <p>&nbsp;</p>
      </form>
      <p>&nbsp; </p>
    </div>
      <br />	
      <br />	  </td>
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
			  Tu tienda favorita <br />
              <a href="javascript:;"></a></p>

			<p align="center"><img src="imagenes/mm_travel_photo2.jpg" alt="Image 2" width="110" height="110" vspace="6" border="0" /><br />
			  Pasillo de Alimentos </p>
			 <br />
			&nbsp;<br />
			&nbsp;<br />			</td>
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
mysql_free_result($rsProductos);
?>
