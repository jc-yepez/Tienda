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
$nombre_corto=$_FILES['txtFoto']['name'];
$nombre_largo=$_FILES['txtFoto']['tmp_name'];
$nombre_corto=str_replace(" ","_",$nombre_corto);
$Clave= $_POST['txtClave'];
$passenc=md5($Clave);
$nomCedu= $_POST['txtCedula'];
 copy($nombre_largo,"../fotosClientes/".$nombre_corto);
rename("../fotosClientes/".$nombre_corto,"../fotosClientes/".$nomCedu.".jpg");
  $insertSQL = sprintf("INSERT INTO clientes (CED_CLI, NOM_CLI, APE_CLI, DIR_CLI, EMAIL_CLI, TEL_CLI, IMA_CLI, PAIS_CLI, SEXO_CLI, CLA_CLI) VALUES (%s, %s, %s, %s, %s, %s, 'fotosClientes/".$nomCedu.".jpg', %s, %s, '".$passenc."')",
                       GetSQLValueString($_POST['txtCedula'], "text"),
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtApellido'], "text"),
                       GetSQLValueString($_POST['txtDireccion'], "text"),
                       GetSQLValueString($_POST['txtEmail'], "text"),
                       GetSQLValueString($_POST['txtTelefono'], "text"),
                       GetSQLValueString($_POST['jcbPais'], "text"),
                       GetSQLValueString($_POST['select'], "text"));
                       //GetSQLValueString($_POST['txtClave'], "text"));
					   
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "fLoginClientes.php";
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
<title>Ingreso Clientes</title>
<link href="../imagenes/market.ico" rel="shortcut icon" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../imagenes/mm_travel2.css" type="text/css" />

<script language="javascript">
function validarCedula( form1 )
{
  var cedula = document.form1.txtCedula.value;
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      return true;
	  document.bandera=true;
    }
    else
    {
      alert( "Ingrese una cedula valida" );
	  document.bandera=false;
	  document.getElementById("txtCedula").value = "";
	  document.form1.txtCedula.focus();
      return false;
    }
  }
  else
  {
    alert("La cedula no puede tener menos de 10 digitos");
    return false;
  }
}
</script>

