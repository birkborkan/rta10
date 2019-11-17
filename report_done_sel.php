<?php include "connect.php";?>
<?php
$sch_option=$_POST['sch_option'];
 $sch_text=$_POST['sch_text'];
 $sch_date1=$_POST['sch_date1'];
 $sch_date2=$_POST['sch_date2'];
 $whda=$_POST['whda'];
    //pname ptype dname ldat1 ldate2 
    if($sch_option != "between" and $sch_option != "pname" and $sch_option != "whda_between"){
    
        $q=mysql_query(" select * from cus_order where  $sch_option = '$sch_text' order by oid desc");
         
         if($sch_option == "dname"){$s_option="عن السائق";}
     
        else  if($sch_option == "optype"){$s_option="عن الصنف";}
    }else  if($sch_option == "between")
    {
      $q=mysql_query(" select * from cus_order where odate between '$sch_date1' and '$sch_date2' order by oid desc");
      $s_option=" في فترة من".$sch_date1."  الى  ".$sch_date2;
    } 
  
else  if($sch_option == "pname")
    {
      $q=mysql_query(" select * from cus_order where oitem ='$whda'   order by oid desc") or die(mysql_error());
      $s_option="  عن مبيعات الوحدة  ".$whda;
    } 
    else  if($sch_option == "whda_between")
    {
      $q=mysql_query(" select * from cus_order where odate between '$sch_date1' and '$sch_date2'  and oitem ='$whda'  order by oid desc");
      $s_option="مبيعات الوحدة ".$whda." من الفترة  ".$sch_date1."  الى  ".$sch_date2;
    } 
  
   // $q=mysql_query(" select * from cus_order order by  oid asc");

    if (mysql_num_rows($q)>0) {
 
            ?>   
            <center><div id="reporttitle"  style='width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير    <?php echo $s_option."    ".$sch_text;?></div> </center>
            <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr>
                       <th>#</th>
          
            
               <th>اسم الزبون</th>
                  <th>اسم الصنف</th>
                  <th>النوع</th>
                  <th>الكمية</th>
                  <th>السعر</th>
                  <th>الجملة</th>
                  <th>رقم الفاتور</th>
                  <th>    التاريخ</th>
                  
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    
                    $o_qty = 0;
                    $o_mjmoo = 0;
             
                        while($row=mysql_fetch_array($q))
                        { 
                          $serno+=1;
                          $o_qty += $row['oqty'];
                          $o_mjmoo += $row['mjmoo'];
                       
                            //oid oname oitem optype omethod oqty oprice odate sno fatora_no mjmoo sw
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['oname']."</td>
                        <td>".$row['oitem']."</td>
                        <td>".$row['optype']."</td>
                        <td>".$row['oqty']."</td>
                        <td>".$row['oprice']."</td>
                        <td>".$row['mjmoo']."</td>
                        <td>".$row['fatora_no']."</td>
                        <td>".$row['odate']."</td>
                        
                         	 
                        "; ?> 
                        
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
                  <?php 
                           echo "
                           <tr>
                           <td style='border-style:none;'></td>
                           <td style='border-style:none;font-weight:bold;'>الاجماليات</td>
                           <td style='border-style:none;'></td>
                           <td style='border-style:none;'></td>
                          
                           
                           <td>".number_format($o_qty)."</td>
                           <td style='border-style:none;'></td>
                           <td>".number_format($o_mjmoo)."</td>
                           
                           "; 
                          ?>
                </table>
                </div>
                <?php 
                    }else{
                echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
                    }
            ?>
            </div>
            <div id='print_content'></div>