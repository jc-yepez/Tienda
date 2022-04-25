<?php 
 session_start();
 if(($_SESSION['MM_Username'])!= ''){
?>
<?php require_once('Connections/conexion.php'); ?>
<?php
$inicio_rsCarrito = "-1";
if (isset($_SESSION['inicio'])) {
  $inicio_rsCarrito = (get_magic_quotes_gpc()) ? $_SESSION['inicio'] : addslashes($_SESSION['inicio']);
}
$colname_rsCarrito = "-1";
if (isset($_SESSION['ncar'])) {
  $colname_rsCarrito = (get_magic_quotes_gpc()) ? $_SESSION['ncar'] : addslashes($_SESSION['ncar']);
}
mysql_select_db($database_conexion, $conexion);
$query_rsCarrito = sprintf("SELECT productos.nombre,carrito.precio,carrito.cantidad,(carrito.precio*carrito.cantidad) AS Subtotal FROM carrito,productos WHERE sesion = '%s' and  fecha = '%s' and productos.codigo_producto=carrito.codigo_producto_fk ORDER BY codigo_item ASC", $colname_rsCarrito,$inicio_rsCarrito);
$rsCarrito = mysql_query($query_rsCarrito, $conexion) or die(mysql_error());
$row_rsCarrito = mysql_fetch_assoc($rsCarrito);
$totalRows_rsCarrito = mysql_num_rows($rsCarrito);

$colname_rsTotal = "-1";
if (isset($_SESSION['ncar'])) {
  $colname_rsTotal = (get_magic_quotes_gpc()) ? $_SESSION['ncar'] : addslashes($_SESSION['ncar']);
}
$inicio_rsTotal = "-1";
if (isset($_SESSION['inicio'])) {
  $inicio_rsTotal = (get_magic_quotes_gpc()) ? $_SESSION['inicio'] : addslashes($_SESSION['inicio']);
}
mysql_select_db($database_conexion, $conexion);
$query_rsTotal = sprintf("SELECT SUM(carrito.precio*carrito.cantidad) AS Total FROM carrito,productos WHERE sesion='%s' and  fecha='%s' and productos.codigo_producto=carrito.codigo_producto_fk", $colname_rsTotal,$inicio_rsTotal);
$rsTotal = mysql_query($query_rsTotal, $conexion) or die(mysql_error());
$row_rsTotal = mysql_fetch_assoc($rsTotal);
$totalRows_rsTotal = mysql_num_rows($rsTotal);
?>

<?php 
$idCliente= $_SESSION['MM_Username'];
$consulta= "SELECT NOM_CLI,APE_CLI,DIR_CLI,TEL_CLI FROM clientes WHERE CED_CLI= '".$idCliente."' ";
$resultado=mysql_query($consulta,$conexion) or die(mysql_error());
$fila=mysql_fetch_array($resultado);
$nombre=$fila['NOM_CLI'];
$apellido=$fila['APE_CLI'];
$direccion=$fila['DIR_CLI'];
$telefono=$fila['TEL_CLI'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Carrito</title>
<link rel="shortcut icon" type="image/x-icon" href="imagenes/market.ico" />
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
<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-size: 12px;
}
.Estilo2 {color: #FF9933}
-->
</style>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td width="382" colspan="3" rowspan="2"><img src="imagenes/mm_travel_photo.png" alt="Header image" width="382" height="127" border="0" /></td>
    <td width="378" height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">THURSDAYS.COM</td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO </td>
	<td width="100%"><div align="right">
        <div align="right" class="Estilo4"><span class="Estilo1">Conectado como:
          </span>
          <table width="208" border="0">
              <tr>
                <td width="202"> <div align="right" class="Estilo4"><span class="Estilo1"><?php echo $idCliente; ?></div></td>
              </tr>
          </table>
          <p><a href="cerrar_sesion.php">Cerrar Sesión</a></a></p>
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
      document.write(TODAY);	</script>
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
          <td width="165"><a href="javascript:;" class="navText">destinations</a></td>
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
    <td width="305" colspan="2" valign="top"><p><img src="imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
      &nbsp;<br />
      &nbsp;
    </p>
      <form id="form1" name="form1" method="post" action="">
        <table width="200" border="1">
          <tr>
            <td><div align="right">CEDULA</div></td>
            <td><?php echo $idCliente; ?></td>
          </tr>
          <tr>
            <td><div align="right">NOMBRE</div></td>
            <td><?php echo $nombre;?></td>
          </tr>
          <tr>
            <td><div align="right">APELLIDO</div></td>
            <td><?php echo $apellido; ?></td>
          </tr>
          <tr>
            <td><div align="right">DIRECCION</div></td>
            <td><?php echo $direccion; ?></td>
          </tr>
          <tr>
            <td><div align="right">TELEFONO</div></td>
            <td><?php echo $telefono; ?></td>
          </tr>
        </table>
      </form>
      <table width="304" border="1">
      <tr>
        <td width="66">PRODUCTO</td>
        <td width="45">PRECIO</td>
        <td width="63">CANTIDAD</td>
        <td width="61">SUBTOTAL</td>
        </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_rsCarrito['nombre']; ?></td>
          <td><?php echo $row_rsCarrito['precio']; ?></td>
          <td><?php echo $row_rsCarrito['cantidad']; ?></td>
          <td><?php echo $row_rsCarrito['Subtotal']; ?></td>
        </tr>
        <?php } while ($row_rsCarrito = mysql_fetch_assoc($rsCarrito)); ?>
      <tr>
        <td colspan="3"><div align="right">Total:</div></td>
        <td><div align="right"><?php echo $row_rsTotal['Total']; ?></div></td>
      </tr>
    </table>
	<div align="left"><a href="compras.php">SEGUIR COMPRANDO </a></div></td>
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
mysql_free_result($rsCarrito);

mysql_free_result($rsTotal);

}else{
header("Location: _adm/fLoginClientes.php");
}
?>
