<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hapus</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css' />
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Tambah Item</h4>
                        <div class="card-body p-4">
                            <div id="show_alert"></div>
                            <form action="" method="POST" id="add_form">
                                <!-- Additional Form Elements -->
                                <div class="form-group">
                                    <label for="inputTipeMesin">Tipe Mesin</label>
                                    <input type="text" name="tipe_mesin" id="inputTipeMesin" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="inputKategoriMesin">Kategori Mesin</label>
                                    <select name="kategori_mesin" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Pilih...</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                    </select>
                                </div>

                                <div id="show_item" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="selectItem">Pilih Item</label>
                                            <select name="product_name[]" id="selectItem" class="form-control" required>
                                                <option value="">Pilih Item</option>
                                                <?php
                                                $conn = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');

                                                $result = $conn->query("SELECT mcno FROM mesin");
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='{$row['mcno']}'>{$row['mcno']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-3 d-grid">
                                            <button class="btn btn-success add_item_btn">Tambah Lagi</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Table Structure -->
                                <div class="table-responsive">
                                    <span id="error"></span>
                                    <table class="table table-bordered" id="item_table">
                                        <tr>
                                            <th>Enter Item Name</th>
                                            <th>Enter Quantity</th>
                                            <th>Select Unit</th>
                                            <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
                                        </tr>
                                    </table>
                                    <div align="center">
                                        <input type="submit" name="submit" id="submit_button" class="btn btn-primary" value="Insert" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        // Your existing JavaScript code remains unchanged
        $(document).ready(function () {
            $(".add_item_btn").click(function (e) {
                e.preventDefault();
                $("#show_item").append(`<div class="row append_item">
                        <div class="col-md-4 mb-3">
                          <label for="selectItem">Pilih Item</label>
                          <select name="product_name[]" id="selectItem" class="form-control" required>
                            <option value="">Pilih Item</option>
                            <?php
                            $conn = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');

                            $result = $conn->query("SELECT mcno FROM mesin");
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$row['mcno']}'>{$row['mcno']}</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2 mb-3 d-grid">
                          <button class="btn btn-danger remove_item_btn">Hapus</button>
                        </div>
                      </div>`);
            });

            $(document).on('click', '.remove_item_btn', function (e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });
        });
    </script>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');

    // Retrieve additional form elements
    $tipe_mesin = $_POST['tipe_mesin'];
    $kategori_mesin = $_POST['kategori_mesin'];

    // Insert data into the mesin table
    foreach ($_POST['product_name'] as $key => $value) {
        $sql = 'INSERT INTO mesin(mcno, tipe_mesin, kategori_mesin) VALUES(:mesinno, :tipe_mesin, :kategori_mesin)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':mesinno' => $value,
            ':tipe_mesin' => $tipe_mesin,
            ':kategori_mesin' => $kategori_mesin,
        ]);
    }

    // Process additional table data
    if (isset($_POST['submit'])) {
        // Loop through the table rows
        for ($count = 0; $count < count($_POST['item_name']); $count++) {
            $item_name = $_POST['item_name'][$count];
            $item_quantity = $_POST['item_quantity'][$count];
            $item_unit = $_POST['item_unit'][$count];

            // Insert data into the items table (replace 'items' with your actual table name)
            $sql = 'INSERT INTO items(item_name, item_quantity, item_unit) VALUES(:item_name, :item_quantity, :item_unit)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':item_name' => $item_name,
                ':item_quantity' => $item_quantity,
                ':item_unit' => $item_unit,
            ]);
        }
        echo 'Item berhasil ditambahkan';
    }
}
?>
