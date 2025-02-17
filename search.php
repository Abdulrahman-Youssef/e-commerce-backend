<?php 

include("connect.php");


$userid = filterRequest("userID");
$searchWord = filterRequest("searchWord");


$stmt = $con->prepare("
     SELECT items_category_view.*, 
           CASE 
               WHEN favorite.favorite_itemid IS NOT NULL THEN 1 
               ELSE 0 
           END AS favorite
    FROM items_category_view
    LEFT JOIN favorite 
    ON favorite.favorite_itemid = items_category_view.items_id 
       AND favorite.favorite_userid = :userid where items_category_view.items_name LIKE :searchWord 
       OR items_category_view.items_description LIKE :searchWord
");



$stmt->execute([
   ':userid' => $userid,
   ':searchWord' => "%$searchWord%",
]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count > 0) {
   echo json_encode(array("status" => "success", "data" => $data));
} else {
   echo json_encode(array("status" => "failure"));
}