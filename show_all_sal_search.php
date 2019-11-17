

 
<?php 
include "connect.php";
?>
<div  id='edit_content'></div>
<?php


 
$search_text = $_POST['search_text'];
$select = mysql_query("select emp.ename,salaries.esal,salaries.eid,salaries.smonth,salaries.sdate , salaries.id
from salaries
INNER JOIN emp on emp.eid=salaries.eid and 
 (emp.ename like '%$search_text%' or  salaries.smonth like '%$search_text%' )") or die(mysql_error());
 
 if(mysql_num_rows($select)>0){
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
while($rows = mysql_fetch_array($select)){
    $counter++;
echo '
<tr>
<td scope="row">'.$counter.'</td>
<td  id="name_'.$rows["id"].'">'.$rows['ename'].'</td>
<td >'.$rows['smonth'].'</td>
<td  >'.$rows['esal'].'</td>
<td  >'.$rows['sdate'].'</td>
<td  >
<span  class="btn btn-success" style="width:48%;" onclick="topFunction()" onmousedown="edit_sal('.$rows["id"].')">تعديل</span>  
 ';?>
<span class="btn btn-danger" style="width:48%;" 	
onmousedown='delete_(<?php echo $rows["id"];?>,"delete.php","show_all_sal.php","المرتب","عرض المرتبات","salaries","id")'>حذف

 
    <?php
    echo '
  
</td>
 
</tr>
';

}
echo '  </tbody>
</table>';
}else{
    echo "<span class = 'text text-danger'>لا توجد   ببيانات</span>";
}

?>