<?php require_once('../Connections/conexion.php'); ?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
  $_SESSION['inicio'] = date('Y-n-d H:i:s');
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUsuario'])) {
  $loginUsername=$_POST['txtUsuario'];
  $Clave=$_POST['txtClave'];
  $password=md5($Clave);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "../compras.php";
  $MM_redirectLoginFailed = "fLoginClientesMal.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion, $conexion);
  
  $LoginRS__query=sprintf("SELECT CED_CLI, CLA_CLI FROM clientes WHERE CED_CLI='%s' AND CLA_CLI='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Login</title>
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
.Estilo1 {font-size: 14px}
.Estilo3 {font-size: 12px; color: #FFFFFF; }
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
          <td width="165"><a href="../index.html" class="navText">Inicio</a></td>
        </tr>
        <tr>
          <td><a href="_adm/fLoginClientes.php" class="navText">Compras On-Line </a></td>
        </tr>
        <tr>
          <td><a href="_adm/fusuarios.php">Administrar</a></td>
        </tr>
        <tr>
          <td><a href="productosTodos.php" class="navText">Productos</a></td>
        </tr>
        <tr>
          <td width="165">&nbsp;</td>
        </tr>
      </table>
<br /> 	</td>
    <td width="50"><img src="../imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><div align="justify">
      <p><img src="../imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
        &nbsp;</p>
        <table width="312" border="0">
        <tr>
          <td width="306"><div align="right"><img src="../imagenes/btn_Compra_Oline.png" width="174" height="65" /></div></td>
        </tr>
      </table>
      <p><br />
  &nbsp;
        <span class="Estilo1">Bienvenido a la compra on-line, para disfrutar de este servicio debe inciar sesi&oacute;n o registrarse. </span></p>
      <p class="Estilo1">A traves de esta opci&oacute;n acceder&aacute; al formulario para convertirse en cliente del Supermercado. </p>
    </div>
      <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
	  <table width="336" height="118" border="0" bgcolor="#3366CC">
        <tr>
          <td height="31"><div align="left" class="Estilo3">Usuario </div></td>
          <td><label>
            <input name="txtUsuario" type="text" id="txtUsuario" />
            </label></td>
          <td rowspan="3"><img src="../imagenes/Login_Key.png" width="110" height="110" /></td>
        </tr>
        <tr>
          <td height="39"><div align="left" class="Estilo3">Clave            </div></td>
          <td align="center" valign="middle"><input name="txtClave" type="password" id="txtClave" />
            <label>
            <div align="left"></div>
            </label></td>
          </tr>
        <tr>
          <td height="28">&nbsp;</td>
          <td><label>
            <input name="Submit" type="submit" value="Ingresar" />
          </label>
            <label>
            <input name="Submit2" type="button" onclick="location.href='index.html';" value="Cancelar" />
            </label></td>
          </tr>
      </table>
      </form>
	  <table width="337" height="21" border="0">
        <tr>
          <td width="331"><div align="right">No tienes Cuenta <a href="IngresoClientes.php">Registrate</a> </div></td>
        </tr>
      </table>
    <br />	<br />	  </td>
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
  </p>
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
