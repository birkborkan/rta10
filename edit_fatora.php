<?php
session_start();
include "connect.php";
$post_id = $_POST['oid'];
 
 if($post_id){
$q=mysql_query("select * from cus_order where oid='$post_id'") or die(mysql_error());






     $res = mysql_fetch_assoc($q);
     $sno = $res['sno'];
     $optype = $res['optype'];
     $odate = $res['odate'];
     $oitem= $res['oitem'];
     $fatora_no= $res['fatora_no'];
     $mjmoo= $res['mjmoo'];
     $price= $res['price'];
     $oqty= $res['oqty'];
     $_SESSION['sno'] = $sno;
     $_SESSION['optype'] = $optype;
     $_SESSION['odate'] = $odate;
     $_SESSION['oitem'] = $oitem;
     $_SESSION['fatora_number'] = $fatora_no;
     $_SESSION['mjmoo'] = $mjmoo;
     $_SESSION['price'] = $price;
     $_SESSION['oqty'] = $oqty;

    // rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm 
?>

<form style='text-align:right;'>

    <table width='100%' class='table'>
        <tr>
            <td>اسم الصنف</td>
            <td>
                <select style="" id="oitem" class="form-control " placeholder="">

                    <?php 


$select = mysql_query("select * from store");
while($row =mysql_fetch_assoc($select)){
    
$sname = $row['sname'] ;
 
if($oitem == $sname)
    {
       echo " <option  selected value='".$oitem." '>  ".$oitem."   </option>
            ";
   }
 
     else
      {
        echo " <option value='".$sname." '> ".$row['sname']."  </option>
                     ";
     }
}

   ?>

                </select>
            </td>
        </tr>
        
        <tr>

            <input type="hidden" id='fatora_no'   value='<?php echo  $res['fatora_no']; ?>'>

        </tr>

        <tr>
            <td>
                الكمية

            </td>
            <td>
                <input  class='form-control' type="text" id='oqty' value='<?php echo $res['oqty'];?>'/>
            </td>
        </tr>
        <tr>
            <td colspan='2'> <a href="#" onclick='return false;'
                    onmousedown='edit_fatora_done(<?php echo $res["oid"];?>)'
                    class="btn btn-primary btn-user btn-block">
                    تحديث

                </a> </td>
            <td colspan='2'> <input style='background:red;' type="reset" value="الغاء"
                    class="btn btn-primary btn-user btn-block" /></td>
        </tr>



    </table>



</form>


<?php
}
?>