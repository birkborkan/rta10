<?php 
include "connect.php"; ?>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('add_new_user.php','ادخال مرتب   ');"> ادخال مرتب   </div>             
<input type='text' class="form-control " placeholder='Search'
 onkeydown="search('show_all_sal_search.php','عرض المرتبات')" id='search_text'onkeyup="search('show_all_sal_search.php','عرض المرتبات')"/>
 <div  id='edit_content'></div>
<div  id='search_content'> 
 <?php
 $select = mysql_query("select emp.ename,salaries.esal,salaries.eid,salaries.smonth,salaries.sdate , salaries.id
from salaries
INNER JOIN emp on emp.eid=salaries.eid ");

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
$sum_sal=0;
$counter = 0;
while($rows = mysql_fetch_array($select)){
  $sum_sal+=$rows['esal'];
    $counter++;
echo '
<tr>
<td scope="row">'.$counter.'</td>
<td  id="name_'.$rows["id"].'">'.$rows['ename'].'</td>
<td >'.$rows['smonth'].'</td>
<td  >'.number_format($rows['esal']).'</td>
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
echo"<p style='text-align:right;font-size:1.3em;margin-right:25%'>اجمالي المرتبات: ".number_format($sum_sal)."</p> ";
}else{
  echo"<p style='text-align:right'>عفواً : لا توجد نتائج مشابهة</p>";
}

?>
</div>