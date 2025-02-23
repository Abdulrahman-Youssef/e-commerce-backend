<?php

include "../connect.php";

$user_id   = filterRequest("user_id");

getallData("address" , "address_user_id = $user_id");

