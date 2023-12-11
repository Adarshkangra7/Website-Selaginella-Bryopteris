<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hospital";

if(!$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed To Connect!");
}
