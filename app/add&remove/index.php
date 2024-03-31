<?php

// index.php

include('database_connection.php');

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
<html>

<head>
    <title>Add or Remove Selectpicker Dropdown Dynamically in PHP using jQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- select2 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"><!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body>
    <br />
    <div class="container">
        <h3 align="center">Add or Remove Selectpicker Dropdown Dynamically in PHP without Validation</h3>
        <br />
        <div class="card">
            <div class="card-header">Enter Item Details</div>
            <div class="card-body">
                <form method="post" id="insert_form">
                    <div class="form-group">
                        <label for="id_form">Kode Preventive</label>
                        <!-- Input id_form -->
                        <input type="text" class="form-control" id="id_form" name="id_form" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="id_form">ID form</label>
                        <select name="id_tm" class="form-control" id="id_tm">
                            <?php
                            // Assuming $connect is your PDO connection object
                            $query = "SELECT id_tm, nm_tm FROM tb_tpmesin";
                            $result = $connect->query($query);

                            foreach ($result as $row) {
                                echo '<option value="' . $row["id_tm"] . '">' . $row["nm_tm"] . '</option>';
                            }
                            ?>
</select>
                    </div>
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
                    
                    <div class="form-group">
                        <label>Item</label>
                        <select class="select2" multiple="multiple" name="selected_items[]" data-placeholder="Select items" style="width: 100%;">
                            <?php
                            // Assuming $connect is your PDO connection object
                            $query = "SELECT id_Item, nm_Item FROM tb_item ORDER BY nm_Item ASC";
                            $result = $connect->query($query);

                            foreach ($result as $row) {
                                echo '<option value="' . $row["id_Item"] . '">' . $row["nm_Item"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<!-- jQuery -->
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
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
</html>
