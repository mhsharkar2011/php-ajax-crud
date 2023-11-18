<?php
include "header.php";
?>
<section class="maincontent">
   <div class="row justify-content-end">
      <div class="col col-lg-5">
         <div id="search-bar">
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text">Search</span>
               </div>
               <input type="text" id="search" autocomplete="off" class="form-control" />
            </div>
         </div>
      </div>
      <div class="col col-lg-1">
         <button type="button" class="btn btn-secondary" onclick="window.location.reload();"><i class="fa-solid fa-arrows-rotate"></i></button>
      </div>
   </div>
   <!-- Insert User Data Table -->
   <div class=" justify-content-center">
      <form class="p-4" id="addForm">
            <div class="row">
            <div class="col">
               <input type="text" class="form-control" id="fname" placeholder="First Name">
            </div>
           <div class="col">
               <input type="text" class="form-control" id="lname" placeholder="Last Name">
            </div>
           <div class="col">
               <input type="text" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="col-lg-1">
            <button type="submit" id="user-save" class="btn btn-md btn-secondary">Save</button>
            </div>
            </div>
         </form>
      </div>
         <!-- Load Table Data -->
         <table class="tblone" id="table-data"></table>
         <div id="error-message"></div>
         <div id="success-message"></div>
</section>
<?php include "footer.php"; ?>