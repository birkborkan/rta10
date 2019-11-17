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
     $l_no=$_POST['lno'];
  $d_name=$_POST['dname'];
  $p_phone=$_POST['dphone'];
  $p_name=$_POST['pname'];
  $p_type=$_POST['ptype'];
  $p_qty=$_POST['pqty'];
  //$p_cost=$_POST['pcost'];
  $p_bors=$_POST['borsa'];
  $p_buy=$_POST['pbuy'];
  $p_date1=$_POST['date1'];
  $p_date2=$_POST['date2'];
  $p_fees=$_POST['pfees'];
     
   if($_REQUEST['do']=='edit')
   {
       $per=intval($_SESSION['seper']);
           if($per>3) { ?>
    <script type="text/javascript">
    alert("ليس لديك صلاحيات التعديل ");
   window.location.replace("imports_select.php");
    </script>
        <?php }  
    else
    {
 $q=mysql_query("select * from store_imp where eid=".$d_id." ");
     $res=mysql_fetch_assoc($q);
    $p_name=$res['pname'];
    $o_date=date('y-m-d');   
   $items=mysql_query("select sname,stype from store order by sno");
?>	
<form class="larage_form" action="" method="POST" >
	<fieldset>
		<legend>تعديل وارد المخزن</legend> 
          الرقم: <?php echo  $res['did']; ?> 
          رقم العربة:<input class="text" type="text" name="lno" value=" <?php echo  $res['lno']; ?> "><br>
        اسم السائق:<input class="text" type="text" name="dname" value=" <?php echo  $res['dname']; ?> "><br>
      التصنيف:
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
                     endwhile ; ?> <br>
        </select>
                
الكمية:<input type="text" name="pqty" value=" <?php echo  $res['pqty']; ?> " min="1"> <br>
 سعر الشراء:<input type="text" name="pbuy" value=" <?php echo  $res['pbuy']; ?> "  min='1'>
 
التكلفة:<input type="text" name="pcost" disabled value=" <?php echo  $res['pcost']; ?> "  min='1' ><br>
بورصة:<input type="text" name="borsa" value=" <?php echo  $res['borsa']; ?> "  min='1' ><br>
تاريخ الشحن  :<input type="date" name="date1" <?php echo"value='".$res['ldate1']."' "?> >
تاريخ الوصول  :<input type="date" name="date2" <?php echo"value='".$res['ldate2']."' "?> >
<input type="submit" name="update" value="تحديث">
<input type="reset" value="الغاء">
<input type="hidden" name="add" value="new">

</fieldset>
</form>
 <p class="add"><a href="imports_select.php"><script> document.write("الرجوع") </script></a></p>;    
    
<?php   
       $s_id=$res['sno'];
          $or_qty=$res['oqty'];
            mysql_free_result($q);
      }
         }
      if(isset($_POST['update']) and $_POST['update']=='تحديث')
    {  
    $p_name=$_POST['pname'];
           
 $v_item=mysql_query("select sname,stype,sprice from store where sname like '$p_name'");
         $sres=mysql_fetch_array($v_item);
       $s_name=$sres['sname'];
       $s_type=$sres['stype'];
        $s_price=$sres['sprice'];
      $p_sel=$s_price * $p_qty;
     $p_pro=max(($p_sel-$p_cost-$p_bors-$p_buy),0);
    $p_los=max(($p_cost+$p_bors+$p_buy-$p_sel),0);
         $updat= mysql_query("update store_imp  
       set  dname='$d_name',
       pname='$p_name',
         ptype='$s_type',
         pqty=$p_qty,
         psel=$p_sel,
         borsa=$p_bors,
        pbuy=$p_buy,
        ppro=$p_pro,
        plos=$p_los,
        ldate1='$p_date1',
        ldate2='$p_date2'
       where eid=$d_id",$conn)or die("لم يتم تحديث البيانات");
 
      
          mysql_free_result($v_item);   
         }
       if (isset($updat)) {
         
	 echo"<p class='add'><script> document.write(' تم تحديث بنجاح') </script></p>";} ?>
       
          <script type="text/javascript">
        alert("تم اضافة بنجاح");
      window.location.replace("exports_select.php");
        </script>
     <?php if($_REQUEST['do']=='del')
    {
           mysql_query("delete from store_imp where eid=".$d_id." ");
       
    }
 
   
$q=mysql_query(" select * from store_imp order by eid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
<center>
<table style="font-size:16px" class="table"  cellpadding="5" cellspacing="0">
  <tr class="title_">
        <td>الرقم</td>
       <td>رقم العربة </td>
           <td>اسم السائق</td>
                 <td>الوحدة</td>
                   <td>التصنيف</td>
                     <td>الكمية</td>
                        <td> الشراء</td>
                         <td>التكلفة</td>
                         <td>بورصة</td>
                         <td > البيع</td>
                         <td >الربح</td>
                         <td >الخسارة</td>    
                         <td >ت. الشحن</td>
                         <td >ت. الوصول</td>
                         <td >اضافة للمخزن</td>
                         <td class="noprint"  >الخيارات</td>
  </tr>   
    <?php 
    $p_qty=0;
    $p_sel=0;
    $p_cost=0;
    $p_bors=0;
    $p_buy=0;
    $p_pro=0;
    $p_los=0;
    $c_id=0;
while($row=mysql_fetch_array($q))
{
    if($row['stored']==1)
{
 $strd="تمت";   
}
 else
 {
  $strd="لم يتم";    
 }
     $c_id+=1;
  $p_qty+=$row['pqty']; 
  $p_sel+=$row['psel']; 
  $p_cost+=$row['pcost']; 
  $p_bors+=$row['pcost']; 
  $p_buy+=$row['pbuy'];  
  $p_pro+=$row['ppro']; 
  $p_los+=$row['plos']; 
    echo "
<tr>
<td>".$c_id."</td>
<td>".$row['lno']."</td>
<td>".$row['dname']."</td>
<td>".$row['pname']."</td>
<td>".$row['ptype']."</td>
<td>".number_format($row['pqty'])."</td>
<td>".number_format($row['pbuy'])."</td>
<td>".number_format($row['pcost'])."</td>
<td>".number_format($row['borsa'])."</td>
<td>".number_format($row['psel'])."</td>
<td>".number_format($row['ppro'])."</td>
<td>".number_format($row['plos'])."</td>
<td>".$row['ldate1']."</td>
<td>".$row['ldate2']."</td>  
<td class='noprint'>
<a href='imports_select.php?do=stored&did=".$row['eid']."&pname=".$row['pname']."&pqty=".$row['pqty']."&strd=".$row['stored']."'><input class='ed' type='button' value='اضافة'></a>:".$strd."</td>
<td class='noprint'>
<a  href='imports_update.php?do=edit&id=".$row['eid']."'><input  class='ed'  type='button' value='تعديل'></a>   
 " ; ?> 
<input class="del" type="button" onclick="del_data(<?php echo $row['did']; ?>)" name="delete" value="حذف">	
</td> 
</tr>

<?php
} echo "
<tr>
<td style='border-style:none;'></td>
<td style='border-style:none;'>الاجماليات</td>
<td style='border-style:none;'></td>
<td style='border-style:none;'></td>
<td style='border-style:none;'></td>
<td>".number_format($p_qty)."</td>
<td>".number_format($p_sel)."</td>
<td>".number_format($p_cost)."</td>
<td>".number_format($p_bors)."</td>
<td>".number_format($p_buy)."</td> 
<td>".number_format($p_pro)."</td> 
<td>".number_format($p_los)."</td> 
 
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
		{ if(per==1){
		if(confirm("هل متاكد من حذف السجل"))
			{
				window.location.href='imports_delete.php?del_id='+delid+'';
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
