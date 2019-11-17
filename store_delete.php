<?php
include"connect.php";
 //mysql_query("delete from store where  sno='".$gid."'  ");
     mysql_query("delete from store where  sno='".$_GET['del_id']."' ");
     header("location:store_update.php");
       
?>