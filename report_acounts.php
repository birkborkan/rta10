	
 
                     
<form  style='text-align:right; font-size:1em;'>
<div class='btn btn-success' style='width:100%;direction: rtl;text-align:right'> تقرير عن الحسابات   </div>              

<table width='100%' class='table'>
<tr width='100%'>
<td  width='10%'>بحث بــ:</td>
<td>
     <select name="sch" id="sch_option" class="form-control " onchange='between_date()'>
      
     <option value="null">    </option>
     <option value="t_date3">تاريخ محدد </option>
      <option value="between" >بين فترتين </option>
      <option value="product" >الوحدة </option>
     </select>
</td>
           
 <td>
      <input type="text" id="sch_text" class="form-control" placeholder="اكتب نص للبحث" style='display:none;'/>
       <select id='whda' class='form-control' style='display:none;'>
             <?php 
             include "connect.php";
             $select = mysql_query("select * from store ");
             while($rows = mysql_fetch_array($select)){
                  echo "<option>".$rows['sname']."</option>";
                  //rname ,dname,ptype,
             }
             ?>
      </select>
     </td>
 <td> <a href="#" onclick = 'return false;' onmousedown='reports("report_done_acounts.php");'class="btn btn-primary btn-user btn-block"> بحث</a></td>
 <td> <a href="#" onclick = 'return false;' onmousedown='printery("report_content");'class="btn btn-primary btn-user btn-block"> طباعة</a></td>
 
 </tr>

 <tr width='100%' style='display:none;' id='bet3' >
 
 <td width='20%'>حسابات    تاريخ محدد :</td>
 
 <td > :<input  type="date" name="date" id="sch_date3" class="form-control" /></td>  
</tr> 
 <tr width='100%' style='display:none;' id='bet' >
 
 <td width='20%'>حسابات بين فترتين :</td>
 <td >من :<input  type="date" name="date" id="sch_date1" class="form-control" /></td>  
 <td >الي :<input  type="date" name="date" id="sch_date2" class="form-control" /></td>  
</tr>          
</table>
</form>
            

