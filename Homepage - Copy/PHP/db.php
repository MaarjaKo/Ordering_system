<?php
$host = "localhost";
$user = "root";
$password = ""; // XAMPP default
$dbname = "tellimusveeb";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Ühendus ebaõnnestus: " . $conn->connect_error);
}
?>