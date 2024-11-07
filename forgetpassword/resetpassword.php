<?php
include("../connect.php");

$email = filterRequest("email");
$password = sha1($_POST["password"]);

//can re
// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email'");

// $stmt->execute();

// $count = $stmt->rowCount();

    $data = array(
        "users_password" => $password,
    );
    updateData("users", $data , "users_email = '$email'");
