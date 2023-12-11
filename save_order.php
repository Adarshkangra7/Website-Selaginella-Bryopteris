<?php
// Retrieve the user input from the checkout form
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['full-name'];
$phone = $_POST['phone'];
$postalcode = $_POST['postal-code'];
$state = $_POST['state'];
$city = $_POST['city'];
$fulladdress = $_POST['full-address'];
$cart_total = $_POST['amount'];
$deliveryDate = $_POST['delivery-date'];

// Calculate GST amount
$gst_rate = 0.18; // Assume GST rate is 18%
$gst_amount = round($cart_total * $gst_rate, 2);

// Calculate total bill amount
$total_amount = $cart_total + $gst_amount;

// Insert the order details into the database
$sql = "INSERT INTO orders (username, password, fullname, phone, postalcode, state, city, fulladdress, cart_total, gst_rate, gst_amount, total_amount, deliveryDate) VALUES (:username, :password, :fullname, :phone, :postalcode, :state, :city, :fulladdress, :cart_total, :gst_rate, :gst_amount, :total_amount, :deliveryDate)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'username' => $username,
    'password' => $password,
    'fullname' => $fullname,
    'phone' => $phone,
    'postalcode' => $postalcode,
    'state' => $state,
    'city' => $city,
    'fulladdress' => $fulladdress,
    'cart_total' => $cart_total,
    'gst_rate' => $gst_rate,
    'gst_amount' => $gst_amount,
    'total_amount' => $total_amount,
    'deliveryDate' => $deliveryDate
]);
$order_id = $pdo->lastInsertId();


// Redirect the user to the order summary page with the order ID
header("Location: order_summary.php?order_id=" . $order_id);
exit();