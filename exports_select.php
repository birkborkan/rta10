<?php
include("check_login.php");
?>
<!doctype html>
<html>
<head>
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
       <form action="" >
     بحث بــ:
        <select id="sch" name="sch">
        <option value="rname">المرحل </option>
        <option value="dname">اسم السائق</option>
        <option value="lno">رقم العربة </option>
        <option value="pname">الوحدة </option>
        <option value="ptype">التصنيف </option>
        </select>
    التاريخ<input id="date" class="" type="date" name="date" >
    <input id="search" class="" type="text" name="search" placeholder="اكتب نص للبحث">
        <input class="" type="submit" name="searchbt" value="بحث" onclick="return false;" onmousedown="exp_search()">
 </form>
  <details> <summary class="sam_s2date">بحث بين تاريخين</summary>
      <form action="" method="post">
         البداية:<input class="schdate" id="startd" type="date" name="startd" required >
         النهاية:<input class="schdate" id="endd" type="date" name="endd" required>
        <input class="searchbt" type="submit" name="searchd" value="بحث" onclick="return false;" onmousedown="exp_search_btds()">

 </form>
    
    </details>  
    
<?php
   
 
    if($_REQUEST['do']=='del')
    {
           mysql_query("delete from store_exp where eid=".$d_id." ");
       
    }
      $q=mysql_query(" select * from store_exp order by eid desc");
if($_REQUEST['do']=='arrive')
   { 
    $e_id=intval($_GET['eid']); 
 $query=mysql_query(" select * from store_exp where eid=".$e_id." ");
    $exrow=mysql_fetch_array($query);
    $o_date=date('y-m-d');
    $p_lno=$exrow['cno'];
    $p_dname=$exrow['dname'];
    $p_name=$exrow['pname'];
    $p_qty=$exrow['pqty'];
    $stype=$exrow['ptype'];
    $p_cost=$exrow['tcost'];
    $p_buy=$exrow['bcost'];
    $l_date=$exrow['ldate'];
    
     $v_item=mysql_query("select sprice from store where sname like '$p_name'");
         $pres=mysql_fetch_array($v_item);
    $p_price=$pres['sprice'];
    $p_sel=$p_qty*$p_price;
     $p_pro=max(($p_sel-$p_cost-$p_buy),0);
    $p_los=max(($p_cost+$p_buy-$p_sel),0);
    $match_q=mysql_query(" select eid from store_imp where eid = $e_id ");
    $exrow=mysql_fetch_array($match_q);
  if(mysql_num_rows($match_q)!=0)
    { 
       $updat= mysql_query("update store_imp  
       set  lno='$p_lno',
       dname='$p_dname',
       pname='$p_name',
       pqty=$p_qty,
       ptype='$stype',
        pcost=$p_cost,
        pbuy=$p_buy,
        psel=$p_sel,
        ppro=$p_pro,
        plos=$p_los,
        ldate1='$l_date',
        ldate2='$o_date'
        where eid = $e_id ",$conn)or die("لم يتم تحديث البيانات");?>
   <script type="text/javascript">
   alert("تم التحديث بنجاح");
    </script>
    <?php }
    else
    {
         $insert=mysql_query("insert into store_imp
        (eid,lno,dname,pname,pqty,ptype,pcost,pbuy,psel,ppro,plos,ldate1,ldate2,stored) 
         values
 ($e_id,'$p_lno','$p_dname','$p_name',$p_qty,'$stype',$p_cost,$p_buy,$p_sel,$p_pro,$p_los,'$l_date','$o_date',0)",$conn) or die("خطا في ادخال"); 
    } 

    mysql_free_result($query); 
          mysql_free_result($match_q); ?>
     <script type="text/javascript">
   window.location.replace("exports_select.php");
    </script>
<?php }
$rep_type="";
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
                    if($sch_type=='rname')
                        {    

     $q=mysql_query(" select * from store_exp where rname like '%$sch_by%'  and                          ldate like '$s_date' order by eid desc");
                        }
                       else if($sch_type=='dname')
                        {    

     $q=mysql_query(" select * from store_exp where dname like '%$sch_by%'  and                          ldate like '$s_date' order by eid desc");
                        }
                        else if($sch_type=='lno')
                        {
$q=mysql_query(" select * from store_exp where cno like '%$sch_by%'  and                        ldate like '$s_date' order by eid desc");
                        }
                         else if($sch_type=='pname')
                        {  
       $q=mysql_query(" select * from store_exp where pname like '$sch_by' and                         ldate like '$s_date' order by eid desc");
                       } 
                      else if($sch_type=='ptype')
                        {  
 $q=mysql_query(" select * from store_exp where ptype like '%$sch_by%' and                         ldate like '$s_date' order by eid desc");
                       }
                }
            
              else if(empty($_POST['date']) and !empty($_POST['search']))
                 {    
                   //echo" empty  date"; 
                  if($sch_type=='rname')
                        {    

      $q=mysql_query(" select * from store_exp where rname like '%$sch_by%' order by eid desc");
                        }
                  else if($sch_type=='dname')
                        {    

      $q=mysql_query(" select * from store_exp where dname like '%$sch_by%' order by eid desc");
                        }
                        else if($sch_type=='lno')
                        {
   $q=mysql_query(" select * from store_exp where cno like '%$sch_by%'  order by eid desc");
                        }
                         else if($sch_type=='pname')
                        {  
  $q=mysql_query(" select * from store_exp where pname like '$sch_by'  order by eid desc");
                       }
                       else if($sch_type=='ptype')
                        {  
    $q=mysql_query(" select * from store_exp where ptype like '%$sch_by%'  order by eid desc");
                       }
                  
                }

                else if(!empty($_POST['date']) and empty($_POST['search']))
                           {
                             //echo" empty  text"; 
    $q=mysql_query(" select * from store_exp where ldate like '$s_date' order by eid desc");
                    
                }   //$n=mysql_num_rows($q);
            
    
}
else if (isset($_POST['searchd']))
{
    $date1=$_POST['startd'];
    $date2=$_POST['endd'];
    $q=mysql_query(" select * from store_exp where ldate between '$date1' and '$date2'  order by eid desc");
    
}
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد نتائج للبحث') </script></p>";
    
}
   

