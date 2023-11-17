<?php
include "database/Database.php";
?>
<?php
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$db = new Database();
$query = "INSERT INTO tbl_user(first_name, last_name, email) Values('$fname', '$lname', '$email')";
if (mysqli_query($db->link, $query)) {
    echo 1;
} else {
    echo 0;
}

?>