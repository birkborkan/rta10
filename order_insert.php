<?php
include("check_login.php");
?>
<!doctype html>
<html>
<head>
	<title></title>
	
<meta charset="utf-8"> 

  
<link rel="stylesheet" type="text/css" href="css/insert_store.css">
    <script type="text/javascript" href="css/bootstrap.min.js" ></script> 
<script type="text/javascript">
    var aa;
  function change() {
    aa= document.getElementById("item").value;
    document.getElementById("CH").innerHTML=aa;
}
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
    $o_id=intval($_GET['id']);
  $o_name=$_POST['name'];
   $o_item=$_POST['item'];
    $o_ptype=$_POST['type'];
    $o_method=$_POST['method'];
    $o_qty=$_POST['qty'];

    $o_date=date('y-m-d');
   $items=mysql_query("select sno,sname from store order by sno");
    $o_date=date('Y/m/d');
               
?>	
    <?php 
    //$s='echo "  <div id='CH'></div>"'; 
     
    ?>
   
        <form action="" method="post">
     بحث بــ:
        <select name="sch">
        <option value="oid">الرقم الفاتورة</option>
        <option value="oname">اسم الزبون</option>
        <option value="oitem">المنتج </option>
        <option value="otype">النوع </option>
        
        </select>
             :<input class="schdate" type="date" name="date" >
    <input class="search" type="text" name="search" placeholder="اكتب نص للبحث">
        <input class="searchbt" type="submit" name="searchbt" value="بحث">
    </form>
       <p class="add"><a href="order_insert_print.php"><script> document.write("ادخال فاتورة جديدة") </script></a> 
    </p> 
    
<?php
 
    
    $q=mysql_query(" select * from cus_order order by oid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}

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
                          if($sch_type=='oid')
                        {    
                            //echo "name";
                     $q=mysql_query(" select * from cus_order where oid = intval($sch_by)");  
                        }
                        else if($sch_type=='oname')
                        {    
                            //echo "name";
                     $q=mysql_query(" select * from cus_order where oname like '%$sch_by%' and odate                   like '$s_date'  order by oid desc");  
                        }
                        else if($sch_type=='oitem')
                        {
                            //echo "pro";
                             $q=mysql_query(" select * from cus_order where oitem like '$sch_by' and                           odate like '$s_date' order by oid desc");
                        }
                        else if($sch_type=='otype')
                        {
                           // echo "type";
                             $q=mysql_query(" select * from cus_order where optype like '%$sch_by%'                            and odate like '$s_date' order by oid desc");

                        }
                       

           }
                      else if(empty($_POST['date']) and !empty($_POST['search']))
                           {    
                             //echo" empty  date"; 
                          if($sch_type=='oid')
                        {    
                            //echo "name"; 
                              $o_id=intval($sch_by);
                     $q=mysql_query(" select * from cus_order where oid =$o_id");  
                        }
                            else if($sch_type=='oname')
                            {    
                                //echo "name";
                     $q=mysql_query(" select * from cus_order where oname like '%$sch_by%' order by                         oid desc");  
                            }
                            else if($sch_type=='oitem')
                            {
                                //echo "pro";
                                 $q=mysql_query(" select * from cus_order where oitem like '$sch_by'                          order by oid desc");
                            }
                            else if($sch_type=='otype')
                            {
                               // echo "type";
                                 $q=mysql_query(" select * from cus_order where optype like                                      '%$sch_by%' order by oid desc");

                            }
                            

           }
      else if(!empty($_POST['date']) and empty($_POST['search']))
           {
             //echo" empty  text"; 
           $q=mysql_query(" select * from cus_order where odate like '$s_date'                                  order by oid desc");
           }
}

if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  
   $t_50k=0;
   $t_50kt=0;
     $t_25k=0;
     $t_10bk=0;
    $sum_t_50k=0;
    $sum_t_50kt=0;
    $sum_t_25k=0;
    $sum_t_10bk=0;
    $total_t;
    $total;
   
    ?>
    <input type="button" onclick="printDiv('printPage')" value="طباعة" />
<div id="printPage"> 
    <div class="rep_img_l"><img src="images/rotana.jpg" width="100px" height="100px"></div>
    <div class="rep_img_r"><img src="images/rotana.jpg" width="100px" height="100px"></div>
<div class="rep_title">مطاحن روتانا للغلال</div>

<div class="rep_title">حسبو عبداالله مصطفي-وكيل ولاية جنوب دارفور-نيالا</div>
<div class="rep_title">إدارة /محمد عبدالله (جلال)</div>

