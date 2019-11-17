<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      
        $q = mysql_query("select * from `store_exp` where `rname` like '%$name%' or cno like '%$name%' or dname like '%$name%' or pname like '%$name%' or ptype like '%$name%' ")or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
  
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
                                 <th>الوصول </th>
                                 <th>ملاحظات </th>
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
                          $serno+=1;
                          if($row['arrive']==1)
                          {
                           $arrive="تمت";   
                          }
                           else
                           {
                            $arrive="لم تتم";    
                           }
                              $c_id+=1;
                            $p_qty+=$row['pqty']; 
                            $b_cost+=$row['bcost']; 
                            $d_cost+=$row['dcost']; 
                            $l_cost+=$row['lcost']; 
                            $mani_+=$row['manifist']; 
                            $t_cost+=$row['tcost'];
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
                        <td>".$arrive."</td>
                        <td>".$row['comm']."</td>
                        <td >
                        <span  class='btn btn-success xx' style='width:48%;'  onclick='topFunction()'  onmousedown='edit_export(".$row['eid'].")'>تعديل</span>  
                        "; ?> 
                        <span class='btn btn-danger' style='width:48%;'  onmousedown='delete_(<?php echo $row["eid"] ; ?>,"delete.php","show_all_export.php","صادر","عرض الصادر","store_exp","eid")'>	
                            حذف
                         </span>
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
                </table>                </div>
                <?php 
                    }else{
                echo" لا توجد بيانات";
                    }
                  }else{

                    $q=mysql_query(" select * from store_exp order by eid desc");
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
                                 <th>الوصول </th>
                                 <th>ملاحظات </th>
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
                          $serno+=1;
                          if($row['arrive']==1)
                          {
                           $arrive="تمت";   
                          }
                           else
                           {
                            $arrive="لم تتم";    
                           }
                              $c_id+=1;
                            $p_qty+=$row['pqty']; 
                            $b_cost+=$row['bcost']; 
                            $d_cost+=$row['dcost']; 
                            $l_cost+=$row['lcost']; 
                            $mani_+=$row['manifist']; 
                            $t_cost+=$row['tcost'];
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
                        <td>".$arrive."</td>
                        <td>".$row['comm']."</td>
                        <td >
                        <span  class='btn btn-success xx' style='width:48%;'  onclick='topFunction()'  onmousedown='edit_export(".$row['eid'].")'>تعديل</span>  
                        "; ?> 
                        <span class='btn btn-danger' style='width:48%;'  onmousedown='delete_(<?php echo $row["eid"] ; ?>,"delete.php","show_all_export.php","صادر","عرض الصادر","store_exp","eid")'>	
                            حذف
                         </span>
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
                  }
                  ?>