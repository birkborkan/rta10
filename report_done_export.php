<?php include "connect.php";?>
<?php
$sch_option=$_POST['sch_option'];
 $sch_text=$_POST['sch_text'];
 $sch_date1=$_POST['sch_date1'];
 $sch_date2=$_POST['sch_date2'];
 $whda=$_POST['whda'];

    if($sch_option != "between" and $sch_option != "pname" and $sch_option != "whda_between"){
    
        $q=mysql_query(" select * from store_exp where  $sch_option = '$sch_text' order by eid desc");
        if($sch_option == "rname"){$s_option="عن المرحل";}
        else  if($sch_option == "dname"){$s_option="عن السائق";}
     
        else  if($sch_option == "ptype"){$s_option="عن الصنف";}
    }else  if($sch_option == "between")
    {
      $q=mysql_query(" select * from store_exp where ldate between '$sch_date1' and '$sch_date2' order by eid desc");
      $s_option=" في فترة من".$sch_date1."  الى  ".$sch_date2;
    } 
  
else  if($sch_option == "pname")
    {
      $q=mysql_query(" select * from store_exp where pname ='$whda'   order by eid desc");
      $s_option="عن الوحدة ".$whda;
    } 
    else  if($sch_option == "whda_between")
    {
      $q=mysql_query(" select * from store_exp where ldate between '$sch_date1' and '$sch_date2'  and pname ='$whda'  order by eid desc");
      $s_option="الوحدة ".$whda." من الفترة  ".$sch_date1."  الى  ".$sch_date2;
    } 
  


 if (mysql_num_rows($q)>0) {
                
?>
<center><div id="reporttitle"  style='width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير صادر  <?php echo $s_option."    ".$sch_text;?></div> </center>
<table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white; font-size: 1.3em;'>
                       <th>#</th>
            <th>المرحل</th>
            <th>ر. العربة </th>
               <th>اسم السائق</th>
                  <th>الوحدة</th>
                    <th>الكمية </th>
                       <th>التصنيف </th>
                         <th>الشراء </th>
                           <th>ترحيل </th>
                            <th>تحميل </th>
                             <th>منفستو </th>
                              <th>التكلفة </th>
                                <th>ت. الشراء </th>
                                 <th>الوصول </th>
                                 <th>ملاحظات </th>
                                
                     </tr>
                  </thead>
                   <tbody>
<?php
                    $serno=0;
                    $p_qty=0;
                    $d_cost=0;
                    $b_cost=0;
                    $l_cost=0;
                    $mani_=0;
                    $cost=0;
                    $t_cost=0;
                    $c_id=0;
                        while($row=mysql_fetch_array($q))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                          $serno+=1;
                          if($row['arrive']==1)
                          {
                           $arrive="تمت";   
                          }
                           else
                           {
                            $arrive="لم تتم";    
                           }
                              $c_id+=1;
                            $p_qty+=$row['pqty']; 
                            $b_cost+=$row['bcost']; 
                            $d_cost+=$row['dcost']; 
                            $l_cost+=$row['lcost']; 
                            $mani_+=$row['manifist']; 
                            $t_cost+=$row['tcost'];
                            echo "
                        <tr>
                        <td>".$serno."</td>
                        <td>".$row['rname']."</td>
                        <td>".$row['cno']."</td>
                        <td>".$row['dname']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['pqty']."</td>
                        <td>".$row['ptype']."</td>
                        <td>".number_format($row['bcost'])."</td>
                        <td>".number_format($row['dcost'])."</td>
                        <td>".number_format($row['lcost'])."</td>
                        <td>".number_format($row['manifist'])."</td>
                        <td>".number_format($row['tcost'])."</td>
                        <td>".$row['ldate']."</td>
                        <td>".$arrive."</td>
                        <td>".$row['comm']."</td>                   
"; ?> 
                        
                        </tr>
                          
<?php }    
                         
 ?> 
                  </tbody>
<?php 
                   echo "
                   <tr>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'>الاجماليات</td>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'></td>
                   <td style='border-style:none;'></td>
                   
                   <td>".number_format($p_qty)."</td>
                   <td style='border-style:none;'></td>
                   <td>".number_format($b_cost)."</td>
                   <td>".number_format($d_cost)."</td>
                   <td>".number_format($l_cost)."</td>
                   <td>".number_format($mani_)."</td>
                   <td>".number_format($t_cost)."</td>
                   "; ?>
                </table>
            
                </div>
                </div>
                 <?php            
                    }
                    else{
                      echo"<p style='text-align:right'>عفواً : لا توجد نتائج مشابهة</p>";
                    }
?>