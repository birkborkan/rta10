<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      
$q = mysql_query("select * from `tored` where `t_comm` like '%$name%' or `t_comm` like '%$name%'  ") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
                    

    ?>
    
    <table class="table table-bordered" id="dataTable" width="100%" style='font-size:1em;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       
          <th>#</th>
               <th>المبلغ</th>
                  <th>البيان </th>
                    <th> التاريخ  </th>
                          <th >الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                         $sum_tored=0;
                        $srno= 0;
                        while($row=mysql_fetch_array($q))
                        {
                            $srno++;
                            $sum_tored+=$row['t_amount'];
                            echo "
                        <tr>
                        <td>".$row['t_id']."</td>
                        <td id='fname'>".number_format($row['t_amount'])."</td>
                        <td >".$row['t_comm']."</td>
                        <td >".$row['t_date']."</td>
                       <td>
                        <span  onclick='topFunction()' onmousedown='edit_tored(".$row['t_id'].")'
                        class='btn btn-success' style='width:48%;'>تعديل </span>   
                        "; ?>  
                        <span   class='btn btn-danger' style='width:48%;'
                                                  
                            onmousedown='delete_(<?php echo $row["t_id"] ; ?>,"delete.php","show_all_tored.php","التوريد","عرض التوريد","tored","t_id")'>حذف</span>	
                            
                        </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
                <div style="text-align:right;font-size:1.2em;margin-right:5%">
               <?php echo"اجمالي المبلغ : ".number_format($sum_tored) ?>
              </div>
                </div>
                <?php 
                    }else{
                        echo"<p style='text-align:right'>لا توجد حسابات</p>";
                    }
                  }else{

                    $q = mysql_query("select * from `tored` ") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
                    

    ?>
    
    <table class="table table-bordered" id="dataTable" width="100%" style='font-size:1em;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       
          <th>#</th>
               <th>المبلغ</th>
                  <th>البيان </th>
                    <th> التاريخ  </th>
                          <th >الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        $sum_tored=0;
                        $srno= 0;
                        while($row=mysql_fetch_array($q))
                        {
                            $srno++;
                            $sum_tored+=$row['t_amount'];
                            echo "
                        <tr>
                        <td>".$row['t_id']."</td>
                        <td id='fname'>".number_format($row['t_amount'])."</td>
                        <td >".$row['t_comm']."</td>
                        <td >".$row['t_date']."</td>
                       <td>
                        <span  onclick='topFunction()' onmousedown='edit_tored(".$row['t_id'].")'
                        class='btn btn-success' style='width:48%;'>تعديل </span>   
                        "; ?>  
                        <span   class='btn btn-danger' style='width:48%;'
                                                  
                            onmousedown='delete_(<?php echo $row["t_id"] ; ?>,"delete.php","show_all_tored.php","التوريد","عرض التوريد","tored","t_id")'>حذف</span>	
                            
                        </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
                <div style="text-align:right;font-size:1.2em;margin-right:5%">
               <?php echo"اجمالي المبلغ : ".number_format($sum_tored) ?>
              </div>
                </div>
                <?php 
                    }else{
                        echo"<p style='text-align:right'>لا توجد حسابات</p>";
                    }
                  }
                  ?>