<?php include "connect.php";?>
<div class="table-responsive">
<input type='text' class="form-control fa fa-search"placeholder='search' id='search_text' onkeydown = "search('show_all_fatora_search.php','    عرض الفواتير');" onkeyup = "search('show_all_fatora_search.php','    عرض الفواتير');"/>
<div  id='edit_content'></div>
<div  id='search_id'></div>
<div id='search_content'> 
  
<?php

$q=mysql_query(" select * from cus_order order by  oid desc");
                    if (mysql_num_rows($q)>0) {

    ?>   
<table class="table table-bordered" id="dataTable" width="100%" style='font-size:1em;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       <th>#</th>
             <th>اسم الزبون</th>
                  <th>اسم الصنف</th>
                  
                  <th>الكمية</th>
                  <th>السعر</th>
                  <th>الجملة</th>
                  <th>رقم الفاتور</th>
                  <th>  التاريخ</th>
                  
                    <th style="text-align:center">الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    $sum_qty=0;
                    $sum_money=0;
                        while($row=mysql_fetch_array($q))
                        { 
                          $serno+=1;
                          $sum_qty += $row['oqty'];
                          $sum_money += $row['mjmoo'];
                          
                            //oid oname oitem optype omethod oqty oprice odate sno fatora_no mjmoo sw
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['oname']."</td>
                        <td>".$row['oitem']."</td>                       
                        <td>".number_format($row['oqty'])."</td>
                        <td>".number_format($row['oprice'])."</td>
                        <td>".number_format($row['mjmoo'])."</td>
                        <td>".$row['fatora_no']."</td>
                        <td>".$row['odate']."</td>
                      <td >
                        <span  class='btn btn-success' style='width:32%;'  onclick='topFunction()'  onmousedown='edit_fatora(".$row['oid'].")'>تعديل</span>  
                        <span  class='btn btn-danger' style='width:32%;'  onmousedown='delete_fatora(".$row['oid'].",".$row['oqty'].",".$row['sno'].",".$row['mjmoo'].")'>حذف</span>  
                        "; ?> 
                       
                        <span  class='btn btn-success ' style='width:32%; background:gray;' onclick='tybaa("<?php echo $row["fatora_no"];?>","<?php echo $row["oname"];?>","tybaa_fatora.php")'>طباعه</span>  
                   
                        </td> 
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
               
                </table>
               <div style="text-align:right;font-size:1.3em">
                <span style="margin-right:20%"> <?php echo"اجمالي الكمية : ".number_format($sum_qty) ?></span> 
                <span style="margin-right:15%"> <?php echo"اجمالي جملة المبلغ : ".number_format($sum_money) ?></span> </div>
                </div>
                <?php 
                    }else{
                      echo"<p style='text-align:right'>لا توجد فواتير</p>";
                    }
            ?>
            </div>
            <div id='print_content'></div>
            