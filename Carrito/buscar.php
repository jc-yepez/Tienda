<?php require_once('Connections/carrito.php'); ?>
<?php
$colname_rsBuscar = "-1";
if (isset($_POST['txtBuscar'])) {
  $colname_rsBuscar = (get_magic_quotes_gpc()) ? $_POST['txtBuscar'] : addslashes($_POST['txtBuscar']);
}
mysql_select_db($database_carrito, $carrito);
$query_rsBuscar = sprintf("SELECT * FROM productos WHERE codigo_producto = %s", $colname_rsBuscar);
$rsBuscar = mysql_query($query_rsBuscar, $carrito) or die(mysql_error());
$row_rsBuscar = mysql_fetch_assoc($rsBuscar);
$totalRows_rsBuscar = mysql_num_rows($rsBuscar);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Home Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="imagenes/mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
</head>
<body bgcolor="#F4FFE4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td width="382" colspan="3" rowspan="2"><img src="imagenes/mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
    <td width="378" height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">insert website name</td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" colspan="3" id="tagline" valign="top" align="center">OPTIONAL TAGLINE HERE</td>
	<td width="100%">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="imagenes/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#99CC66" background="imagenes/mm_dashed_line.gif"><img src="imagenes/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#99CC66">
  	<td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#99CC66" background="imagenes/mm_dashed_line.gif"><img src="imagenes/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="imagenes/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

 <tr>
    <td width="165" valign="top" bgcolor="#5C743D">
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td width="165">&nbsp;<br />
		 &nbsp;<br /></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">topics</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">guidelines</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">educators</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">special needs</a></td>
        </tr>
        <tr>
          <td width="165"><a href="javascript:;" class="navText">food science</a></td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="305" colspan="2" valign="top"><img src="imagenes/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="0" width="305">
        <tr>
          <td class="pageName">BUSCAR</td>
		</tr>

		<tr>
          <td class="bodyText"><form id="form1" name="form1" method="post" action="">
            <p>
              <label>
              <input name="txtBuscar" type="text" id="txtBuscar" />
              </label>
            </p>
            <p>
              <label>
              <input type="submit" name="Submit" value="Buscar" />
              </label>
              <a href="viaje.php?codigo=<?php echo $row_rsBuscar['codigo_producto']; ?>">RealizarViaje</a></p>
            <table width="200" border="1">
              <tr>
                <td>nombre</td>
                <td><?php echo $row_rsBuscar['nombre']; ?></td>
              </tr>
              <tr>
                <td>precio</td>
                <td><?php echo $row_rsBuscar['precio']; ?></td>
              </tr>
              <tr>
                <td>desc</td>
                <td><?php echo $row_rsBuscar['descripcion']; ?></td>
              </tr>
            </table>
                    </form>            <p>&nbsp;</p>

		</td>
        </tr>
      </table>
	 <br />
	&nbsp;<br />	</td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
        <td width="190" valign="top"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190" id="leftcol">

	   <tr>
       <td width="10"><img src="imagenes/mm_spacer.gif" alt="" width="10" height="1" border="0" /></td>
		<td width="170" class="smallText"><br />
			<p><span class="subHeader">TITLE HERE</span><br />
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

			<p><span class="subHeader">TITLE HERE</span><br />
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

			<p><span class="subHeader">TITLE HERE</span><br />
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

			 <br />
			&nbsp;<br />          </td>
         <td width="10">&nbsp;</td>
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
mysql_free_result($rsBuscar);
?>
