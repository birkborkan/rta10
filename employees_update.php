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
    $e_id=intval($_GET['id']);
  $e_name=$_POST['ename'];
  $e_phone=$_POST['ephone'];
  $e_job=$_POST['ejob'];
  $e_sal=$_POST['esal'];
  $e_date=$_POST['ehdate'];

   if($_REQUEST['do']=='edit')
   {
         $per=intval($_SESSION['seper']);
            if($per!=1) { ?>
    <script type="text/javascript">
    alert("ليس لديك صلاحيات التعديل ");
   window.location.replace("employees_insert.php");
    </script>
        <?php }
       else
       {
       
 $q=mysql_query("select * from emp where eid=".$e_id." ");
     $res=mysql_fetch_assoc($q);
    $o_date=date('y-m-d');    
?>	

    <form class="inputform" action="" method="POST" >
	<fieldset style="width:65%">
		<legend>تحديث الموظف</legend>
          الرقم: <?php echo  $res['did']; ?> 
        اسم الموظف :<input class="text" type="text" name="ename"  required value=" <?php echo  $res['ename']; ?> " >    
        الهاتف:<input class="text" type="text" name="ephone"  value=" <?php echo $res['ephone']; ?> "><br>
        الوظيفة:<input class="text" type="text" name="ejob"  value=" <?php echo  $res['ejob']; ?> ">
        الراتب:<input class="text" type="text" name="esal"  value=" <?php echo $res['esal']; ?> "><br>                                     
تاريخ التعيين  :<input type="date" name="ehdate"  <?php echo" value='".$res['ehdate']."' " ; ?> >
<input type="submit" name="insert" value="اصافة">
<input type="submit" name="update" value="تحديث">

<input type="reset" value="الغاء">

<input type="hidden" name="add" value="new">

</fieldset>
</form>
    <p class="add"><a href="employees_insert.php"><script> document.write("الرجوع") </script></a></p>;    
   <?php   
      }
   }
      if(isset($_POST['update']) and $_POST['update']=='تحديث')
    {  
             $updat= mysql_query("update emp  
           set ename='$e_name',
           ephone='$e_phone',
           ejob='$e_job',
           esal=$e_sal,
           ehdate='$e_date'
           where eid=$e_id",$conn)or die("لم يتم تحديث البيانات");

              
             }
           if (isset($updat)) {
         echo"<p class='add'><script> document.write(' تم تحديث بنجاح') </script></p>";} 

         
         
    if(isset($_POST['insert']))
    { 
             $insert=mysql_query("insert into emp
            (ename,ephone,ejob,esal,ehdate)
            values
     ('$e_name','$e_phone','$e_job',$e_sal,'$e_date')",$conn) or die("خطا في ادخال")
                    ;

         }
    
    if (isset($insert))
                        {
                             echo"<p class='add'><script> document.write(' تم اضافة بنجاح') </script></p>";
                        }

    

        if($_REQUEST['do']=='del')
        {
               mysql_query("delete from emp where eid=".$e_id." ");

        }


   
$q=mysql_query(" select * from emp order by eid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
<center>
<table class="table"  cellpadding="10" cellspacing="0">
  <tr class="title">
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