<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Point Check | Preventive Maintenance</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="../plugins/select2/css/select2.min.css"> -->
  <!-- <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../dist/css/adminlte.min.css"> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
</head>
<body>
<!-- Main content -->
<section class="content">
      <div class="row">
        <!-- Left -->
        <div class="col-md-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tipe Mesin</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputTipeMesin">Tipe Mesin</label>
                <input type="text" id="inputTipeMesin" class="form-control">
              </div>
              <div class="form-group">
                <label>Kategori Mesin</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Pilih Kategori...</option>
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nomor Mesin</label>
              <div id="show_alert"></div>
              <form action="" method="POST" id="add_form">
                <div id="show_item">
                  <div class="row">
                    <div class="col-md-9 mb-3">
                      <select name="product_name[]" class="form-control" required>
                        <option value="">Pilih Mesin...</option>
                        <?php
                        $conn = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');

                        $result = $conn->query("SELECT mcno FROM mesin");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['mcno']}'>{$row['mcno']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-2 mb-2 d-grid">
                      <button class="btn btn-success add_item_btn"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- Right -->
        <div class="col-md-9">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Bagian Pengecekan</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Pilih...</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>P</option>
                </select>
              </div>
              <?php
                function fill_unit_select_box($conn_pm)
                {
                  $output = '';

                  $query2 = "SELECT * FROM unit_table ORDER BY unit_name ASC";

                  $result2 = $conn_pm->query($query);

                  foreach($result2 as $row)
                  {
                    $output .= '<option value="'.$row["unit_name"].'">'.$row["unit_name"] . '</option>';
                  }

                  return $output;
                }
                    
                ?>
              <div class="form-group">
              <form method="post" id="insert_form">
						    <div class="table-repsonsive">
                <span id="error"></span>
                <table class="table table-bordered" id="item_table">
								  <tr>
                    <th>Enter Item Name</th>
                    <th>Enter Quantity</th>
                    <th>Select Unit</th>
                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
								  </tr>
							  </table>
							<!-- <div align="center">
								<input type="submit" name="submit" id="submit_button" class="btn btn-primary" value="Insert" />
              </div> -->
              </div>
              </form>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- Select2 -->
<!-- <script src="../plugins/select2/js/select2.full.min.js"></script> -->
<!-- bs-custom-file-input -->
<!-- <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../dist/js/demo.js"></script> -->
<script src="script.js"></script>

<!-- <script>
    $(document).ready(function() {
      bsCustomFileInput.init();
      //Initialize Select2 Elements
      $('.select2').select2();

      $(".add_item_btn").click(function(e) {
        e.preventDefault();
        $("#show_item").prepend(`<div class="row append_item">
                        <div class="col-md-9 mb-3">
                          <select name="product_name[]" class="form-control" required>
                            <option value="">Select Item</option>
                            <?php
                            $conn = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');

                            $result = $conn->query("SELECT mcno FROM mesin");
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$row['mcno']}'>{$row['mcno']}</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2 mb-2 d-grid">
                          <button class="btn btn-danger remove_item_btn"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>`);
      });

      $(document).on('click', '.remove_item_btn', function(e){
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
      });

      // ajax request
      $('#add_form').submit(function(e){
        e.preventDefault();
        $("#add_btn").val('Adding...');
        $.ajax({
          url: 'action.php',
          method: 'POST',
          data: $(this).serialize(),
          success: function(response){
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append_item").remove();
            $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`);
          }
        });
      });
    });
</script> -->
<script>
  $(document).ready(function () {
  var count = 0;

  function add_input_field(count) {
    var html = "";

    html += "<tr>";

    html +=
      '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';

    html +=
      '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';

    html +=
      '<td><select name="item_unit[]" class="form-control selectpicker" data-live-search="true"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';

    var remove_button = "";

    if (count > 0) {
      remove_button =
        '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button>';
    }

    html += "<td>" + remove_button + "</td></tr>";

    return html;
  }

  $("#item_table").append(add_input_field(0));

  $(".selectpicker").selectpicker("refresh");

  $(document).on("click", ".add", function () {
    count++;

    $("#item_table").append(add_input_field(count));

    $(".selectpicker").selectpicker("refresh");
  });

  $(document).on("click", ".remove", function () {
    $(this).closest("tr").remove();
  });

  $("#insert_form").on("submit", function (event) {
    event.preventDefault();

    var error = "";

    count = 1;

    $(".item_name").each(function () {
      if ($(this).val() == "") {
        error += "<li>Enter Item Name at " + count + " Row</li>";
      }

      count = count + 1;
    });

    count = 1;

    $(".item_quantity").each(function () {
      if ($(this).val() == "") {
        error += "<li>Enter Item Quantity at " + count + " Row</li>";
      }

      count = count + 1;
    });

    count = 1;

    $("select[name='item_unit[]']").each(function () {
      if ($(this).val() == "") {
        error += "<li>Select Unit at " + count + " Row</li>";
      }

      count = count + 1;
    });

    var form_data = $(this).serialize();

    if (error == "") {
      $.ajax({
        url: "insert.php",

        method: "POST",

        data: form_data,

        beforeSend: function () {
          $("#submit_button").attr("disabled", "disabled");
        },

        success: function (data) {
          if (data == "ok") {
            $("#item_table").find("tr:gt(0)").remove();

            $("#error").html(
              '<div class="alert alert-success">Item Details Saved</div>'
            );

            $("#item_table").append(add_input_field(0));

            $(".selectpicker").selectpicker("refresh");

            $("#submit_button").attr("disabled", false);
          }
        },
      });
    } else {
      $("#error").html(
        '<div class="alert alert-danger"><ul>' + error + "</ul></div>"
      );
    }
  });
});
</script>
</body>
</html>