<?php

include("../connect.php");

$email = filterRequest("email");
$password = sha1($_POST["password"]);

// $stmt = $con->prepare("SELECT * FROM users WHERE users_email  = '$email' AND users_password	= '$password' AND users_approve = 1");
// $stmt->execute();
// $count = $stmt->rowCount(); 
// if ($count > 0) {
//     printSuccess("correct email and password");
// } else {
//     printFailuer("Wrong email and password");
// }



getData("users", "users_email  = ? AND users_password	= ? AND users_approve = 1", $data = array(
    $email,
   $password,
) );
