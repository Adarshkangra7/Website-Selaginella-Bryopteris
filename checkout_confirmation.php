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
$deliverydate = mysqli_real_escape_string($con, $_POST['delivery-date']);

// Retrieve cart total amount from database
$cart_sql = "SELECT SUM(amount) AS cart_total FROM cart WHERE username = '$username'";
$cart_result = mysqli_query($con, $cart_sql);
if (!$cart_result) {
    die("Error: " . mysqli_error($con));
}
$cart_row = mysqli_fetch_assoc($cart_result);
$cart_total = $cart_row['cart_total'];

// Calculate GST based on percentage rate
$gst_rate = 0.18; // 18%
$gst_amount = $cart_total * $gst_rate;
$total_amount = $cart_total + $gst_amount;

// Display customer details summary
echo "<h2>Customer Details Summary</h2>";
echo "<p><strong>Name:</strong> $fullname</p>";
echo "<p><strong>Phone:</strong> $phone</p>";
echo "<p><strong>Address:</strong> $fulladdress, $city, $state - $postalcode</p>";
echo "<p><strong>Total Amount:</strong> Rs. $cart_total</p>";
echo "<p><strong>GST ($gst_rate%):</strong> Rs. $gst_amount</p>";
echo "<p><strong>Total Bill Amount:</strong> Rs. $total_amount</p>";

// Close connection
mysqli_close($con);

?>
