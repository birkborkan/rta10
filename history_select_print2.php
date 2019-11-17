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
<input type="button" onclick="printDiv()" value="طباعة" />
  <div id="printPage"> 
<?php
    include"connect.php";

 echo date("Y-m-d h:i:sa"); 
       

   
$query=mysql_query("select * from history order by hid desc") or die("error in table name");
if (mysql_num_rows($query)==0) {
 echo"<p class='add'><script> document.write(' تم تعديل بنجاح') </script></p>";
}
else
{  ?>
<center>
<table class="table" width="70%"  cellpadding="4" cellspacing="1" >
  <tr class="title" >
        <td>الرقم</td>
           <td>المنتج</td>
              <td>الكمية القديمة</td>
                 <td>الكمية المضافة</td>
                    <td>الكمية المسحوبة</td>
                     <td>الكمية الجديدة</td>
                     <td>التاريخ</td>

  </tr>
<?php
while ($row=mysql_fetch_array($query)) {
echo "
<tr>
<td>".$row['hid']."</td>
<td>".$row['hpro']."</td>
<td>".$row['hcurqty']."</td>
<td>".$row['hadd']."</td>
<td>".$row['hsub']."</td>
<td>".$row['hnew']."</td>
<td>".$row['hdate']."</td>

</tr>
";
}
?>
</table>
<?php
}
mysql_free_result($query);
mysql_close($conn);
?>  
</div>
</body>
</html>