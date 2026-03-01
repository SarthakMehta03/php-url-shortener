<?php 
include "../app/db.php";

if($_POST){
    $email = $_POST["email"];
    $password = password_hash($_post['password'],PASSWORD_DEFAULT) ;
    $stmmt = $conn -> prepare(
        "INSERT INTO users(email,password) values(?,?) "
        );
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();

    echo "Registered <a href='login.php'>Login</a>";
}

?>

<form method="post">
    <input type="email" required>
    <input type="passord" name="password" required>
    <button>Register</button>
</form>