<script language="javascript">
function validarCampos() {
if(document.form1.txtCedula.value == "") {
document.bandera=false;
alert("ingrese la Cedula");
document.form1.txtCedula.focus();
}else if(document.form1.txtNombre.value == ""){ 
document.bandera=false;
alert("ingrese el Nombre");
document.form1.txtNombre.focus()
}else if(document.form1.txtApellido.value == ""){ 
document.bandera=false;
alert("ingrese el Apellido");
document.form1.txtApellido.focus()
}else if(document.form1.txtDireccion.value == ""){ 
document.bandera=false;
alert("ingrese la Direccion");
document.form1.txtDireccion.focus()
}else if(document.form1.txtEmail.value == "") {
document.bandera=false;
alert("ingrese el email");
document.form1.txtEmail.focus();
}else if(document.form1.txtTelefono.value == ""){ 
document.bandera=false;
alert("ingrese el Telefono");
document.form1.txtTelefono.focus()
}else if(document.form1.txtFoto.value == null || document.form1.txtFoto.value=="" ){ 
document.bandera=false;
alert("Eliga una foto");
document.form1.txtFoto.focus()
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
.Estilo5 {font-size: 14px; color: #000000; }
.Estilo1 {font-size: 14px}
.Estilo6 {color: #FFFFFF}
.Estilo7 {color: #FFFFFF;
	font-size: 12px;
}
-->
</style>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#3366CC">
    <td width="382" colspan="3" rowspan="2"><img src="../imagenes/mm_travel_photo.png" width="382" height="127" /></td>
    <td width="378" height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">THURSDAYS.COM</td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center">LA MEJOR TIENDA ON-LINE DEL MUNDO </td>
	<td width="100%"><div align="right"><span class="Estilo7">Conectado como: </span>
	    <table width="208" border="0">
	      <tr>
	        <td width="202"><div align="right" class="Estilo4"><span class="Estilo1"><?php echo $idUsuario; ?></div></td>
          </tr>
                    </table>
    </div>	  <p align="right"><a href="cerrar_sesion.php">Cerrar Sesi&oacute;n</a></a></p></td>
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
          <td width="165"><a href="../productos.php" class="navText">Productos</a></td>
        </tr>
        <tr>
          <td width="165"><a href="fingreso.php" class="navText">Ingreso Producos </a></td>
        </tr>
        <tr>
          <td width="165"><a href="../clientes.php" class="navText">Clientes</a></td>
        </tr>
        <tr>
          <td width="165"><a href="../usuarios.php" class="navText">Usuarios</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">contact</a></td>
        </tr>
      </table>
 	  	 </td>
    <td width="50"><img src="../imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><div align="right"><img src="../imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
      &nbsp;<br />
      <img src="../imagenes/registrar.png" width="174" height="65" />&nbsp;
    </div>
      <p align="justify"><span class="Estilo1">Registrate para formar parte de la tienda m&aacute;s grande a nivel mundial. </span></p>
	  <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="validarCampos();
validarCedula();
return document.bandera;">
	  <table width="306" border="0" bgcolor="#3366CC">
        <tr>
          <td width="88"><div align="right" class="Estilo3">
            <div align="right">CEDULA:</div>
          </div></td>
          <td width="207"><span class="Estilo5">
            <label>
              <input name="txtCedula" type="text" id="txtCedula" maxlength="10" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">
            <div align="right">NOMBRE:</div>
          </div></td>
          <td><span class="Estilo5">
            <label>
              <input name="txtNombre" type="text" id="txtNombre" maxlength="20" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">
            <div align="right">APELLIDO:</div>
          </div></td>
          <td><span class="Estilo5">
            <label>
              <input name="txtApellido" type="text" id="txtApellido" maxlength="20" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">
            <div align="right">DIRECCION:</div>
          </div></td>
          <td><span class="Estilo5">
            <label>
              <input name="txtDireccion" type="text" id="txtDireccion" maxlength="50" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">
            <div align="right">EMAIL:</div>
          </div></td>
          <td><span class="Estilo5">
            <label>
              <input name="txtEmail" type="text" id="txtEmail" maxlength="50" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><div align="right" class="Estilo3">
            <div align="right">TELEFONO:</div>
          </div></td>
          <td><span class="Estilo5">
            <label>
              <input name="txtTelefono" type="text" id="txtTelefono" maxlength="10" />
              </label>
          </span></td>
        </tr>
        <tr>
          <td><span class="Estilo3"><label></label>
            <div align="right">PAIS:</div>
            </span></td>
          <td><span class="Estilo5"><span class="Estilo5">
            </label>
            <label>
            <div align="left">
              <select name="jcbPais" id="jcbPais">
                <option>ECUADOR</option>
                <option>COLOMBIA</option>
                <option>PERU</option>
              </select>
            </div>
            </span></td>
        </tr>
        <tr>
          <td><div align="right"><span class="Estilo6">SEXO:</span></div></td>
          <td><label>
            <select name="select">
              <option>MASCULINO</option>
              <option>FEMENINO</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td><div align="right"><span class="Estilo6">CLAVE:</span></div></td>
          <td><label>
            <input name="txtClave" type="password" id="txtClave" />
          </label></td>
        </tr>
        <tr>
          <td><div align="right"><span class="Estilo6">IMAGEN:</span></div></td>
          <td><span class="Estilo5">
            <input name="txtFoto" type="file" id="txtFoto" />
          </span></td>
        </tr>
        <tr>
          <td><div align="center">
            <input type="submit" name="Submit" value="Guardar" />
          </div></td>
          <td><div align="center">
            <input name="Submit2" type="reset" onclick="location.href='../clientes.php';" value="Cancelar" />
          </div></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
	  </form>
	  <br />	
	<br />	  </td>
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
