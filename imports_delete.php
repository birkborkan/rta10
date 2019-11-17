<?php
include"connect.php";
     mysql_query("delete from store_imp where did='".$_GET['del_id']."' ");
     header("location:imports_select.php");
       
?>