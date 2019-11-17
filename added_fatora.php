<?php
session_start();
include "connect.php";
$name = $_SESSION['zbon_name']; 
$fatora_no = $_SESSION['fatora_no'] ;
$selectempop = mysql_query("select * from  cus_order  where sw ='0' and oname = '$name' and fatora_no = '$fatora_no' " );
           $co = 0;
           if(mysql_num_rows($selectempop)>0){
               echo"<table style='font-size:10px; ' class='table' style='width:100%;'>
               <tr style='color:#facccc;background:#107a83;'>
               <td> الرقم</td>
               <td>اسم الصنف</td>
               <td>  النوع</td>
               <td> الكمية</td> 
               <td> السعر</td>
               <td> المجموع</td>
               <td> حذف</td>
               </tr>
               
               "; 
          
          
$sumer = 0;
               while($rows = mysql_fetch_assoc($selectempop)){
                   $co = $co+1;
                   echo"<tr>
                   <td  >".$co."</td>
                   
                   <td >".$rows['oitem']."</td>
                 
                   <td >".$rows['optype']."</td>
                   <td >".$rows['oqty']."</td>
                   <td>".$rows['oprice']."</td>
                   <td>".$rows['mjmoo']."    </td> 
                  
               
                   <td> 
                   <span onclick='return deleter(".$rows['oid'].",".$rows['oqty'].",".$rows['sno'].");' class='close2' title='Close Modal'
                   style='color:red;'>×</span>
                   </td>
                   </tr>";
                   $sumer = $sumer + $rows['mjmoo'];
               }
                
              echo"<tr style='background:#eee;color:blue;'>
              <td>المجموع:</td>
              <td id='sumer'> $sumer</td>
              <td> </td>
              
              <tr>
                   
                    <td style='text-align:center;'> 
                    
                  
                    
                  
                    </td>
                    
              </tr>
              ";
               echo"
              
              <tr>
              <td id='givemone' colspan='3'></td>
              <td   > <input style='font-size:10px;'type='submit' value='اجراء العملية'  onclick='return false' onmousedown='dafy();' /></td>
              <td id='opgif'  ></td>
              </tr>
         
              ";
               echo"</table>   
          
               ";
           }
           