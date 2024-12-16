<?php
include("../connect.php");

$userid =  filterRequest("userid");


getAllData("userfavoriteitems" , "favorite_userid = $userid");



