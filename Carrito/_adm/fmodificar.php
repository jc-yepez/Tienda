<?php require_once('../Connections/conexion.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$nombre_corto=$_FILES['txtFoto']['name'];
$nombre_largo=$_FILES['txtFoto']['tmp_name'];
$nombre_corto=str_replace(" ","_",$nombre_corto);
  $updateSQL = sprintf("UPDATE productos SET nombre=%s, precio=%s, descripcion=%s, foto='fotosProductos/".$nombre_corto."' WHERE codigo_producto=%s",
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtPrecio'], "double"),
                       GetSQLValueString($_POST['txtDescripcion'], "text"),
                       GetSQLValueString($_POST['txtCodigo'], "int"));
					   
					   copy($nombre_largo,"../fotosProductos/".$nombre_corto);

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "../productos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$nombre_corto=$_FILES['txtFoto']['name'];
$nombre_largo=$_FILES['txtFoto']['tmp_name'];
$nombre_corto=str_replace(" ","_",$nombre_corto);
  $updateSQL = sprintf("UPDATE productos SET nombre=%s, precio=%s, descripcion=%s, foto='fotosProductos/".$nombre_corto."' WHERE codigo_producto=%s",
                       GetSQLValueString($_POST['txtCodigo'], "int"),
					   GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtPrecio'], "double"),
                       GetSQLValueString($_POST['txtDescripcion'], "text"));
                       copy($nombre_largo,"../fotosProductos/".$nombre_corto);

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "../productos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$nombre_corto=$_FILES['txtFoto']['name'];
$nombre_largo=$_FILES['txtFoto']['tmp_name'];
$nombre_corto=str_replace(" ","_",$nombre_corto);
$updateSQL = sprintf("UPDATE productos SET nombre=%s, precio=%s, descripcion=%s, foto='fotosProductos/".$nombre_corto."' WHERE codigo_producto=%s",
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtPrecio'], "double"),
                       GetSQLValueString($_POST['txtDescripcion'], "text"),
                       GetSQLValueString($_POST['txtCodigo'], "int"));
					   copy($nombre_largo,"../fotosProductos/".$nombre_corto);

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "../productos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsModificarProductos = "-1";
if (isset($_GET['codigo'])) {
  $colname_rsModificarProductos = (get_magic_quotes_gpc()) ? $_GET['codigo'] : addslashes($_GET['codigo']);
}
mysql_select_db($database_conexion, $conexion);
$query_rsModificarProductos = sprintf("SELECT * FROM productos WHERE codigo_producto = %s ORDER BY nombre ASC", $colname_rsModificarProductos);
$rsModificarProductos = mysql_query($query_rsModificarProductos, $conexion) or die(mysql_error());
$row_rsModificarProductos = mysql_fetch_assoc($rsModificarProductos);
$totalRows_rsModificarProductos = mysql_num_rows($rsModificarProductos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Modificar Productos</title>
<link href="../imagenes/market.ico" rel="shortcut icon" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../imagenes/mm_travel2.css" type="text/css" />
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
.Estilo1 {color: #FFFFFF}
.Estilo2 {color: #000000; font-size: 14px; }
.Estilo3 {color: #FFFFFF; font-size: 14px; }
-->
</style>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#3366CC">
    <td width="382" colspan="3" rowspan="2"><img src="../imagenes/mm_travel_photo.png" alt="Header image" width="382" height="127" border="0" /></td>
    <td width="378" height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">THURSDAYS.COM</td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO</td>
	<td width="100%" bgcolor="#3366CC">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#003366"><img src="../imagenes/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="7" id="dateformat" height="25">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
  </tr>
 <tr>
    <td colspan="7" bgcolor="#003366"><img src="../imagenes/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td width="165" valign="top" bgcolor="#E6F3FF">
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td width="165">&nbsp;<br />
		 &nbsp;<br /></td>
        </tr>
        <tr>
          <td><a href="clientes.php" class="navText">Clientes</a></td>
        </tr>
        <tr>
          <td><a href="javascript:;" target="_blank" class="navText">Usuarios</a></td>
        </tr>
        <tr>
          <td><a href="_adm/fingreso.php" class="navText">IngresoProductos</a></td>
        </tr>
        <tr>
          <td><a href="_adm/IngresoClientes.php">IngresoClientes </a></td>
        </tr>
        <tr>
          <td><a href="../productos.php" class="navText">Productos</a></td>
        </tr>
      </table>
 	 </td>
    <td width="50"><img src="../imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><img src="../imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
	  <table width="305" border="0" bgcolor="#3366CC">
        <tr>
          <td><div align="right" class="Estilo3">CODIGO:</div></td>
          <td><span class="Estilo2">
            <label>
            <input name="txtCodigo" type="text" id="txtCodigo" value="<?php echo $row_rsModificarProductos['codigo_producto']; ?>" />
            </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">NOMBRE:</div></td>
          <td><span class="Estilo2">
            <label>
              <input name="txtNombre" type="text" id="txtNombre" value="<?php echo $row_rsModificarProductos['nombre']; ?>" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">PRECIO:</div></td>
          <td><span class="Estilo2">
            <label>
              <input name="txtPrecio" type="text" id="txtPrecio" value="<?php echo $row_rsModificarProductos['precio']; ?>" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">DESCRIPCION:</div></td>
          <td><span class="Estilo2">
            <label>
              <input name="txtDescripcion" type="text" id="txtDescripcion" value="<?php echo $row_rsModificarProductos['descripcion']; ?>" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo1">FOTO:</div></td>
          <td><label><img src="<?php echo '../'.$row_rsModificarProductos['foto']; ?>" width="75" height="75" /><br />
              <input name="txtFoto" type="file" id="txtFoto" value="" />
          </label></td>
        </tr>
        <tr>
          <td><div align="right">
            <label>
            <div align="center">
              <input type="submit" name="Submit" value="Modificar" />
            </div>
            </label>
</div></td>
          <td><label>
            <div align="center">
              <input name="Submit2" type="button" onclick="location.href='../productos.php';" value="Cancelar" />            
            </div>
            </label></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1">
	</form>	<br />	  </td>
    <td width="50"><img src="../imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
        <td width="190" valign="top"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">THURSDAYS.COM</td>
			</tr>

			<tr>
			<td width="40"><img src="../imagenes/mm_spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText"><br />
			<p align="center"><img src="../imagenes/mm_travel_photo1.png" alt="Image 1" width="110" height="110" vspace="6" border="0" /><br />
			  Tu tienda favorita</p>

			<p align="center"><img src="../imagenes/mm_travel_photo2.jpg" alt="Image 2" width="110" height="110" vspace="6" border="0" /><br />
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
mysql_free_result($rsModificarProductos);
?>
