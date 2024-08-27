<?php 

$servername = "localhost";
$username = "ChristopherBA";
$password = "hola123";
$database = "aura_vida";



$conn = new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die("Connection Failed");
}
