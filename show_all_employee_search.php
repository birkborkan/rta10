<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      
$q = mysql_query("select * from `emp` where `ename` like '%$name%' 
or ejob like '%$name%' or esal like '%$name%' or ephone like '%$name%'") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
                    

    ?>
    
  
    <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       
                       <th>#</th>
            <th>الاسم</th>
            <th>الهاتف </th>
               <th>الوظيفة</th>
                  <th>الراتب</th>
                    <th>تاريخ التعين</th>
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
                        <td >".$srno."</td>
                        <td >".$row['ename']."</td>
                        <td >".$row['ephone']."</td>
                        <td >".$row['ejob']."</td>
                        <td >".$row['esal']."</td>
                        <td >".$row['ehdate']."</td>
                        <td >
                        <span  onclick='topFunction()' onmousedown='edit_employee(".$row['eid'].")'
                        class='btn btn-success' style='width:48%;'>تعديل </span>   
                        "; ?>  
                        <span   class='btn btn-danger' style='width:48%;'
                             
                            onmousedown='delete_(<?php echo $row["eid"] ; ?>,"delete.php","show_all_employee.php","الموظف","عرض الموظفين","emp","eid")'>حذف</span>	
                            
                        </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
                </div>
                <?php 
                    }else{
                        echo"<p style='text-align:right'>عفواً : لا توجد نتائج مشابهة</p>";
                    }
                  }else{

                    $q = mysql_query("select * from `emp` ") or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
                    

    ?>
  
  <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       
                       <th>#</th>
            <th>الاسم</th>
            <th>الهاتف </th>
               <th>الوظيفة</th>
                  <th>الراتب</th>
                    <th>تاريخ التعين</th>
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
                            <td >".$srno."</td>
                            <td >".$row['ename']."</td>
                            <td >".$row['ephone']."</td>
                            <td >".$row['ejob']."</td>
                            <td >".$row['esal']."</td>
                            <td >".$row['ehdate']."</td>
                            <td >
                        <span  onclick='topFunction()' onmousedown='edit_employee(".$row['eid'].")'
                        class='btn btn-success' style='width:48%;'>تعديل </span>   
                        "; ?>  
                        <span   class='btn btn-danger' style='width:48%;'
                             
                            onmousedown='delete_(<?php echo $row["eid"] ; ?>,"delete.php","show_all_employee.php","الموظف","عرض الموظفين","emp","eid")'>حذف</span>	
                            
                        </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
                </div>
                <?php 
                    }else{
                        echo"<p style='text-align:right'>عفواً : لا توجد نتائج مشابهة</p>";
                    }
                  }
                  ?>