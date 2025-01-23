<?php
$servername = "localhost";
$database = "absensirfid";
$username = "root";
$password = "";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// Removed the mysqli_close($koneksi); line to keep the connection open
?>
