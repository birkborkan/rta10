<?php
include "connect.php";
$post_id = $_POST['post_id'];
$esal = $_POST['esal'];
$sdate = $_POST['sdate'];
$smonth = $_POST['smonth'];  






if($post_id){
    $update  = mysql_query("update salaries set
    esal = '$esal',
    sdate = '$sdate',
    smonth = '$smonth' where id = '$post_id' 
    ") or die(mysql_error());
    if($update){
        echo "done";
    }
    else{
        echo "no";
    }
}
?>