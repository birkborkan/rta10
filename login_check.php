<?php
session_start();
if(!isset($_SESSION['seuser']) && !isset($_SESSION['sepass'])){
header("location:logout.html");
exit();
}
?>