<?php
include "connect.php";
$post_id = $_POST['id'];
 if($post_id){
$q=mysql_query("select * from emp where eid='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);
    
    $o_date=date('y-m-d');    
?>	
 
 <form  style='text-align:right;'>
             
             <table width='100%' class='table'>
             <tr>
                 <td>اسم الموظف</td>
                 <td><input type="text" id='ename' class="form-control "  value='<?php echo  $res['ename']; ?>' placeholder="" required></td>
             
                 <td>  الهاتف</td>
                 <td> <input type="text" id='ephone' class="form-control "  value=" <?php echo $res['ephone']; ?> "  placeholder="" required></td>
             </tr> 
             <tr>
                 <td> الوظيفة</td>
                 <td> <input type="text" id='ejob' class="form-control " value=" <?php echo  $res['ejob']; ?>" placeholder=""></td>
             
                 <td> الراتب</td>
                 <td> <input type="number" id='esal' class="form-control " value=" <?php echo $res['esal']; ?> " placeholder=""></td>
             </tr> 
         
             <tr>
                         <td colspan='2'>       <a href="#" onclick = 'return false;' onmousedown='edit_employee_done(<?php echo $res["eid"];?>)' class="btn btn-primary btn-user btn-block">
                تحديث
           
              </a> </td>
                         <td colspan='2'> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                     </tr>
             
    
         
            </table>
             
             
 
              </form>
 

<?php
}
?>