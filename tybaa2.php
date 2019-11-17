<?php
include "connect.php";
$fatora_no = $_POST['fatora_no'];

 
  ?>


<table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr>
                       <th>#</th>
            <th>اسم الصنف</th>
            <th>  النوع </th>
               <th>   الكمية</th>
                  <th> السعر</th>
                  <th> الجملة</th>
        
                     </tr>
                  </thead>
                   <tbody>

                    <?php
             $query = mysql_query("select * from cus_order where fatora_no ='$fatora_no' ");
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
 