<?php

include("../connect.php");

$username = filterRequest("username");
$password = sha1($_POST["password"]);
$email = filterRequest("email");
$phone = filterRequest("phone");
$verifyCode = rand(10000,99999);

$stmt = $con->prepare("SELECT * FROM users where users_email = ? or users_phone = ?");

$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailuer("the phone or the email dose already exist");
} else {
    $data = array(
        "users_name" => $username,
        "users_password" => $password,
        "users_email" => $email,
        "users_phone" => $phone,
        "users_verifycode" => $verifyCode,
    );
    insertData("users", $data);
}
