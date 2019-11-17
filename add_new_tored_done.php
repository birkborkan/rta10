<?php
include "connect.php";
   
  $t_amount=$_POST['tamount'];
  $t_comm=$_POST['tcomm'];
  $t_date=$_POST['tdate'];

  if($t_amount)
  { 
    $select  = mysql_query("select * from tored where t_amount = '$t_amount' and t_comm ='$t_comm' and t_date ='$t_date'  ");
    if(mysql_num_rows($select)> 0){
             echo "found";
    }else{
      $insert=mysql_query("insert into tored (t_amount,t_comm,t_date)
          values
       ('$t_amount','$t_comm','$t_date')") or die("خطا في ادخال");
      if($insert){
        echo"done";
      }            
    }   
      

   }
?>