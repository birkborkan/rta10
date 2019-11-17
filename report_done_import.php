<?php include "connect.php";?>
<?php
$sch_option=$_POST['sch_option'];
 $sch_text=$_POST['sch_text'];
 $sch_date1=$_POST['sch_date1'];
 $sch_date2=$_POST['sch_date2'];
 $whda=$_POST['whda'];
    //pname ptype dname ldat1 ldate2 
    if($sch_option != "between" and $sch_option != "pname" and $sch_option != "whda_between"){
    
        $q=mysql_query(" select * from store_imp where  $sch_option = '$sch_text' order by eid desc");
         
         if($sch_option == "dname"){$s_option="عن السائق";}
     
        else  if($sch_option == "ptype"){$s_option="عن الصنف";}
    }else  if($sch_option == "between")
    {
      $q=mysql_query(" select * from store_imp where ldate1 between '$sch_date1' and '$sch_date2' order by eid desc");
      $s_option=" في فترة من".$sch_date1."  الى  ".$sch_date2;
    } 
  
else  if($sch_option == "pname")
    {
      $q=mysql_query(" select * from store_imp where pname ='$whda'   order by eid desc");
      $s_option="عن الوحدة ".$whda;
    } 
    else  if($sch_option == "whda_between")
    {
      $q=mysql_query(" select * from store_imp where ldate1 between '$sch_date1' and '$sch_date2'  and pname ='$whda'  order by eid desc");
      $s_option="الوحدة ".$whda." من الفترة  ".$sch_date1."  الى  ".$sch_date2;
    } 
  


    if (mysql_num_rows($q)>0) {
                    

        //eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
            ?>   
            <center><div id="reporttitle"  style='width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير وارد  <?php echo $s_option."    ".$sch_text;?></div> </center>
        <table class="table table-bordered" id="dataTable" width="100%" style='font-size:11px;text-align:right;' cellspacing="0">
                          <thead>
                          <tr style='background:#808080;color:white; font-size: 1.3em;'>
                               <th>#</th>
                  
                    <th>ر. العربة </th>
                       <th>اسم السائق</th>
                          <th>الوحدة</th>
                            <th>التصنيف </th>
                              <th> الكمية</th>
                               <th> فقدان</th>
                                 <th>الشراء </th>
                                 <th>التكلفة </th>
                                 <th>بورصة </th>
                                   <th>البيع </th>
                                    <th>الربح </th>
                                     <th>الخسارة </th>
                                         <th>ت. الشحن </th>
                                         <th>ت. الوصول </th>
                                         <th>  ادخال الي النظام</th>
                                        
                                        
                             </tr>
                          </thead>
                           <tbody>
                            <?php
                            $serno=0;
                            $p_qty=0;
                            $p_bay=0;
                            $p_cost=0;
                            $borsa=0;
                           
                            $p_sel=0;
                            $p_pro=0;
                            $p_los=0;
                            $t_cost=0;
                       
                                while($row=mysql_fetch_array($q))
                                {//eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
                                  $serno+=1;
                                  if($row['stor']==1)
                                  {
                                   $stor=    "<span   >تمت</span> ";
                                    $stor_val = 1;
                                  }
                                   else
                                   {
                                    $stor="<span    >    لم تتم   </span> ";  
                                    $stor_val = 0; 
                                   }
                                      $c_id+=1;
                                    $p_qty+=$row['pqty']; 
                                    $p_bay+=$row['pbuy']; 
                                    $p_cost+=$row['pcost']; 
                                    $borsa+=$row['borsa']; 
                                    $p_sel+=$row['psel']; 
                                    $p_pro+=$row['ppro']; 
                                    $p_los+=$row['plos']; 
                                
                                    //eid,lno,dname,pname,ptype,pqty,pbuy,pcost,borsa,psel,ppro,plos,ldate1,ldate2,stored
                                    echo "
                                <tr>
                                <td>".$serno."</td>
                                <td>".$row['cno']."</td>
                                <td>".$row['dname']."</td>
                                <td>".$row['pname']."</td>
                                <td>".$row['ptype']."</td>
                                <td>".$row['pqty']."</td>
                                <td>".number_format($row['miss'])."</td>
                                <td>".number_format($row['pbuy'])."</td>
                                <td>".number_format($row['pcost'])."</td>
                                <td>".number_format($row['borsa'])."</td>
                                <td>".number_format($row['psel'])."</td>
                                <td>".number_format($row['ppro'])."</td>
                                <td>".number_format($row['plos'])."</td>  
                                <td>".$row['ldate1']."</td>
                                <td>".$row['ldate2']."</td>
                                <td >".$stor."</td>
                             
                              
                                "; ?> 
                                
                                </td> 
                                </tr>
                                  
                               <?php }    
                                 
                           ?> 
                          </tbody>
                          <?php 
                           echo "
                           <tr>
                           <td style='border-style:none;'></td>
                           <td style='border-style:none;font-weight:bold;'>الاجماليات</td>
                           <td style='border-style:none;'></td>
                           <td style='border-style:none;'></td>
                           <td style='border-style:none;'></td>
                           
                           <td>".number_format($p_qty)."</td>
                           <td style='border-style:none;'></td>
                           <td>".number_format($p_bay)."</td>
                           <td>".number_format($p_cost)."</td>
                           <td>".number_format($borsa)."</td>
                           <td>".number_format($p_sel)."</td>
                           <td>".number_format($p_pro)."</td>
                           <td>".number_format($p_los)."</td>
                           "; 
                          ?>
                        </table>
                     
                        </div>
                        <?php 
                            }else{
                              echo"<p style='text-align:right'>عفواً : لا توجد نتائج مشابهة</p>";
                            }
                    ?>
                    </div>
                    