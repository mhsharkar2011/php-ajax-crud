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
    <a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a>
    <a href="delete.php?id=<?php echo urlencode($row['id']); ?>">Delete</a>
</td>
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>



 </section>

 <?php include "footer.php"; ?>