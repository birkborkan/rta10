<?php
include "connect.php";
   
  $e_name=$_POST['ename'];
  $e_phone=$_POST['ephone'];
  $e_job=$_POST['ejob'];
  $e_sal=$_POST['esal'];
  $e_date=$_POST['ehdate'];
  if(empty($e_sal)){
    $e_sal = 0;
  }
 
  if($e_name)
  { 
    $select  = mysql_query("select * from emp where ename = '$e_name' and ephone = '$e_phone'");
    if(mysql_num_rows($select)> 0){
             echo "found";
    }else{
      $insert=mysql_query("insert into emp (ename,ephone,ejob,esal,ehdate)
          values
       ('$e_name','$e_phone','$e_job',$e_sal,'$e_date')") or die("خطا في ادخال");
      if($insert){
        echo"done";
      }            
    }   
      

   }
?>