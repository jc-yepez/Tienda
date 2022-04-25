<?php require_once('Connections/conexion.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "Administrador";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "productos.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
mysql_select_db($database_conexion, $conexion);
$query_rsUsuarios = "SELECT * FROM usuarios ORDER BY nombre ASC";
$rsUsuarios = mysql_query($query_rsUsuarios, $conexion) or die(mysql_error());
$row_rsUsuarios = mysql_fetch_assoc($rsUsuarios);
$totalRows_rsUsuarios = mysql_num_rows($rsUsuarios);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Home Page</title>
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
.Estilo1 {color: #FFFFFF;
	font-size: 12px;
}
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
    <td height="64" colspan="3" id="tagline" valign="top" align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO</td>
	<td width="100%"><div align="right"><span class="Estilo1">Conectado como: </span>
          <table width="208" border="0">
            <tr>
              <td width="202"><div align="right" class="Estilo4"><span class="Estilo1"><?php echo $idUsuario; ?></div></td>
            </tr>
          </table>
	  </div>
    <p align="right"><a href="cerrar_sesion.php">Cerrar Sesi&oacute;n</a></a></p></td>
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
          <td><a href="clientes.php" class="navText">Clientes</a></td>
        </tr>
        <tr>
          <td><a href="usuarios.php" target="_blank" class="navText">Usuarios</a></td>
        </tr>
        <tr>
          <td><a href="productos.php" class="navText">Productos</a></td>
        </tr>
        <tr>
          <td width="165">&nbsp;</td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><div align="right"><img src="imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
      &nbsp;<br />
      &nbsp;
      <a href="_adm/fusuarios.php">Nuevo Usuario</a> </div>
      <form id="form1" name="form1" method="post" action="">
	  <table width="200" border="1">
        <tr>
          <td>LOGIN</td>
          <td>NOMBRE</td>
          <td>CLAVE</td>
          <td>PERFIL</td>
        </tr>
        <?php do { ?>
          <tr>
              <td><?php echo $row_rsUsuarios['login']; ?></td>
            <td><?php echo $row_rsUsuarios['nombre']; ?></td>
            <td><?php echo $row_rsUsuarios['clave']; ?></td>
            <td><?php echo $row_rsUsuarios['perfil']; ?></td>
          </tr>
          <?php } while ($row_rsUsuarios = mysql_fetch_assoc($rsUsuarios)); ?>
      </table>
      </form>
	<br />	<br />	  </td>
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
mysql_free_result($rsUsuarios);
?>
