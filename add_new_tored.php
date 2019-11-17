 
<form  style='text-align:right;'>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('show_all_tored.php','عرض الحسابات ');"> عرض الحسابات  </div>             
           
            <table width='100%' class='table'>
            <tr>
                <td>المبلغ  </td>
                <td><input type="text" id='tamount' class="form-control "   placeholder="" required></td>
            </tr>
             <tr>
                <td>  البيان  </td>
                <td> <input type="text" id='tcomm' class="form-control "   placeholder="" required></td>
            </tr> 
            <tr>
                <td> التاريخ </td>
                <td> <input type="date" id='tdate' class="form-control "  placeholder=""></td>
            </tr>
         
         
            <tr>
              <td> <a href="#" onclick = 'return false;' onmousedown='add_tored();'class="btn btn-primary btn-user btn-block">
               إضافة
          
             </a> </td>
                <td> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                    </tr>
            
        
           </table>
            
            

             </form>