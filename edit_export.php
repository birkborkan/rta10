<?php
include "connect.php";
$post_id = $_POST['id'];
 if($post_id){
$q=mysql_query("select * from store_exp where eid='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);
    //echo $res['sname'].$res['sprice'];
    //echo int("days 10");
    $o_date=date('y-m-d'); 
    $select  = mysql_query("select * from store order by sno") or die(mysql_error());
    // rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm 
?>	
 
 <form  style='text-align:right;'>
  <div class='btn btn-success' style='width:100%;direction: rtl;text-align:right'>   تحديث بيانات صادر :          
  <?php echo "المرحل  ".$res['rname']."  -  رقم العربة  ".$res['cno']."  -  السائق   ".$res['dname']."  -  الوحدة   ".$res['pname']."  -  الكمية   ".$res['pqty'];?></div>                               
             <table width='100%' class='table'>
         <tr> 
             <td>المرحل</td>
                 <td ><input type="text" id='rname' class="form-control "  value='<?php echo  $res['rname']; ?>' placeholder="" required></td>
                 <td> رقم العربة</td>
                 <td><input type="text" id='cno' class="form-control "  value='<?php echo  $res['cno']; ?>' placeholder="" required></td>
             
        </tr>
        <tr>
             <td> اسم السائق </td>
                 <td><input type="text" id='dname' class="form-control "  value='<?php echo  $res['dname']; ?>' placeholder="" required></td>
             <td>الوحدة</td>  
             <td>
                 <select  style="width:100%;" id='pname' >
                 <?php  echo "name". $res['pname'];
                 while($srow=mysql_fetch_array($select)){   
                 //  rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm
                     if( $res['pname'] == $srow['sname'])
                     {  ?>   
                     <option value="<?php echo $srow['sname'];?>" selected><?php echo $srow['sname'];?></option>
                <?php }
                     else
                     { ?>
                     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname'];?></option>
                <?php }
                     } ?> 
                </select></td>
        </tr> 
        <tr> 
             <td>الكمية</td>
                 <td ><input type="text" id='pqty' class="form-control "  value='<?php echo  $res['pqty']; ?>' placeholder="" required></td>
                 <td> الشراء </td>
                 <td><input type="text" id='bcost' class="form-control "  value='<?php echo  $res['bcost']; ?>' placeholder="" required></td>
             
        </tr>
        <tr> 
             <td>تكلفة ترحيل</td>
                 <td ><input type="text" id='dcost' class="form-control "  value='<?php echo  $res['dcost']; ?>' placeholder="" required></td>
                 <td> تكلفة تحميل </td>
                 <td><input type="text" id='lcost' class="form-control "  value='<?php echo  $res['lcost']; ?>' placeholder="" required></td>
             
        </tr>
        <tr> 
             <td>منفستو</td>
                 <td ><input type="text" id='manifist' class="form-control "  value='<?php echo  $res['manifist']; ?>' placeholder="" required></td>
                 <td> تاريخ الشحن</td>
                 <td> <input type="date" id='ldate' class="form-control " value=" <?php echo $res['ldate']; ?> " placeholder=""></td>
        </tr>
         <tr width="100%">
         <td width="10%">ملاحظات</td>
                 <td width="90%"><input type="text" id='comm' class="form-control "  value='<?php echo  $res['comm']; ?>' placeholder="" required></td>   
             </tr>
         
             <tr>
                         <td colspan='2'>       <a href="#" onclick = 'return false;' onmousedown='edit_export_done(<?php echo $res["eid"];?>)' class="btn btn-primary btn-user btn-block">
                تحديث
           
              </a> </td>
                         <td colspan='2'> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                     </tr>
             
    
         
            </table>
             
             
 
              </form>
 

<?php
}
?>