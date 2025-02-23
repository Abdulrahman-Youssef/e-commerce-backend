<?php

include("../connect.php");

$userid  = filterRequest("userid");
$addressName  = filterRequest("addressName");
$street  = filterRequest("street");
$city  = filterRequest("city");
$long  = filterRequest("long");
$lat  = filterRequest("lat");

$data = [
    "address_user_id" => $userid,
    "address_name" => $addressName,
    "address_city" => $city,
    "address_street" => $street,
    "address_long"  => $long,
    "address_lat" => $lat,
];


insertData("address", $data,false);
