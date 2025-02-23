<?php

include("../connect.php");

$address_id   = filterRequest("address_id");
$addressName  = filterRequest("addressName");
$street  = filterRequest("street");
$city  = filterRequest("city");
$long  = filterRequest("long");
$lat  = filterRequest("lat");

$data = [
    "address_name" => $addressName,
    "address_city" => $city,
    "address_street" => $street,
    "address_long"  => $long,
    "address_lat" => $lat,
];


updateData("address", $data , "address_id = $address_id");
