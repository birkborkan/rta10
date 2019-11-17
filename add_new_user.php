 
<form  style='text-align:right;'>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('show_all_user.php','عرض المستخدمين ');"> عرض المستخدمين  </div>             
           
            <table width='100%' class='table'>
            <tr>
                <td>اسم بالكامل </td>
                <td><input type="text" id='ufname' class="form-control "   placeholder="" required></td>
            </tr>
             <tr>
                <td>  اسم المستخدم </td>
                <td> <input type="text" id='uname' class="form-control "   placeholder="" required></td>
            </tr> 
            <tr>
                <td> كلمة المرور</td>
                <td> <input type="password" id='upass' class="form-control "  placeholder=""></td>
            </tr>
            <tr>
                <td> مستوى الصلادية</td>
                <td> 
                <select id="uper"  style='width:100%;'>
                  <option value="1" >مدير</option>
                  <option value="2" >صادر</option>
                  <option value="3" >وارد</option>
                  <option value="4" selected>مبيعات</option>
                </select>
                </td>
            </tr> 
            <tr>
                <td> صلاحية الدخول</td>
                <td> 
                <select id="ustatus"  style='width:100%;'>
                  <option value="1" selected>اعطاء</option>
                  <option value="0" >سحب</option>
                
                </select>
                </td>
            </tr> 
         
            <tr>
                        <td>       <a href="#" onclick = 'return false;' onmousedown='add_user();'class="btn btn-primary btn-user btn-block">
               إضافة
          
             </a> </td>
                        <td> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                    </tr>
            
        
           </table>
            
            

             </form>