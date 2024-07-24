<?php
// ini koneksi ke database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pesonajawa"; //nama database

//mysqli menandakan phpnya sudah 5 keatas
$connection = mysqli_connect($servername, $username, $password, $dbname);

if(!$connection) {
    die("connection fail: " . mysqli_connect_error());
}

?>