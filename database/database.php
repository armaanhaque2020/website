<?php 





$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "product";


$conn   = mysqli_connect($host,$user,$pass,$dbname);


if (!isset($conn)) {
    echo "Connection failed:".mysqli_connect_error();
}










 ?>