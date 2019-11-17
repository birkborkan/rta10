<?php
include"connect.php";
     mysql_query("delete from login where uid='".$_GET['del_id']."' ");
     header("location:login_insert.php");
       
?>
