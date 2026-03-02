<?php 
include "../app/db.php";

if($_POST){
    $email = $_POST["email"];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT) ;
    $stmt = $conn -> prepare(
        "INSERT INTO users(email,password) values(?,?) "
        );
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();

    echo "Registered <a href='login.php'>Login</a>";
}

?>

<form method="post">
    <input type="email" name="email" required>
    <input type="passord" name="password" required>
    <button>Register</button>
</form>