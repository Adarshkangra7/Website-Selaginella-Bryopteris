<?php

include("connection.php");


function random_strings($length_of_string)
{
 
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}

$query = "CREATE TABLE IF NOT EXISTS medicine_billing_address (
  orderid varchar(6) PRIMARY KEY,
  fullname VARCHAR(50) NOT NULL,
  phone VARCHAR(10) NOT NULL,
  fulladdress VARCHAR(100) NOT NULL,
  city VARCHAR(30) NOT NULL,
  statee varchar(30) not null,
  postalcode int not null
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
  die("Failed to create table: " . mysqli_error($connection));
}


$query = "CREATE TABLE IF NOT EXISTS medicineorder(
  orderid varchar(6) PRIMARY KEY,
  cart_total float NOT NULL,
  gst_rate float NOT NULL,
  gst_amount float NOT NULL,
  total_amount float NOT NULL
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
  die("Failed to create table: " . mysqli_error($connection));
}

// $orderid=random_strings(6);



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Check if the form data was submitted with the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate the form fields
  $fullname = test_input($_POST["full-name"]);
  $phone = test_input($_POST["phone"]);
  $fulladdress = test_input($_POST["full-address"]);
  $city = test_input($_POST["city"]);
  $state = test_input($_POST["state"]);
  $postalcode = test_input($_POST["postal-code"]);
  // $product_name = test_input($_POST["product_name"]);
  // $product_price = test_input($_POST["product_price"]);
  // $product_quantity = test_input($_POST["product_quantity"]);
  $cart_total = test_input($_POST["cart_total"]);
  $gst_rate = test_input($_POST["gst_rate"]);
  $gst_amount = test_input($_POST["gst_amount"]);
  $total_amount = test_input($_POST["total_amount"]);

}

//   if(isset($_POST['full-name'])){
//     $full_name = test_input($_POST['full-name']);
// }
// if(isset($full_address)){
//   $full_address = trim($full_address);
// }
// if(isset($_POST['product-price'])){
//   $product_price = (float) $_POST['product-price'];
// }
  // Store the order details in the database (assuming the database connection is already established)
  // Replace the database credentials below with your own
 

  // Construct the SQL query to insert the order details into the database

  $orderid=random_strings(6);

  
  $query = "INSERT INTO medicine_billing_address(orderid,fullname,phone,fulladdress,city,statee,postalcode)
  VALUES ('$orderid','$fullname', '$phone', '$fulladdress', '$city','$state','$postalcode')";

  $result = mysqli_query($connection, $query);

  $query = "INSERT INTO medicineorder(orderid,cart_total, gst_rate, gst_amount, total_amount)
  VALUES ('$orderid','$cart_total', '$gst_rate', '$gst_amount', '$total_amount')";

  $result = mysqli_query($connection, $query);

  if (!$result) {
    echo "<h1>Error Confirming Order</h1>";
    echo "<p>There was an error processing your order. Please try again later.</p>";
  }
  else{
    header("Location: alert4.html");
  }
  
  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// A helper function to sanitize form input fields

if (isset($data)) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>