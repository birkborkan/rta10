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
  $o_id=intval($_GET['id']);
  $o_name=$_POST['name'];
   $o_item=$_POST['item'];
    $o_ptype=$_POST['type'];
    $o_method=$_POST['method'];
    $o_qty=$_POST['qty'];
    $o_price=$_POST['price'];
   $o_date=$_POST['date'];
   if($_REQUEST['do']=='edit')
           {
       echo $o_id;
         $q=mysql_query("select * from cus_order where oid=".$o_id." ");
             $res=mysql_fetch_assoc($q);
            $o_date=date('y-m-d');
            $o_item=$res['oitem'];
            $s_id=$res['sno'];
            $or_qty=$res['oqty'];
            mysql_free_result($q);
       $sq=mysql_query("select sno from store where sname like '$o_item' ");
       $sres=mysql_fetch_assoc($sq);
      $old_sno=$sres['sno'];
       $items=mysql_query("select sno,sname from store order by sno");
        ?>	
        <form class="inputform" action="" method="POST" >
            <fieldset>
                <legend>تعديل الفواتير</legend>
                  الرقم: <?php echo  $res['did']; ?> 
                الاسم:<input class="text" type="text" name="name" <?php echo"value='".$res['oname']."' "?>><br>
                 المنتج:
                    <select name="item" id="item" >
                 <?php while($srow=mysql_fetch_array($items)):;	
                     if($o_item == $srow['sname'])
                     {  ?>
                     <option value="<?php echo $srow['sname'];?>" selected><?php echo $srow['sname'];?></option>
                <?php }
                     else
                     { ?>
                     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname'];?></option>
                <?php }
                     endwhile ; 
                      $s=$srow['sname'];
                      $query = ("SELECT * FROM store where oname like '%$s%' ");  
                      $result =mysql_fetch_assoc($sq);
                  echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";

                 ?>
             </select>
                      <?php  

                if($res['omethod']=='كاش')
                { ?>
                    طريقة الدفع:
                     <select name="method">
                        <option value="كاش" selected>كاش</option>
                        <option value="شيك">شيك</option>
                     </select>  
             <?php   }
               else
               {?>
                    طريقة الدفع:
                     <select name="method">
                        <option value="كاش" >كاش</option>
                        <option value="شيك" selected>شيك</option>
                     </select>  
            <?php   }
                ?> <br>



        الكمية:<input type="text" name="qty" <?php echo"value='".$res['oqty']."' "?>  min='1'>
         التاريخ :<input type="date" name="date" <?php echo"value='".$res['odate']."' "?>><br>

        <input type="hidden" name="insert" value="اصافة">
        <input type="submit" name="update" value="تحديث">
        <input type="reset" value="الغاء">
        <input type="hidden" name="add" value="new">

        </fieldset>
        </form>
         <p class="add"><a href="order_insert.php"><script> document.write("الرجوع") </script></a>           </p>   

        <?php     

         }
      if(isset($_POST['update']) and $_POST['update']=='تحديث')
      { 
         $o_name=$_POST['name'];
          $o_item=$_POST['item'];
         $o_method=$_POST['method'];
         $o_qty=$_POST['qty'];
         $o_date=$_POST['date'];
       $q=mysql_query("select * from store where sname like '$o_item' ");   
        $res=mysql_fetch_assoc($q);
       $new_sno=$res['sno'];
       
       if(intval($old_sno)== intval($new_sno))
       {
                //  echo "match";
                 
                 $sq=mysql_query(" select sqty,sprice from store where sno = $old_sno");
                 $res=mysql_fetch_assoc($sq);    
                 $s_qty= $res['sqty'];
                 $s_price= $res['sprice'];
           
                //$new_qty=$res['sqty']-($o_qty);
                 $ns_qty=intval($s_qty) -(intval(($o_qty))-intval($or_qty));
 
                    if($ns_qty>=0)
                    {
                     $updat= mysql_query("update cus_order  
                   set oname='$o_name',
                   oitem='$o_item',
                   
                     omethod='$o_method',
                     oqty=$o_qty,
                     oprice=$o_qty*$s_price,
                    odate='$o_date'
                   where oid=$o_id",$conn)or die("no updated");
                    mysql_query("update store set   sqty=$ns_qty where sno=$s_id");
                    }
                      else
                    {
                         echo"<p class='add'><script> alert('لا توجد كمية كافية') </script></p>";
                    }
                 mysql_free_result($sq);
       }
       else
       {
        // echo "not match";
           // echo "id".$new_sno."<br>";
     $sq=mysql_query(" select * from store where sno = $new_sno");
                 $res=mysql_fetch_assoc($sq);    
                 $i_d= $res['sno'];
                 $item= $res['sname'];
                $n_qty= $res['sqty'];
                $n_price= $res['sprice'];
                $n_ptype= $res['stype'];
                 $us_qty=intval($n_qty) -(intval(($o_qty))-intval($or_qty));
             // store -  (form-order)
                 $ns_qty=intval($n_qty) -intval($o_qty);
                    if($ns_qty>=0)
                    {  
                         $updat= mysql_query("update cus_order  
                   set oname='$o_name',
                   oitem='$o_item',
                   optype='$n_ptype',
                     omethod='$o_method',
                     oqty=$o_qty,
                     oprice=$o_qty*$n_price,
                    odate='$o_date',
                    sno='$new_sno'
                   where oid=$o_id",$conn)or die("no updated");
                    mysql_query("update store set   sqty=$ns_qty where sno=$new_sno");
                  mysql_query("update store set   sqty=sqty+$or_qty where sno=$old_sno");
                    }
                      else
                    {
                         echo"<p class='add'><script> alert('لا توجد كمية كافية') </script></p>";
                    } 
                  mysql_free_result($sq); }
                   if (isset($updat)) 
                    {
                    echo"<p class='add'><script> document.write(' تم تحديث بنجاح') </script></p>";
                    }
                   else
                   {
                     echo"<p class='add'><script> document.write(' لم يتم تحديث ') </script></p>";   
                   }  
        }
    
    else if(isset($_POST['insert']) )
    {
   $s_item=$_POST['item'];
 $sq=mysql_query(" select * from store where sname like '$s_item' ");
     $res=mysql_fetch_assoc($sq);
    $s_qty= $res['sqty'];
     $s_id=$res['sno'];
    $s_price=$res['sprice'];
    $s_ptype=$res['stype'];
    $s_qty2=$res['sqty']-$o_qty;
     if($o_qty<=$s_qty)
     {
       mysql_query("update store set   sqty=$s_qty2 where sno=$s_id");
      $o_date=date('y-m-d');
       $insert=mysql_query("insert into cus_order
        (sno,oname,oitem,optype,omethod,oqty,oprice,odate) 
         values
         ($s_id,'$o_name','$o_item','$s_ptype','$o_method',$o_qty,$s_price,'$o_date')",$conn)
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
 
 
    if($_REQUEST['do']=='del')
    {
        mysql_query("delete from cus_order where oid=".$o_id." ");
    }
 
   
$q=mysql_query(" select * from cus_order order by oid desc");
if (mysql_num_rows($q)==0) {
 echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
}
else
{
    ?>
<center>
<table class="table"  cellpadding="10" cellspacing="0">
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
<a href='order_update.php?do=edit&id=".$row['oid']."'><input class='ed' type='button' value='تعديل'></a>   
 " ; ?>
<input class="del" type="button" onclick="del_data(<?php echo $row['oid']; ?>)" name="delete" value="استرجاع">	
</td> 
</tr>

<?php
}   echo"</table>";
 
 
}  
   
    
    mysql_close($conn);
    ?>
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
