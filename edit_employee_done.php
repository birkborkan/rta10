<?php
 include "connect.php";
   
 $e_name=$_POST['ename'];
 $e_phone=$_POST['ephone'];
 $e_job=$_POST['ejob'];
 $e_sal=$_POST['esal'];
 $e_id=$_POST['post_id'];
 
 if($e_name){

     $update = mysql_query("update emp set 
     
     ename='$e_name',
     ephone = '$e_phone',
     ejob = '$e_job',
     esal = '$e_sal'
   
     where eid = '$e_id'") ;
     if($update){
         echo "done";
     }
 }
   
?>