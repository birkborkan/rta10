<?php include "connect.php";?>
<div class="table-responsive">
<input type='text' class="form-control fa fa-search"placeholder='search' id='search_text' onkeydown = "search('show_all_watiting_search.php','عرض الصادر');" onkeyup = "search('show_all_watiting_search.php','عرض الصادر');"/>
<div  id='edit_content'></div>
<div  id='search_id'></div>
<div id='search_content'> 
  
<?php

$q=mysql_query(" select * from store_exp where arrive=0 order by eid desc");
                    if (mysql_num_rows($q)>0) {
                    

    ?>
<table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       <th>#</th>
            <th>المرحل</th>
            <th>ر. العربة </th>
               <th>اسم السائق</th>
                  <th>الوحدة</th>
                    <th>الكمية </th>
                       <th>التصنيف </th>
                         <th>الشراء </th>
                           <th>ترحيل </th>
                            <th>تحميل </th>
                             <th>منفستو </th>
                              <th>التكلفة </th>
                                <th>ت. الشراء </th>
                         
                               
                                
                                 <th style="text-align:center">الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    $p_qty=0;
                    $d_cost=0;
                    $b_cost=0;
                    $l_cost=0;
                    $mani_=0;
                   
                    $cost=0;
                    $t_cost=0;
                    $c_id=0;
                        while($row=mysql_fetch_array($q))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $p_qty+=$row['pqty']; 
                            $b_cost+=$row['bcost']; 
                            $d_cost+=$row['dcost']; 
                            $l_cost+=$row['lcost']; 
                            $mani_+=$row['manifist']; 
                            $t_cost+=$row['tcost'];
                          $serno+=1;
                          
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['rname']."</td>
                        <td>".$row['cno']."</td>
                        <td>".$row['dname']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['pqty']."</td>
                        <td>".$row['ptype']."</td>
                        <td>".number_format($row['bcost'])."</td>
                        <td>".number_format($row['dcost'])."</td>
                        <td>".number_format($row['lcost'])."</td>
                        <td>".number_format($row['manifist'])."</td>
                        <td>".number_format($row['tcost'])."</td>
                        <td>".$row['ldate']."</td>
                     
                    
                        
                        <td >
                        <span  class='btn btn-success xx' style='width:100%;'  onmousedown='add_waiting_done(".$row['eid'].")'>استلام</span>  
                        "; ?> 
                       
                        </td> 
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
                  <?php 
                  echo "
                  <tr>
                  <td style='border-style:none;'></td>
                  <td style='border-style:none;'>الاجماليات</td>
                  <td style='border-style:none;'></td>
                  <td style='border-style:none;'></td>
                  <td style='border-style:none;'></td>
                  
                  <td>".number_format($p_qty)."</td>
                  <td style='border-style:none;'></td>
                  <td>".number_format($b_cost)."</td>
                  <td>".number_format($d_cost)."</td>
                  <td>".number_format($l_cost)."</td>
                  <td>".number_format($mani_)."</td>
                 
                  <td>".number_format($t_cost)."</td>
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
            