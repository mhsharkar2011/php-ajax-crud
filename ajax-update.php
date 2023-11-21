<?php
include "database/Database.php";
$db = new Database;
$user_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

$query = "UPDATE tbl_user SET first_name = '{$firstName}',last_name = '{$lastName}' WHERE id = {$user_id}";

$update = $db->update($query);

if(mysqli_query($db->link, $query)){
  echo 1;
}else{
  echo 0;
}

?>
