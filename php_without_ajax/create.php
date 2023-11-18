<?php 
include "database/Database.php";
?>
<?php 
 $db = new Database();

if(isset($_POST['submit'])){
 $fname  = mysqli_real_escape_string($db->link, $_POST['first_name']);
 $lname  = mysqli_real_escape_string($db->link, $_POST['last_name']);
 $email = mysqli_real_escape_string($db->link, $_POST['email']);
 if($fname == '' || $lname == '' || $email == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO tbl_user(first_name, last_name, email) 
   Values('$fname', '$lname', '$email')";
  $create = $db->insert($query);
 }
}
?>


<?php include "footer.php"; ?>