<?php  
session_start();
session_destroy();
session_unset();
unset($_SESSION['Kullanici']);
header("Location:home.php");

?>