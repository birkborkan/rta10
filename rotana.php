<?php
session_start();

if(!isset($_SESSION['seuser']) && !isset($_SESSION['sepass'])){
header("location:login.php");
exit();
}

?>
<!doctype html>
<html>
<head>
<title>مطاحن روتانا للغلال</title>
<link  rel="stylesheet" type="text/css" href="css/rotana_style.css">
<link  rel="stylesheet" type="text/css" href="css/slide.css">
<meta charset="utf-8"> 
<link rel="stylesheet" href="css/slide.css">

<style type="text/css">

.mySlides {display:none;}

    

</style>
<meta name="viewport" content="width=device-width,initial-scale=1.5">
    		<script type="text/javascript">
			function startTime() {
				var today = new Date();
				var h = today.getHours();
				var m = today.getMinutes();
				var s = today.getSeconds();
				// add a zero in front of numbers<10
				m = checkTime(m);
				s = checkTime(s);
   
				document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
				t = setTimeout('startTime()', 500);

			}

			function checkTime(i) {
				if(i < 10) {
					i = "0" + i;
				}
				return i;
			}
                
                
    </script>
<style>

.mySlides {display:none;}

</style>
</head>

  
	<body class="body" onload="startTime()">
        <div class="datetime" id="txt"></div>

<header class="main_header">
  <div class="header_img"> <img src="images/rotana.jpg">مطاحن روتانا للغلال-مكتب-نيالا </div>
 
  <nav class="menu">
      
          <ul>
                <li><a href="sldie.php" target="info"> الرئيسية</a></li> 
                
                 <li><a href="#"> المخزن</a>
                    
                            <ul>
                                <li><a href="store_insert.php" target="info">اضافة منتج</a></li>
                                <li><a href="store_update.php" target="info"> المنتجات</a></li>
                                <li><a href="history_select.php" target="info">حركة المخزن </a></li>
                                <li><a href="imports_select.php" target="_blank">واردات </a></li>
                               

                            </ul>
                        
                   
              </li> 
             
                 <li><a href="#"> الفواتير</a>
                    
                            <ul>
                                <li><a href="order_insert_print.php" target="info">ادخال جديد </a></li>
                                <li><a href="order_insert.php" target="_blank">عرض</a></li>
                               
                            </ul>
                        
                   
              </li>
                <li><a href=""> موظفين</a>
                    
                            <ul>
                                <li><a href="employees_insert.php" target="info">الموظفين</a></li>
                                <li><a href="salaries_insert.php" target="info" title="amas">الرواتب</a></li>
                                <li><a href="login_insert.php" target="info">المستخدمين</a></li>
                                                             
                            </ul>
                        
                   
              </li> 
             
                
                <li><a href="#"> تقارير</a>
                  
                            <ul>
                                <li><a href="#">مبيعات يومية</a></li>
                                <li><a href="#">المخزن</a></li>
                                <li><a href="#">الرواتب</a></li>
                            </ul>
                 
               </li>
              
                <li><a href="#"> عن روتانا </a></li> 
            </ul>
      
    <div class="setting3"><a href="setting.php" target="info"><img src="images/setting1.jpg" width="10px" height="10px"></a></div> 
  </nav><a style="font-size:20px ;text-decoration: none;" class="logout" href="logout.php">تسجيل الخروج </a>
 

</header>
<iframe class="info"  name="info" width="100%" height="1500px" style="border:none" scrolling="no" >
  
                </iframe>
  
        <footer> <h3> كل حقوق النشر محفوظة لاماس تقنية</h3></footer>
<script>

var myIndex = 0;

carousel();



function carousel() {

  var i;

  var x = document.getElementsByClassName("mySlides");

  for (i = 0; i < x.length; i++) {

    x[i].style.display = "none";  

  }

  myIndex++;

  if (myIndex > x.length) {myIndex = 1}    

  x[myIndex-1].style.display = "block";  

  setTimeout(carousel, 4000);    

}

</script>

	</body>
</html>