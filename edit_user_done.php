<?php
include "connect.php";
$post_id = $_POST['post_id'];
$u_fname = $_POST['ufname'];
$u_status = $_POST['ustatus'];
$u_per = $_POST['uper'];  


if($post_id){
    $update  = mysql_query("update login set
    ufname = '$u_fname',
    ustatus = '$u_status',
    uper = '$u_per'
     where uid = '$post_id' 
    ") or die(mysql_error());
    if($update){
        echo "done";
    }
    else{
        echo "no";
    }
}
?>