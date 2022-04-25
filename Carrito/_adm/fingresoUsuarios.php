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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuarios (login, nombre, apellido, clave, perfil) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtLogin'], "text"),
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtApellido'], "text"),
                       GetSQLValueString($_POST['txtClave'], "text"),
                       GetSQLValueString($_POST['jcbPerfil'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "fusuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Registrarse</title>
<link rel="shortcut icon" type="image/x-icon" href="../imagenes/market.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../imagenes/mm_travel2.css" type="text/css" />
<script language="javascript">
function validarCampos() {
if(document.form1.txtLogin.value == "") {
document.bandera=false;
alert("ingrese el Nombre de usuario");
document.form1.txtLogin.focus();
}else if(document.form1.txtNombre.value == ""){ 
document.bandera=false;
alert("ingrese su Nombre");
document.form1.txtNombre.focus()
}else if(document.form1.txtApellido.value == ""){ 
document.bandera=false;
alert("ingrese su Apellido");
document.form1.txtApellido.focus()
}else if(document.form1.txtClave.value == ""){ 
document.bandera=false;
alert("ingrese su clave personal");
document.form1.txtClave.focus()
}else if(document.form1.jcbPerfil.value == null || document.form1.jcbPerfil.value=="" ){ 
document.bandera=false;
alert("Escoja un perfil de usuario");
document.form1.jcbPerfil.focus()
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
.Estilo1 {font-size: 14px}
.Estilo2 {color: #FFFFFF}
.Estilo3 {color: #FFFFFF;
	font-size: 12px;
}
-->
</style>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td width="382" colspan="3" rowspan="2"><img src="../imagenes/mm_travel_photo.png" width="382" height="127" /></td>
    <td width="378" height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">THURSDAYS.COM</td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO </td>
	<td width="100%"><div align="right"><span class="Estilo3">Conectado como: </span>
          <table width="208" border="0">
            <tr>
              <td width="202"><div align="right" class="Estilo4"><span class="Estilo1"><?php echo $idUsuario; ?></div></td>
            </tr>
          </table>
	  </div>
    <p align="right"><a href="cerrar_sesion.php">Cerrar Sesi&oacute;n</a></a></p></td>
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
          <td width="165">&nbsp;</td>
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
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="165">&nbsp;</td>
        </tr>
      </table>
<br /> 	</td>
    <td width="50"><img src="../imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><p>&nbsp;</p>
      <p align="center" class="Estilo1">Registrar nuevo usuario </p>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onsubmit="validarCampos();
return document.bandera;">
        <table width="338" border="0" bgcolor="#3366CC">
          <tr>
            <td width="92"><div align="right" class="Estilo2">LOGIN:</div></td>
            <td width="230"><label>
              <input name="txtLogin" type="text" id="txtLogin" maxlength="20" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right" class="Estilo2">NOMBRE:</div></td>
            <td><label>
              <input name="txtNombre" type="text" id="txtNombre" maxlength="20" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right" class="Estilo2">APELLIDO:</div></td>
            <td><label>
              <input name="txtApellido" type="text" id="txtApellido" maxlength="20" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right" class="Estilo2">CLAVE:</div></td>
            <td><label>
              <input name="txtClave" type="password" id="txtClave" maxlength="10" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right" class="Estilo2">PERFIL:</div></td>
            <td><label>
              <select name="jcbPerfil" id="jcbPerfil">
                <option>Administrador</option>
                <option>Secretario</option>
                <option>Asistente</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td><label>
              <div align="center">
                <input type="submit" name="Submit" value="Registrarse" />
              </div>
            </label></td>
            <td><label>
              <div align="center">
                <input name="Submit2" type="button" onclick="location.href:'../index.html';" value="Cancelar" />
              </div>
            </label></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
    </form>      <p>&nbsp;</p></td>
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
			<p align="center"><img src="../imagenes/mm_travel_photo1.png" width="110" height="110" /><br />
			  Tu tienda favorita			</p>

			<p align="center"><img src="../imagenes/mm_travel_photo2.jpg" alt="Image 2" width="110" height="110" vspace="6" border="0" /><br />
  Pasillo de Alimentos			<br />			
  </p></td>
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
