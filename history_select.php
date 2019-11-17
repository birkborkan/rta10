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
<input type="button" onclick="printDiv('printPage')" value="طباعة" />
  <div id="printPage"> 
<?php
    include"connect.php";
$query=mysql_query("select * from history order by hid desc") or die("error in table name");
if (mysql_num_rows($query)==0) {
 echo"<p class='add'><script> document.write(' تم تعديل بنجاح') </script></p>";
}
else
{  ?>
<center>
<table class="table" width="70%"  cellpadding="10" cellspacing="0" >
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