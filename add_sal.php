<?php
   
include "connect.php";
   
  
$get_emp=mysql_query("select * from emp order by eid asc"); 
  
?>
<form class="inputform" action="salaries_insert.php" method="POST" >
 <table class='table'>
 
<tr>
                <td> اسم الموظف</td>
                <td> <select id="e_info" width="100%" class="form-control "  >
 <?php while($erow=mysql_fetch_array($get_emp)):; ?>	
     <option value="<?php echo $erow['eid'];?>" >
<?php echo $erow['ename']; ?></option>
     
         <?php endwhile ; 
          ?>
        </select>  
        </td>
            </tr> 
            <tr>
           
                <td>شهر</td>
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
           
           <td> تاريخ الصرف</td>
           <td> <input type="date" id='sdate' class="form-control "  placeholder=""></td>
       </tr> 
            <tr>
                        <td>       <a href="#" onclick = 'return false;' onmousedown='add_sal();'class="btn btn-primary btn-user btn-block">
               إضافة
          
             </a> </td>
</tr>
 <table>
</form>