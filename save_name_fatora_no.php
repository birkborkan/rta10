<?php
session_start();
$name = $_POST['name'];
$ran = "RT1330".rand(000000,99999);
 $_SESSION['zbon_name'] = $name;
$_SESSION['fatora_no'] = $ran;


?>