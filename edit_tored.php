<?php
include "connect.php";
$post_id = $_POST['id'];
 if($post_id){
$q=mysql_query("select * from tored where t_id='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);

?>	
 
 <form  style='text-align:right;'>
 <div class='btn btn-success' style='width:100%;direction: rtl'>   تحديث بيانات التوريد :     <?php echo $res['t_amount']?></div>         
     <table  class='table'>
     <tr  width='100%'> 
     <td >المبلغ </td>
     <td  colspan='3'><input type="text" id='tamount' class="form-control "  value='<?php echo  $res['t_amount']; ?>' placeholder="" required></td>
      </tr>
      
      <tr  width='100%'> 
     <td >البيان </td>
     <td  colspan='3'><input type="text" id='tcomm' class="form-control "  value='<?php echo  $res['t_comm']; ?>' placeholder="" required></td>
      </tr>

      <tr  width='100%'> 
     <td >التاريخ </td>
     <td  colspan='3'><input type="date" id='tdate' class="form-control "  value='<?php echo  $res['t_date']; ?>' placeholder="" required></td>
      </tr>
        <tr width='100%'>
           <td colspan='3' >
            <input style='width:48%;'value=' تحديث   '  onclick = 'return false;' onmousedown='edit_tored_done(<?php echo $res["t_id"];?>)' class="btn btn-primary btn-user  "/>
        
           <input style='background:red;width:48%;'type="reset" value="الغاء" class="btn btn-primary btn-user  "/>
             </td>
          </tr>
        </table>   
             
 </form>
 

<?php
}
?>