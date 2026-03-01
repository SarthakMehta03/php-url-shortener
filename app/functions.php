<?php 
function generateCode($length=6){
    return substr(bin2hex(random_bytes(5)),0,$length);
}

function isLoggedIn(){
    return isset($_SESSION["user"]);
}

function requirelogin(){
    if(!isLoggedIn()){
  header("Location: ../auth/login.php");
  exit;
 }
}
function validateURL($url){
 return filter_var($url,FILTER_VALIDATE_URL);
}
?>