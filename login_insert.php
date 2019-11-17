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
   
include"connect.php";
    $u_id=intval($_GET['id']);
   // $u_id=$_POST['fname'];
    $u_fname=$_POST['fname'];
    $u_phone=$_POST['phone'];
    $u_name=$_POST['name'];
    $u_pass=$_POST['pass'];
    $u_per=$_POST['per'];
    $u_status=$_POST['status'];
    

if(isset($_POST['insert']))
{   
    $per=intval($_SESSION['seper']);
    if($per!=1) {
     echo " <p style='color:red ; text-align: center;font-size:20px'>
                           ليس لديك صلاحية التعديل </p> ";
    }
     else
     {
       $insert=mysql_query("insert into login
        (ufname,uphone,uname,upass,uper,ustatus) 
         values
         ('$u_fname','$u_phone','$u_name','$u_pass',$u_per,$u_status)",$conn) or die("خطا في الادخال")
                ;  
     }
       
                        if (isset($insert))
                        {
                             echo"<p class='add'><script> document.write(' تم اضافة بنجاح') </script></p>";
                        }
     }
 
    $o_date=date('y-m-d');
?>
 <details>  <summary><span class="sam">ادخال جديد</span></summary> 
<form class="inputform" action="login_insert.php" method="POST" >
	<fieldset>
		<legend>اادارة المستخدمين</legend>
        الاسم كامل:<input class="text" type="text" name="fname" required ><br>
        الهاتف:<input class="text" type="text" name="phone" required ><br>
         اسم المستخدم:<input class="text" type="text" name="name" required ><br>
        كلمة المرور:<input class="text" type="password" name="pass" required ><br>
   صلاحية:
 <select name="per" >
 	<option value="1" selected>مدير</option>
 	<option value="2">صادر</option>
 	<option value="3">وارد</option>
 		<option value="4" >فواتير</option>
 </select>
        
 الحالة:
 <select name="status">
 	<option value="1" selected>منح</option>
 	<option class="" value="0">سحب</option>
 </select><br>

<input type="submit" name="insert" value="اصافة">
<input type="submit" name="update" value="تحديث">

<input type="reset" value="الغاء">

<input type="hidden" name="add" value="new">

</fieldset>
</form>
    </details>   
    
<?php
 
    

   
$q=mysql_query(" select * from login order by uid asc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
<center>
<table class="table" cellpadding="10" cellspacing="0">
  <tr class="title">
        <td>الرقم</td>
           <td>الاسم</td>
              <td>الهاتف</td>
                        <td>صلاحية</td>
                           <td>سماح بالدخول</td>
                               <td>الخيارات</td>
                     

  </tr>
    
    <?php   //<img src='images/delete.jpg' width='8%' >
while($row=mysql_fetch_array($q))
{
    echo "
<tr>
<td>".$row['uid']."</td>
<td>".$row['ufname']."</td>
<td>".$row['uphone']."</td>
<td>".$row['uper']."</td>
<td>".$row['ustatus']."</td>
<td >
<a href='login_update.php?do=edit&id=".$row['uid']."'><input class='ed' type='button' value='تعديل'></a>   
 " ; ?>
<input class="del" type="button" onclick="del_data(<?php echo $row['uid']; ?>)" alt="حذف الفاتورة" name="delete" value="حذف">	
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
				window.location.href='login_delete.php?del_id='+delid+'';
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
