<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "ibu_laut";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
