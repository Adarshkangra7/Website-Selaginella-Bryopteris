<?php

include("connection.php");

$query = "CREATE TABLE IF NOT EXISTS labtest (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(10) NOT NULL,
  gender ENUM('male','female','other') NOT NULL,
  age INT NOT NULL,
  address TEXT NOT NULL,
  test_type ENUM('blood_test', 'urine_test', 'xray_scan', 'ultrasound_scan', 'ecg', 'mri_scan', 'pet_scan', 'ct_scan', 'cancer_screening', 'diabetes_checkup', 'genetic_testing', 'hiv_test', 'stool_test', 'allergy_testing', 'tumor_marker_test', 'blood_culture_test', 'hormone_testing', 'vitamin_d_test', 'thyroid_testing', 'hepatitis_test') NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
  die("Failed to create table: " . mysqli_error($connection));
}


if (isset($_POST['submit'])) {
  // Form validation code here

  // Database connection code here
  $dbhost = 'localhost';
  $dbname = 'new_hospital';
  $dbuser = 'root';
  $dbpass = '';
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

  // Insert form data into database
  $query = "INSERT INTO labtest (name, email, phone, gender, age, address, test_type, date, time) VALUES (:name, :email, :phone, :gender, :age, :address, :test_type, :date, :time)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':phone', $_POST['phone']);
  $stmt->bindParam(':gender', $_POST['gender']);
  $stmt->bindParam(':age', $_POST['age']);
  $stmt->bindParam(':address', $_POST['address']);
  $stmt->bindParam(':test_type', $_POST['test_type']);
  $stmt->bindParam(':date', $_POST['date']);
  $stmt->bindParam(':time', $_POST['time']);
  $stmt->execute();

  // Show success message
  echo '<div class="alert alert-success">Form submitted successfully!</div>';
}

// $errors = $stmt->errorInfo();
// if ($errors[0] !== PDO::ERR_NONE) {
//    var_dump($errors);
//    die();


// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
  <title>Lab Test Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
  <link href="assets2/css/custom.css?<?=filemtime("assets2/css/custom.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <style>
    body {
    font-family: 'Times New Roman', Times, serif;
    font-weight: bolder;
     background-color: #f2f2f2;
    }

    /* .container {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px #ccc;
      padding-bottom: 20px;
    } */

    h1 {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 30px;
      color: #007bff;
    }

    h2 {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 30px;
    }

    .form-control {
      margin-bottom: 10px;
      font-size: 14px;
    }

    .form-check-input {
      margin-right: 5px;
    }

    .btn {
      font-size: 14px;
      border-radius: 3px;
      padding: 6px 25px;
      margin-top: 10px;
      background-color: #007bff;
      border: 1px solid #007bff;
    }

    .btn:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }

    .invalid-feedback {
      font-size: 14px;
      color: #dc3545;
    }

    .valid-feedback {
      font-size: 14px;
      color: #28a745;
    }
  </style>



</head>

<body>
  <header>

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
        <li class="headerli"><a href="gallery.php">GALLERY</a></li>
        <li class="headerli"><a href="contact.php">CONTACT US</a></li>
        <li class="headerli"><a href="emergency.php">EMERGENCY</a></li>
        <li class="headerli"><a href="loginchoose.php">LOGIN</a></li>
    </ul>

    <!-- main header end -->
  
    <br>

  <div class="container">
    <h2>Lab Test Booking Form</h2>
    <form  method="post" id="test-booking-form" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
        <div class="invalid-feedback">Please enter your name.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" pattern="[0-9]{10}" required>
        <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" class="form-control" name="gender" required>
          <option value="">-- Select Gender --</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        <div class="invalid-feedback">Please select a gender.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" placeholder="Enter Age" min="1" max="99" name="age" required>
        <div class="invalid-feedback">Please enter your age (between 1 and 99).</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" id="address" name="address" required></textarea>
        <div class="invalid-feedback">Please enter your address.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="test_type">Select Test Type:</label>
        <select id="test_type" class="form-control" name="test_type" required>
          <option value="">-- Select Test Type --</option>
          <option value="blood_test">Blood Test</option>
          <option value="urine_test">Urine Test</option>
          <option value="xray_scan">X-Ray Scan</option>
          <option value="ultrasound_scan">Ultrasound Scan</option>
          <option value="ecg">ECG</option>
          <option value="mri_scan">MRI Scan</option>
          <option value="pet_scan">PET Scan</option>
          <option value="ct_scan">CT Scan</option>
          <option value="cancer_screening">Cancer Screening</option>
          <option value="diabetes_checkup">Diabetes Checkup</option>
          <option value="genetic_testing">Genetic Testing</option>
          <option value="hiv_test">HIV Test</option>
          <option value="stool_test">Stool Test</option>
          <option value="allergy_testing">Allergy Testing</option>
          <option value="tumor_marker_test">Tumor Marker Test</option>
          <option value="blood_culture_test">Blood Culture Test</option>
          <option value="hormone_testing">Hormone Testing</option>
          <option value="vitamin_d_test">Vitamin D Test</option>
          <option value="thyroid_testing">Thyroid Function Test</option>
          <option value="hepatitis_test">Hepatitis Test</option>
        </select>
        <div class="invalid-feedback">Please select a test type.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="date">Select Preferred Date:</label>
        <input type="date" class="form-control" id="date" name="date" required>
        <div class="invalid-feedback">Please select a date.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <label for="time">Select Preferred Time:</label>
        <input type="time" class="form-control" id="time" name="time" required>
        <div class="invalid-feedback">Please select a time.</div>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
          <label class="form-check-label" for="terms">I agree to the Terms & Conditions.</label>
          <div class="invalid-feedback">Please read and agree to the terms & conditions.</div>
        </div>
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>

  <!--Bootstrap JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>

  <script>
    // Form validation script
    (function() {
      'use strict';

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation');

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add('was-validated');
        }, false);
      });
    })();
  </script>



