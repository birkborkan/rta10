<?php
include "connect.php";
$rec_no = $_POST['rec_no'];
$rec_qty = $_POST['rec_qty'];
$pro_id = $_POST['product_id'];
$rec_mony = $_POST['rec_mony'];

if($rec_no)
    { 
          $select_fno= mysql_query("select * from cus_order where oid='$rec_no'");
        $fno_row=mysql_fetch_array($select_fno);
        $f_no=$fno_row['fatora_no'];
        $f_mo=$fno_row['mjmoo'];
        $del_fatora = mysql_query("delete  from cus_order where oid = '$rec_no' ") or die("خطا في الحذف");
        if($del_fatora)
        {  
         echo $f_no;
         echo "------".$f_mo;

         
         
             $up_fatora= mysql_query("update cus_order_money  
            set  custom_money= custom_money - '$rec_mony'
           where custom_fatora_no='$f_no' ")or die(mysql_error());
            $up_store= mysql_query("update store  
            set  sqty= sqty+'$rec_qty'
           where sno='$pro_id' ")or die("خطا في ارجاع الكمية");
           if($up_store)
           {
            echo "done";  
           }
       }
    
}else
{
    echo "delete_0";
}
?>