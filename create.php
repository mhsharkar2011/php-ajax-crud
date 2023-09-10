<?php 
require_once 'header.php'; 
require_once "database/Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $fname  = mysqli_real_escape_string($db->link, $_POST['first_name']);
 $lname = mysqli_real_escape_string($db->link, $_POST['last_name']);
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

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
 <tr>
  <td>First Name</td>
  <td><input type="text" name="first_name" placeholder="Please enter 
   name"/></td>
 </tr>
 <tr>
  <td>Last Name</td>
  <td><input type="text" name="last_name" placeholder="Please enter 
  Skill"/></td>
 </tr>
 <tr>
  <td>Email</td>
  <td><input type="text" name="email" placeholder="Please enter 
   email"/></td>
 </tr>


 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  <input type="reset" Value="Cancel" />
  </td>
 </tr>

</table>
</form>
<a href="index.php">Go Back</a>
<?php require_once "footer.php"; ?>