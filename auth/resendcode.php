<?php

include("../connect.php");

$email = filterRequest("email");
// $phone = filterRequest("phone");

$verifyCode = rand(10000,99999);

$data = array(
    "users_verifyCode" => $verifyCode,
);

updateData("users", $data , "users_email = '$email'");


// updateData("users", $data , "users_email = '$email' AND users_phone = '$phone'");










