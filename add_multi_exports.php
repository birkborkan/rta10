                     
<?php
include("connect.php");

?> 
<form  style='text-align:right; font-size:1em;'>
<div class='btn btn-success' style='width:10%;direction: rtl;text-align:right' onmousedown="give_pages('add_multi_exports.php','ادخال متعدد  ');">ادخال جديد </div>             
<span class='btn btn-success' style='width:50%;direction: rtl;text-align:right' onmousedown="give_pages('show_all_export.php','عرض الصادرات   ');">عرض الصادرات  </span>           
<table width='100%' class='table'>
            <tr style='background:#808080;color:white; font-size: 0.7em;'>
            <td>المرحل</td> <td>ر.العربة</td> <td>السائق</td> <td>الوحدة</td>
              <td id="qty_title">الكمية</td> <td>الشراء</td> <td>ت.ترحيل</td> <td>ت.تحميل</td>
                <td>منفستو</td> <td>ت.الشحن</td>  <td>اضافة</td>
            </tr>
            <?php
            $rec_no=1;
            while($rec_no <=5)
            { 
                $items=mysql_query("select sno,sname,stype from store order by sno");
                ?>
            
                 <tr width='100%'  style=' font-size: 1em;'>
                <td width='20%'><input type="text" id="<?php echo 'rname'.$rec_no; ?>" class="form-control "   placeholder=""></td>
                <td width='10%'> <input type="text" id="<?php echo 'cno'.$rec_no; ?>" class="form-control "   placeholder=""></td>
                <td width='20%'> <input type="text" id="<?php echo 'dname'.$rec_no; ?>" class="form-control "  placeholder=""></td>
 <td width='5%'> <select id="<?php echo 'pname'.$rec_no; ?>" style=' font-size:0.7em;'>
 <?php while($srow=mysql_fetch_array($items)):; ?>	
     <option value="<?php echo $srow['sname'];?>" ><?php echo $srow['sname']; $stype=$srow['stype'];?></option>
     
    <?php endwhile ; 
     ?>
        </select>
        </td>
       
        <td width='7%'> <input type="text" id="<?php echo 'pqty'.$rec_no; ?>" class="form-control "    placeholder=""></td>
                <td width='10%'> <input type="text" id="<?php echo 'bcost'.$rec_no; ?>" class="form-control "    placeholder=""></td>
               <td width='10%'> <input type="text" id="<?php echo 'dcost'.$rec_no; ?>" class="form-control "   placeholder=""></td>
             <td width='10%'> <input type="text" id="<?php echo 'lcost'.$rec_no; ?>" class="form-control "   placeholder=""></td>
           <td width='5%'> <input type="text" id="<?php echo 'manifist'.$rec_no; ?>" class="form-control "   placeholder=""></td>    
          <td width='3%'> <input style='width:auto; font-size:0.5em;' type="date" id="<?php echo 'ldate'.$rec_no; ?>"   class="form-control "  placeholder=""></td>
          <input type="hidden" id="<?php echo 'comm'.$rec_no; ?>"  class="form-control "    placeholder="">
         <td width='3%' style="backgroud:yellow;">  <a href="#" onclick = 'return false;' onmousedown='add_multi_exp("<?php echo $rec_no; ?>");'id="<?php echo 'add'.$rec_no; ?>" class="bg_color_darkyellow">
               +
             </a> </td>
             </tr>
            <?php $rec_no+=1; } ?>
        
           </table>
          </form>
     
