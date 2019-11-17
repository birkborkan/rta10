<?php include "connect.php";

 $name = $_POST['search_text'];
    if($name){  
      //ufname,uname,upass,uper,ustatus
        $q = mysql_query("select * from `login` where `ufname` like '%$name%' 
        or 'uper' like '%$name%' or 'ustatus' like '%$name%' or 'udate' like '%$name%'  ")or die(mysql_error());
                    if(mysql_num_rows($q) > 0) {
  
  ?>
      <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;'>
                       
          <th>#</th>
               <th>الاسم</th>
                  <th>صلاحية</th>
                    <th>سماح بالدخول </th>
                    <th>ت. الاضافة  </th>
                          <th >الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                        $srno= 0;
                        while($row=mysql_fetch_array($q))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            if($row['uper'] == "1")  {$per="اداري"; }
                            else if($row['uper'] == "2")  {$per="صادر"; }
                            else if($row['uper'] == "3")  {$per="وارد"; }
                            else{$per="مبيعات"; }
                            if($row['ustatus'] == "1")  {$status="ممنوح"; }
                           
                            else{$status="مسحوب"; }
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td>".$row['ufname']."</td>
                        <td >".$per."</td>
                        <td >".$status."</td>
                        <td >".$row['udate']."</td>
                       <td>
                        <span  onclick='topFunction()' onmousedown='edit_user(".$row['uid'].")'
                        class='btn btn-success' style='width:48%;'>تعديل </span>   
                        "; ?>  
                        <span   class='btn btn-danger' style='width:48%;'
                             
                            onmousedown='delete_(<?php echo $row["uid"] ; ?>,"delete.php","show_all_user.php","المستخدم","عرض المستخدمين","login","uid")'>حذف</span>	
                            
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

                    $q=mysql_query(" select * from login order by uid desc");
                    if (mysql_num_rows($q)>0) {
                    

    ?>
      <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;'>
                       
          <th>#</th>
               <th>الاسم</th>
                  <th>صلاحية</th>
                    <th>سماح بالدخول </th>
                    <th>ت. الاضافة  </th>
                          <th >الخيارات</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                        $srno= 0;
                        while($row=mysql_fetch_array($q))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            if($row['uper'] == "1")  {$per="اداري"; }
                            else if($row['uper'] == "2")  {$per="صادر"; }
                            else if($row['uper'] == "3")  {$per="وارد"; }
                            else{$per="مبيعات"; }
                            if($row['ustatus'] == "1")  {$status="ممنوح"; }
                           
                            else{$status="مسحوب"; }
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td>".$row['ufname']."</td>
                        <td >".$per."</td>
                        <td >".$status."</td>
                        <td >".$row['udate']."</td>
                       <td>
                        <span onmousedown='edit_user(".$row['uid'].")'
                        class='btn btn-success' style='width:48%;'>تعديل </span>   
                        "; ?>  
                        <span   class='btn btn-danger' style='width:48%;'
                             
                            onmousedown='delete_(<?php echo $row["uid"] ; ?>,"delete.php","show_all_user.php","المستخدم","عرض المستخدمين","login","uid")'>حذف</span>	
                            
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