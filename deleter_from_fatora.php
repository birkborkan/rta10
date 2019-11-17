<?php
include "connect.php";
$oid = $_POST['oid'];
$oqty = $_POST['oqty'];
$sno = $_POST['sno'];





if($oid){
    $select   =  mysql_query("select sqty from store where sno = '$sno'");
    $row = mysql_fetch_array($select);
    $sqty = $row['sqty'];
    $restore_qty = $sqty+$oqty;
    $update = mysql_query("update store set sqty='$restore_qty' where sno =  '$sno'");
    if($update){
        $delete = mysql_query("delete from cus_order where oid = '$oid'");
        if($delete){
            echo "done";
        }
    }
}

?>