<?php

include "../app/db.php";

$code = $_GET["code"];

$stmt = $conn->prepare("SELECT * FROM urls WHERE short_code=?");

$stmt->bind_param("s", $code);
$stmt->execute();

$data = $stmt->get_result()->fetch_assoc();

if(!$data) die("NOT FOUND");

if($data["expiry"] && strtotime($data["expiry"]) < time()) die("Expired");

$conn->query("UPDATE urls SET clicks=clicks+1 WHERE short_code='$code'");

header("Location:".$data['long_url']);
exit;

?>