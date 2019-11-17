<?php include "connect.php";?>
<?php
$sch_option=$_POST['sch_option'];
 $sch_text=$_POST['sch_text'];
 $sch_date1=$_POST['sch_date1'];
 $sch_date2=$_POST['sch_date2'];
 $sch_date3=$_POST['sch_date3'];
 $whda=$_POST['whda'];
 /*	
t_id
t_amount
t_comm
t_date*/
   
  if($sch_option == "between")
    {
     
      $q = mysql_query("select emp.ename,salaries.esal,salaries.eid,salaries.smonth,salaries.sdate , salaries.id
      from salaries
      INNER JOIN emp on emp.eid=salaries.eid and  salaries.sdate between '$sch_date1' and '$sch_date2' order by salaries.id desc ");
      $s_option=" المرتبات في فترة من".$sch_date1."  الى  ".$sch_date2;
    } 
  
else  if($sch_option == "t_date3")
    {
      
      $q = mysql_query("select emp.ename,salaries.esal,salaries.eid,salaries.smonth,salaries.sdate , salaries.id
      from salaries
      INNER JOIN emp on emp.eid=salaries.eid and  salaries.sdate  = '$sch_date3' order by salaries.id desc ");
      $s_option="  عن    المرتبات بتاريخ  ".$sch_date3;
    }
     else  if($sch_option == "dname")
    {
    
      $q = mysql_query("select emp.ename,salaries.esal,salaries.eid,salaries.smonth,salaries.sdate , salaries.id
      from salaries
      INNER JOIN emp on emp.eid=salaries.eid and  salaries.smonth  = '$sch_text' order by salaries.id desc ");
      $s_option="  عن    المرتبات في شهر  " ;
    } 
     
  
   // $q=mysql_query(" select * from cus_order order by  oid asc");

    if (mysql_num_rows($q)>0) {
 
            ?>   
            <center><div id="reporttitle"  style='width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير    <?php echo $s_option."    ".$sch_text;?></div> </center>
          
          <?php
          echo '<table class="table">
          <thead>
            <tr style="background:#808080;color:white; font-size: 1.3em;">
              <th scope="col">#</th>
              <th scope="col"> اسم الموظف</th>
              <th scope="col">الشهر</th>
              <th scope="col">  المرتب  </th>
              <th scope="col"> تاريخ الصرف</th>
              <th scope="col">  الخيارات</th>
            </tr>
          </thead>
          <tbody>';
          $counter = 0;
          while($rows = mysql_fetch_array($q)){
              $counter++;
          echo '
          <tr>
          <td scope="row">'.$counter.'</td>
          <td  id="name_'.$rows["id"].'">'.$rows['ename'].'</td>
          <td >'.$rows['smonth'].'</td>
          <td  >'.$rows['esal'].'</td>
          <td  >'.$rows['sdate'].'</td>
         
           
          </tr>
          ';
          
          }
          echo '  </tbody>
          </table>';
         
              }
             
                else{
                echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
                    }
            ?>
            <div>