<?php
include"connect.php";
     mysql_query("delete from emp where eid='".$_GET['del_id']."' ");
     header("location:employees_insert.php");
       
?>
