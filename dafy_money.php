<?php
session_start();
include "connect.php";
$name = $_SESSION['zbon_name']; 
$fatora_no = $_SESSION['fatora_no'] ;
$money = $_POST['sumer'];


$select  = mysql_query("select * from cus_order where fatora_no ='$fatora_no'");
$sumer = 0;
while($rows = mysql_fetch_array($select)){
$sumer = $sumer+$rows['mjmoo'];

}
if($sumer = $money){
    $insert = mysql_query("insert into cus_order_money(custom_name,custom_fatora_no,custom_money)
                                                  values('$name','$fatora_no','$money')") or die(mysql_error());
   if($insert){?>
    
     <div style="width:100%;text-align:right;margin-top:2%">
             
<span style="font-size:1.3em;float:right;"><?php echo "الســـيد/   ". $name;?></span>
<span style="font-size:1.2em;float:right;margin-right:30%;"><?php echo "الرقم الفاتورة:   ". $fatora_no;?></span>
<span style="font-size:1em;float:left">خاص بالزبون</span>
</div>
<table  class="table table-bordered " id="dataTable" width="60%" style='font-size:11px;text-align:right;' cellspacing="0">

                  <thead>
                  <tr>
                     
            <th width="15%">العدد </th>
              
               <th width="30%"> البيان</th>
               <th width="15%"> التاريخ</th>
                    </tr>
                  </thead>
                   <tbody>

                    <?php
             $query = mysql_query("select * from cus_order where fatora_no ='$fatora_no' and oname = '$name'");
             $counter = 0;
                        while($row=mysql_fetch_array($query)){
                          
                              echo"
                           <tr>
                           <td>".$row['oqty']."</td>
                           <td>".$row['oitem']."</td>
                           <td>".$row['odate']."</td>
                           </tr>
                           
                           ";
                        }
                   
                      ?>
                      
                  </tbody>
                
                </table>
              تم الاستخراج بواسطة<?php echo $_SESSION['ufull_name'];?> </div>
                 </div>
  
   
  
    <?php  }}?>