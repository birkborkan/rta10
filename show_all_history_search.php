<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      //sid,eid,cno,dname,pname,ptype,pqty,ldate1,ldate2,oldqty,newqty,hdate
        $q = mysql_query("select * from `history` where `cno` like '%$name%' or dname like '%$name%'  or pname like '%$name%' or ptype like '%$name%'  ")or die(mysql_error());
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
                         <th> ك القديمة</th>
                            <th> ك الجديدة</th>               
                                <th>ت. الشحن </th>
                                    <th>ت. الوصول </th>
                                       <th>ت. الاضافة </th>
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
                        <td>".number_format($row['oldqty'])."</td>
                        <td>".number_format($row['newqty'])."</td>
                        <td>".$row['ldate1']."</td>
                        <td>".$row['ldate2']."</td>
                   
                        <td>".$row['hdate']."</td>
                     
                      "; ?> 
                       
                  
                        </tr>
                          
                       <?php }    
                         
                   ?> 
                  </tbody>
               
                </table>
           </div>
                <?php 
                    }else{
                echo" لا توجد بيانات";
                    }
                  }else{

                    $q=mysql_query(" select * from history order by hid desc");
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
                         <th> ك القديمة</th>
                            <th> ك الجديدة</th>               
                                <th>ت. الشحن </th>
                                    <th>ت. الوصول </th>
                                       <th>ت. الاضافة </th>
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
                        <td>".number_format($row['oldqty'])."</td>
                        <td>".number_format($row['newqty'])."</td>
                        <td>".$row['ldate1']."</td>
                        <td>".$row['ldate2']."</td>
                   
                        <td>".$row['hdate']."</td>
                     
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
                  }
                  ?>