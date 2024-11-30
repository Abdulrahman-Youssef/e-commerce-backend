<?php

include("connect.php");

$allData = array() ;

$catigores= getAllData("categories" , null ,null ,false);
$items= getAllData("items_category_view" , "items_discount != 0",null ,false);

$allData['categories'] = $catigores;
$allData['items'] = $items;

$allData['status'] = "success";

echo json_encode($allData);
?>