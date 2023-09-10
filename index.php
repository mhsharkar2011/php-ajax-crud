<?php

include "header.php";
include "database/Database.php";
?>
 <section class="maincontent">

 <?php
    $db = new Database();
    $query = "SELECT * FROM tbl_user";
    $read = $db->select($query);
 ?>
<?php
    if(isset($_GET['id'])){
         $id = $_GET['id'];
         $query = "DELETE FROM tbl_user WHERE id = $id";
         $deleteData = $db->delete($query);
   
         if($deleteData){
            echo "Record with ID $id has been deleted successfully";
         }else{
            echo "Error: Unable to delete the record";
         }
      }
   
?>

 <?php 
    if(isset($_GET['msg'])){
        echo "<span style='color:green'>" . $_GET['msg'] . "</span> <br>";
    }
 ?>
 <?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>

<a href="create.php">Create</a>

<table class="tblone">
<tr>
 <th>Serial</th>
 <th>Fist Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Action</th>
</tr>
<?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td><?php echo $i++ ?></td>
 <td><?php echo $row['first_name']; ?></td>
 <td><?php echo $row['last_name']; ?></td>
 <td><?php echo $row['email']; ?></td>
 <td>
    <a class="btn btn-sm btn-warning" href="update.php?id=<?php echo urlencode($row['id']); ?>"><i class="fa-solid fa-pencil"></i></a>
    <form method="post">
    <a class="btn btn-sm btn-danger" href="index.php?id=<?php echo urlencode($row['id']); ?>"><i class="fa-solid fa-trash-can"></i></a>
    </form>
</td>
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>



 </section>

 <?php include "footer.php"; ?>