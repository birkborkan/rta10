<?php
ob_start();
session_start();
        include"connect.php";
//$uname_ = $_GET['username'];
//$upass_ = $_GET['password'];
$uname_= preg_replace("/[^a-zA-Z0-9]/", "", $_GET['username']);
$upass_= preg_replace("/[^a-zA-Z0-9]/", "", $_GET['password']);
if( $uname_ )
{
        $q=mysql_query("select * from login where uname='$uname_' && upass='$upass_'",$conn );
        $row=mysql_fetch_array($q);
        if(mysql_num_rows($q)!=0)
        {
            $u_status=intval($row['ustatus']);
            if($u_status == 1){  
            $_SESSION['seuser']=$uname_;    
            $_SESSION['sepass']=$upass_;
            $_SESSION['sefname']=$row['ufname'];
            $_SESSION['seper']=intval($row['uper']);
            $_SESSION['sest']=intval(1);
              echo "login_ok";}
         else{
             echo "login_0";}   
         }
         else{
            echo "login_no";}
}
ob_end_flush();
?>