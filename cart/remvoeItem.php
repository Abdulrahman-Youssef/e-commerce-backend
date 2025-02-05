<?php 

include("../connect.php");

$cartID = filterRequest("cartID");

deleteData("cart" , "cart_id = $cartID");


