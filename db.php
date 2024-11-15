<?php
$servername = "localhost";
$username = "root";  
$password = "";     
$dbname = "users_db";  // database yang sudah di buat


$conn = new mysqli($servername, $username, $password, $dbname);

// nyoba berhasil atau ngga nya konek ke database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} //else echo"koneksi sudah mantab";

?>
