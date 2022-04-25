
<?php
session_start();
if(($_SESSION['MM_Username'])!= ''){
$_SESSION['ncar']=$_SESSION['MM_Username'];
?>
<?php require_once('Connections/conexion.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "_adm/fLoginClientes.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO carrito (sesion, codigo_producto_fk, cantidad, precio, fecha) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtSesion'], "text"),
                       GetSQLValueString($_POST['txtCodigo'], "int"),
                       GetSQLValueString($_POST['txtCantidad'], "int"),
                       GetSQLValueString($_POST['txtPrecio'], "double"),
                       GetSQLValueString($_POST['txtInicio'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "carrito.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conexion, $conexion);
$query_rsCompras = "SELECT * FROM productos ORDER BY nombre ASC";
$rsCompras = mysql_query($query_rsCompras, $conexion) or die(mysql_error());
$row_rsCompras = mysql_fetch_assoc($rsCompras);
$totalRows_rsCompras = mysql_num_rows($rsCompras);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
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
.Estilo3 {font-size: 14px; color: #FFFFFF; }
.Estilo4 {
	color: #FFFFFF;
	font-size: 12px;
}
.Estilo5 {color: #FFFFFF}
-->
</style>
</head>
<body bgcolor="#C0DFFD">
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
    <td width="305" colspan="2" valign="top"><img src="imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;
	<?php do { ?>
	  <table width="307" border="0" bgcolor="#3366CC">
          <tr>
            <td width="143" rowspan="6"><div align="center"><img src="<?php echo $row_rsCompras['foto']; ?>" width="119" height="127" /></div></td>
            <td width="148"><span class="Estilo3"><?php echo $row_rsCompras['nombre']; ?></span></td>
          </tr>
          <tr>
            <td><span class="Estilo3"><?php echo $row_rsCompras['precio']; ?></span></td>
          </tr>
          <tr>
            <td><span class="Estilo3"><?php echo $row_rsCompras['descripcion']; ?></span></td>
          </tr>
          <tr>
            <td><form action="<?php echo $editFormAction; ?>" method="POST" name="form1" class="Estilo3" id="form1" onsubmit="validarCan(); 
return document.bandera;">
                <label>Cantidad
                <input name="txtCantidad" type="text" id="txtCantidad" size="2" maxlength="4" />
                <br />
                <input name="Submit" type="submit" onclick="validarCan(); 
return document.bandera;" value="Comprar" />
                </label>
                          <input name="txtSesion" type="hidden" id="txtSesion" value="<?php echo $_SESSION['ncar'];?>" />
                                  <input name="txtCodigo" type="hidden" id="txtCodigo" value="<?php echo $row_rsCompras['codigo_producto']; ?>" />
                                  <input name="txtPrecio" type="hidden" id="txtPrecio" value="<?php echo $row_rsCompras['precio']; ?>" />
                                  <input type="hidden" name="MM_insert" value="form1">
                                  <input name="txtInicio" type="hidden" id="txtInicio" value="<?php echo $_SESSION['inicio']; ?>" />
            </form></td>
          </tr>
          <tr>
            <td><a href="detalleventas.php?codigo=<?php echo $row_rsCompras['codigo_producto']; ?>">Ver Detalles</a> </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
	  <?php } while ($row_rsCompras = mysql_fetch_assoc($rsCompras)); ?><br />	<br />	  </td>
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
