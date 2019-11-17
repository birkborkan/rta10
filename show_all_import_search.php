<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      
        $q = mysql_query("select * from `store_imp` where `dname` like '%$name%' or pname like '%$name%'  or cno like '%$name%' or ptype like '%$name%'  ")or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
  //or 'lno' like '%$name%' or ldate1 like '%$name%' or ldate2 like '%$name%'
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
                       <th> فقدان</th>
                         <th>الشراء </th>
                         <th>التكلفة </th>
                         <th>بورصة </th>
                           <th>البيع </th>
                            <th>الربح </th>
                             <th>الخسارة </th>
                                 <th>ت. الشحن </th>
                                 <th>ت. الوصول </th>
                                 <th>اضافة للمخزن</th>
                                
                                 <th style="text-align:center">الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    $p_qty=0;
                    $p_bay=0;
                    $p_cost=0;
                    $borsa=0;
                   
                    $p_sel=0;
                    $p_pro=0;
                    $p_los=0;
                    $t_cost=0;
               
                        while($row=mysql_fetch_array($q))
                        {//eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
                          $serno+=1;
                          if($row['stor']==1)
                          {
                           $stor=    "<span  class='btn btn-success ' style='width:100%;' onmousedown='check_store()'>تمت</span> ";
                            $stor_val = 1;
                          }
                           else
                           {
                            $stor="<span  class='btn btn-danger ' style='width:100%;'  onmousedown='add_store(".$row['eid'].",".$row['sid'].")'>تخزين</span> ";  
                            $stor_val = 0; 
                           }
                              $c_id+=1;
                            $p_qty+=$row['pqty']; 
                            $p_bay+=$row['pbuy']; 
                            $p_cost+=$row['pcost']; 
                            $borsa+=$row['borsa']; 
                            $p_sel+=$row['psel']; 
                            $p_pro+=$row['ppro']; 
                            $p_los+=$row['plos']; 
                        
                            //eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['cno']."</td>
                        <td>".$row['dname']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['ptype']."</td>
                        <td>".$row['pqty']."</td>
                        <td>".number_format($row['miss'])."</td>
                        <td>".number_format($row['pbuy'])."</td>
                        <td>".number_format($row['pcost'])."</td>
                        <td>".number_format($row['borsa'])."</td>
                        <td>".number_format($row['psel'])."</td>
                        <td>".number_format($row['ppro'])."</td>
                        <td>".number_format($row['plos'])."</td>  
                        <td>".$row['ldate1']."</td>
                        <td>".$row['ldate2']."</td>
                        <td >".$stor."</td>
                     
                        <td >
                        <span  class='btn btn-success xx' style='width:100%;'  onclick='topFunction()' onmousedown='edit_import(".$row['eid'].",".$stor_val.")'>تعديل</span>  
                        
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
                   <td style='border-style:none;font-weight:bold;'>الاجماليات</td>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'></td>
                   
                   <td>".number_format($p_qty)."</td>
                   <td style='border-style:none;'></td>
                   <td>".number_format($p_bay)."</td>
                   <td>".number_format($p_cost)."</td>
                   <td>".number_format($borsa)."</td>
                   <td>".number_format($p_sel)."</td>
                   <td>".number_format($p_pro)."</td>
                   <td>".number_format($p_los)."</td>
                   "; 
                  ?>
                </table>
           </div>
                <?php 
                    }else{
                echo" لا توجد بيانات";
                    }
                  }else{

                    $q=mysql_query(" select * from store_imp order by eid desc");
                    if (mysql_num_rows($q)>0) {
                    

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
                       <th> فقدان</th>
                         <th>الشراء </th>
                         <th>التكلفة </th>
                         <th>بورصة </th>
                           <th>البيع </th>
                            <th>الربح </th>
                             <th>الخسارة </th>
                                 <th>ت. الشحن </th>
                                 <th>ت. الوصول </th>
                                 <th>اضافة للمخزن</th>
                                
                                 <th style="text-align:center">الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $serno=0;
                    $p_qty=0;
                    $p_bay=0;
                    $p_cost=0;
                    $borsa=0;
                   
                    $p_sel=0;
                    $p_pro=0;
                    $p_los=0;
                    $t_cost=0;
               
                        while($row=mysql_fetch_array($q))
                        {//eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
                          $serno+=1;
                          if($row['stor']==1)
                          {
                           $stor=    "<span  class='btn btn-success ' style='width:100%;' onmousedown='check_store()'>تمت</span> ";
                            $stor_val = 1;
                          }
                           else
                           {
                            $stor="<span  class='btn btn-danger ' style='width:100%;'  onmousedown='add_store(".$row['eid'].",".$row['sid'].")'>تخزين</span> ";  
                            $stor_val = 0; 
                           }
                              $c_id+=1;
                            $p_qty+=$row['pqty']; 
                            $p_bay+=$row['pbuy']; 
                            $p_cost+=$row['pcost']; 
                            $borsa+=$row['borsa']; 
                            $p_sel+=$row['psel']; 
                            $p_pro+=$row['ppro']; 
                            $p_los+=$row['plos']; 
                        
                            //eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['cno']."</td>
                        <td>".$row['dname']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['ptype']."</td>
                        <td>".$row['pqty']."</td>
                        <td>".number_format($row['miss'])."</td>
                        <td>".number_format($row['pbuy'])."</td>
                        <td>".number_format($row['pcost'])."</td>
                        <td>".number_format($row['borsa'])."</td>
                        <td>".number_format($row['psel'])."</td>
                        <td>".number_format($row['ppro'])."</td>
                        <td>".number_format($row['plos'])."</td>  
                        <td>".$row['ldate1']."</td>
                        <td>".$row['ldate2']."</td>
                        <td >".$stor."</td>
                     
                        <td >
                        <span  class='btn btn-success xx' style='width:100%;'  onclick='topFunction()'  onmousedown='edit_import(".$row['eid'].",".$stor_val.")'>تعديل</span>  
                        
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
                   <td style='border-style:none;font-weight:bold;'>الاجماليات</td>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'></td>
                   
                   <td>".number_format($p_qty)."</td>
                   <td style='border-style:none;'></td>
                   <td>".number_format($p_bay)."</td>
                   <td>".number_format($p_cost)."</td>
                   <td>".number_format($borsa)."</td>
                   <td>".number_format($p_sel)."</td>
                   <td>".number_format($p_pro)."</td>
                   <td>".number_format($p_los)."</td>
                   "; 
                  ?>
                </table>
                </div>
                <?php 
                    }else{
                echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
                    }
                  }
                  ?>