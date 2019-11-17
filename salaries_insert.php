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
        .emp_table{
            text-align: right;
            direction: rtl;
            font-size: 18px;
            
        }
        .emp_table td{
            border:0px;
        }
    </style>
     <script type="text/javascript">
      function printDiv(printPage) {
     var printContents = document.getElementById(printPage).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

    </script>

</head>
<body>


<?php
   
include"connect.php";
    $s_id=intval($_GET['id']);
  $e_id=intval($_POST['eid']);
  $s_month=$_POST['smonth'];
  $s_date=$_POST['sdate'];
  
$get_emp=mysql_query("select * from emp order by eid asc"); 
  
?>	
 <details>  <summary><span class="sam">ادخال جديد</span></summary>
<form class="inputform" action="salaries_insert.php" method="POST" >
	<fieldset style="width:65%">
		<legend>اضافة  مرتبات</legend>
        اسم الموظف :
<select name="eid" >
 <?php while($erow=mysql_fetch_array($get_emp)):; ?>	
     <option value="<?php echo $erow['eid'];?>" >
<?php echo $erow['ename']; ?></option>
     
         <?php endwhile ; 
          ?>
     شهر:   </select>
        <select name="smonth" >
        <option value="1">يناير</option>
        <option value="2">فبراير</option>
        <option value="3">مارس</option>
        <option value="4">ابريل</option>
        <option value="5">مايو</option>
        <option value="6">يونيو</option>
        <option value="7">يوليو</option>
        <option value="8">اغسطس</option>
        <option value="9">سبتمبر</option>
        <option value="10">اكتوبر</option>
        <option value="11">نوفمبر</option>
        <option value="12">ديسمبر</option>
        </select>
تاريخ الصرف  :<input type="date" name="sdate"> <br>
<input type="submit" name="insert" value="اصافة">
<input type="reset" value="الغاء">
<input type="hidden" name="add" value="new">

</fieldset>
</form>
    </details>   
    <form action="" method="post">
     بحث بــ:
        <select name="sch">
       
        <option value="all">اختيار الكل</option>
        <option value="ename">اسم الموظف</option>
        <option value="smon">شهر </option>
        <option value="sdate">تاريخ الصرف </option>
        </select>
             :<input class="schdate" type="date" name="date" >
    <input class="search" type="text" name="search" placeholder="اكتب نص للبحث">
        <input class="searchbt" type="submit" name="searchbt" value="بحث">
    </form>
    <?php

    if(isset($_POST['insert']))
    { $per=intval($_SESSION['seper']);
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
 
   if(isset($_POST['searchbt']))
{
    $sch_by= $_POST['sch'];
    $s_txt= $_POST['search'];
    $s_date= $_POST['date'];
           if(empty($_POST['date']) and empty($_POST['search']) and $sch_by!='all')
                {
               echo"<p class='add'><script> document.write('الرجاء كتابة نص للبحث عنه') </script></p>";
                }

             else if($sch_by=='ename')
               {
                         $q=mysql_query(" select emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
            from salaries
            INNER JOIN emp on emp.eid=salaries.eid and emp.ename like '%$s_txt%' order by salaries.sid desc ");
                 $num=mysql_num_rows($q);
               }
           else  if($sch_by=='smon')
           {   $q=mysql_query(" select 
               emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
            from salaries
            INNER JOIN emp on emp.eid=salaries.eid and salaries.smonth like '$s_txt' order by salaries.sid desc ");
                    $num=mysql_num_rows($q);
           }
           else  if($sch_by=='sdate')
           {   $q=mysql_query(" select 
               emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
            from salaries
            INNER JOIN emp on emp.eid=salaries.eid and salaries.sdate like '%$s_date%' order by salaries.sid desc ");
                    $num=mysql_num_rows($q);
           }
           else 
           {   $q=mysql_query(" select 
               emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
            from salaries
            INNER JOIN emp on emp.eid=salaries.eid  order by salaries.sid desc ");
                    $num=mysql_num_rows($q);
           }


       }
    else
    {
     $q=mysql_query(" select 
           emp.ename,salaries.ssal,salaries.sid,salaries.smonth,salaries.sdate
        from salaries
        INNER JOIN emp on emp.eid=salaries.eid order by salaries.sid desc ");
                $num=mysql_num_rows($q);   
    }

if ($num==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
    <input type="button" onclick="printDiv('printPage')" value="طباعة" />
<div id="printPage"> 
    <div class="rep_img_l"><img src="images/rotana.jpg" width="100px" height="100px"></div>
    <div class="rep_img_r"><img src="images/rotana.jpg" width="100px" height="100px"></div>
<div class="rep_title">مطاحن روتانا للغلال</div>
<div class="rep_title">حسبو عبداالله مصطفي-وكيل ولاية جنوب دارفور-نيالا</div>
<div class="rep_title">إدارة /محمد عبدالله (جلال)</div>
    <?php 
    if($_POST['sch']=="smon")
     {
         echo "<div class='rep_title2'>مرتبات موظفين لشهر: ".$_POST['search']."</div>";
        
     }
   else if($_POST['sch']=="sdate")
     {
         echo "<div class='rep_title2'>مرتبات موظفين لتاريخ: ".$_POST['date']."</div>";
        
     }
    else
    {
     echo "<div class='rep_title2'>مرتبات موظفين </div>";   
    }
    ?>
<center>
<table style="width:70%" class="table"  cellpadding="10" cellspacing="0" >
  <tr class="title">
        <td>الرقم</td>
           <td>الاسم</td>
           <td>الشهر </td>
              <td>الراتب</td>
                 <td>تاريخ الصرف</td>                
                     <td class="noprint">الخيارات </td>                
  </tr>
    <?php    $sum_sal=0;  
while($row=mysql_fetch_array($q))
{ $sum_sal+=intval($row['ssal']);
    echo "
<tr>
<td>".$row['sid']."</td>
<td>".$row['ename']."</td>
<td>".$row['smonth']."</td>
<td>".$row['ssal']."</td>
<td>".$row['sdate']."</td>
<td class='noprint'>
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
  <table  class="emp_table" style="width:55%" cellpadding="2" cellspacing="0" >
      <tr>
          <td> <?php echo "مجموع المرتبات: ".$sum_sal." "; ?></td>
          <td> التوقيع:.............................</td>
          <td> الختم:..............................</td>
      </tr>
      <tr><td>  <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; ?>  </td></tr>
    </table>
   
    
    </div>
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
