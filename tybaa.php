<style>
.backimg{
    
    background-image: url(images/cus_delivery.jpg);
    background-repeat: no-repeat;
    background-size: 50%;;
    background-position: center;
    
}
</style>
<script type="text/javascript">
  var d = new Date();
    var days = ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"];
    var alldate = days[(d.getDay())] + "   " + d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + "   " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    document.getElementById('outdate').innerHTML=alldate;
</script>
<?php
session_start();
include "connect.php";

$fatora_no = $_SESSION['fatora_no'] ;


  ?>
     <!--   adminsrator azen------------------adminsrator azen------------adminsrator azen  -->  
 <center> <div  style="float:left;border-style:dashed;padding:1%; width:80%;margin-top:5%">
<!-- background: url(images/cus_delivery.jpg) no-repeat ;background-size: contain; -->
<div style="width:100%;text-align:right;margin-top:2%">
<div id="outdate" style="font-size:1em;float:left"> </div>              
<span style="font-size:1.3em;float:right;"><?php echo "الســـيد/   ". $name;?></span>
<span style="font-size:1.2em;float:right;margin-right:30%;"><?php echo "الرقم الفاتورة:   ". $fatora_no;?></span>
<span style="font-size:1em;float:left">خاص بالزبون</span>
</div>
<table  class="table table-bordered " id="dataTable" width="60%" style='font-size:11px;text-align:right;' cellspacing="0">

                  <thead>
                  <tr>
                     
            <th width="15%">العدد </th>
              
               <th width="30%"> البيان</th>
               <th width="15%"> التاريخ</th>
                    </tr>
                  </thead>
                   <tbody>

                    <?php
             $query = mysql_query("select * from cus_order where fatora_no ='$fatora_no' and oname = '$name'");
             $counter = 0;
                        while($row=mysql_fetch_array($query)){
                          
                              echo"
                           <tr>
                           <td>".$row['oqty']."</td>
                           <td>".$row['oitem']."</td>
                           <td>".$row['odate']."</td>
                           </tr>
                           
                           ";
                        }
                   
                      ?>
                      
                  </tbody>
                
                </table>
                <div id="outname" style="font-size:1em;float:left">تم الاستخراج بواسطة<?php echo $_SESSION['ufull_name'];?> </div>
                 </div>
                 <div  style="font-size:1em;border-bottom-style:solid;"> </div>   
                 <!--   customer azen------------------customer azen------------customer azen  -->
                  <div  style="float:left;border-style:dashed;padding:1%; width:80%;margin-top:50%">
<!-- background: url(images/cus_delivery.jpg) no-repeat ;background-size: contain; -->
<div style="width:100%;text-align:right;margin-top:2%">
<div id="outdate" style="font-size:1em;float:left"> </div>              
<span style="font-size:1.3em;float:right;"><?php echo "الســـيد/   ". $name;?></span>
<span style="font-size:1.2em;float:right;margin-right:30%;"><?php echo "الرقم الفاتورة:   ". $fatora_no;?></span>
<span style="font-size:1em;float:left">خاص بالادارة</span>
</div>
<table  class="table table-bordered " id="dataTable" width="60%" style='font-size:11px;text-align:right;' cellspacing="0">

                  <thead>
                  <tr>
                     
            <th width="15%">العدد </th>
              
               <th width="30%"> البيان</th>
               <th width="15%"> التاريخ</th>
                    </tr>
                  </thead>
                   <tbody>

                    <?php
             $query = mysql_query("select * from cus_order where fatora_no ='$fatora_no' and oname = '$name'");
             $counter = 0;
                        while($row=mysql_fetch_array($query)){
                          
                              echo"
                           <tr>
                           <td>".$row['oqty']."</td>
                           <td>".$row['oitem']."</td>
                           <td>".$row['odate']."</td>
                           </tr>
                           
                           ";
                        }
                   
                      ?>
                      
                  </tbody>
                
                </table>
                <div id="outname" style="font-size:1em;float:left">تم الاستخراج بواسطة<?php echo $_SESSION['ufull_name'];?> </div>
                 </div> </center>
