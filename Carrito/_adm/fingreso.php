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
  $insertSQL = sprintf("INSERT INTO productos (nombre, precio, descripcion, foto) VALUES (%s, %s, %s, 'fotosProductos/".$nombre_corto."')",
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtPrecio'], "double"),
                       GetSQLValueString($_POST['txtDes'], "text"));
                       copy($nombre_largo,"../fotosProductos/".$nombre_corto);

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "../productos.php";
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
<title>Ingreso Productos</title>
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
<script language="javascript">
function validarN() {
if(document.form1.txtNombre.value == "") {
document.bandera=false;
alert("ingrese el nombre");
document.form1.txtNombre.focus();
} else if(document.form1.txtPrecio.value == ""){ 
document.bandera=false;
alert("ingrese el Precio");
document.form1.txtPrecio.focus()
}else if(document.form1.txtDes.value == ""){ 
document.bandera=false;
alert("ingrese la Descripcion");
document.form1.txtDes.focus()
}else if(document.form1.txtFoto.value == null || document.form1.txtFoto.value=="" ){ 
document.bandera=false;
alert("Eliga una foto");
document.form1.txtFoto.focus()
}else{
document.bandera=true;
}
}
</script>
<script>
function soloNum(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    numero = "0123456789,";
    especiales = [8-7-39-46];
    tecla_especial = false
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
        }
    }

    if(numero.indexOf(tecla) == -1 && !tecla_especial){
        return false;
		}
}
</script>
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
.Estilo3 {font-size: 14px; color: #FFFFFF; }
-->
</style>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
          <td width="165"><a href="../productos.php" class="navText">Productos</a></td>
        </tr>
        <tr>
          <td width="165"><a href="../clientes.php" class="navText">Clientes</a></td>
        </tr>
        <tr>
          <td width="165"><a href="../usuarios.php" class="navText">Usuarios</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">specials</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">contact</a></td>
        </tr>
      </table>
 	</td>
    <td width="50"><img src="../imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><p><img src="../imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
  &nbsp;</p>
      <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="validarN(); 
return document.bandera;">
        <table width="306" height="97" border="0" bgcolor="#3366CC">
          <tr>
            <td><span class="Estilo3">
              <label>              </label>
            </span>              <span class="Estilo2">
            <label></label>
            </span>            <label><div align="right" class="Estilo3">Nombre </div>
            </label></td>
            <td><input name="txtNombre" type="text" id="txtNombre" onfocus="document.form1.txtNombre.style.border = &quot;&quot;;" maxlength="50" /></td>
          </tr>
          <tr>
            <td><span class="Estilo3">
              <label>              </label>
            </span>              <span class="Estilo2">
            <label></label>
            </span>            <label><div align="right" class="Estilo3">Precio</div>
            </label></td>
            <td><input name="txtPrecio" type="text" onkeypress="return soloNum(event)" maxlength="7" /></td>
          </tr>
          <tr>
            <td><span class="Estilo3">
              <label>              </label>
            </span>              <span class="Estilo2">
            <label></label>
            </span>            <label><div align="right" class="Estilo3">Descripcion </div>
            </label></td>
            <td><input name="txtDes" type="text" id="txtDes" onfocus="document.form1.txtDes.style.border = &quot;&quot;;" /></td>
          </tr>
          <tr>
            <td><span class="Estilo3">
              <label>              </label>
            </span>              <span class="Estilo2">
            <label></label>
            </span>            <label><div align="right" class="Estilo3">Foto </div>
            </label></td>
            <td><input name="txtFoto" type="file" id="txtFoto" maxlength="100" /></td>
          </tr>
          <tr>
            <td><div align="center">
              <input type="submit" name="Submit" value="Ingresar" />
            </div></td>
            <td><div align="center">
              <input type="reset" name="Submit2" value="Cancelar" />
            </div></td>
          </tr>
        </table>
        <label></label>
        <p>
              <label></label>
              <label></label>  
          <label></label>
          <label></label>
          <label></label>
          <input type="hidden" name="MM_insert" value="form1">
      </p>
      </form>      <p>	<br />	
        <br />	  
      </p></td>
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
			  Pasillo de Alimentos&nbsp;<br />
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
