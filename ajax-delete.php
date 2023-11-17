<?php
include "database/Database.php";
$id = $_POST['id'];
$db = new Database();
$query = "DELETE FROM tbl_user WHERE id = {$id}";
$result = $db->delete($query);
if ($result) {
    echo 1;
} else {
    echo 0;
}
