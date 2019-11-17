<?php
include "connect.php";
$post_id = $_POST['id'];
 if($post_id){
$q=mysql_query("select * from store where sno='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);
    //echo $res['sname'].$res['sprice'];
    //echo int("days 10");
    $o_date=date('y-m-d');    
?>	
 
 <form  style='text-align:right;'>
             
             <table width='100%' class='table'>
             <tr>
                 <td>المنتج</td>
                 <td><input type="text" id='sname' class="form-control "  value='<?php echo  $res['sname']; ?>' placeholder="" required></td>
                
                 <td> التصنيف</td>
                 <td> 
                 <select style="width:100%;" id="stype" class="form-control " placeholder="">
                    
              <?php   if($res['stype'] =='مدعوم')
                            {
                                
                               echo " <option  selected> مدعوم </option>
                               <option  > تجاري </option>";
                            }
                            else{
                                echo " <option  > مدعوم </option>
                             <option  selected> تجاري </option>";
                         } ?>
                        
                       
                         </select>
                         
              
                 
                 </td>
                 
              </tr> 
             <tr>
             <td>  السعر</td>
                 <td> <input type="text" id='sprice' class="form-control "  value=" <?php echo intval($res['sprice']); ?> "  placeholder="" required></td>
             
                <td> تاريخ الاضافة</td>
                 <td> <input type="date" id='sdate' class="form-control " value=" <?php echo $res['sdate']; ?> " placeholder=""></td>
             </tr> 
         
             <tr>
                         <td colspan='2'>       <a href="#" onclick = 'return false;' onmousedown='edit_product_done(<?php echo $res["sno"];?>)' class="btn btn-primary btn-user btn-block">
                تحديث
           
              </a> </td>
                         <td colspan='2'> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                     </tr>
             
    
         
            </table>
             
             
 
              </form>
 

<?php
}
?>