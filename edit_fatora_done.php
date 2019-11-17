<?php
session_start();
include "connect.php";
 $oid =  intval($_POST['oid']);
 $optype =  $_POST['optype'];
 $oqty =  intval($_POST['oqty']);
 $oitem=  $_POST['oitem'];
 $fatora_no=  $_POST['fatora_no'];
 
 
  if($oid){
      $select_montj_to_check = mysql_query("select * from store where sname = '$oitem'  ");

      $row_price  = mysql_fetch_assoc($select_montj_to_check);
      $give_price = intval($row_price['sprice']);
      $give_sno = intval($row_price['sno']);
      $give_sqty =intval($row_price['sqty']);

      if(mysql_num_rows($select_montj_to_check) > 0)
      {

   
    
     if($oqty <= $give_sqty){
  $sno = intval($_SESSION['sno']);
  $session_qty = intval($_SESSION['oqty']) ;
  $session_mjmoo = intval($_SESSION['mjmoo']) ;
  $session_fatora = $_SESSION['fatora_number'] ;

  $select_store = mysql_query("select sqty from store where sno = '$sno'");
  $r = mysql_fetch_assoc($select_store);
  $from_store = $r['sqty'];
  
  $new_store_value = intval($from_store) + intval($session_qty);
   
  $update_store = mysql_query("update store set sqty = '$new_store_value' where sno = '$sno'");
  if($update_store)
 {
      

        $select_old_money = mysql_query("select * from cus_order_money where  custom_fatora_no = '$session_fatora'");
        $r2 = mysql_fetch_assoc($select_old_money);
        $old_money = $r2['custom_money'];

        $p_pro=max((intval($old_money) - intval($session_mjmoo)),0);
        $p_los=max((intval($session_mjmoo) - intval($old_money)),0);
        if($p_pro >0){
            $new_money  = $p_pro;  
        }else{
            $new_money = $p_los; 
        }
     

        $update2 = mysql_query("update cus_order_money set custom_money = '$new_money' where custom_fatora_no = '$session_fatora '");
        if($update2)
        {
           $mjmooo = $oqty * $give_price;
           $last_money = $new_money + $mjmooo;
            
            $update_money  = mysql_query("update cus_order_money set custom_money = '$last_money' where custom_fatora_no = '$session_fatora '");
            if($update_money){
                $last_update_for_order = mysql_query("update cus_order set
               oitem='$oitem', oqty='$oqty',sno='$give_sno',oprice='$give_price',mjmoo='$mjmooo' where oid = '$oid'");
               if($last_update_for_order)
               {
                $select_store2 = mysql_query("select sqty from store where sno = '$give_sno'");
                
                $r2 = mysql_fetch_assoc($select_store2);
                $from_store2 = $r2['sqty'];
                
                   $last_update_sqty = $from_store2 - $oqty;
                   
                     $last_one =mysql_query("update store set sqty = '$last_update_sqty' where sno = '$give_sno'");
                     if($last_one){
                      ?>

<table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;'
    cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم الصنف</th>
            <th> النوع </th>
            <th> الكمية</th>
            <th> السعر</th>
            <th> الجملة</th>

        </tr>
    </thead>
    <tbody>

        <?php
                                   $query = mysql_query("select * from cus_order where fatora_no ='$session_fatora' ");
                                   $counter = 0;
                                              while($row=mysql_fetch_array($query)){
                                                  $counter++;
                                                    echo"
                                                 <tr>
                                                 <td>".$counter."</td>
                                                 <td>".$row['oitem']."</td>
                                                 <td>".$row['optype']."</td>
                                                 <td>".$row['oqty']."</td>
                                                 <td>".$row['oprice']."</td>
                                                 <td>".$row['mjmoo']."</td>
                                                 
                                                 </tr>
                                                 
                                                 ";
                                              }
                                         
                                            ?>
    </tbody>

</table>


<?php
                     }
               }
            }
  }
  
      }
    }else{
 echo "big";
    }
}else{
    echo "notfound";
}
  }
?>