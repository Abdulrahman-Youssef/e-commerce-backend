<?php

// include("../connect.php");

// $email = filterRequest("email");

// $stmt = $con->prepare("SELECT * FROM users WHERE users_email  = '$email' AND users_approve = 1");


// $stmt->execute();

// $count = $stmt->rowCount(); 

// if ($count > 0) {
//     $data = array(
//         "users_verifycode"=> rand(10000,99999),
//     );

//     updateData("users" , $data , "users_email = '$email'");

// } else {
//     printFailuer("email dose  not exists");
// }







include("../connect.php");

$email = filterRequest("email");


$stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND  users_approve = 1");

$stmt->execute();

$count = $stmt->rowCount();

if($count > 0) {
    $verifycode = rand(10000 , 99999);

    $data = array("users_verifycode" => $verifycode);

    updateData("users", $data , "users_email = '$email'");
}
else{
    printFailuer("email dose not exist or not active");
} ;