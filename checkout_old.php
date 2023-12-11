<?php

include("connection.php");

// Sanitize user input
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$fullname = mysqli_real_escape_string($con, $_POST['full-name']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$postalcode = mysqli_real_escape_string($con, $_POST['postal-code']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$fulladdress = mysqli_real_escape_string($con, $_POST['full-address']);
$amount = mysqli_real_escape_string($con, $_POST['amount']);
$deliverydate = mysqli_real_escape_string($con, $_POST['delivery-date']);

// Prepare SQL query to check if user already exists
$sql = "SELECT * FROM users WHERE username = '$username'";

// Execute query
$result = mysqli_query($con, $sql);

// Handle errors and exceptions
if (!$result) {
    die("Error: " . mysqli_error($con));
}

// Check if user already exists
if (mysqli_num_rows($result) > 0) {
    echo "Username already exists.";
} else {
    // Prepare SQL query to insert user details into the database
    $sql = "INSERT INTO users (username, password, full_name, phone, postal_code, state, city, full_address, amount, delivery_date) 
            VALUES ('$username', '$password', '$fullname', '$phone', '$postalcode', '$state', '$city', '$fulladdress', '$amount', '$deliverydate')";

    // Execute query
    $result = mysqli_query($con, $sql);

    // Handle errors and exceptions
    if (!$result) {
        die("Error: " . mysqli_error($con));
    }

    // Close connection
    mysqli_close($con);

    echo "User details inserted successfully!";
}

?>
