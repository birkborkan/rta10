<?php
ob_start();

include("check_login.php");
?>
<!doctype html>
<html>
<head>
<title>اعدادات الحساب</title>
<link  rel="stylesheet" type="text/css" href="css/rotana_style.css">
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.5">
    		
</head>

	<body class="body" onload="startTime()">
        <div class="datetime" id="txt"></div>

<header class="main_header">
  
</header>
        
 <div class="login_info">
    
           <form  class="form"  action="setting.php" method="POST" >
	<fieldset>
		<legend>اعدادات الجساب</legend>
       كلمة المرور الحالية:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="text" type="password" name="crpass"  required ><br>
       كلمة المرور الجديدة:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="text" type="password" name="newpass"  required ><br>
       تاكيد كلمة المرور الجديدة:<input class="text" type="password" name="cnewpass"  required ><br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="bt" type="submit" name="edit" value="تعديل">
       <input  class="bt" type="reset" value="الغاء">
        </fieldset>
    </form>
        
        </div>
        
	</body>
    
</html>
<?php
if($_POST['edit'])
{  include"connect.php";
       $cr_pass=$_POST['crpass'];
       $cr_user=$_SESSION['seuser'];
       $new_pass=$_POST['newpass'];
       $cnew_pass=$_POST['cnewpass'];
        $q=mysql_query("select * from login where uname='$cr_user' && upass='$cr_pass'",$conn );
        $row=mysql_fetch_array($q);
        if(mysql_num_rows($q)!=0)
        {   
            // header("location:rotana.php");
           
           if($new_pass==$cnew_pass)     
           { $uq=mysql_query("update login set upass='$new_pass' where uid=".$row['uid']." ");
              echo "<p class='g_color'>تمت تغيير كلمة المرور بنجاح !!</p>";
  
           }
            else
            {
                  echo "<p class='r_color'>يجب تطابق كلمة الجديدة !!</p>";
            }
        }
                    else
 {                      
  echo "<p class='r_color'>كلمة المرور الحالية غير صحيحة !!</p>";
  }
}
ob_end_flush();
?>