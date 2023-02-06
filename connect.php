<?php
$host ="localhost";
$user = "root";
$pass = "10I`mdontnow";
$dbname = "login";

$conn = new mysqli($host, $user, $pass, $dbname);
if (mysqli_connect_errno()) {
   return trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
}
if($_POST["action"] == "login"){
  insert();
}

// Function
function insert(){
  global $conn;
  $senha = $_POST["senha"];
  $email = $_POST["email"];
  if (empty($senha) || empty($email)) {
    exit;
  }

$sameEmail = mysqli_query($conn, "SELECT * FROM cliente WHERE email = '$email'");
if(mysqli_num_rows($sameEmail) > 0){
  echo 2;
    exit;
}

$sameEmail = mysqli_query($conn, "SELECT * FROM cliente WHERE email = '$email' and senha = '$senha'");
if(mysqli_num_rows($sameEmail) > 0){
  echo 3;
    exit;
}

// // Insert value to database
// $query = "INSERT INTO cliente VALUES(NULL, '$email', '$senha')";
// mysqli_query($conn, $query);
//  echo 1;
//   exit;
 }