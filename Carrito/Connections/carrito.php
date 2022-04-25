<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_carrito = "localhost";
$database_carrito = "carrito";
$username_carrito = "root";
$password_carrito = "";
$carrito = mysql_pconnect($hostname_carrito, $username_carrito, $password_carrito) or trigger_error(mysql_error(),E_USER_ERROR); 
?>