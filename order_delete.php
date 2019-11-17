<?php
include"connect.php";
      $sq=mysql_query(" select sno,oqty from cus_order where oid = '".$_GET['del_id']."' ");
            $res=mysql_fetch_assoc($sq);
           $o_qty=$res['oqty'];
           $s_id=$res['sno']; 
        mysql_query("update store set sqty=(sqty+$o_qty) where sno=$s_id");
        mysql_query("delete from cus_order where oid='".$_GET['del_id']."' ");
        header("location:order_insert.php");
       
?>