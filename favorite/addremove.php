<?php 

include("../connect.php");

$userid =  filterRequest("userid");
$itemid =  filterRequest("itemid");

   $insertCommand = "";
   $DeleteCommand = "DELETE FROM `favorite` WHERE `favorite`.`favorite_id` = ";
   $stmt = $con->prepare("SELECT favorite_id FROM favorite WHERE favorite_userid = ? AND favorite_itemid = ? LIMIT 1"); 
   $stmt->execute([$userid , $itemid]);
   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();

   $data = array(
      "favorite_userid" => $userid,
      "favorite_itemid" => $itemid,
   );

   if($count > 0 ){
      deleteData("favorite","favorite_userid  = $userid AND favorite_itemid = $itemid ");
   }
 else{
 insertData("favorite",$data);
}




