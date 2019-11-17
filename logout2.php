<?php
ob_start();
session_start();
if(!isset($_SESSION['seuser']) && !isset($_SESSION['sepass'])){
//header("location:login.php");
//exit();
    echo "logout";
}
else
{
 //session_destroy(); 
//die("<h3> logou is done!! </h3>");
     //header("location:login.php");
     session_destroy();
    echo "sdlogout";
}
ob_end_flush();
?>
