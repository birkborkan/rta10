	
 <?php session_start();

 $per=$_SESSION['uper'];
  ?>;
                     
<form  style='text-align:right; font-size:1em;'>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('show_all_product.php','عرض المنتجات ');"> عرض المنتجات  </div>              
<table width='100%' class='table'>               
  <tr>
  <td> المنتج</td>
  <td> <input type="text" id='pro_name' class="form-control " placeholder=""></td>
  </tr>  
      <tr>
      <td> النوع</td>
      <td> 
      <select name="type" id='pro_type' style='width:100%;'>
      <option value="مدعوم">مدعوم</option>
        <option value="تجاري">تجاري</option>
    </select>
      </td>
      </tr>          
                       
              <tr>
              <td> السعر</td>
              <td>  <input type="text" id='pro_price' class="form-control " placeholder=""></td>
              </tr>
              <tr>
              <td> <a href="#" onclick = 'return false;' onmousedown='add_pro("<?php echo $per;?>");'class="btn btn-primary btn-user btn-block">
                  إضافة</a></td>
              <td><input type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
              </tr>
          
               

</table>
                </form>
            

