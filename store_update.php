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
$gid=intval($_GET['id']);

$s_val=$_POST['val'];
$s_lval=$_POST['lval'];
$s_price=$_POST['price'];
$s_date=$_POST['date'];
 
  if(isset($_POST['update']) and $_POST['update']=='product')
    {  
      $query=mysql_query("select * from store where sno=$gid") or die("error in table name");
    $row=mysql_fetch_array($query);
    $s_pro=$row['sname'];
        $s_qty=$row['sqty'];
       $s_date=date('y-m-d h:i:sa');
      
                    if($_POST['add'])
                    {
                        $updat= mysql_query("update store  

                      set sqty=sqty+$s_val,

                       sdate='$s_date'
                   where sno=$gid",$conn)or die("لم يتم تحديث");
                        
                $insert=mysql_query("insert into history (hpro,hcurqty,hadd,hnew,hdate) 
                    values
                    ('$s_pro',$s_qty,$s_val,$s_qty+$s_val,'$s_date')",$conn)
                     or die("خطا في لدخال");
                  }

                      else if($_POST['sub'])

                    {
                            $updat= mysql_query("update store  

                      set sqty=sqty-$s_val
                        sdate='$s_date'
                   where sno=$gid",$conn)or die("لم يتم تحديث");
                           $insert=mysql_query("insert into history 
                           (hpro,hcurqty,hsub,hnew,hdate) 
                    values
                    ('$s_pro',$s_qty,$s_val,$s_qty-$s_val,'$s_date')",$conn)
                     or die("خطا في لدخال");

                    }   
                   else 

                    {
                      $updat= mysql_query("update store  
                      set sprice=$s_price
                   where sno=$gid",$conn)or die("لم يتم تحديث");
                   } 


           if (isset($updat))
           {
	 echo"<p class='add'><script> document.write(' تم تحديث بنجاح') </script></p>";
           }
        
      
    }
    
if($_REQUEST['do']=='edit')
{ // session_start();
$per=intval($_SESSION['seper']);
     if($per!=1) { ?>
    <script type="text/javascript">
    alert("ليس لديك صلاحيات التعديل ");
   window.location.replace("store_update.php");
    </script>
        <?php }
else
{
     $q=mysql_query("select * from store where  sno='".$gid."'  ");
     $res=mysql_fetch_assoc($q);
 ?>
<form class="inputform" action="" method="POST" >
  <fieldset>
    <legend>تحديث المخزن</legend>

المنتج :<input type="text" name="val"<?php echo"value='".$res['sname']."' "?> disabled >
السعر :<input type="text" name="price"<?php echo"value='".$res['sprice']."' "?> ><br>
الكمية :<input type="text" name="val"<?php echo"value='".$res['sval']."' "?> ><br>
اخر تاريخ الاضافة:<input type="date" name="date" <?php echo"value='".$res['sdate']."' "?> ><br>
<input type="submit" name="add" value="اصافة">
<input type="submit" name="up" value="تحديث">
<input type="submit" name="sub" value="حذف">
<input type="hidden" name="no" value="">
<input type="hidden" name="update" value="product">

</fieldset>
</form>
<?php
  echo"<p class='add'><a href='store_update.php'><script> document.write(' الرجوع') </script></a></p>";       
}
}
   
$query=mysql_query("select * from store order by sno asc") or die("error in table name");
    
if (mysql_num_rows($query)==0) {
 echo"<p class='add'><script> document.write(' تم تعديل بنجاح') </script></p>";
}
else
{  ?>
<center>
<table class="table" style="width:auto"  cellpadding="10" cellspacing="0">
  <tr class="title">
        <td>الرقم</td>
           <td>المنتج</td>
              <td>النوع</td>
                 <td>الكمية</td>
                    <td>السعر</td>
                     <td>التاريخ</td>
                     <td>خيارات</td>

  </tr>
<?php
while ($row=mysql_fetch_array($query)) {
echo "
<tr>
<td>".$row['sno']."</td>
<td>".$row['sname']."</td>
<td>".$row['stype']."</td>
<td>".$row['sqty']."</td>
<td>".$row['sprice']."</td>
<td>".$row['sdate']."</td>
<td>
<a href='store_update.php?do=edit&id=".$row['sno']."'><input type='button' value='تعديل'></a>   
 " ; ?>
<input type="button" onclick="del_data(<?php echo $row['sno']; ?>)" alt="حذف الفاتورة" name="delete" value="جذف">	
</td> 
</tr>
<?php
}
?>
</table>
<?php
}
mysql_free_result($query);
mysql_close($conn);
?>  
<script type="text/javascript">
	var per=<?php echo $_SESSION['seper'] ?>;
	function del_data(delid)
		{ if(per==1){
		if(confirm("هل متاكد من حذف المنتج"))
			{
				window.location.href='store_delete.php?del_id='+delid+'';
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