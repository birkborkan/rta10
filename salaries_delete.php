<?php
include"connect.php";
 // mysql_query("delete from salaries where sid=".$s_id." ");
     mysql_query("delete from salaries where sid='".$_GET['del_id']."' ");
     header("location:salaries_insert.php");
       
?>