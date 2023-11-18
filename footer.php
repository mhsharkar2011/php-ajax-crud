<section class="footeroption">
  <p>© <?php echo date("Y"); ?> Web Devs 24</p>
  <h2><?php echo "www.webdevs24.com"; ?></h2>
</section>
</div>
</body>

</html>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // Load Table Records
    function loadTable() {
      $.ajax({
        url: "ajax-load.php",
        type: "POST",
        success: function(data) {
          $("#table-data").html(data);
        }
      });
    }
    loadTable(); // Load Table Records on Page Load


    // Insert New Records
    $("#user-save").on("click", function(e) {
      e.preventDefault();
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var email = $("#email").val();
      if (fname == "" || lname == "" || email == "") {
        $("#error-message").html("All fields are required.").slideDown();
        $("#success-message").slideUp();
      } else {
        $.ajax({
          url: "ajax-insert.php",
          type: "POST",
          data: {
            first_name: fname,
            last_name: lname,
            email: email
          },
          success: function(data) {
            if (data == 1) {
              loadTable();
              $("#addForm").trigger("reset");
              $("#success-message").html("Data Inserted Successfully.").slideDown();
              $("#error-message").slideUp();
            } else {
              $("#error-message").html("Can't save data. Check Unique email id").slideDown();
              $("#success-message").slideUp();
            }
          }
        });
      }

    });

    //Delete Records
    $(document).on("click", "#delete-btn", function(e) {
      e.preventDefault();
      if (confirm("Do you really want to delete this record ?")) {
        var userId = $(this).data("id");
        var element = this;
        $.ajax({
          url: "ajax-delete.php",
          type: "POST",
          data: {
            id: userId
          },
          success: function(data) {
            if (data == 1) {
              $(element).closest('tr').fadeOut();
            }
            loadTable();
          }
        });
      }
    });

    //Show Modal Box
    $(document).on("click", ".edit-btn", function() {
      $("#modal").show();
      var id = $(this).data("eid");

      $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {
          id: id
        },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    // Live Search
    $("#search").on("keyup", function() {
      var search_term = $(this).val();
      $.ajax({
        url: "ajax-search.php",
        type: "POST",
        data: {
          search: search_term
        },
        success: function(data) {
          $("#table-data").html(data);
        }
      });
    });
  });
</script>