<!doctype html>  
<html>  
<head>  
<title>Geolocation API: Technotip.com</title>  
<meta charset="utf-8"/>  
<link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<link href="css/myStyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> 
<script src="js/jquery-3.6.4.min.js"></script> 
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>   
<script src="js/myScript4.js"></script>  
</head>  
<body>  

    <!-- main header start -->
   
<div class="headeraligned">
<img src="logo.jpg" width="300" alt="">

<span class="headerspan">SELAGINELLA BRYOPTERIS HOSPITAL</span>
</div>

<hr>
<ul class=headerul>
<li class="headerli"><a href="home.php">HOME</a></li>
<li class="headerli"><a href="https://www.google.com/">ABOUT US</a></li>
<li class="headerli"><a href="bookappoinment.php">BOOK APPOINTMENT</a></li>
<li class="headerli"><a href="doctors.php">DOCTORS</a></li>
<li class="headerli"><a href="www.google.com">GALLERY</a></li>
<li class="headerli"><a href="contact.php">CONTACT US</a></li>
<li class="headerli"><a href="emergency.php">EMERGENCY</a></li>
<li class="headerli"><a href="login.html">LOGIN</a></li>
</ul>

<!-- main header end -->
    <div class="divamb">
    <h1 id="live">LIVE LOCATION OF AMBULANCE</h1>

    <div class="mappp">
<p id="map"></p>  </div>
</div>
</body>  
</html>  