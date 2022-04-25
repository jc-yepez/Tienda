<?php require_once('Connections/conexion.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsProductosPaginado = 10;
$pageNum_rsProductosPaginado = 0;
if (isset($_GET['pageNum_rsProductosPaginado'])) {
  $pageNum_rsProductosPaginado = $_GET['pageNum_rsProductosPaginado'];
}
$startRow_rsProductosPaginado = $pageNum_rsProductosPaginado * $maxRows_rsProductosPaginado;

mysql_select_db($database_conexion, $conexion);
$query_rsProductosPaginado = "SELECT * FROM productos ORDER BY nombre ASC";
$query_limit_rsProductosPaginado = sprintf("%s LIMIT %d, %d", $query_rsProductosPaginado, $startRow_rsProductosPaginado, $maxRows_rsProductosPaginado);
$rsProductosPaginado = mysql_query($query_limit_rsProductosPaginado, $conexion) or die(mysql_error());
$row_rsProductosPaginado = mysql_fetch_assoc($rsProductosPaginado);

if (isset($_GET['totalRows_rsProductosPaginado'])) {
  $totalRows_rsProductosPaginado = $_GET['totalRows_rsProductosPaginado'];
} else {
  $all_rsProductosPaginado = mysql_query($query_rsProductosPaginado);
  $totalRows_rsProductosPaginado = mysql_num_rows($all_rsProductosPaginado);
}
$totalPages_rsProductosPaginado = ceil($totalRows_rsProductosPaginado/$maxRows_rsProductosPaginado)-1;

$queryString_rsProductosPaginado = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsProductosPaginado") == false && 
        stristr($param, "totalRows_rsProductosPaginado") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsProductosPaginado = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsProductosPaginado = sprintf("&totalRows_rsProductosPaginado=%d%s", $totalRows_rsProductosPaginado, $queryString_rsProductosPaginado);
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
          <td class="pageName">&nbsp;</td>
		</tr>

		<tr>
          <td class="bodyText"><table width="738" border="1">
            <tr>
              <td width="195">codigo</td>
              <td width="150">nombre</td>
              <td width="144">precio</td>
              <td width="170">descripcion</td>
              <td width="45">foto</td>
            </tr>
            <?php do { ?>
              <tr>
                <td><?php echo $row_rsProductosPaginado['codigo_producto']; ?></td>
                <td><?php echo $row_rsProductosPaginado['nombre']; ?></td>
                <td><?php echo $row_rsProductosPaginado['precio']; ?></td>
                <td><?php echo $row_rsProductosPaginado['descripcion']; ?></td>
                <td><img src="<?php echo "/imagenes/".$row_rsProductosPaginado['foto']; ?>" alt="no hay foto" width="100" height="100" /></td>
              </tr>
              <?php } while ($row_rsProductosPaginado = mysql_fetch_assoc($rsProductosPaginado)); ?>
          </table>            <p>&nbsp;</p>

		</td>
        </tr>
      </table>
	 <br />
	&nbsp;<br />
    <table border="0" width="50%" align="center">
      <tr>
        <td width="23%" align="center"><?php if ($pageNum_rsProductosPaginado > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_rsProductosPaginado=%d%s", $currentPage, 0, $queryString_rsProductosPaginado); ?>">Primero</a>
            <?php } // Show if not first page ?>
        </td>
        <td width="31%" align="center"><?php if ($pageNum_rsProductosPaginado > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_rsProductosPaginado=%d%s", $currentPage, max(0, $pageNum_rsProductosPaginado - 1), $queryString_rsProductosPaginado); ?>">Anterior</a>
            <?php } // Show if not first page ?>
        </td>
        <td width="23%" align="center"><?php if ($pageNum_rsProductosPaginado < $totalPages_rsProductosPaginado) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_rsProductosPaginado=%d%s", $currentPage, min($totalPages_rsProductosPaginado, $pageNum_rsProductosPaginado + 1), $queryString_rsProductosPaginado); ?>">Siguiente</a>
            <?php } // Show if not last page ?>
        </td>
        <td width="23%" align="center"><?php if ($pageNum_rsProductosPaginado < $totalPages_rsProductosPaginado) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_rsProductosPaginado=%d%s", $currentPage, $totalPages_rsProductosPaginado, $queryString_rsProductosPaginado); ?>">&Uacute;ltimo</a>
            <?php } // Show if not last page ?>
        </td>
      </tr>
    </table>
Registros <?php echo ($startRow_rsProductosPaginado + 1) ?> a <?php echo min($startRow_rsProductosPaginado + $maxRows_rsProductosPaginado, $totalRows_rsProductosPaginado) ?> de <?php echo $totalRows_rsProductosPaginado ?> </td>
    <td width="50"><img src="imagenes/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
        <td width="190" valign="top"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190" id="leftcol">

	   <tr>
       <td width="10"><img src="imagenes/mm_spacer.gif" alt="" width="10" height="1" border="0" /></td>
		<td width="170" class="smallText"><br />
			<p>&nbsp;</p>

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
mysql_free_result($rsProductosPaginado);
?>
