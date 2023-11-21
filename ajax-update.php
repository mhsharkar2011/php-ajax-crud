<?php
include "database/Database.php";
$db = new Database;
$user_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$email = $_POST["email"];

$query = "UPDATE tbl_user SET first_name = '{$firstName}',last_name = '{$lastName}', email = '{$email}' WHERE id = {$user_id}";

$update = mysqli_query($db->link, $query);

if($update){
  echo 1;
}else{
  echo 0;
}

?>
