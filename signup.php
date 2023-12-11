<html>

<head>
    <title>coustomer login</title>
    <link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="style.php">
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

    <!-- main header end -->
    <div id="frm">
        <h1>Sign Up</h1>
        <form name="f1"  method="POST">
  
        <label> Firstname </label>         
        <input type="text" name="firstname" size="15"/> <br> <br>  
        <label> Middlename: </label>     
        <input type="text" name="middlename" size="15"/> <br> <br>  
        <label> Lastname: </label>         
        <input type="text" name="lastname" size="15"/> <br> <br>  
        <label>   
        Gender :  
        </label>
        <input name="genderid" type="radio" value="male" /> Male 
        <input type="radio" name="genderid" value="female" /> Female  
        <input type="radio" name="genderid" value="other" /> Other  
        <br>  
        <br>  
        <label>   
        Phone :  
        </label>  
        <input type="text" name="country code"  value="+91" size="2"/>   
        <input type="text" name="phone" size="10"/> <br> <br>  
        Email:  
        <input type="email" id="email" name="email"/> <br>    
        <br> 
        User Name:  
        </label>  
        <input type="text" name="username"  size="12"/><br><br>
        <label>Password</label>
        <input type="text" name="password"  size="12"/><br><br>
        <label>Confirm Password</label>
        <input type="password" name="password2" size="12"/>
        <br>
        <input type="submit" id="btn" data-inline="true" value="Submit"/>  
        </form>  
        </div>

        <?php
        $username = $password = $password2 = $email = $phone = $genderid =  $lastname = $middlename = $firstname =  "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $genderid = test_input($_POST["genderid"]);
        $lastname = test_input($_POST["lastname"]);
        $firstname = test_input($_POST["firstname"]);
        $firstname = test_input($_POST["firstname"]);
        $password = test_input($_POST["password"]);
        $password2 = test_input($_POST["password2"]);

        
        if ($username == "") 
        {
                echo '<script>alert("Enter the user name");</script>';
            }
        else if($password == "" )
        {
                echo '<script>alert("Enter the password");</script>';
        }
        else if ($email == "" )
        {
                    echo '<script>alert("Enter the email id");</script>';
                }
                else if ( $phone == "" )
        {
                    echo '<script>alert("Enter the phone number");</script>';
                }
                else if ($firstname == "")
        {
                    echo '<script>alert("enter the first name");</script>';
                }
                else if ($lastname == "" )
        {
                    echo '<script>alert("enter the last name");</script>';
                }
                else if ($genderid == ""  )
        {
                    echo '<script>alert("Please choose a gender");</script>';
                }
        else if (!$password == $password2)
        {
                    echo '<script>alert("Password Does not match");</script>';
                }
        else 
            {
                $host = "localhost";
                $user = "root";
                $password = "";
                $db_name = "hospital";

            $con = mysqli_connect($host , $user , $password , $db_name);

            if(mysqli_connect_errno()){
                die("Failed to connect with MySQL :".mysqli_connect_errno());
            }


            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $genderid = $_POST["genderid"];
            $lastname =$_POST["lastname"];
            $firstname = $_POST["firstname"];
            $middlename = $_POST["middlename"];
            $username =$_POST["username"];
            $password = $_POST["password"];
            


            $sql = "select * from loginforpatient where phone = '$phone'" ;
            $result = mysqli_query($con , $sql);
            $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);


            if($count == 1){  
                echo '<script>alert("Phone number already exists");</script>';
            } 
            
            $sql = "select * from loginforpatient where username = '$username'" ;
            $result = mysqli_query($con , $sql);
            $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);


            if($count == 1){  
                echo '<script>alert("username already exists");</script>';
            } 
           
            $query = "INSERT INTO loginforpatient VALUES 
                ( '$firstname','$middlename','$lastname','$email','$genderid','$phone','$username','$password');";

                if (mysqli_query($con, $query)) 
                {
                    echo '<script>alert("Insertion succesful!");</script>'; 
                    header("Location: loginchoose.html");                       
                } 
                else 
                {
                    echo '<script>alert("Insertion Failed");</script>';
                }
                mysqli_close($con);
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