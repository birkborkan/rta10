<?php
 include "connect.php";
   
 $borsa=$_POST['borsa'];
 $new_miss=$_POST['miss'];
 $e_id=$_POST['eid'];
 $stor=$_POST['stor']; 
 $pro_id=$_POST['s_id']; 

if($e_id){

  $select_imp=mysql_query(" select * from store_imp where eid = $e_id ");
  $improw=mysql_fetch_array($select_imp);
  $s_id=$improw['sid'];
  $c_no=$improw['cno'];
  $d_name=$improw['dname'];
  $p_name=$improw['pname'];
  $p_type=$improw['ptype'];
  $p_qty=$improw['pqty'];
  $old_miss=$improw['miss'];
  $date1=$improw['ldate1'];
  $date2=$improw['ldate2'];
  $o_date=date('y-m-d');
  //$p_qty=$improw['pqty'] - $new_miss;
  $t_cost=$improw['pcost'];  // total cost
  $p_buy=$improw['pbuy']; // bay cost
  
  $v_item=mysql_query("select sqty,sprice from store where sno = '$s_id'");
  $pres=mysql_fetch_array($v_item);
  $s_qty=$pres['sqty'];
  $s_price=$pres['sprice'];
  

  $p_sel=($p_qty - $new_miss)* $s_price;
  $new_qty=$s_qty - $new_miss;
  $p_pro=max(($p_sel-($t_cost+$borsa)),0);
  $p_los=max((($t_cost+$borsa)-$p_sel),0);

    if($stor == 0){   
    $update = mysql_query("update store_imp set 
      borsa='$borsa',
      miss='$new_miss',
      psel='$p_sel',
      ppro='$p_pro',
      plos='$p_los'
    where eid = '$e_id'") or die(mysql_error()) ;
      if($update){
          echo "done";
      }
    } 
    else {
   
      if($s_qty-($new_miss - $old_miss) < 0)
      {
        echo "update_no";
      } else
      {
        $update_imp = mysql_query("update store_imp set 
        borsa='$borsa',
        miss='$new_miss',
        psel='$p_sel',
        ppro='$p_pro',
        plos='$p_los'
      where eid = '$e_id'") or die(mysql_error()) ;
      if($update_imp)
      {
        $update_imp = mysql_query("update store set 
        sqty= sqty-($new_miss - $old_miss)
         where sno = '$s_id'") or die(mysql_error()) ;
       $new_qty=($s_qty-($new_miss - $old_miss));
        $insert=mysql_query("insert into history
        (sid,eid,cno,dname,pname,ptype,pqty,miss,ldate1,ldate2,oldqty,newqty,haction)  values
  ('$s_id','$e_id','$c_no','$d_name','$p_name','$p_type','$p_qty',$new_miss,'$date1','$date2','$s_qty','$new_qty','تحديث')")
                            or die(mysql_error()); 
          
       
          echo "update_ok";
      }
  

      }
     
  }
 
 }?>