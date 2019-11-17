<?php
include "connect.php";
$delete_id = $_POST['del_id'];
$table_id = $_POST['table_id'];
$table_name = $_POST['table_name'];
$delete = 1;

if($table_name == "store")
    {
        $ck_store = mysql_query("select * from store where sno = '$delete_id' and sqty > 0 ");
        $ck_exp = mysql_query("select * from store_exp where sid='$delete_id' ");
        $ck_imp = mysql_query("select * from store_imp where sid='$delete_id' ");
        $str = mysql_num_rows($ck_store);
        $exp = mysql_num_rows($ck_exp);
        $imp = mysql_num_rows($ck_imp); 
    if($str > 0 || $exp > 0 || $imp > 0){
        $delete = 0;

       }
    } else if($table_name == "store_exp")
    {
        $ck_exp = mysql_query("select * from store_exp where eid='$delete_id' and arrive = 1 ");
        $exp = mysql_num_rows($ck_exp);
       if($exp > 0){
        $delete = 0;

        }
    }
  
if($delete == 1)
{    
    $del_row = "delete from ".$table_name. ' where ' . $table_id . ' = ' . $delete_id;
    if($delete_id){
    
        $del = mysql_query($del_row);
        if($del){
            echo "done";
        }
    }   
}else
{
    echo "delete_0";
}
?>