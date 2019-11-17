<?php
include "connect.php";
$post_id = $_POST['post_id'];
$t_amount = $_POST['tamount'];
$t_comm = $_POST['tcomm'];
$t_date = $_POST['tdate'];  


if($post_id){
    $update  = mysql_query("update tored set
    t_amount = '$t_amount',
    t_comm = '$t_comm',
    t_date = '$t_date'
     where t_id = '$post_id' 
    ") or die(mysql_error());
    if($update){
        echo "done";
    }
    else{
        echo "no";
    }
}
?>