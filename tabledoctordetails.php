<?php

include("connection.php");


function generate_contact_number() {
    $min = 9000000000; // minimum 10-digit number starting with 9
    $max = 9999999999; // maximum 10-digit number
    return mt_rand($min, $max);
}


$query = "CREATE TABLE IF NOT EXISTS doctordetails(
    docid Varchar(7) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age int NOT NULL,
    gender VARCHAR(20),
    contact VARCHAR(20) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    specialist varchar(40) not null
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
    die("Failed to create table: " . mysqli_error($connection));
}



$contact=generate_contact_number();

$query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171001,'Dr. Nagaraj Agarwal', 45, 'Male', '$contact', 'nagarajagarwal@gmail.com','Cardiologist')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Failed to insert record: " . mysqli_error($connection));
    }


$contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171002,'Dr. Anurag Bothra', 32, 'Male', '$contact', 'anurahbothra123@gmail.com','Cardiologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }


$contact=generate_contact_number();

$query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171003,'Dr. Nikhil Bhatt', 27, 'Male', '$contact', 'nikhilbhatt@gmail.com','Cardiologist')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Failed to insert record: " . mysqli_error($connection));
    }
    

$contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171004,'Dr. Mallikarjun Roy', 37, 'Male', '$contact', 'anurahbothra123@gmail.com','Neurologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }


        
$contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171005,'Dr. Josna Bhansali', 39, 'Female', '$contact', 'josna123@gmail.com','Neurologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }




       
$contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171006,'Dr. Santosh Kumar', 37, 'Male', '$contact', 'drsantosh123@gmail.com','Neurologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }




        $contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171007,'Dr. Raghunath Chatterjee', 30, 'Male', '$contact', 'drragunath@gmail.com','Radiologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }




    $contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171008,'Dr. Asha Nayak', 47, 'Female', '$contact', 'ashanayak123@gmail.com','Radiologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }


        $contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171009,'Dr. Sushma Jain', 29, 'Female', '$contact', 'sushmajain@gmail.com','Oncologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }


        $contact=generate_contact_number();
    
    $query = "INSERT INTO doctordetails (docid ,name, age, gender,contact,mail,specialist) VALUES (2171010,'Dr. Sangeetha Jindal', 46, 'Female', '$contact', 'sangeethajindal3@gmail.com','Oncologist')";
    
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die("Failed to insert record: " . mysqli_error($connection));
        }


