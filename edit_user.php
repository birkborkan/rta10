<?php
include "connect.php";
$post_id = $_POST['id'];
 if($post_id){
$q=mysql_query("select * from login where uid='$post_id'") or die(mysql_error());
     $res = mysql_fetch_assoc($q);

?>	
 
 <form  style='text-align:right;'>
 <div class='btn btn-success' style='width:100%;direction: rtl'>   تحديث بيانات المستخدم :     <?php echo $res['ufname']?></div>         
     <table  class='table'>
        <tr  width='100%'> 
             <td >اسم بالكامل</td>
                 <td  colspan='3'><input type="text" id='ufname' class="form-control "  value='<?php echo  $res['ufname']; ?>' placeholder="" required></td>
                 <td></td>
                  
         </tr>
         <tr>
        <td> مستوى الصلاحية  </td>  
             <td width='20%'>
               <select style="" id="uper" class="form-control " placeholder="">
                    
                    <?php   if($res['uper'] =='1')
                                  {
                                      
                                     echo " <option value='1'  selected> اداري </option>
                                            <option  value='2'> صادر </option>
                                            <option value='3' > وارد </option>
                                            <option value='4' > مبيعات </option>";
                                  }
                                  else if($res['uper'] =='2')
                                  {
 
                                    echo " <option value='1'  > اداري </option>
                                    <option  value='2' selected> صادر </option>
                                    <option value='3' > وارد </option>
                                    <option value='4' > مبيعات </option>";
                                  } 
                                  else if($res['uper'] =='3')
                                  {
                                      
                                    echo " <option value='1'  > اداري </option>
                                    <option  value='2' > صادر </option>
                                    <option value='3' selected > وارد </option>
                                    <option value='4' > مبيعات </option>";
                                  }
                                        else
                                        {
                                      
                                            echo " <option value='1'  > اداري </option>
                                            <option  value='2' > صادر </option>
                                            <option value='3'  > وارد </option>
                                            <option value='4' selected> مبيعات </option>";  
                                        }
                                       ?>

                               </select>
                          </td>
        
             <td> سماح بالدخول </td>
                 <td width='50%'>
                 <select style="" id="ustatus" class="form-control " placeholder="">
                    
                    <?php   if($res['ustatus'] =='1')
                                  {
                                     echo " <option  selected value='1'> اعطاء </option>
                                            <option value='0'> سحب </option> ";
                                 }
                               
                                        else
                                        {
                                            echo " <option value='1'> اعطاء </option>
                                                  <option selected value='2'> سحب </option> ";
                                             }
                                       ?>

                               </select>
                 </td>
           
                    </tr> 
        <tr width='100%'>
           <td colspan='3' >
            <input style='width:48%;'value=' تحديث   '  onclick = 'return false;' onmousedown='edit_user_done(<?php echo $res["uid"];?>)' class="btn btn-primary btn-user  "/>
        
           <input style='background:red;width:48%;'type="reset" value="الغاء" class="btn btn-primary btn-user  "/>
             </td>
          </tr>
        </table>
             
 </form>
 

<?php
}
?>