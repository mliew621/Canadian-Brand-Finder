<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$host = "localhost";
$dbname = "canadian_brands";
$username = "root";
$password = "";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

// SQL query to fetch data
$sql = "SELECT business_name, category, urls FROM brands";
$result = mysqli_query($conn, $sql);

$brands = [];

// If there is data, store it in an array
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $brands[] = $row;
    }
}

// Convert the array to JSON and send it to the frontend
header('Content-Type: application/json');
echo json_encode($brands);

// Close the database connection
mysqli_close($conn);
?>
