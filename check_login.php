<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['uper'])){
session_destroy();
echo "session_destroy"; 
//header("location:login.php");
//exit();
}
?>