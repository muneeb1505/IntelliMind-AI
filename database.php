<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword= "";
$dbName = "login_register";
$port = 3307;

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, $port);
if(!$conn){
    die("Something went wrong;");
}
else{
    echo "Connected";
}
?>