<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "reddit_clone";
$conn = new mysqli("localhost", "root", "", "yarab");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
