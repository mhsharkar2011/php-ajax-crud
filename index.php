<?php
include "header.php";
?>
<section class="maincontent">

   <div class="row">
      <div class="col">
         <button type="button" class="btn btn-secondary" onclick="window.location.reload();"><i class="fa-solid fa-arrows-rotate"></i></button>
         <a class="btn btn-info" href="create.php">Create</a>
      </div>
      <div class="col">
         <div id="search-bar">
            <label>Search :</label>
            <input type="text" id="search" autocomplete="off">
         </div>
      </div>
   </div>

   <!-- Insert User Data Table -->

   <form class="p-4">
      <table>
         <tr>
            <td><input type="text" class="form-control mx-2" id="fname" placeholder="First Name" /></td>

            <td><input type="text" class="form-control mx-2" id="lname" placeholder="Last Name" /></td>

            <td><input type="text" class="form-control mx-2" id="email" placeholder="Email" /></td>

            <td>
               <button type="submit" id="user-save" class="btn btn-sm btn-secondary">Save</button>
            </td>
         </tr>

      </table>
   </form>

   <!-- Load Table Data -->
   <table class="tblone" id="table-data"></table>
</section>
<?php include "footer.php"; ?>