
<!doctype html>
<html>
<head>
	<title></title>
	
<meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="insert_store.css">
	
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
 
if(isset($_POST['insert']))
{   
  $s_item=$_POST['item'];
 $sq=mysql_query(" select * from store where sname like '$s_item' ");
     $res=mysql_fetch_assoc($sq);
    $s_qty= $res['sqty'];
     $s_id=$res['sno'];
    $s_price=$res['sprice'];
    $s_ptype=$res['stype'];
    $s_qty2=$res['sqty']-$o_qty;

     if($o_qty<=$s_qty and $o_qty>0)
     {
       mysql_query("update store set   sqty=$s_qty2 where sno=$s_id");
      $o_date=date('y-m-d');
       $insert=mysql_query("insert into cus_order
        (sno,oname,oitem,optype,omethod,oqty,oprice,odate) 
         values
         ($s_id,'$o_name','$o_item','$s_ptype','$o_method',$o_qty,$o_qty*$s_price,'$o_date')",$conn)
                ;
                        if (isset($insert))
                        {
                             echo"<p class='add'><script> document.write(' تم اضافة بنجاح') </script></p>";
                        }
     }
    else
    {
         echo"<p class='add'><script> alert('لا توجد كمية كافية') </script></p>";
    }
          
}
    $o_date=date('y-m-d');
   $items=mysql_query("select sno,sname from store order by sno");
   
    
?>	
 
<form class="inputform" action="order_insert.php" method="POST" >
	<fieldset>
		<legend>اضافة الفواتير</legend>
        الاسم:<input class="text" type="text" name="name"   ><br>
      المنتج:
 <select name="item" >
 <?php while($srow=mysql_fetch_array($items)):; ?>	
     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname'];?></option>
    <?php endwhile ; 
    // mysql_free_result($items) ;
     ?>
 </select>
        
  طريقة الدفع:
 <select name="method">
 	<option value="كاش">كاش</option>
 	<option value="شيك">شيك</option>
 </select><br>
الكمية:<input type="text" name="qty"  min='1'   >

 التاريخ :<input type="date" name="date" >

<input type="submit" name="insert" value="اصافة">
<input type="submit" name="update" value="تحديث">
<input type="reset" value="الغاء">
<input type="hidden" name="add" value="new"><br>
</fieldset>
</form>
   
        <form action="" method="post">
     بحث بــ:
        <select name="sch">
        <option value="oname">اسم الزبون</option>
        <option value="lno">المنتج </option>
        <option value="pname">النوع </option>
        <option value="odate">التاريخ </option>
        </select>
             :<input class="schdate" type="date" name="date" >
    <input class="search" type="text" name="search" placeholder="اكتب نص للبحث">
        <input class="searchbt" type="submit" name="searchbt" value="بحث">

    
    </form>
    
<?php
 
    if($_REQUEST['do']=='del')
    {
            $s_item=$_POST['item'];
            $sq=mysql_query(" select sno,oqty from cus_order where oid = ".$o_id." ");
            $res=mysql_fetch_assoc($sq);
           $o_qty=$res['oqty'];
            $s_id=$res['sno'];
          
        mysql_query("update store set sqty=(sqty+$o_qty) where sno=$s_id");
         mysql_query("delete from cus_order where oid=".$o_id." ");
       
    }
    $q=mysql_query(" select * from cus_order order by oid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}

if(isset($_POST['searchbt']))
{
    $sch_type= $_POST['sch'];
    $sch_by= $_POST['search'];
    $s_date= $_POST['date'];
    
                if($sch_type=='oname')
            {    
                //echo "name";
     $q=mysql_query(" select * from cus_order where oname like '%$sch_by%' order by oid desc");  
            }
            else if($sch_type=='opro')
            {
                //echo "pro";
                 $q=mysql_query(" select * from cus_order where oitem like '%$sch_by%' order by oid desc");
            }
            else if($sch_type=='optype')
            {
               // echo "type";
                 $q=mysql_query(" select * from cus_order where optype like '%$sch_by%' order by oid desc");

            }
            else if($sch_type=='odate')
            {   
               
              // $s_date2= date("Y-m-d",strtotime($s_date));
             
                 $q=mysql_query(" select * from cus_order where odate like '$s_date' order by oid desc");

            }
            else
            {
              $q=mysql_query(" select * from cus_order order by oid desc");  
            }
    
    //$date="2019-7-19";
    //echo date("d-m-Y",strtotime($date));
}

if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{  ?>
<center>
<table width="70%"  cellpadding="4" cellspacing="1">
  <tr class="title">
        <td>الرقم</td>
           <td>الاسم</td>
              <td>نوع الفاتورة</td>
                 <td>طريقة الدفع</td>
                 <td>المنتج</td>
                     <td>الكمية</td>
                        <td>المبلغ</td>
                         <td>التاريخ</td>
                         <td >خيارات</td>

  </tr>
    
    <?php   //<img src='images/delete.jpg' width='8%' >
while($row=mysql_fetch_array($q))
{
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
<td >
<a href='order_update.php?do=edit&id=".$row['oid']."'>تعديل</a>   

--<a href='order_insert.php?do=del&id=".$row['oid']."'>استرجاع</a> 
 " ; ?>
<input type="button" onclick="del_data(<?php echo $row['oid']; ?>)" name="delete" value="استرجاع">	
</td> 
</tr>
<script type="text/javascript">
	
	function del_data(delid)
		{
		if(confirm("هل متاكد من حذف الفاتورة"))
			{
				window.location.href='order_delete.php?del_id='+delid+'';
				
				alert(delid);
				return true;
			}
			//confirm("هل متاكد من حذف الفاتورة");
			
		}
	</script>
<?php
}   echo"</table>";
}  
   
    
    mysql_close($conn);
    ?>

</body>
</html>
