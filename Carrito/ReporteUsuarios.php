<?php require_once('Connections/carrito.php'); ?>
<?php require_once('reporte/dompdf/dompdf_config.inc.php');?>
<?php
mysql_select_db($database_carrito, $carrito);
$query_rsUsuario = "SELECT login, nombre, clave, perfil FROM usuarios";
$rsUsuario = mysql_query($query_rsUsuario, $carrito) or die(mysql_error());
$row_rsUsuario = mysql_fetch_assoc($rsUsuario);
$totalRows_rsUsuario = mysql_num_rows($rsUsuario);

$codigoHTML.='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>';
 $codigoHTML.='
<body>
<table width="200" border="1">
  <tr>
    <td>Usuario</td>
    <td>Nombre</td>
    <td>Clave</td>
    <td>Login</td>
  </tr>';
  
   do {
        $codigoHTML.='
    <tr>
      <td>'. $row_rsUsuario['login'].'</td>
      <td>'.$row_rsUsuario['nombre'].'</td>
      <td>'.$row_rsUsuario['clave'].'</td>
      <td>'.$row_rsUsuario['perfil'].'</td>
    </tr>';
    } while ($row_rsUsuario = mysql_fetch_assoc($rsUsuario));
	$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_decode($codigoHTML);
$pdf=new DOMPDF();
$pdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$pdf->render();
$pdf->stream("REPORTE_FACTURA.pdf");
?>
  
<?php
mysql_free_result($rsUsuario);
?>
