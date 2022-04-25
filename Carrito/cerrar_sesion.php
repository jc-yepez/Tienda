<?php 
session_start();
unset($_SESSION['ncar']);
session_destroy();
header("Location: index.html");
?>
