<?php
$host ="localhost";
$user = "root";
$pass = "10I`mdontnow";
$dbname = "login";

function result()
{
  $result = null;
  insert();
}


$conn = new mysqli($host, $user, $pass, $dbname);
if (mysqli_connect_errno()) {
   return trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
}
// $query = "INSERT INTO emails (`Field_1`) VALUES('$email')";
// $query = "SELECT * FROM cliente";

// // Choose a function depends on value of $_POST["action"]
if($_POST["action"] == "login"){
  result();
}

// Function
function insert(){
  global $conn;
  $senha = $_POST["senha"];
  $email = $_POST["email"];
  // Check if variable value is empty
  if (empty($senha) || empty($email)) {
    // Output

  }

$sameEmail = mysqli_query($conn, "SELECT * FROM cliente WHERE email = '$email'");
if(mysqli_num_rows($sameEmail) > 0){
    result();
    $result = 2;  
}
// Insert value to database
$query = "INSERT INTO cliente VALUES(NULL, '$email', '$senha')";
mysqli_query($conn, $query);
  result();
$result = 1;
  exit;
}

// $result = mysqli_query($conn, "SELECT * FROM cliente", MYSQLI_USE_RESULT);