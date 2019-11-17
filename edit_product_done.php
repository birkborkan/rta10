<?php
 include "connect.php";
   
 $s_id=$_POST['sno'];
 $s_name=$_POST['sname'];
 $s_price=$_POST['sprice'];
 $s_type=$_POST['stype'];
 $s_date=$_POST['sdate'];

 
 if($s_name){

     $update = mysql_query("update store set 
     
     sname='$s_name',
     sprice = '$s_price',
     stype = '$s_type',
     sdate = '$s_date'
   
     where sno = '$s_id'") ;
     if($update){
         echo "done";
     }
 }
   
?>