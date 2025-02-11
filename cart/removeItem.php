<?php

include("../connect.php");

$cartID = filterRequest("cartID");
$itemCount = filterRequest("itemCount");


$stmt = $con->prepare("SELECT * 
FROM cart 
WHERE cart_ID = ? 
LIMIT 1;");

$stmt->execute(array($cartID));
$count = $stmt->rowCount();

if ($count > 0) {
    if ($itemCount != 0) {
        $data = [
            "item_count" => $itemCount,
        ];
        updateData("cart", $data, "cart_ID = $cartID");
    }else if($itemCount <0 )
    {
        printFailuer("item count cant be less then 0");
    }
    else{
        deleteData("cart", "cart_id = $cartID");
    }
} else {
    printFailuer("cant remove the item from cart its already not exist");
}
