<?php
session_start();
include "connect.php";
$url = $_POST['url'];
$amount = $_POST['amount'];
$name = $_SESSION['zbon_name']; 
$fatora_no = $_SESSION['fatora_no'] ;

if($url){
    $select = mysql_query("select * from store where sno = '$url'");





    if(mysql_num_rows($select)>0){
        $row = mysql_fetch_array($select);

        $sqty = $row['sqty'];
        $sprice = $row['sprice'];
        $stype = $row['stype'];
        $sname = $row['sname'];
        $sno = $row['sno'];

        if($amount > $sqty){
            echo "full";
        }else{
             //	oname  oid ,oitem optype omethod oqty oprice odate sno fatora_no

             $mjmoo =  $amount*$sprice;
             $insert  = mysql_query("insert into 
         cus_order(oname,oitem,optype,oqty,oprice,mjmoo,fatora_no,sno)
            values('$name','$sname','$stype','$amount','$sprice','$mjmoo','$fatora_no','$url') ") or die(mysql_error());
            if($insert){
                $new_qty = $sqty-$amount;
                $update  = mysql_query("update store set sqty = '$new_qty' where sno = '$url'");
                if($update){
                    echo "done";
                }
            }

        }
    }
}

?>