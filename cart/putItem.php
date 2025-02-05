<?php

include("../connect.php");

$userid  = filterRequest("userid");
$itemid  = filterRequest("itemid");


$stmt = $con->prepare("SELECT * 
FROM cart 
WHERE cart_user_id = ? AND cart_item_id = ? 
LIMIT 1;");

$stmt->execute(array($userid, $itemid));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailuer("the item is already exist in the cart");
} else {

    $data = [
        "cart_user_id" => $userid,
        "cart_item_id"  => $itemid,
    ];
    insertData("cart", $data);
}
