<?php
session_start();

?>
<!DOCTYPE html>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Full-width input fields */


/* Set a style for all buttons */
button {
    background-color: #4CAF50 @important;
    color: white @important;
    padding: 14px 20px @important;
    margin: 8px 0 @important;
    border: none @important;
    cursor: pointer @important;
    width: 100% @important;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto @important;
    padding: 10px 18px @important;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
    width: 10%;
    height: 2%;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}

input[type=text],
input[type=password] {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%;
    /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;

    font-size: 35px;
    font-weight: bold;
}

.close2 {

    color: #d1bfbf;

    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

.close2:hover,
.close2:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }

    .cancelbtn {
        width: 100%;
    }
}

.imgcontainer {
    text-align: center;
    margin: 50px 0 12px 0;
    position: relative;
}

body {
    background: #bed4be;
}

input[type="checkbox"],
input[type="radio"] {
    -moz-appearance: checkbox;

    -ms-appearance: checkbox;
    -webkit-appearance: checkbox;
    appearance: checkbox;
    display: block;
    /* float: left; */
    margin-right: -2em;
    opacity: 0;
    width: 1em;
    z-index: 999;
    float: none;
}
</style>
<div class='container'>
    <div class='row'>
        <input type='hidden' id='zbon_name' value="<?echo $_SESSION['zbon_name'];?>" />
        <input type='text' id='name' class='form-control' placeholder='ادخل اسم الزبون' style='width:40%; ' /><button
            onclick='save_name_fatora_no()' style='width:15%;padding:0;margin-top:7px;height:40px;'
            class='btn btn-success'>حفظ</button>
        <div class='col-md-7'>

            <?php
      include "connect.php";
      
    /*sno sname stype sprice sqty*/
 
  $x = 1;
if(isset($x)){
   $selectcustom = mysql_query("select * from store ") or die(mysql_error());
   if(mysql_num_rows($selectcustom)>0){
  echo" <div class='panel panel-success' >
       
         <center>
          <div   style='color:green;font-size:30px;padding:10px;'>
          
        
          <br>
          <div style='font-size:0.7em;background: #b9cfbcab'>
            اسم الزبون : ".$_SESSION['zbon_name']." &nbsp;  
          <br>
         
          
          </div>
          <div>
         </center>
         
          </div>";
       echo"<input type='text' placeholder='بحث'  id='entered' onkeydown='fatora_search() ;' onkeyup='fatora_search() '/>";
       echo"<div id='contian'>";
           $select = mysql_query("select * from store where sqty > 0");
             if(mysql_num_rows($select)>0){
                  echo"<table class='table' width='100%'style='font-size: 1em;;'>
                  <tr style='background: #b9cfbcab;color:black;font-size: 1.3em;'>
                   <td>#</td>
                 <td>اسم الصنف</td>
                   <td>الكمية</td>
                   <td>النوع</td>
                
                  
                   <td  >سحب</td>
              
                   
                  </tr>
                  ";
                  $counter=0;
                 while($row = mysql_fetch_assoc($select)){
                     $counter+=1;
                     echo"<tr>
                     <td style='color:#579a57;'>".$counter."</td>
                     
                     <td style='color:black;' id='name_".$row['sno']."'>".$row['sname']."</td>
                      <td style='color:#b95252;'>".$row['sqty']."</td>
                     <td style='color:#7c8e16;' id='type_".$row['sno']."'>".$row['stype']."</td>
                    
                     <td > <a href='#'style='color:blue;'
                     class='btn btn-success' onclick='return false;' onmousedown='return cel(".$row['sno'].");'>سحب</a></td> 
                     </tr>";
                 }
                
                echo"</table>";
             } else
             {
                 echo "المخزن فارغ من المنتجات";
             }
   } 
} 
     ?>
           
            <div id="id01" class="modal">

                <form class="modal-content animate" style='background: #737f85;color:white;text-align:center;'>

                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close"
                            title="Close Modal">&times;</span>

                    </div>


                    <div id='cels'></div>
                    <label><b> ادخل الكمية :- </b></label>
                    <input type="text" id="amount" placeholder="ادخل الكمية" required>

                    <br>
                    <button type="submit" onclick="return false" id='shb'>سحب</button>





                </form>
            </div>
        </div>
    </div>




    <div classs='col-md-5'>
        <div style='z-index:100000;background: #d3d3b0;font-size:13px;color:black;' id='added_fatora'>



            <?php
session_start();
include "connect.php";
$name = $_SESSION['zbon_name']; 
$fatora_no = $_SESSION['fatora_no'] ;
$selectempop = mysql_query("select * from  cus_order  where sw ='0' and oname = '$name' and fatora_no = '$fatora_no' " );
           $co = 0;
           
               echo"<table style='font-size:10px; ' class='table' style='width:100%;'>
               <tr style='color:#facccc;background:#107a83;'>
               <td> الرقم</td>
               <td>اسم الصنف</td>
               <td>  النوع</td>
               <td> الكمية</td>
               <td> السعر</td>
               <td> جملة المبلغ</td>
               <td> حذف</td>
               </tr>
               
               "; 
          
          
$sumer = 0;
               while($rows = mysql_fetch_assoc($selectempop)){
                   $co = $co+1;
                   echo"<tr>
                   <td  >".$co."</td>
                   
                   <td >".$rows['oitem']."</td>
                 
                   <td >".$rows['optype']."</td>
                   <td >".$rows['oqty']."</td>
                   <td>".$rows['oprice']."</td>
                   <td>".$rows['mjmoo']."    </td> 
                  
               
                   <td> 
                   <span onclick='return deleter(".$rows['oid'].",".$rows['oqty'].",".$rows['sno'].");' class='close2' title='Close Modal'
                   style='color:red;'>×</span>
                   </td>
                   </tr>";
                   $sumer = $sumer + $rows['mjmoo'];
               }
                
              echo"<tr style='background:#eee;color:blue;'>
              <td>جملة المبلغ:</td>
              <td id='sumer'> $sumer</td>
              <td> </td>
              
              <tr>
                   
                    <td style='text-align:center;'> 
                    
                  
                    
                  
                    </td>
                    
              </tr>
              ";
               echo"
              
              <tr>
              <td id='givemone' colspan='3'></td>
              <td   > <input style='font-size:10px;'type='submit' value='اجراء العملية'  onclick='return false' onmousedown='dafy();' /></td>
              <td id='opgif'  ></td>
              </tr>
         
              ";
               echo"</table>   
          
               ";
        
           ?>





        </div>
    </div>


</div>
</div>
</div>