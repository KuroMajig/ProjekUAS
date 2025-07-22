<?php
$host = "localhost";
$username = "root"; // Ganti dengan username MySQL kamu
$password = ""; // Ganti dengan password MySQL kamu
$dbname = "tugas_db"; // Nama database

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>