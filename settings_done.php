<?php
session_start();
include "connect.php";

  $cur_pass=$_POST['curpass'];
  $new_pass1=$_POST['newpass1'];
  $new_pass2=$_POST['newpass2'];
  $uid=$_SESSION['uid'];
  $uname=$_SESSION['uname'];
 
  if($cur_pass)
  { 
    $select  = mysql_query("select upass from login where uid = '$uid' and upass = '$cur_pass'");
    if(mysql_num_rows($select)> 0){
        $update  = mysql_query("update login set
        upass = '$new_pass1'
         where uid = '$uid' 
        ") or die(mysql_error());
        if($update){
            echo "done";
        }
    }else{
        echo "done_0";        
    }   
      

   }
?>