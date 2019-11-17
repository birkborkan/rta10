<?php include "connect.php";?>
<?php
$sch_option=$_POST['sch_option'];
 $sch_text=$_POST['sch_text'];
 $sch_date1=$_POST['sch_date1'];
 $sch_date2=$_POST['sch_date2'];
 $sch_date3=$_POST['sch_date3'];
 $whda=$_POST['whda'];
 /*	
t_id
t_amount
t_comm
t_date*/
   
  if($sch_option == "between")
    {
      $q=mysql_query(" select * from tored where t_date between '$sch_date1' and '$sch_date2' order by t_id desc");
      $s_option=" الحسابات في فترة من".$sch_date1."  الى  ".$sch_date2;
    } 
  
else  if($sch_option == "t_date3")
    {
      $q=mysql_query(" select * from tored where t_date ='$sch_date3'   order by t_id desc") or die(mysql_error());
      $s_option="  عن    الحسابات بتاريخ  ".$sch_date3;
    } 
    
    if($sch_option == "product")
    {
      $q=mysql_query(" select * from tored where t_date between '$sch_date1' and '$sch_date2' and t_comm ='$whda' order by t_id desc");
      $s_option=" الحسابات عن وحدة : ".$whda."  في فترة من".$sch_date1."  الى  ".$sch_date2;
    } 
  
   // $q=mysql_query(" select * from cus_order order by  oid asc");

    if (mysql_num_rows($q)>0) {
 
            ?>   
            <center><div id="reporttitle"  style='width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير    <?php echo $s_option."    ".$sch_text;?></div> </center>
          
            <table class="table table-bordered" id="dataTable" width="70%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;'>
                       
          <th>#</th>
               <th>المبلغ</th>
                  <th>البيان </th>
                    <th> التاريخ  </th>
                          
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                      
                        $srno= 0;
                        while($row=mysql_fetch_array($q))
                        {
                            $srno++;
                            echo "
                        <tr>
                        <td>".$row['t_id']."</td>
                        <td id='fname'>".number_format($row['t_amount'])."</td>
                        <td >".$row['t_comm']."</td>
                        <td >".$row['t_date']."</td>
                      
                        "; ?>  
                       
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
                </div>
                <?php 
                    }else{
                echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
                    }
            ?>
            <div>