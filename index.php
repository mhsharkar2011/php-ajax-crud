<?php
include "header.php";
?>
<section class="maincontent">
   <div class="row justify-content-end">
      <div class="col col-lg-5">
         <div id="search-bar">
            <label>Search :</label>
            <input type="text" id="search" autocomplete="off">
         </div>
      </div>
      <div class="col col-lg-2">
         <button type="button" class="btn btn-secondary" onclick="window.location.reload();"><i class="fa-solid fa-arrows-rotate"></i></button>
      </div>
   </div>
   <!-- Insert User Data Table -->
   <form class="p-4" id="addForm">
      <table>
         <tr>
            <td><input type="text" class="form-control mx-2" id="fname" placeholder="First Name" /></td>
            <td><input type="text" class="form-control mx-2" id="lname" placeholder="Last Name" /></td>
            <td><input type="text" class="form-control mx-2" id="email" placeholder="Email" /></td>
            <td><button type="submit" id="user-save" class="btn btn-sm btn-secondary">Save</button></td>
         </tr>
      </table>
   </form>
   <!-- Load Table Data -->
   <table class="tblone" id="table-data"></table>
</section>
<?php include "footer.php"; ?>