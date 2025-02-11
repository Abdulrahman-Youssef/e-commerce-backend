<?php

include("../connect.php");

$userid  = filterRequest("userid");
$itemid  = filterRequest("itemid");
$itemcount  = filterRequest("itemCount");

$stmt = $con->prepare("SELECT * 
FROM cart 
WHERE cart_user_id = ? AND cart_item_id = ?
LIMIT 1;");

$stmt->execute(array($userid, $itemid ));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = [
        "item_count" => $itemcount,
    ];
    updateData("cart", $data , "cart_user_id = $userid AND cart_item_id = $itemid" );

   
} else {

    $data = [
        "cart_user_id" => $userid,
        "cart_item_id"  => $itemid,
        "item_count" => $itemcount,
    ];
    insertData("cart", $data);
}
