<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "url_shortener";
$conn = new mysqli($host, $user, $pass,$db);

if ($conn -> connect_error){
    die("Database Error") ;
}

session_start()
?>