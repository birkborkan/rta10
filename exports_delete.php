<?php
include"connect.php";
$e_id=$_GET['eid'];

if(isset($e_id)){
     $del_exp=mysql_query("delete from store_exp where eid='".$e_id."' ");
     if($del_exp){
          echo "done";
     }
}
       
?>