else
{     
    ?>
        <p class="add"><a href="exports_insert.php"><script> document.write("ادخال  جديد") </script></a> 
    </p>
   
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
      صادر في فترة من".$_POST['startd']." الى ".$_POST['endd']."</div>";
    }
    else{
      echo "<div class='rep_title2'>صادر </div>";   
    }
    echo "<div class='rep_title2'>التاريخ:".date('Y-M-d')."</div>";
    ?>
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
    echo '
    
    <tr>
<td>'.$c_id.'</td>
<td>'.$row['rname'].'</td>
<td>'.$row['cno'].'</td>
<td>'.$row['dname'].'</td>
<td>'.$row['pname'].'</td>
<td>'.$row['pqty'].'</td>
<td>'.$row['ptype'].'</td>
<td>'.number_format($row['bcost']).'</td>
<td>'.number_format($row['dcost']).'</td>
<td>'.number_format($row['lcost']).'</td>
<td>'.number_format($row['manifist']).'</td>
<td>'.number_format($row['tcost']).'</td>
<td>'.$row['ldate'].'</td>

<td class="noprint">
'.$strd.'
</td>

<td>'.$row['comm'].'</td>
<td class="noprint">
<span class="del" onclick="del_data('.$row['eid'].')">حذف</span>

</td> 
</tr>
 
    ' ; ?> 



<?php //<a  href=''><input  class='ed'  type='button' value='تعديل'  onclick='up()'></a>
//<input  class="del" type="button" onclick="del_data('.$row['eid'].')" name="delete" value="حذف">	
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
    </div>
   <script type="text/javascript">
	var per=<?php echo $_SESSION['seper'] ?>;
	function del_data(delid)
		{
             if(per>2)
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
