<?php
include("check_login.php");
?>
<!doctype html>
<html>
<head>
	<title></title>
	
<meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="css/insert_store.css">
    <style type="text/css">
    
    fieldset {
    width: 80%;
   
}
    </style>
</head>
<body>


<?php
   
include"connect.php";
    $s_id=intval($_GET['id']);
  $e_id=intval($_POST['eid']);
  $s_month=$_POST['smonth'];
  $s_date=$_POST['sdate'];
  
   if($_REQUEST['do']=='edit')
   {
       
      $per=intval($_SESSION['seper']);
             if($per!=1) { ?>
    <script type="text/javascript">
    alert("ليس لديك صلاحيات التعديل ");
   window.location.replace("salaries_insert.php");
    </script>
        <?php } 
       else
       {
           $q=mysql_query(" select emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
from salaries
INNER JOIN emp on emp.eid=salaries.eid and salaries.sid=$s_id  ");
    $res=mysql_fetch_assoc($q);
    $o_date=date('y-m-d');    
?>	
    <form class="inputform" action="" method="POST" >
	<fieldset style="width:65%">
		<legend>  تعديل بيانات المرتبات</legend>
          الرقم: <?php echo  $res['did']; ?> 
        اسم الموظف :<input class="text" type="text" name="ename"  required disabled value=" <?php echo  $res['ename']; ?> " >    
        الشهر:<input  type="text" name="smonth"  value=" <?php echo intval($res['smonth']); ?> " min="1" max="12"><br>
تاريخ الصرف  :<input type="date" name="sdate"  <?php echo" value='".$res['sdate']."' " ; ?> >
<input type="submit" name="insert" value="اصافة">
<input type="submit" name="update" value="تحديث">
<input type="reset" value="الغاء">
<input type="hidden" name="add" value="new">
</fieldset>
</form>
    <p class="add"><a href="salaries_insert.php"><script> document.write("الرجوع") </script></a></p>;    
    
   <?php   
     
           
       }

}
      if(isset($_POST['update']) and $_POST['update']=='تحديث')
          
    {       $smonth=intval($s_month);

             $updat= mysql_query("update salaries  
           set smonth=$smonth,
           sdate='$s_date'
           where sid=$s_id",$conn)or die("لم يتم تحديث البيانات");

              
             }
           if (isset($updat)) {
         echo"<p class='add'><script> document.write(' تم تحديث بنجاح') </script></p>";} 


    if(isset($_POST['insert']))
    {   
       $per=intval($_SESSION['seper']);
        if($per!=1) {
         echo " <p style='color:red ; text-align: center;font-size:20px'>
                               ليس لديك صلاحية التعديل </p> ";
        } 
       else
       {
              $get_sal=mysql_query("select esal from emp where eid=$e_id");
        $sal_row=mysql_fetch_array($get_sal);
        $sal=$sal_row['esal'];
             $insert=mysql_query("insert into salaries
            (eid,smonth,ssal,sdate)
            values
     ($e_id,$s_month,$sal,'$s_date')",$conn) or die("خطا في ادخال")
                    ;
       }
         }
    
    if (isset($insert))
                        {
                             echo"<p class='add'><script> document.write(' تم اضافة بنجاح') </script></p>";
                        }
 
    if($_REQUEST['do']=='del')
    {
           mysql_query("delete from salaries where sid=".$s_id." ");
       
    }

$q=mysql_query(" select emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
from salaries
INNER JOIN emp on emp.eid=salaries.eid order by salaries.sid asc ");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
<center>,
<table style="width:70%" class="table"  cellpadding="10" cellspacing="0">
  <tr class="title">
        <td>الرقم</td>
           <td>الاسم</td>
           <td>الشهر </td>
              <td>الراتب</td>
                 <td>تاريخ الصرف</td>                
                     <td>الخيارات </td>                
  </tr>
    <?php   
while($row=mysql_fetch_array($q))
{ echo "
<tr>
<td>".$row['sid']."</td>
<td>".$row['ename']."</td>
<td>".$row['smonth']."</td>
<td>".$row['ssal']."</td>
<td>".$row['sdate']."</td>
<td >
<a href='salaries_update.php?do=edit&id=".$row['sid']."'><input class='ed' type='button' value='تعديل'></a>   
 " ; ?>
<input class="del" type="button" onclick="del_data(<?php echo $row['sid']; ?>)" alt="حذف الفاتورة" name="delete" value="حذف">	
</td> 
</tr>
	<?php
}   echo"</table>";
}  
   
    
    mysql_close($conn);
    ?>
<script type="text/javascript">
	var per=<?php echo $_SESSION['seper'] ?>;
	function del_data(delid)
		{ if(per==1){
		if(confirm("هل متاكد من حذف المنتج"))
			{
				window.location.href='salaries_delete.php?del_id='+delid+'';
				return true;
			}
            }
         else{
             alert("ليس لديك صلاحية الحذف");
         }
			
		}
	</script>
</body>
</html>