<?php 
    if(!empty($_POST['date']) and !empty($_POST['search']))
{
        if($_POST['sch']=="oid")
             {
             echo "<div class='rep_title2'>فاتورة  رقم: ".$_POST['search']."
             </div>";
                 // echo "oid & search";

             }
           else if($_POST['sch']=="oname")
             {
                echo "<div class='rep_title2'>تفاصيل  ".$_POST['search']." بتاريخ ".$_POST['date']."
              </div> " ;
               //echo "oname & search";  

             }
          else if($_POST['sch']=="oitem")
             {
                echo "<div class='rep_title2'>تفاصيل منتج  ".$_POST['search']." بتاريخ ".$_POST['date']."
              </div> " ;
              
                //echo "oitem & search"; 

             }
          else if($_POST['sch']=="otype")
             {
              echo "<div class='rep_title2'>تفاصيل منتج  ".$_POST['search']." بتاريخ ".$_POST['date']."
              </div> " ;
               //echo "otype & search";

             }
}
    else if(empty($_POST['date']) and !empty($_POST['search']))
{
        if($_POST['sch']=="oid")
             {
                echo "<div class='rep_title2'>فاتورة مبيعات برقم: ".$_POST['search']."</div>";
             //echo "oid ";

             }
           else if($_POST['sch']=="oname")
             {
               echo "<div class='rep_title2'>فاتورة مبيعات لزبون: ".$_POST['search']."</div>";
               //echo "oname";  

             }
          else if($_POST['sch']=="oitem")
             {
               echo "<div class='rep_title2'>فاتورة مبيعات لمنتج: ".$_POST['search']."</div>";
               // echo "oitem "; 

             }
          else if($_POST['sch']=="otype")
             {
               echo "<div class='rep_title2'>فاتورة مبيعات : ".$_POST['search']."</div>";
               //echo "otype ";

             }
}
    else
    {
       echo "<div class='rep_title2'>فاتورة مبيعات : </div>";   
    }
        
  
    
    ?>
<center>
    <table class="table" width="70%"  cellpadding="10" cellspacing="0">
  <tr class="title">
        <td>الرقم</td>
           <td>الاسم</td>
              <td>نوع الفاتورة</td>
                 <td>طريقة الدفع</td>
                 <td>المنتج</td>
                
                     <td>الكمية</td>
                        <td>المبلغ</td>
                         <td>التاريخ</td>
                         <td  class="noprint">خيارات</td>

  </tr>
    
    <?php   //<img src='images/delete.jpg' width='8%' >
while($row=mysql_fetch_array($q))
{  
    switch($row['oitem'])
    {
        case "50ك":
               $t_50k+=$row['oqty'];
            $sum_t_50k+=$row['oprice'];
            break;

    case "50كت": 
            $t_50kt+=$row['oqty'];
             $sum_t_50kt+=$row['oprice'];
            break;
            case "بكت10ك": 
           $t_10bk+=$row['oqty'];
            $sum_t_10bk+=$row['oprice'];
            break;
    case "25ك": 
            $t_25k+=$row['oqty'];
            $sum_t_25k+=$row['oprice'];
            break;
    }
    $total_t=$sum_t_50kt+$sum_t_10bk+$sum_t_25k;
    $total=$sum_t_50k+$total_t;
    
    
    echo "
<tr>
<td>".$row['oid']."</td>
<td>".$row['oname']."</td>
<td>".$row['optype']."</td>
<td>".$row['omethod']."</td>
<td>".$row['oitem']."</td>

<td>".$row['oqty']."</td>
<td>".$row['oprice']."</td>
<td>".$row['odate']."</td>
<td class='noprint'>
<a  href='order_update.php?do=edit&id=".$row['oid']."'><input class='ed' type='button' value='تعديل'>
</a>
  
 " ; ?>
<input class="del"  type="button" onclick="del_data(<?php echo $row['oid']; ?>)" alt="حذف الفاتورة" name="delete" value="استرجاع">
<?php echo " 
<a href='order_insert_print.php?do=prt&id=".$row['oid']."'><input class='ed' type='button' value='طباعة'>
</a> 
"; ?>
</td> 
</tr>

<?php
}   echo"</table>";

}  

    mysql_close($conn);
    ?>
   <div class="rep_sam">
     <table class="table_" width="70%"  cellpadding="5" cellspacing="0">
        <tr>
            <td>الصنف</td>
            <td>الكمية</td>
            <td>الاجمالي</td>  
        </tr>
        <tr>
            <td>50 كيلو</td>
            <td class="outrep">  <?php echo $t_50k; ?>  </td>
            <td class="outrep"><?php echo number_format($sum_t_50k); ?></td>  
        </tr>
        <tr>
            <td>50 كيلو تجاري</td>
            <td class="outrep">  <?php echo $t_50kt; ?>  </td>
            <td class="outrep"><?php echo number_format($sum_t_50kt); ?></td>  
        </tr>
        <tr>
            <td>25 كيلو</td>
            <td class="outrep">  <?php echo $t_25k; ?>  </td>
            <td class="outrep"><?php echo number_format($sum_t_25k); ?></td> 
        </tr>
        <tr>
            <td>بكت 10 كيلو</td>
            <td class="outrep">  <?php echo $t_10bk; ?>  </td>
            <td class="outrep"><?php echo number_format($sum_t_10bk); ?></td> 
        </tr>
        
            <tr>
            <td>تجاري  </td>
            <td class="outrep">  <?php echo $t_50kt+$t_25k+$t_10bk ; ?>  </td>
            <td class="outrep"><?php echo number_format($total_t); ?></td> 
        </tr>
            <tr>
            <td>الاجمالي  </td>
            <td class="outrep">  <?php echo $t_50k+$t_50kt+$t_25k+$t_10bk; ?>  </td>
            <td class="outrep"><?php echo number_format($total); ?></td> 
        </tr>
    </table>
    </div>
    <div class="rep_sig">
    <p class="rep_sig"> التوقيع:......................
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
        الختم:......................
    </p>  
  
    </div>
      <p class="rep_sig_imp"> <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; 
        ?></p>
    </div>

	<script type="text/javascript">
	
	function del_data(delid)
		{
		if(confirm("هل متاكد من حذف الفاتورة"))
			{
				window.location.href='order_delete.php?del_id='+delid+'';
				return true;
			}
			
		}
	</script>

</body>
</html>
