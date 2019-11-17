<?php include "connect.php";?>
<div class="table-responsive">
<input type='text' class="form-control fa fa-search"placeholder='search' id='search_text' onkeydown = "search('show_all_history_search.php','عرض حركة المخزن');" onkeyup = "search('show_all_history_search.php','عرض حركة المخزن ');"/>
<div  id='edit_content'></div>
<div  id='search_id'></div>
<div id='search_content'> 
  
<?php

$q=mysql_query(" select * from history order by hid desc");
                    if (mysql_num_rows($q)>0) {
                    
//sid,eid,cno,dname,pname,ptype,pqty,ldate1,ldate2,oldqty,newqty,hdate
    ?>   
<table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
         <th>#</th>
            <th>ر. العربة </th>
               <th>اسم السائق</th>
                  <th>الوحدة</th>
                    <th>التصنيف </th>
                      <th> الكمية</th>
                      <th> الفقدان</th>
                         <th>ك.القديمة</th>
                            <th> ك الجديدة</th>               
                                <th>ت. الشحن </th>
                                    <th>ت. الوصول </th>
                                       <th>ت. الاضافة </th>
                                       <th>الاجراء</th>
                 </tr>
                  </thead>
                   <tbody>
                    <?php
                 while($row=mysql_fetch_array($q))
                        {// cno,dname,pname,ptype,pqty,ldate1,ldate2,oldqty,newqty,hdate
                          $serno+=1;
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['cno']."</td>
                        <td>".$row['dname']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['ptype']."</td>
                        <td>".number_format($row['pqty'])."</td>
                        <td>".number_format($row['miss'])."</td>
                        <td>".number_format($row['oldqty'])."</td>
                        <td>".number_format($row['newqty'])."</td>
                        <td>".$row['ldate1']."</td>
                        <td>".$row['ldate2']."</td>                  
                        <td>".$row['hdate']."</td>
                        <td>".$row['haction']."</td>
                     
                      "; ?> 
                       
                  
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
               
                </table>
                </div>
                <?php 
                    }else{
                echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
                    }
            ?>
            </div>
            