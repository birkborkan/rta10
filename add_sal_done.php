<?php
include "connect.php";
$eid = $_POST['eid'];
  $smonth = $_POST['smonth'];
  $sdate = $_POST['sdate'];
  







if($eid){
    $select_eid = mysql_query("select * from emp where eid = '$eid'");
  $row = mysql_fetch_assoc($select_eid);
  $esal = $row['esal'];
    
        $insert=mysql_query("insert into salaries
        (eid,esal,smonth,sdate)
        values
  ('$eid','$esal','$smonth','$sdate')") or die(mysql_error());
  if($insert){
      echo "done";
  }
  

}
              ?>