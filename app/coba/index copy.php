<?php

// index.php

// include('database_connection.php');

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

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
//     $order_id = uniqid();

//     for ($count = 0; $count < count($_POST['item_name']); $count++) {
//         $query = "INSERT INTO order_items (order_id, item_name, item_quantity, item_unit) VALUES (:order_id, :item_name, :item_quantity, :item_unit)";

//         $statement = $connect->prepare($query);

//         $statement->execute(
//             array(
//                 ':order_id' => $order_id,
//                 ':item_name' => $_POST['item_name'][$count],
//                 ':item_quantity' => $_POST['item_quantity'][$count],
//                 ':item_unit' => $_POST['item_unit'][$count]
//             )
//         );
//     }

//     // Tambahkan pemrosesan data untuk tabel tb_bagian dan tb_instruksikerja sesuai kebutuhan
//     // ...

//     echo '<div class="alert alert-success">Item Details Saved</div>';
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css"> -->
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Bootstrap Color Picker -->
  <!-- <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <!-- <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css"> -->
  <!-- dropzonejs -->
  <!-- <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<section class="content">
<div class="row">
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
                            <input type="text" id="inputTipeMesin" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputKategoriMesin">Kategori Mesin</label>
                            <select class="form-control" style="width: 100%;">
                                <option selected="selected">Pilih...</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputNomorMesin">Nomor Mesin</label>
                            <div id="show_item">
                                <div class="row">
                                    <div class="col-md-9 mb-3">
                                        <select name="product_name[]" class="form-control" required id="inputNomorMesin">
                                            <option value="">Pilih Mesin...</option>
                                            <?php
                                            $conn_pm = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');

                                            $result = $conn_pm->query("SELECT mcno FROM mesin");
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
                        </div>
                    </div>
                </div>
            </div>
<div class="col-md-9">
    <div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Bagian Pengecekan</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputPengecekan">Bagian Pengecekan</label>
                    <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Pilih...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>P</option>
                    </select>
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Item</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select Item" style="width: 100%;">
                        <?php
                        include('koneksi.php');

                        // SQL query to fetch data from tb_item
                        $sql = "SELECT * FROM tb_item";
                        $result = $conn->query($sql);

                        // Check if there are rows in the result
                        if ($result->num_rows > 0) {
                            // Fetch data and store it in an associative array
                            while ($row = $result->fetch_assoc()) {
                                echo '<option>' . htmlspecialchars($row['nm_Item']) . '</option>';
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the connection
                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>


                <div class="form-group">
                <table class="table table-bordered" id="item_table">
                            <tr>
                                <th>Select Bagian</th>
                                <th>Select Instruksi Kerja</th>
                                <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Page specific script -->
<script>
  // bagian
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
<!-- <script>
    function loadInstruksiKerja() {
            var bagian = document.getElementById("bagian").value;
            $('#instruksikerja').load("dinstruksikerja.php?id_InstruksiKerja=" + bagian + "");
    }
</script> -->
<script>
  $(document).ready(function () {
    var count = 0;

    function add_input_field(count) {
        var html = '<tr>';
        html += '<td><select name="item_unit[]" class="form-control selectpicker" data-live-search="true">';
        html += '<option value="">Select Bagian</option><?php echo fill_bagian_select_box($connect); ?></select></td>';
        html += '<td><select name="item_instruksi[]" class="form-control selectpicker" data-live-search="true">';
        html += '<option value="">Select Instruksi Kerja</option><?php echo fill_instruksi_select_box($connect); ?></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button></td>';
        html += '</tr>';
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
<script>
        $(document).ready(function () {
    var count = 0;

    function addInputField(count) {
        var html = '<tr>';
        html += '<td><select name="item_unit[]" class="form-control selectpicker" data-live-search="true">';
        html += '<option value="">Select Bagian</option><?php echo fill_bagian_select_box($connect); ?></select></td>';
        html += '<td><select name="item_instruksi[]" class="form-control selectpicker" data-live-search="true">';
        html += '<option value="">Select Instruksi Kerja</option><?php echo fill_instruksi_select_box($connect); ?></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button></td>';
        html += '</tr>';
        return html;
    }

    // Add initial row
    $('#item_table').append(addInputField(count));

    // Initialize SelectPicker
    $('.selectpicker').selectpicker('refresh');

    // Add row on button click
    $(document).on('click', '.add', function () {
        count++;
        $('#item_table').append(addInputField(count));
        $('.selectpicker').selectpicker('refresh');
    });

    // Remove row on button click
    $(document).on('click', '.remove', function () {
        $(this).closest('tr').remove();
    });

    // Add item row
    $(".add_item_btn").click(function (e) {
        e.preventDefault();
        $("#show_item").append(`
            <div class="row">
                <div class="col-md-9 mb-3">
                    <select name="product_name[]" class="form-control select2" required>
                        <option value="">Pilih Mesin...</option>
                        <?php
                        $result = $conn_pm->query("SELECT mcno FROM mesin");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['mcno']}'>{$row['mcno']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 mb-2 d-grid">
                    <button class="btn btn-danger remove_item_btn"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        `);

        // Initialize Select2 for the newly added dropdown
        $("#show_item select").last().select2();
    });

    // Remove item row
    $("#show_item").on('click', '.remove_item_btn', function () {
        $(this).closest('.row').remove();
    });
});

    </script>
</section>




<!-- jQuery -->
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<!-- <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> -->
<!-- InputMask -->
<!-- <script src="../plugins/moment/moment.min.js"></script> -->
<!-- <script src="../plugins/inputmask/jquery.inputmask.min.js"></script> -->
<!-- date-range-picker -->
<!-- <script src="../plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap color picker -->
<!-- <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Bootstrap Switch -->
<!-- <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> -->
<!-- BS-Stepper -->
<!-- <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
<!-- dropzonejs -->
<!-- <script src="../plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../dist/js/demo.js"></script> -->




</body>
</html>