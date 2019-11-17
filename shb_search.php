<?php
include "connect.php";
$post_id = $_POST['url'];
$select =mysql_query("select * from store where (sname like '%$post_id%' or stype like '%$post_id%') and sqty > 0");
if(mysql_num_rows($select) > 0)
{
  echo"<table class='table' width='100%'style='font-size:13px;'>
  <tr style='background: #b9cfbcab;color:black;'>
   <td>Id</td>
    
   
   <td>اسم الصنف</td>
   <td>الكمية</td>
   <td>النوع</td>
   
  
   <td  >سحب</td>
  
   
  </tr>
  ";
  while($row = mysql_fetch_assoc($select)){
     echo"<tr>
     <td style='color:#579a57;'>".$row['sno']."</td>
     
     <td style='color:black;' id='name_".$row['sno']."'>".$row['sname']."</td>
      <td style='color:#b95252;'>".$row['sqty']."</td>
     <td style='color:#7c8e16;' id='type_".$row['sno']."'>".$row['stype']."</td>
    
  
     <td > <a href='#'style='color:blue;'
     class='btn btn-success' onclick='return false;' onmousedown='return cel(".$row['sno'].");'>سحب</a></td> 
     </tr>";
  }
  
  echo"</table>";
  
  
  
}
else
{
echo "المخزن فارغ من المنتج المراد بحث عنه";
}  ?>
 <div id="id01" class="modal" >

<form class="modal-content animate" style='background: #737f85;color:white;text-align:center;'  >

     <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
     
  </div>
       

      <div id='cels' ></div>
    <label><b>    ادخل الكمية :-   </b></label>
    <input type="text" id="amount" placeholder="ادخل الكمية"   required>

    <br>
    <button type="submit"onclick="return false" id='shb' >سحب</button>
      
</form>
</div>