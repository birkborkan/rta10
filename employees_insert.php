<?php
include("check_login.php");
?>
<!doctype html>
<html>
<head>
	<title></title>
	
<meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="css/insert_store.css">
</head>
<body>
<?php
   
include "connect.php";


    /*
    
              if (isset($insert))
                        {
                             echo"<p class='add'><script> document.write(' تم اضافة بنجاح') </script></p>";
                        }
    */
 


   
$q=mysql_query(" select * from emp order by eid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
 
<table class="table"  cellpadding="10" cellspacing="0">
  <tr class="title2">
        <td>الرقم</td>
           <td>الاسم</td>
           <td>الهاتف </td>
              <td>الوظيفة</td>
                 <td>الراتب</td>
                   <td>تاريخ التعين</td>
                         <td >الخيارات</td>

  </tr>
    
    <?php   //<img src='images/delete.jpg' width='8%' >
while($row=mysql_fetch_array($q))
{//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
    echo "
<tr>
<td>".$row['eid']."</td>
<td>".$row['ename']."</td>
<td>".$row['ephone']."</td>
<td>".$row['ejob']."</td>
<td>".$row['esal']."</td>
<td>".$row['ehdate']."</td>
<td >
<a href='employees_update.php?do=edit&id=".$row['eid']."'><input class='ed' type='button' value='تعديل'></a>   
 " ; ?>
<input class="del" type="button" onclick="del_data(<?php echo $row['eid']; ?>)" alt="حذف الفاتورة" name="delete" value="حذف">	
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
		if(confirm("هل متاكد من حذف السجل"))
			{
				window.location.href='employees_delete.php?del_id='+delid+'';
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
