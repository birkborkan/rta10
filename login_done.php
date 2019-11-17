<?php
session_start();
include "connect.php";
//$username = $_POST['username'];
//$password =  $_POST['password'];
$username= preg_replace("/[^a-zA-Z0-9]/", "", $_POST['username']);
$password= preg_replace("/[^a-zA-Z0-9]/", "",$_POST['password']);
if(!empty($username) and !empty($password)){
 $select = mysql_query("select * from login where uname='$username' and upass='$password' ") ;
    if(mysql_num_rows($select) > 0){
        while ($rows = mysql_fetch_array($select)){
        $uid2 = $rows['uid'];
        $uname2 = $rows['uname'];
        $ufull_name = $rows['ufname'];
        $upass2 = $rows['upass'];
        $ufname2 = $rows['ufname'];
        $per_level = $rows['uper'];
        $ustatus2 = $rows['ustatus'];
      

        }   //  substr($str,0,strpos($str," ");
                if($uname2 == $username && $upass2 == $password){
                    if($ustatus2 == "1"){
                        $_SESSION['uid'] = $uid2;
                        $_SESSION['uname'] = $uname2;
                        $_SESSION['ufull_name'] = $ufull_name;
                        $_SESSION['ufname'] = substr($ufname2,0,strpos($ufname2," "));
                        $_SESSION['uper'] = $per_level;
                        $_SESSION['global_admin'] = "global_admin";
                        echo "done_ok";
                    } else{
                    
                        echo "done_no";
                    }
                }

    }
    else{
        echo "not_found";
    }
}



?>