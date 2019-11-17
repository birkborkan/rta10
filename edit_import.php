<?php
include "connect.php";
$post_id = $_POST['id'];
 if($post_id){
$q=mysql_query("select * from store_imp where eid='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);

    // rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm 
?>	
   <div class='btn btn-success' style='width:100%;direction: rtl;text-align:right'>   تحديث بيانات وارد :          
  <?php echo "المرحل  ".$res['rname']."  -  رقم العربة  ".$res['cno']."  -  السائق   ".$res['dname']."  -  الوحدة   ".$res['pname']."  -  الكمية   ".$res['pqty']?></div> 
 <form  style='text-align:right;'>
             
             <table width='100%' class='table'>
         <tr> 
             <td>بورصة</td>
                 <td ><input type="text" id='borsa' class="form-control "  value='<?php echo  $res['borsa']; ?>' placeholder="" required></td>
                 <td> فقدان </td>
                 <td><input type="text" id='miss' class="form-control "  value='<?php echo  $res['miss']; ?>' placeholder="" required></td>
                 <input type="hidden" id='stor' class="form-control "  value='<?php echo  $res['stor']; ?>' >
             
        </tr>
 
             <tr>
                         <td colspan='2'>       <a href="#" onclick = 'return false;' onmousedown='edit_import_done(<?php echo $res["eid"];?>,<?php echo $res["sid"];?>)' class="btn btn-primary btn-user btn-block">
                تحديث
           
              </a> </td>
                         <td colspan='2'> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                     </tr>
             
    
         
            </table>
             
             
 
              </form>
 

<?php
}
?>