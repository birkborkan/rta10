<?php
include "connect.php";
  $r_name= $_POST['rname'];
  $c_no=$_POST['cno'];
  $d_name=$_POST['dname'];
  $p_name=$_POST['pname'];
  $p_qty=$_POST['pqty'];
  $p_type=$_POST['ptype'];
  $b_cost=$_POST['bcost'];
  $d_cost=$_POST['dcost'];
  $l_cost=$_POST['lcost'];
  $mani=$_POST['manifist'];
  $l_date=$_POST['ldate'];
  $comm=$_POST['comm'];
  $o_date=date('y-m-d');   
 
     
if($r_name)
{    
    $select = mysql_query("select * from store_exp where cno = '$c_no' and pname = '$p_name' and ldate = '$l_date'");
    if(mysql_num_rows($select) > 0){
    echo "found";
    }else{
        $v_item=mysql_query("select * from store where sname like '$p_name'");
        $res=mysql_fetch_array($v_item);
    $stype=$res['stype'];
    $sid=$res['sno'];
    $t_cost=$b_cost+$d_cost+$l_cost+$mani;
  
        $insert=mysql_query("insert into store_exp
       (sid,rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm) 
        values 
    ('$sid','$r_name','$c_no','$d_name','$p_name','$p_qty','$stype','$b_cost','$d_cost','$l_cost','$mani','$t_cost','$l_date',0,'$comm')") or die(mysql_error());
             
   if($insert){
       echo "done";
   } 
    }
   }
    
  