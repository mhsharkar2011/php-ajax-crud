<?php 
include "header.php";
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

<?php 
if(isset($_GET['msg'])){
  echo "<span class='text-success'>" . $_GET['msg'] . "</span>";
  } 
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>" . $error . "</span>";
}
?>


<form class="p-4" action="create.php" method="post">
<table>
 <tr>
  <td class="form-label">First Name</td>
  <td><input type="text" class="form-control" name="first_name" placeholder="Please enter first name"/></td>
 </tr>
 <tr>
  <td class="form-label">Last Name</td>
  <td ><input type="text" class="form-control" name="last_name" placeholder="Please enter last name"/></td>
 </tr>
 <tr>
  <td class="form-label">Email</td>
  <td><input type="text" class="form-control" name="email" placeholder="Please enter email"/></td>
 </tr>


 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary"/>
  <input type="reset" Value="Clear" class="btn btn-sm btn-danger" />
  </td>
 </tr>

</table>
</form>
<a class="btn btn-success" href="index.php">Go Back</a>
<?php include "footer.php"; ?>