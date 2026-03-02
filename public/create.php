<?php
include "../app/db.php";
include "../app/functions.php";

requireLogin();

$url = $_POST["url"];
$expiry = $_POST["expiry"];

if (!validateURL($url)) {
    die("Invalid URL");
}

$stmt = $conn->prepare("INSERT INTO urls(user_id,long_url,short_code,expiry
VALUES(?,?,?,?)");

$stmt->bind_param("isss", $user,$url,$code,$expiry);
$stmt->execute();

header("Location : dashboard.php");
?>
