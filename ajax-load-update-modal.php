<?php
include "database/Database.php";
$db = new Database();

$id = $_POST["id"];
$query = "SELECT * FROM tbl_user WHERE id = {$id}";
$result = $db->select($query) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>First Name</td>
      <td><input type='text' id='edit-fname' value='{$row["first_name"]}'>
          <input type='text' id='edit-id' hidden value='{$row["id"]}'>
      </td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type='text' id='edit-email' value='{$row["email"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><button type='submit' id='edit-submit' value='save'>Update</button></td>
    </tr>";

  }

    mysqli_close($db->link);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
