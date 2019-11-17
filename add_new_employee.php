 
<form  style='text-align:right;'>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('show_all_employee.php','عرض الموظفين ');"> عرض الموظفين  </div>             
            
            <table width='100%' class='table'>
            <tr>
                <td>اسم الموظف</td>
                <td><input type="text" id='ename' class="form-control "   placeholder="" required></td>
            </tr>
             <tr>
                <td>  الهاتف</td>
                <td> <input type="text" id='ephone' class="form-control "   placeholder="" required></td>
            </tr> 
            <tr>
                <td> الوظيفة</td>
                <td> <input type="text" id='ejob' class="form-control "  placeholder=""></td>
            </tr>
            <tr>
                <td> الراتب</td>
                <td> <input type="number" id='esal' class="form-control "  placeholder=""></td>
            </tr> 
            <tr>
           
                <td> تاريخ التعيين</td>
                <td> <input type="date" id='ehdate' class="form-control "  placeholder=""></td>
            </tr> 
            <tr>
                        <td>       <a href="#" onclick = 'return false;' onmousedown='add_employee();'class="btn btn-primary btn-user btn-block">
               إضافة
          
             </a> </td>
                        <td> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                    </tr>
            
   
        
           </table>
            
            

             </form>