<?php

include("connection.php");


$query = "CREATE TABLE IF NOT EXISTS medicinedetails(
    medid INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price float NOT NULL,
    stock int
)";

// Execute the SQL query
$result = mysqli_query($connection, $query);

// Check for errors executing the query
if (!$result) {
    die("Failed to create table: " . mysqli_error($connection));
}



$sql = "INSERT INTO medicinedetails (medid,name,price,stock)
VALUES (3001,'Paracetamol',5,80),(3002,'Amoxicillin',10,65),(3003,'Aspirins',3,75),(3004,'Ibuprofen',8,90),(3005,'Lisinopril',15,15),(3006,'Metformin',12,30),(3007,'Simvastatin',20,34),(3008,'Losartan',18,45),(3009,'Albuterol',25,50),(3010,'Acetaminophen',6,12),(3011,'Atorvastatin',22,44),(3012,'Clopidogrel',30,60),(3013,'Fluticasone',15,30),(3014,'Omeprazole',18,36),(3015,'Metoprolol',16,20),(3016,'Ibuprofen Tablets',10,43),(3017,'Aspirin Tablets',5,5),(3018,'Acetaminophen Tablets',8,20),(3019,'Naproxen Tablets',12,34),(3020,'Loratadine Tablets',7,18),(3021,'Diphenhydramine Tablets',6,70),(3022,'Calcium Supplements',15,15),(3023,'Multivitamin Supplements',20,5),(3024,'Omega-3 Supplements',25,32),(3025,'Probiotic Supplements',18,3),(3026,'Vitamin D Supplements',18,80),(3027,'Iron Supplements',9,65),(3028,'Melatonin Supplements',7,85),(3029,'Magnesium Supplements',11,12),(3030,'Vitamin C Supplements',8,2),(3031,'Nurofen',12.99,44),(3032,'Calpol',5.99,67),(3033,'Lemsip',7.99,10),(3034,'Beechams',9.99,100),(3035,'Sudafed',8.99,55),(3036,'Panadol',6.99,65),(3037,'Advil',10.99,4),(3038,'Aleve',8.49,7),(3039,'Claritin',11.99,11),(3040,'Zyrtec',12.99,3),(3041,'Benadryl',9.99,12),(3042,'Rhinocort',16.99,2),(3043,'Nasonex',19.99,7),(3044,'Flonase',17.99,14),(3045,'Omeprazole',15,30),(3046,'Lisinopril Tablets',8,16),(3047,'Simvastatin',12,24),(3048,'Hydrocodone',20,40),(3049,'Sertraline',18,19),(3050,'Ciprofloxacin',14,20);";

if ($connection->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connection->error;
}

?>
