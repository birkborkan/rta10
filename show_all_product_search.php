<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      
$q = mysql_query("select * from `store` where `sname` like '%$name%' 
or stype like '%$name%' ") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
                    

    ?>
    
    <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11x;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       
                       <th>#</th>
                      
            <th class=''>المنتج</th>
            <th>التصنيف </th>
               <th>السعر</th>
                    <th>تاريخ الاضافة</th>
                          <th >الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                   $srno= 0;
                        
                        while($row=mysql_fetch_array($q))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                           $srno++; 
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        
                        <td >".$row['sname']."</td>
                        <td >".$row['stype']."</td>
                        <td >".$row['sprice']."</td>
                        <td >".$row['sdate']."</td>
                        <td >
                        <span  class='btn btn-success' style='width:48%;' onclick='topFunction()' onmousedown='edit_product(".$row['sno'].")'>تعديل</span>  
                       "; ?>	
                       <span class='btn btn-danger' style='width:48%;'  onmousedown='delete_(<?php echo $row["sno"] ; ?>,"delete.php","show_all_product.php","المنتج","عرض المنتجات","store","sno")'>	
                           حذف
                        </span>
                        </td> 
                        </tr>  
                        <?php  
                         }  ?>
               </tbody>
                </table>
                </div>
                <?php 
                    }else{
                echo" لا توجد بيانات";
                    }
                  }else{

                    $q = mysql_query("select * from `store` ") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
                    

    ?>
    
    <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11x;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       
                       <th>#</th>
                      
            <th class=''>المنتج</th>
            <th>التصنيف </th>
               <th>السعر</th>
                    <th>تاريخ الاضافة</th>
                          <th >الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                   $srno= 0;
                        
                        while($row=mysql_fetch_array($q))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                           $srno++; 
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        
                        <td >".$row['sname']."</td>
                        <td >".$row['stype']."</td>
                        <td >".$row['sprice']."</td>
                        <td >".$row['sdate']."</td>
                        <td >
                        <span  class='btn btn-success' style='width:48%;' onclick='topFunction()'  onmousedown='edit_product(".$row['sno'].")'>تعديل</span>  
                       "; ?>	
                       <span class='btn btn-danger' style='width:48%;'  onmousedown='delete_(<?php echo $row["sno"] ; ?>,"delete.php","show_all_product.php","المنتج","عرض المنتجات","store","sno")'>	
                           حذف
                        </span>
                        </td> 
                        </tr>  
                        <?php  
                         }  ?>
               </tbody>
                </table>
                </div>
                <?php 
                    }else{
                echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
                    }
                  }
                  ?>