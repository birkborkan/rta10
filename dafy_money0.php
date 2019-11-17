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
   if($insert){
  ?>


<table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr>
                       <th>#</th>
            <th>اسم الصنف</th>
              
               <th>   الكمية</th>
                  <th> السعر</th>
                  <th> الجملة</th>
        
                     </tr>
                  </thead>
                   <tbody>

                    <?php
             $query = mysql_query("select * from cus_order where fatora_no ='$fatora_no' and oname = '$name'");
             $counter = 0;
                        while($row=mysql_fetch_array($query)){
                            $counter++;
                              echo"
                           <tr>
                           <td>".$counter."</td>
                           <td>".$row['oitem']."</td>
                           
                           <td>".$row['oqty']."</td>
                           <td>".$row['oprice']."</td>
                           <td>".$row['mjmoo']."</td>
                           
                           </tr>
                           
                           ";
                        }
                   
                      ?>
                  </tbody>
                
                </table>
<?php  }}?>