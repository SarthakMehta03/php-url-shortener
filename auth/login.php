<?php 

include "../app/db.php";

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = $conn->prepare("
SELECT * FROM users WHERE email=?
");

$stmt -> bind_param("s", $email);
$stmt -> execute();

$user = $stmt -> get_result() -> fetch_assoc();

if($user && password_verify($password, $user["password"])) {   
    $_SESSION['user'] = $user['id'];
    header("Location : ../public/dashboard.php");
    exit;
}
echo "Invalid Login";
?>

<form method="post">
    <input type="email" name="email">
    <input type="password" name="password">
    <button>Login</button>
</form>