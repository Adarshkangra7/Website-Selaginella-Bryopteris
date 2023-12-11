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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  
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
        <div class="title"><span>Login Form</span></div>
        <form method="post">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="user" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="pass" required>
          </div>
          <div class="pass"><a href="doctorforgot.php">Forgot Password?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
        </form>
      </div>
    </div>
    
    <?php
$user = $pass =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = test_input($_POST["user"]);
  $pass = test_input($_POST["pass"]);


  if ($user == "" && $pass == "") {
    echo '<script>alert("User Name and Password fields are empty");</script>';
    }
    else if ($user == "") {
        echo '<script>alert("User Name is empty");</script>';
    }
else if ($pass == "") {
    echo '<script>alert("Password field is empty");</script>';
    }
else 
    {
        include('connection.php');
            $username = $_POST['user'];
            $password = $_POST['pass'];



            $username = stripcslashes($username);
            $password = stripcslashes($password);
            $username = mysqli_real_escape_string($connection , $username);
            $password = mysqli_real_escape_string($connection , $password);


            $sql = "select * from doctor_login where username = '$username' and password = '$password'" ;
            $result = mysqli_query($connection , $sql);
            $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);


            if($count == 1){  
                    session_start();
                    $_SESSION['username']= $username;
                    $_SESSION['docid']=$row['doctor_id'];
                    header("Location: doctor_dashboard.php");
            }  
            else{  
                header("Location: alert8.html");
            }     
            }
        }
            

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
}

?>
</body>
</html>
