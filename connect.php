<?php


require "config.php";

try{

$db = new PDO("mysql:host=$host;dbname=$name", $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e->getMessage();

}



?>