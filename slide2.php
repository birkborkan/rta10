<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-content w3-section" style="max-width:500px">
<div class="mySlides w3-animate-fading" ><img src="img/rotana1.jpg" style="width:100%"/> متج مدعوم</div>
	<div class="mySlides w3-animate-fading"><img  src="img/rotana2.jpg" style="width:100%"/> منتج بكت </div>
	<div class="mySlides w3-animate-fading"><img  src="img/rotana3.jpg" style="width:100%"/> مطاحن روتانا للغلال</div>
</div>

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
  setTimeout(carousel, 9000);    
}
</script>

</body>
</html>
