<?php

include("../connect.php");

$userid  = filterRequest("userid");


$stmt = $con->prepare("SELECT * FROM cart_items_view WHERE cart_user_id	= ?");

$stmt->execute(array($userid));
$count = $stmt->rowCount();
if ($count > 0) {
    getAllData("cart_items_view","cart_user_id = $userid");
} else {
   
    printFailuer("there is no items in cart for this user");
}
