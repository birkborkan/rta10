                     
<?php
include("connect.php");
$per=$_SESSION['uper'];
$items=mysql_query("select sno,sname,stype from store order by sno");
?> 
<form  style='text-align:right; font-size:1em;'>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right' onmousedown="give_pages('show_all_export.php','عرض الصادر ');"> عرض الصادرات  </div>             
            <table width='100%' class='table'>
            <tr>
                <td>المرحل</td>
                <td><input type="text" id='rname' class="form-control "   placeholder=""></td>
            </tr>
             <tr>
                <td>رقم العربة</td>
                <td> <input type="text" id='cno' class="form-control "   placeholder=""></td>
            </tr> 
            <tr>
                <td>اسم السائق</td>
                <td> <input type="text" id='dname' class="form-control "  placeholder=""></td>
            </tr>
             <tr>
                <td>  الوحدة</td>
                <td> <select id="pname"  style='width:100%;'>
 <?php while($srow=mysql_fetch_array($items)):; ?>	
     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname']; $stype=$srow['stype'];?></option>
     
    <?php endwhile ; 
     ?>
 </select></td>
            </tr>
            <tr>
                <td>   الكمية</td>
                <td> <input type="text" id='pqty' class="form-control "   placeholder=""></td>
            </tr>   
              <tr >
                <td>   الشراء</td>
                <td> <input type="text" id='bcost' class="form-control "    placeholder=""></td>
            </tr>  
              <tr >
                <td>   تكلفة ترحيل</td>
                <td> <input type="text" id='dcost' class="form-control "   placeholder=""></td>
            </tr>   
             <tr >
                <td>   تكلفة تحميل</td>
                <td> <input type="text" id='lcost' class="form-control "   placeholder=""></td>
            </tr >
            <tr>
                <td>      منفستو</td>
                <td> <input type="text" id='manifist' class="form-control "   placeholder=""></td>
            </tr> 
            <tr>
                <td>      تاريخ الشحن</td>
                <td> <input type="date" id='ldate' class="form-control "   placeholder=""></td>
            </tr>
          <tr>
                        <td>      ملاحظات  </td>
                        <td> <input type="text" id='comm' class="form-control "    placeholder=""></td>
                    </tr>   
                    <tr>
                        <td> <a href="#" onclick = 'return false;' onmousedown='add_exp("<?php echo $per; ?>");'class="btn btn-primary btn-user btn-block">
               إضافة
          
             </a> </td>
                        <td> <input style='background:red;'type="reset" value="الغاء" class="btn btn-primary btn-user btn-block"/></td>
                    </tr>
        
           </table>
            
            

             </form>
     
