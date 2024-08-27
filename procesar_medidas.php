<?php
include("config_medidas.php");

session_start();

$user_id = $_POST["user_id"];
$date = $_POST["date"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$fat_pct = $_POST["fat_pct"];
$water = $_POST["water"];
$muscle = $_POST["muscle"];
$bone = $_POST["bone"];


// INSERT

$sql = "INSERT INTO anthropometry(idUser, date, height_m, weight_Kg, fat_pct, water_L, muscle_Kg, bone_Kg) VALUES ('$user_id', '$date', '$height', '$weight', '$fat_pct', '$water', '$muscle', '$bone')";

if($conn->query($sql) === TRUE){
    header("Location: salud.php");
} else {
    echo "There was an error during the task submission process. Try again."."<br>";
}

die();


?>