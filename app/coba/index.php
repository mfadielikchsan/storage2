<?php

// index.php

include('koneksi.php');

function fill_bagian_select_box($connect)
{
    $output = '';
    $query = "SELECT * FROM tb_bagian ORDER BY nm_Bagian ASC";
    $result = $connect->query($query);
    foreach ($result as $row) {
        $output .= '<option value="' . $row["id_Bagian"] . '">' . $row["nm_Bagian"] . '</option>';
    }
    return $output;
}

function fill_instruksi_select_box($connect)
{
    $output = '';
    $query = "SELECT * FROM tb_instruksikerja ORDER BY nm_InstruksiKerja ASC";
    $result = $connect->query($query);
    foreach ($result as $row) {
        $output .= '<option value="' . $row["id_InstruksiKerja"] . '">' . $row["nm_InstruksiKerja"] . '</option>';
    }
    return $output;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $order_id = uniqid();

    for ($count = 0; $count < count($_POST['item_name']); $count++) {
        $query = "INSERT INTO order_items (order_id, item_name, item_quantity, item_unit) VALUES (:order_id, :item_name, :item_quantity, :item_unit)";

        $statement = $connect->prepare($query);

        $statement->execute(
            array(
                ':order_id' => $order_id,
                ':item_name' => $_POST['item_name'][$count],
                ':item_quantity' => $_POST['item_quantity'][$count],
                ':item_unit' => $_POST['item_unit'][$count]
            )
        );
    }

    // Tambahkan pemrosesan data untuk tabel tb_bagian dan tb_instruksikerja sesuai kebutuhan
    // ...

    echo '<div class="alert alert-success">Item Details Saved</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Advanced form elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"><!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
                <form method="post" id="insert_form">
                     <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
                    <div class="table-responsive">
                        <span id="error"></span>
                        <table class="table table-bordered" id="item_table">
                            <tr>
                                <th>Select Bagian</th>
                                <th>Select Instruksi Kerja</th>
                                <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i>tmbah</button></th>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <!-- /.card -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap5'
    })
  })
</script>
<script>
    $(document).ready(function () {
        var count = 0;

        function add_input_field(count) {
            var html = '';

            html += '<tr>';
            html += '<td><select name="item_unit[]" class="form-control selectpicker" data-live-search="true">';
            html += '<option value="">Select Bagian</option><?php echo fill_bagian_select_box($connect); ?></select></td>';
            html += '<td><select name="item_instruksi[]" class="form-control selectpicker" data-live-search="true">';
            html += '<option value="">Select Instruksi Kerja</option><?php echo fill_instruksi_select_box($connect); ?></select></td>';
            var remove_button = '';

            if (count > 0) {
                remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button>';
            }

            html += '<td>' + remove_button + '</td></tr>';

            return html;
        }

        $('#item_table').append(add_input_field(0));

        $('.selectpicker').selectpicker('refresh');

        $(document).on('click', '.add', function () {
            count++;
            $('#item_table').append(add_input_field(count));
            $('.selectpicker').selectpicker('refresh');
        });

        $(document).on('click', '.remove', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

</body>
</html>
