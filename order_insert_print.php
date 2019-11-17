<?php
include("check_login.php");
?>
<!doctype html>
<html>
<head>
	<title></title>
	
<meta charset="utf-8"> 

  
<link rel="stylesheet" type="text/css" href="css/insert_store.css">
    <script type="text/javascript" href="bootstrap.min.js" ></script> 
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
    ?> 
    <form class="inputform" action="" method="POST" >
	<fieldset>
		<legend>اضافة الفواتير</legend>
        الاسم:<input class="text" type="text" name="name" required   ><br>
      المنتج:
 <select name="item" id="item" >
 <?php while($srow=mysql_fetch_array($items)):; ?>	
     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname'];?></option>
    <?php endwhile ; 
        
          $s=$srow['sname'];
          $query = ("SELECT * FROM store where oname like '%$s%' ");  
          $result =mysql_fetch_assoc($sq);
      echo"<p class='add'><script> document.write(' لا توجد بيانات') </script></p>";
       
     ?>
 </select>
        
  طريقة الدفع:
 <select name="method">
 	<option value="كاش">كاش</option>
 	<option value="شيك">شيك</option>
 </select><br>
الكمية:<input type="text" name="qty"  min='1' required >
 التاريخ :<input type="date" name="date" >
<input type="submit" name="insert" value="اصافة">
<input type="reset" value="الغاء">
 <input type="hidden" name="add" value="new"><br>
</fieldset>
</form>
 <?php      
    ?>  
        <form action="" method="post">
     بحث بــ:
        <select name="sch">
        <option value="oname">اسم الزبون</option>
        <option value="oitem">المنتج </option>
        <option value="otype">النوع </option>
        
        </select>
             :<input class="schdate" type="date" name="date" >
    <input class="search" type="text" name="search" placeholder="اكتب نص للبحث">
        <input class="searchbt" type="submit" name="searchbt" value="بحث">
    </form>
      <p class="add"><a href="order_insert.php"><script> document.write("الفواتير") </script></a>           </p> 
<?php    
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
                        { $o_date=date('Y/m/d');
                          $get_id=mysql_query("select max(oid) as oid from cus_order");
                           $res_id=mysql_fetch_assoc($get_id);
                           $o_id=$res_id['oid'];
    ?>
          <input class="prt" type="button" onclick="printDiv('printPage')" value="طباعة" />
         
                    <div id="printPage">
                <div class="rep">
                   <br><br><br><br>
                     <?php  
               
               echo "<br>".date('Y/m/d h:m:s')."<br>";
                    echo "الرقم الفاتورة:".$o_id; ?>
                    
                    <br>الســـــــيد/
                    <?php   

                echo $o_name;   ?>
               <table class="rep_table" cellpadding="10" cellspacing="0">
              <tr class="f_row">
                    <td>العدد</td>
                       <td>البـــيـــــأن</td>
                       <td>التــــاريخ</td>
              </tr>
                <?php   
                echo "
            <tr>
            <td>".$o_qty."</td>
            <td>".$o_item."</td>
            <td>".$o_date."</td>
            </tr>";?>
              </table> 
               <br> <p> <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; ?></p>
                </div>
                    <div class="rep2">
                       <br><br><br><br>
                     <?php  
               
               echo "<br>".date('Y/m/d h:m:s')."<br>";
                     echo "الرقم الفاتورة:".$o_id; ?>
                    
                    <br>الســـــــيد/
                    <?php   

                echo $o_name;   ?>
               <table class="rep_table" cellpadding="10" cellspacing="0">
              <tr class="f_row">
                    <td>العدد</td>
                       <td>البـــيـــــأن</td>
                       <td>التــــاريخ</td>
              </tr>
                <?php   
                echo "
            <tr>
            <td>".$o_qty."</td>
            <td>".$o_item."</td>
           <td>".$o_date."</td>
            </tr>";?>
              </table> 
                  <br> <p> <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; 
        ?></p>
                </div>
      </div>
                            
                       <?php }
     }
    else
    {
         echo"<p class='add'><script> alert('لا توجد كمية كافية') </script></p>";
    }
          
}
 else
           if($_REQUEST['do']=='prt')
           { 
         $q=mysql_query("select * from cus_order where oid=".$o_id." ");
             $res=mysql_fetch_assoc($q);
            $o_name=$res['oname'];
            $o_item=$res['oitem'];
            $o_qty=$res['oqty'];
            $o_date=$res['odate']; 
          ?>
          <input class="prt" type="button" onclick="printDiv('printPage')" value="طباعة" />
         
                    <div id="printPage">
                <div class="rep">
                   <br><br><br><br>
                     <?php  
               
               echo "<br>".date('y-m-d h:i:sa')."<br>";
                    echo "الرقم الفاتورة:".$o_id; ?>
                    
                    <br>الســـــــيد/
                    <?php   

                echo $o_name;   ?>
               <table class="rep_table" cellpadding="10" cellspacing="0">
              <tr class="f_row">
                    <td>العدد</td>
                       <td>البـــيـــــأن</td>
                       <td>التــــاريخ</td>
              </tr>
                <?php   
                echo "
            <tr>
            <td>".$o_qty."</td>
            <td>".$o_item."</td>
            <td>".$o_date."</td>
             </tr>";?>
              </table>
               <br> <p> <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; ?></p>
                </div>

                    <div class="rep2">
                       <br><br><br><br>
                     <?php  
               
               echo "<br>".date('y-m-d h:i:sa')."<br>";
                     echo "الرقم الفاتورة:".$o_id; ?>
                    
                    <br>الســـــــيد/
                    <?php   

                echo $o_name;   ?>
               <table class="rep_table" cellpadding="10" cellspacing="0">
              <tr class="f_row">
                    <td>العدد</td>
                       <td>البـــيـــــأن</td>
                       <td>التــــاريخ</td>
              </tr>
                <?php   
                echo "
            <tr>
            <td>".$o_qty."</td>
            <td>".$o_item."</td>
           <td>".$o_date."</td>
          </tr>";?>
              </table>
                  <br> <p> <?php echo "تم استخراج بواسطة:".$_SESSION['sefname']; 
        ?></p>
                </div>
      </div>
           <?php   }
   
    
?>	



    

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
                          if($sch_type=='oname')
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
                            if($sch_type=='oname')
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