<html>

<head>
    <title>coustomer login</title>
    <link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="style.php"> 
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="headeraligned">
        <img src="logo.jpg" width="300" alt="">

        <span class="headerspan">SELAGINELLA BRYOPTERIS HOSPITAL</span>
    </div>

    <hr>
    <ul class=headerul>
        <li class="headerli"><a href="home.php">HOME</a></li>
        <li class="headerli"><a href="AboutUsfinal/AboutUs/about.php">ABOUT US</a></li>
        <li class="headerli"><a href="bookappoinment.php">BOOK APPOINTMENT</a></li>
        <li class="headerli"><a href="doctors.php">DOCTORS</a></li>
        <li class="headerli"><a href="www.google.com">GALLERY</a></li>
        <li class="headerli"><a href="contact.php">CONTACT US</a></li>
        <li class="headerli"><a href="emergency.php">EMERGENCY</a></li>
        <li class="headerli"><a href="loginchoose.php">LOGIN</a></li>
    </ul>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form method="POST">
          <div class="row button"><input type="submit" value="Patient" name="patient">
          </div>
		  <div class="row button"><input type="submit" value="Doctor" name="doctor">
          </div>
		  <div class="row button"><input type="submit" value="Admin" name="admin">
          </div>
        </form>
      </div>
    </div>
    <?php
     
        if(isset($_POST['patient'])) {
            header("Location: loginforpatient.php");
        }
        if(isset($_POST['doctor'])) {
            header("Location: login4doc.php");
        }
        if(isset($_POST['admin'])) {
            header("Location: adminlogin.php");
        }
    ?>
</body>
</html>
