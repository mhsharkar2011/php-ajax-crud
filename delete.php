<?php
include "database/Database.php";
$db = new Database();
if(isset($_GET['id'])){
$id = $_GET['id'];
   $query = "DELETE FROM tbl_user WHERE id = $id";
   $deleteData = $db->delete($query);
   if($deleteData){
      echo "Record with ID $id has been deleted successfully";
   }else{
      echo "Error: Unable to delete the record";
   }
}else{
   echo "Error: ID parameter is missing.";
}
