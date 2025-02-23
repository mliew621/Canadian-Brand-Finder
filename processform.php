<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$businessname = $_POST["businessname"];
$category = $_POST["category"];
$urls = $_POST["urls"];

$host = "localhost";
$dbname = "canadian_brands";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error". mysql_connect_error());
}

//echo("Connection successful");

$sql = "INSERT INTO brands (business_name, category, urls) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $businessname, $category, $urls);

if (mysqli_stmt_execute($stmt)) {
    //echo "New record created successfully.";
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

// Close the connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>