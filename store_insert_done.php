<?php
include "connect.php";
$s_name=$_POST['pro_name'];
$s_type=$_POST['pro_type'];
$s_price=$_POST['pro_price'];
 
if($s_name)
{
    $select = mysql_query("select * from store where sname = '$s_name'");
    if(mysql_num_rows($select)>0){
echo "found";
    }else{
   
       $s_date=date('y-m-d');
    $insert=mysql_query("insert into store
        (sname,stype,sprice,sdate) values('$s_name','$s_type','$s_price','$s_date')") or die("erroe in insert");
            if (isset($insert)) {
                 echo"done";

            }
         
        }
}
//<?php echo"value='".$res['sname']."' "
mysql_close($conn);
?>