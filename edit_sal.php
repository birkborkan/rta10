<?php
include "connect.php";
$post_id = $_POST['id'];
$name = $_POST['name'];
 if($post_id){
$q=mysql_query("select * from salaries where id='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);
    //echo $res['sname'].$res['sprice'];
    //echo int("days 10");


    $o_date=date('y-m-d');    
?>	
 
 <form  style='text-align:right;'>
             <div class='btn btn-success' style='width:100%'>   تحديث بيانات المرتب للموظف  <?php echo $name?></div>
             <table width='100%' class='table'>
             <tr>
                 <td>المرتب</td>
                 <td><input type="text" id='esal' class="form-control "  value='<?php echo  $res['esal']; ?>' placeholder="" required></td>
                
                 <td> الشهر</td>
                 
                <td>   </select>
        <select id="smonth"  class="form-control " >
        <option value="1">يناير</option>
        <option value="2">فبراير</option>
        <option value="3">مارس</option>
        <option value="4">ابريل</option>
        <option value="5">مايو</option>
        <option value="6">يونيو</option>
        <option value="7">يوليو</option>
        <option value="8">اغسطس</option>
        <option value="9">سبتمبر</option>
        <option value="10">اكتوبر</option>
        <option value="11">نوفمبر</option>
        <option value="12">ديسمبر</option>
        </select></td>

                 
              </tr> 
             <tr>
             <td>تاريخ الصرف</td>
                 <td> <input type="date" id='sdate' class="form-control "  value=" <?php echo $res['sdate']; ?> "  placeholder=""  ></td>
             
              
         
  
           
                         <td colspan='2'>       <a href="#" onclick = 'return false;' onmousedown='edit_sal_done(<?php echo $res["id"];?>)' class="btn btn-primary btn-user btn-block">
                تحديث
           
              </a> </td>
                        
             
 </tr>
         
            </table>
             
             
 
              </form>
 

<?php
}
?>