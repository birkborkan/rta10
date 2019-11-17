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
  $d_id=intval($_GET['id']);
    $r_name=$_POST['rname'];
  $c_no=$_POST['cno'];
  $d_name=$_POST['dname'];
  $p_name=$_POST['pname'];
  $p_qty=$_POST['pqty'];
  $p_type=$_POST['ptype'];
  $b_cost=$_POST['bcost'];
  $d_cost=$_POST['dcost'];
  $l_cost=$_POST['lcost'];
  $mani=$_POST['manifist'];
  $l_date=$_POST['ldate'];
  $comm=$_POST['comm'];
   if($_REQUEST['do']=='edit')
   {
       $per=intval($_SESSION['seper']);
        if($per>2) { ?>
    <script type="text/javascript">
    alert("ليس لديك صلاحيات التعديل ");
   window.location.replace("exports_select.php");
    </script>
        <?php }  
    else
    {
          if(isset($_POST['update']) and $_POST['update']=='تحديث')
          {
             $q=mysql_query("select * from store_exp where eid=".$d_id." "); 
          }
        else
            {
        $q=mysql_query("select * from store_exp where eid=".$d_id." ");
        }
 
     $res=mysql_fetch_assoc($q);
    $p_name=$res['pname'];
    $o_date=date('y-m-d');    
   $items=mysql_query("select sname,stype from store order by sno");
?>	
<form class="larage_form" action="" method="POST" >
	<fieldset>
		<legend>تعديل صادر</legend>                             
         
        المرحل:<input class="text" type="text" name="rname" value=" <?php echo  $res['rname']; ?> "><br>
        رقم العربة:<input class="text" type="text" name="cno" value=" <?php echo  $res['cno']; ?> "><br>
         اسم السائق:<input class="text" type="text" name="dname" value=" <?php echo  $res['dname']; ?> "><br>
   الوحدة:
         <select name="pname" id="item" >
                 <?php while($srow=mysql_fetch_array($items)):;	
                     if($p_name == $srow['sname'])
                     {  ?>
                     <option value="<?php echo $srow['sname'];?>" selected><?php echo $srow['sname'];?></option>
                <?php }
                     else
                     { ?>
                     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname'];?></option>
                <?php }
                     endwhile ; ?> 
        </select>
                
الكمية:<input type="text" name="pqty" value=" <?php echo  $res['pqty']; ?> " min="1"> <br>
الشراء:<input type="text" name="bcost" value=" <?php echo  $res['bcost']; ?> " min="1"> <br>
تكلفة ترحيل :<input type="text" name="dcost" value=" <?php echo  $res['dcost']; ?> "  min='1' > 
تكلفة تحميل :<input type="text" name="lcost" value=" <?php echo  $res['lcost']; ?> "  min='1' ><br>
منفستو :<input type="text" name="manifist" value=" <?php echo  $res['manifist']; ?> "  min='1' ><br>
ملاحظات:<input type="text" name="comm" value=" <?php echo  $res['comm']; ?> " ><br>
تاريخ الشحن  :<input type="date" name="ldate" <?php echo"value='".$res['ldate']."' "?> >

<input type="submit" name="update" value="تحديث">
<input type="reset" value="الغاء">
<input type="hidden" name="add" value="new">

</fieldset>
</form>
 <p class="add"><a href="exports_select.php"><script> document.write("الرجوع") </script></a></p>;    
    
<?php     //  (rname,cno,dname,pname,pqty,ptype,dcost,lcost,ldate)
       $s_id=$res['sno'];
          $or_qty=$res['oqty'];
            mysql_free_result($q);
      }
         }
      if(isset($_POST['update']) and $_POST['update']=='تحديث')
    {
              $p_name=$_POST['pname'];
           
         $v_item=mysql_query("select stype from store where sname like '$p_name'");
         $sres=mysql_fetch_array($v_item);
       $s_type=$sres['stype'];
       $t_cost=$b_cost+$d_cost+$l_cost+$mani;
 
    $updat= mysql_query("update store_exp  
       set  rname='$r_name',
       cno='$c_no',
       dname='$d_name',
       pname='$p_name',
       pqty=$p_qty,
       ptype='$s_type',
         bcost=$b_cost,
        dcost=$d_cost,
        lcost=$l_cost,
        manifist=$mani,
        tcost=$t_cost,
        ldate='$l_date',
        comm='$comm'
       where eid=$d_id",$conn)or die("لم يتم تحديث البيانات");
 
      
          mysql_free_result($v_item);   
         }
       if (isset($updat)) {
	 echo"<p class='add'><script> document.write(' تم تحديث بنجاح') </script></p>";
       
       ?>
   

 
   <?php
       } 
    
    if(isset($_POST['insert']) and $_POST['insert']=='اضافة')
{    
        $per=intval($_SESSION['seper']);
        if($per!=1) {
         echo " <p style='color:red ; text-align: center;font-size:20px'>
                               ليس لديك صلاحية التعديل </p> ";
        }
        else
        {      
         $insert=mysql_query("insert into store_imp
        (dname,lno,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2) 
         values
         ('$p_dname','$p_lno','$p_phone','$p_name','$p_type',$p_qty,$p_sel,$p_cost,$p_buy,$p_pro,$p_los,$p_fees,'$p_date1','$p_date2')",$conn) or die("خطا في ادخال")
                ;
        }
                        
     }
 
     if($_REQUEST['do']=='del')
    {
           mysql_query("delete from store_exp where eid=".$d_id." ");
       
    }
 
   
$q=mysql_query(" select * from store_exp order by eid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
<center>
<table style="font-size:16px" class="table"  cellpadding="5" cellspacing="0">
  <tr class="title_">
        <td>الرقم</td>
           <td>المرحل </td>
             <td>ر. العربة </td>
             <td>اسم السائق</td>
                 <td>الوحدة</td>
                   <td>الكمية</td>
                     <td>التصنيف</td>
                        <td> الشراء</td>
                        <td> ترحيل</td>
                         <td>تحميل</td>
                         <td>منفستو</td>
                         <td>التكلفة</td>
                         <td >ت. الشحن</td>
                         <td >الوصول</td>
                         <td >ملاحظات</td>
                         <td class="noprint"  >الخيارات</td>
 </tr>
    <?php 
    $p_qty=0;
    $d_cost=0;
    $b_cost=0;
    $l_cost=0;
    $mani_=0;
    $cost=0;
    $t_cost=0;
    $c_id=0;

while($row=mysql_fetch_array($q))
{ 
 if($row['arrive']==1)
{
 $strd="تمت";   
}
 else
 {
  $strd="لم تتم";    
 }
    $c_id+=1;
  $p_qty+=$row['pqty']; 
  $b_cost+=$row['bcost']; 
  $d_cost+=$row['dcost']; 
  $l_cost+=$row['lcost']; 
  $mani_+=$row['manifist']; 
  $t_cost+=$row['tcost'];
 //(rname,cno,dname,pname,pqty,ptype,dcost,lcost,ldate) 
    echo "
<tr>
<td>".$c_id."</td>
<td>".$row['rname']."</td>
<td>".$row['cno']."</td>
<td>".$row['dname']."</td>
<td>".$row['pname']."</td>
<td>".$row['pqty']."</td>
<td>".$row['ptype']."</td>
<td>".number_format($row['bcost'])."</td>
<td>".number_format($row['dcost'])."</td>
<td>".number_format($row['lcost'])."</td>
<td>".number_format($row['manifist'])."</td>
<td>".number_format($row['tcost'])."</td>
<td>".$row['ldate']."</td>

<td class='noprint'>
".$strd."
</td>

<td>".$row['comm']."</td>
<td class='noprint'>
 

<a href='exports_update.php?do=edit&id=".$row['eid']."'><input class='ed' type='button' value='تعديل'></a>
 " ; ?> 
<input class="del" type="button" onclick="del_data(<?php echo $row['eid']; ?>)" name="delete" value="حذف">	
</td> 
</tr>

<?php //<a  href=''><input  class='ed'  type='button' value='تعديل'  onclick='up()'></a>
} echo "
<tr>
<td style='border-style:none;'></td>
<td style='border-style:none;'>الاجماليات</td>
<td style='border-style:none;'></td>
<td style='border-style:none;'></td>
<td style='border-style:none;'></td>

<td>".number_format($p_qty)."</td>
<td style='border-style:none;'></td>
<td>".number_format($b_cost)."</td>
<td>".number_format($d_cost)."</td>
<td>".number_format($l_cost)."</td>
<td>".number_format($mani_)."</td>
<td>".number_format($t_cost)."</td>
"; 
    echo"</table>";
}
 
   
    mysql_close($conn);
    ?>
  <table  class="emp_table" style="width:70%" cellpadding="2" cellspacing="0" >
      <tr>
         
          <td> التوقيع:.............................</td>
          <td> الختم:..............................</td>
      </tr>
      <tr><td> <span class="sal_out"> <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; ?>  </span></td></tr>
    </table>
    
   <script type="text/javascript">
	var per=<?php echo $_SESSION['seper'] ?>;
	function del_data(delid)
		{
             if(per!=2)
              {    alert("ليس لديك صلاحية الحذف");

                }
             else
             {
                  if(confirm("هل متاكد من حذف السجل"))
                     {
                       window.location.href='exports_delete.php?del_id='+delid+'';
                                return true;
                     }   
             }
			
		}
       function up()
       { alert("سيتم التحديث قريبا");}
	</script>
</body>
</html>
