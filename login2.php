<?php
ob_start();
session_start();

if(isset($_SESSION['seuser']) && isset($_SESSION['sepass'])){
header("location:index.php");
exit();
}

?>
<!doctype html>
<html>
<head>
<title>مطاحن روتانا للغلال</title>
<link  rel="stylesheet" type="text/css" href="css/rotana_style.css">
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
<meta charset="utf-8"> 
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
            
    function getinfo() {
      
                 var x;
            if(window.XMLHttpRequest){
            x=new XMLHttpRequest();
          
            }else{
              x=new ActiveXObject("Microsoft.XMLHTTP");  
            }
      x.onreadystatechange=function() {
          if(x.readyState<4){   //x.abort();
              document.getElementById("jax").innerHTML="<img src='img/ajax-loader.gif'/>";
          } 
          
             if(x.readyState==4 & x.status==200 ){
                 
                 //document.getElementById("jax").innerHTM ="";
            //document.getElementById("jax").innerHTML=x.responseText;
        
                 if(x.responseText === "login_ok"){
                    window.location.assign("index.php")
                 }
                 else if(x.responseText === "login_0"){
                  document.getElementById("jax").innerHTML="ليس لديك صلاحية الدخول !!الرجاء مقابلة الادارة"; 
                 }
                 else if(x.responseText === "login_no"){
                  document.getElementById("jax").innerHTML="خطا في الاسم المستخدم او كلمة المرور"; 
                 }
                 else  {
                  document.getElementById("jax").innerHTML="لم نستطيع استجابة طلبك"; 
                 }
        
                     
                  
            }
          
         
          
      }
         var u = document.getElementById("username").value;
         var p = document.getElementById("password").value;
        if(u==="" || p===""){
          document.getElementById("jax").innerHTML="الرجاء ادخال اسم المستخدم و كلمة المرور";   
        } else
            { 
            x.open("GET","login_ck.php?username="+u+"&password="+p,true);
            x.send();
            }
       
   }



		</script>
    
</head>

	<body class="body" onload="startTime()">
        <div class="datetime" id="txt"></div>

<header class="main_header">
  <div class="header_img"> مطاحن روتانا للغلال-فرع-نيالا </div>

</header>
        
 <div class="login_info">
     <div class="login_img">
     
     </div>
           <form class="form"  action="" method="POST" >
	<fieldset>
		<legend>معلومات الدخول </legend>
        اسم المستخدم:<input class="text" type="text"  id="username" required autofocus><br>
         كلمة المرور:&nbsp;&nbsp;&nbsp;<input class="text" type="password" id = "password"  required ><br>

        <input class="bt" type="submit" name="تسجيل الدخول" onclick="return false;" onmousedown="getinfo()" value="تسجيل الدخول">
       <input  class="bt" type="reset" value="الغاء">
        </fieldset>
    </form>
        
        </div>
        <div id="jax" style="text-align:center;font-size:18px; color:red"> </div>
        <div id="state" style="text-align:center;font-size:18px;"> </div>
        
	</body>
</html>
<?php
ob_end_flush();
?>