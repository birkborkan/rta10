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
function exit() {
 

     window.exit();

   
}
    </script>
</head>
<body>


<?php
   
include"connect.php";
    $d_id=intval($_GET['id']);


    $o_date=date('y-m-d');
   $items=mysql_query("select sno,sname,stype from store order by sno");
   
    
?>	
       <form action="" method="post">
  
     بحث بــ:
        <select name="sch">
        <option value="dname">اسم السائق</option>
        <option value="lno">اللوحة </option>
        <option value="pname">الوحدة </option>
        <option value="ptype">التصنيف </option>
        </select>
                 :<input class="schdate" type="date" name="date" >
    <input class="search" type="text" name="search" placeholder="اكتب نص للبحث">
        <input class="searchbt" type="submit" name="searchbt" value="بحث">

 </form>
  <details> <summary class="sam_s2date">بحث بين تاريخين</summary>
      <form action="" method="post">
  
 
         البداية:<input class="schdate" type="date" name="startd" required >
         النهاية:<input class="schdate" type="date" name="endd" required>
        <input class="searchbt" type="submit" name="searchd" value="بحث">

 </form>
    
    </details>  
    
<?php
   
 
    if($_REQUEST['do']=='del')
    {
           mysql_query("delete from store_imp where eid=".$d_id." ");
       
    }
    if($_REQUEST['do']=='stored')
   { ?>
      <script type="text/javascript">
       if(confirm("هل متاكد من اجراء العملية"))
      {
           <?php  $d_id=intval($_GET['did']); 
    $p_name=$_GET['pname']; 
    $p_qty=$_GET['pqty']; 
    $strd=intval($_GET['strd']); 
   if($strd ==0)
   {
       $s_date=date('y-m-d h:i:sa');
 $s_q=mysql_query(" select * from store where sname like '$p_name'");
 $srow=mysql_fetch_array($s_q);
       $s_type=$srow['stype'];
       $s_qty=$srow['sqty'];
    
            $sup= mysql_query("update store  
                   set sqty=sqty+$p_qty
                   where sname='$p_name'",$conn)or die("لم يتم تحديث");
              $insert=mysql_query("insert into history
              (hpro,hcurqty,hadd,hnew,hdate)  values
             ('$p_name',$s_qty,$p_qty,$s_qty+$p_qty,'$s_date')",$conn)
                     or die("خطا في لدخال"); 
         $imup= mysql_query("update store_imp  
       set  stored=1 where eid = $d_id ",$conn)or die("لم يتم تحديث البيانات");   
   }
    else
    { ?>
      
    alert("تمت اضافة العربة مسبقا");
     
   <?php  }
    ?>
          
       }
     
          window.location.replace("imports_select.php");
    </script>
 <?php }
    
    
      $q=mysql_query(" select * from store_imp order by eid desc");
  
    
if(isset($_POST['searchbt']))
{
    $sch_type= $_POST['sch'];
    $sch_by= $_POST['search'];
    $s_date= $_POST['date'];

                
            if(empty($_POST['date']) and empty($_POST['search']))
                        {
                       //echo"empty tbox and date";
             echo"<p class='add'><script> document.write('الرجاء كتابة نص للبحث عنه') </script></p>";
               }
            
            else if(!empty($_POST['date']) and !empty($_POST['search']))
                 { 
                         //echo"not empty tbox and date"; 
                       if($sch_type=='dname')
                        {    

                        $q=mysql_query(" select * from store_imp where dname like '%$sch_by%'  and                          ldate2 like '$s_date' order by eid desc");
                        }
                        else if($sch_type=='lno')
                        {
                             $q=mysql_query(" select * from store_imp where lno like '%$sch_by%'  and                        ldate2 like '$s_date' order by eid desc");
                        }
                         else if($sch_type=='pname')
                        {  
                         $q=mysql_query(" select * from store_imp where pname like '$sch_by' and                         ldate2 like '$s_date' order by eid desc");
                       } 
                      else if($sch_type=='ptype')
                        {  
                         $q=mysql_query(" select * from store_imp where ptype like '%$sch_by%' and                         ldate2 like '$s_date' order by eid desc");
                       }
                }
            
              else if(empty($_POST['date']) and !empty($_POST['search']))
                 {    
                   //echo" empty  date"; 
                  if($sch_type=='dname')
                        {    

                        $q=mysql_query(" select * from store_imp where dname like '%$sch_by%'   order by eid desc");
                        }
                        else if($sch_type=='lno')
                        {
                             $q=mysql_query(" select * from store_imp where lno like '%$sch_by%'  order by eid desc");
                        }
                         else if($sch_type=='pname')
                        {  
                         $q=mysql_query(" select * from store_imp where pname like '$sch_by'  order by eid desc");
                       }
                       else if($sch_type=='ptype')
                        {  
                         $q=mysql_query(" select * from store_imp where ptype like '%$sch_by%'  order by eid desc");
                       }
                  
                }

                else if(!empty($_POST['date']) and empty($_POST['search']))
                           {
                             //echo" empty  text"; 
                       $q=mysql_query(" select * from store_imp where ldate2 like '$s_date' order by eid desc");
                    
                }   //$n=mysql_num_rows($q);
            
    
}
else if (isset($_POST['searchd']))
{
    $date1=$_POST['startd'];
    $date2=$_POST['endd'];
    $q=mysql_query(" select * from store_imp where ldate2 between '$date1' and '$date2'  order by eid desc");
    
}
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد نتائج للبحث') </script></p>";
    
}
   

else
{     
    ?>
 <input type="button" onclick="printDiv('printPage')" value="طباعة" />
<div id="printPage"> 
    <div class="rep_img_l"><img src="images/rotana.jpg" width="100px" height="100px"></div>
    <div class="rep_img_r"><img src="images/rotana.jpg" width="100px" height="100px"></div>
<div class="rep_title">مطاحن روتانا للغلال</div>
<div class="rep_title">حسبو عبداالله مصطفي-وكيل ولاية جنوب دارفور-نيالا</div>
<div class="rep_title">إدارة /محمد عبدالله (جلال)</div>
<?php if(isset($_POST['searchd']))
    {
      echo "<div class='rep_title2'>
      وارد المخزن في فترة من".$_POST['startd']." الى ".$_POST['endd']."</div>";
    }
    else{
      echo "<div class='rep_title2'>وارد المخزن</div>";   
    }
    echo "<div class='rep_title2'>التاريخ:".date('Y-M-d')."</div>";
    ?>
<center>
<table style="font-size:16px" class="table"  cellpadding="5" cellspacing="0">
  <tr class="title_" >
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
    </div>
   <script type="text/javascript">
	var per=<?php echo $_SESSION['seper'] ?>;
	function del_data(delid)
		{ if(per<4){
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
