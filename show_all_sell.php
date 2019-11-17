<?php include "connect.php";?>
<div class="table-responsive">
<input type='text' class="form-control fa fa-search"placeholder='search' id='search_text' onkeydown = "search('show_all_sell_search.php','    عرض وارد مبيعات');" onkeyup = "search('show_all_sell_search.php','    عرض وارد مبيعات');"/>
<div  id='edit_content'></div>
<div  id='search_id'></div>
<div id='search_content'> 
  
<?php

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
                <?php 
                    }else{
                echo"<p class='add'><script> document.write(' لا توجد فواتير مبيعات') </script></p>";
                    }
            ?>
            </div>
            <div id='print_content'></div>
            