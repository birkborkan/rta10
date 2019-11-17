<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){ 
  
      $q = mysql_query("select * from `cus_order_money` where `custom_name` like '%$name%' or `custom_fatora_no` like '%$name%' or `custom_money` like '%$name%'  ") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {   
  
  ?>
<table class="table table-bordered" id="dataTable" width="100%" style='font-size:1em;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       <th>#</th>
             <th>اسم الزبون</th>
                  <th>رقم الفاتورة </th>
                  <th>المبلغ</th>
                  <th>  التاريخ</th>
                  
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    $sum_money=0;
                        while($row=mysql_fetch_array($q))
                        { 
                          $serno+=1;
                          $sum_money += $row['custom_money'];
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['custom_name']."</td>                       
                        <td>".$row['custom_fatora_no']."</td>                       
                        <td>".number_format($row['custom_money'])."</td>
                      
                        <td>".$row['date']."</td>
                      
                        "; ?> 
                     
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
               
                </table>
                <div style="text-align:right;font-size:1.3em;margin-right:35%">
               <?php echo"اجمالي المبلغ : ".number_format($sum_money) ?>
              </div>
           </div>
                <?php 
                    }else{
                      echo"<p style='text-align:right'>لا توجد مبيعات</p>";
                    }
                  }else{

                    $q=mysql_query(" select * from cus_order_money order by  id desc");
                    if (mysql_num_rows($q)>0) {
                    

    ?>
<table class="table table-bordered" id="dataTable" width="100%" style='font-size:1em;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       <th>#</th>
             <th>اسم الزبون</th>
                  <th>رقم الفاتورة </th>
                  <th>المبلغ</th>
                  <th>  التاريخ</th>
                  
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    $sum_money=0;
                        while($row=mysql_fetch_array($q))
                        { 
                          $serno+=1;
                          $sum_money += $row['custom_money'];
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['custom_name']."</td>                       
                        <td>".$row['custom_fatora_no']."</td>                       
                        <td>".number_format($row['custom_money'])."</td>
                      
                        <td>".$row['date']."</td>
                      
                        "; ?> 
                     
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
               
                </table>
                <div style="text-align:right;font-size:1.3em;margin-right:35%">
               <?php echo"اجمالي المبلغ : ".number_format($sum_money) ?>
              </div>
                </div>
                <?php 
                    }else{
                      echo"<p style='text-align:right'>لا توجد مبيعات</p>";
                    }
                  }
                  ?>
                