<!--=== Footer ===-->
<p></p>
<br>
<div class="footer-v1" style="background-color:#272727 ;color:white; padding-top:1cm;">
		<div class="footer">
		<div class="container">
		<div class="row">
		<!-- About -->
		<div class="col-md-3" style="margin-bottom: 40px;">
		<a href="index.html"><img id="logo-footer" class="footer-logo" src="logo.jpg" alt="Logo" width="200" height="80"/></a>
		<p style="color:white">At SB Hospital, we are convinced that 'quality' and 'lowest cost' are not mutually exclusive when it comes to healthcare delivery.</p>
		<p style="color:white">Our mission is to deliver high quality, affordable healthcare services to the broader population in India.</p>
		</div><!--/col-md-3-->
		<!-- End About -->

		<!-- Latest -->
		<div class="col-md-3" style="margin-bottom: 40px;">
		<div class="posts">
		<div class="headline"><h2>Latest Posts</h2></div>
		<ul class="list-unstyled latest-list">
		<li>
		<a href="blog.html">Incredible content</a>
		<small>April, 2023</small>
		</li>
		<li>
		<a href="gallery.html">Latest Images</a>
		<small>April, 2023</small>
		</li>
		<li>
		<a href="terms.html">Terms and Conditions</a>
		<small>April, 2023</small>
		</li>
		</ul>
		</div>
		</div><!--/col-md-3-->
		<!-- End Latest -->

		<!-- Link List -->
		<div class="col-md-3" style="margin-bottom: 40px;">
		<div class="headline"><h2>Useful Links</h2></div>
		<ul class="list-unstyled link-list">
		<li><a href="AboutUsfinal/AboutUs/about.php">About us</a><i class="fa fa-angle-right"></i></li>
		<li><a href="contact.php">Contact us</a><i class="fa fa-angle-right"></i></li>
		<li><a href="bookappoinment.php">Book Appointment</a><i class="fa fa-angle-right"></i></li>
        <li><a href="emergency.php">Emergency</a><i class="fa fa-angle-right"></i></li>
		</ul>
		</div><!--/col-md-3-->
		<!-- End Link List -->

		<!-- Address -->
		<div class="col-md-3 map-img" style="margin-bottom: 40px;">
		<div class="headline"><h2>Contact Us</h2></div>
		<address class="md-margin-bottom-40">
		SB Hospital <br />
		Bangalore, IN <br />
		Phone: 886 666 00555 <br />
		Email: sbhospital@gmail.com 
		</address>
		</div><!--/col-md-3-->
		<!-- End Address -->
		</div>
		</div>
		</div><!--/footer-->

		<div class="copyright" style="background-color:black ;color:white">
		<div class="container">
		<div class="row">
		<div class="col-md-6">
		<p style="color:white">
		2023 &copy; All Rights Reserved.
		<a href="privacy.html">Privacy Policy</a> | <a href="terms.html">Terms of Service</a>
		</p>
		</div>

		</div>
		</div>
		</div>
		</div>
</div>  <!-- End Wrapper -->

</body>
</html>



