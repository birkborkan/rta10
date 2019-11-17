<?php
 include "connect.php";
   
 $r_name=$_POST['rname'];
 $c_no=$_POST['cno'];
 $d_name=$_POST['dname'];
 $p_name=$_POST['pname'];
 $p_qty=$_POST['pqty'];
 $b_cost=$_POST['bcost'];
 $d_cost=$_POST['dcost'];
 $l_cost=$_POST['lcost'];
 $mani=$_POST['manifist'];
 $l_date=$_POST['ldate'];
 $comm=$_POST['comm'];
 $e_id=$_POST['eid'];
 
if($r_name){
    $v_item=mysql_query("select * from store where sname like '$p_name'");
         $sres=mysql_fetch_array($v_item);
       $s_type=$sres['stype'];
       $t_cost=$b_cost+$d_cost+$l_cost+$mani;
     $update = mysql_query("update store_exp set 
       rname='$r_name',
       cno='$c_no',
       dname='$d_name',
       pname='$p_name',
       pqty='$p_qty',
       ptype='$s_type',
        bcost='$b_cost',
        dcost='$d_cost',
        lcost='$l_cost',
        manifist='$mani',
        tcost='$t_cost',
        ldate='$l_date',
        comm='$comm'
     where eid = '$e_id'") ;
     if($update){
         echo "done";
     }
     
 }
   
?>