<?php
session_start();
include "connect.php";
$name = $_SESSION['zbon_name']; 
$fatora_no = $_SESSION['fatora_no'] ;

$select = mysql_query("update cus_order set sw = '1' where fatora_no = '$fatora_no'");
if($select){
     unset($_SESSION['zbon_name']);
     unset($_SESSION['fatora_no']);
     unset($_SESSION['sno']);
     unset($_SESSION['odate']);
     unset($_SESSION['optype']);
     unset($_SESSION['oitem']);
     unset($_SESSION['fatora_number']);
     unset($_SESSION['mjmoo']);
     unset($_SESSION['price']);
     unset($_SESSION['oqty']);
    
}

?>