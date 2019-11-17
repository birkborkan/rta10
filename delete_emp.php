<?php
include "connect.php";
$delete_id = $_POST['del_id'];
$table_id = $_POST['table_id'];
$table_name = $_POST['table_name'];

$del_row = "delete from ".$table_name. ' where ' . $table_id . ' = ' . $delete_id;
if($delete_id){

    $del = mysql_query($del_row);
    if($del){
        echo "done";
    }
}

?>