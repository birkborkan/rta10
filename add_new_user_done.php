<?php
include "connect.php";
   
  $u_fname=$_POST['ufname'];
  $u_name=$_POST['uname'];
  $u_pass=$_POST['upass'];
  $u_per=$_POST['uper'];
  $u_status=$_POST['ustatus'];
  if($u_fname)
  { 
    $select  = mysql_query("select * from login where uname = '$u_name' ");
    if(mysql_num_rows($select)> 0){
             echo "found";
    }else{
      $insert=mysql_query("insert into login (ufname,uname,upass,uper,ustatus)
          values
       ('$u_fname','$u_name','$u_pass',$u_per,'$u_status')") or die("خطا في ادخال");
      if($insert){
        echo"done";
      }            
    }   
      

   }
?>