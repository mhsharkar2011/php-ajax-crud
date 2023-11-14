<?php

include "header.php";
include "database/Database.php";
?>
<section class="maincontent">
   <?php
   $db = new Database();
   $query = "SELECT * FROM tbl_user ORDER BY id DESC LIMIT 5";
   $read = $db->select($query);
   ?>
   <?php
   if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];
      echo "<span style='color:green'>" . $msg . "</span> <br>";

      echo '<script>
      setTimeout(() => {
          var url = window.location.href.split("?")[0];
          window.history.replaceState({}, document.title, url);
      }, 10); // 5000 milliseconds (5 seconds)
     </script>';
   }
   ?>
   <?php
   if (isset($error)) {
      echo "<span style='color:red'>" . $error . "</span>";
   }
   ?>
   <button type="button" class="btn btn-secondary" onclick="window.location.reload();"><i class="fa-solid fa-arrows-rotate"></i></button>
   <a class="btn btn-info" href="create.php">Create</a>
   <table class="tblone">
      <tr>
         <th>Serial</th>
         <th>Fist Name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>Action</th>
      </tr>
      <?php if ($read) { ?>
         <?php
         $i = 1;
         while ($row = $read->fetch_assoc()) {
         ?>
            <tr>
               <td><?php echo $i++ ?></td>
               <td><?php echo $row['first_name']; ?></td>
               <td><?php echo $row['last_name']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td>
                  <a class="btn btn-sm btn-warning" href="update.php?id=<?php echo urlencode($row['id']); ?>"><i class="fa-solid fa-pencil"></i></a>
                  <a href="delete.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-sm btn-danger"> Delete</a>
               </td>
            </tr>
         <?php } ?>
      <?php } else { ?>
         <tr>
            <td colspan="5" ><p>Data is not available !!</p></td>
         </tr>
      <?php } ?>
   </table>
</section>


<?php include "footer.php"; ?>