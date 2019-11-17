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
   $r_name=$_POST['rname'];
  $c_no=$_POST['cno'];
  $d_name=$_POST['dname'];
  $p_name=$_POST['pname'];
  $p_qty=$_POST['pqty'];
  $p_type=$_POST['ptype'];
  $d_cost=$_POST['dcost'];
  $l_cost=$_POST['lcost'];
  $mani=$_POST['manifist'];
  $bors=$_POST['borsa'];
  $l_date=$_POST['ldate'];

    $o_date=date('y-m-d');
   //$items=mysql_query("select sno,sname,stype from store order by sno");
    if($_REQUEST['do']=='del')
    {
           mysql_query("delete from store_exp where eid=".$d_id." ");
       
    }
      $q=mysql_query(" select * from store_exp where arrive=0 order by eid desc");
if($_REQUEST['do']=='arrive')
   { ?>
     <script type="text/javascript">
       if(confirm("هل متاكد من اجراء العملية"))
      { alert("ok") }
         else
             {
               alert("no");
             }
   
    </script>
 <?php }

if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد عربات في انتظار ') </script></p>";
    
}
   

else
{     
    ?>
     
  
 <input type="button" onclick="printDiv('printPage')" value="طباعة" />
     <center>
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
      echo "<div class='rep_title2'>صادرفي انتظار </div>";   
    }
    echo "<div class='rep_title2'>التاريخ:".date('Y-M-d')."</div>";
    ?>

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
                         <td>بورصة</td>
                         <td>التكلفة</td>
                         <td >ت. الشحن</td>
                         <td >الوصول</td>
                         <td >ملاحظات</td>
                
 </tr>
    <?php 
    $p_qty=0;
    $d_cost=0;
    $b_cost=0;
    $l_cost=0;
    $mani_=0;
    $bors_=0;
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
  $strd="لم يتم";    
 }
    $c_id+=1;
  $p_qty+=$row['pqty']; 
  $b_cost+=$row['bcost']; 
  $d_cost+=$row['dcost']; 
  $l_cost+=$row['lcost']; 
  $mani_+=$row['manifist']; 
  $bors_+=$row['borsa']; 
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
<td>".number_format($row['borsa'])."</td>
<td>".number_format($row['tcost'])."</td>
<td>".$row['ldate']."</td>

<td class='noprint'>
<a href='wait.php?do=arrive&eid=".$row['eid']."'><input class='ed' type='button' value='استلام'></a>:".$strd."
</td>

<td>".$row['comm']."</td>   
 
</tr>" ;

 //<a  href=''><input  class='ed'  type='button' value='تعديل'  onclick='up()'></a>
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
<td>".number_format($bors_)."</td>
<td>".number_format($t_cost)."</td>
"; ?>
    </table>;
<?php }
   
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
