<?php include "connect.php"; ?>
<div class="table-responsive">
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('add_new_tored.php','اضافة توريد ');"> اضافة توريد   </div>             
<input type='text' class="form-control fa fa-search"placeholder='search' id='search_text' onkeydown = "search('show_all_tored_search.php','عرض توريد');" onkeyup = "search('show_all_tored_search.php','عرض توريد');"/>
<div  id='edit_content'></div>
<div  id='search_id'></div>
<div id='search_content'> 
<?php

$q=mysql_query(" select * from tored order by t_id desc");
                    if (mysql_num_rows($q)>0) {
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
                      
                        $srno= 0;
                        $sum_tored=0;
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
            ?>
            <div>