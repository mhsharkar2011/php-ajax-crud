<?php
include 'header.php';
include "database/Database.php";
?>

<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM users WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();
if (isset($_POST['update'])) {
    $fname  = mysqli_real_escape_string($db->link, $_POST['first_name']);
    $lname  = mysqli_real_escape_string($db->link, $_POST['last_name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    if ($fname == '' || $lname == '' || $email == '') {
        $error = "Field must not be Empty !!";
    } else {
        $query = "UPDATE tbl_user
      SET 
      first_name = '$fname', 
      last_name = '$lname', 
      email = '$email'
      WHERE id = $id";
        $update = $db->update($query);
    }

  
}
?>

<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM tbl_user WHERE id = $id";
    $deleteData = $db->delete($query);
}
?>

<?php
if (isset($error)) {
    echo "<span style='color:red'>" . $error . "</span>";
}
?>
<form action="update.php?id=<?php echo $id; ?>" method="post">
    <table>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="first_name" value="<?php echo $getData['first_name'] ?>" /></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="last_name" value="<?php echo $getData['last_name'] ?>" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $getData['email'] ?>" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="d-grid gap-2 d-md-block">
                    <button type="submit" name="update" class="btn btn-sm btn-primary"> Update</button>
                    <input type="reset" Value="Clear" class="btn btn-sm btn-warning" />
                    <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </td>
        </tr>

    </table>
</form>
<a class="btn brn-sm btn-success" href="index.php">Go Back</a>
<?php include 'footer.php'; ?>

