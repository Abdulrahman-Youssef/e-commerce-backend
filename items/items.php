<?php

// include("../connect.php");

// $categoryID =  filterRequest("categoryID");

// $items= getAllData("items_catigoray_view" , "1 = 1");

// $items= getAllData("items" , "items_category = '$categoryID' ");


include "../connect.php";

$categoryid = filterRequest("categoryID");

// getAllData("items_category_view	", "categories_id = $categoryid");

$userid = filterRequest("userid");

$stmt = $con->prepare("
    SELECT items_category_view.*, 
           CASE 
               WHEN favorite.favorite_itemid IS NOT NULL THEN 1 
               ELSE 0 
           END AS favorite
    FROM items_category_view
    LEFT JOIN favorite 
    ON favorite.favorite_itemid = items_category_view.items_id 
       AND favorite.favorite_userid = :userid
    WHERE items_category_view.categories_id = :categoryid
");
$stmt->execute([
    ':userid' => $userid,
    ':categoryid' => $categoryid,
]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
