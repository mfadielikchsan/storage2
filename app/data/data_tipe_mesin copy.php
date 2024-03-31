<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tipe Mesin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
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

            <!-- right -->
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
                        <div id="show_alert"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js'></script>
    <script>
        $(document).ready(function () {
            var tableCounter = 1;

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
                $(".select2").select2();  // Inisialisasi Select2 pada dropdown baru
            });

            $("#show_item").on('click', '.remove_item_btn', function () {
                $(this).closest('.row').remove();
            });

            $(".select2").select2();  // Inisialisasi Select2 pada dropdown

            $(".select2").change(function () {
                var selectedOption = $(this).val();
                var tableId = "table_" + tableCounter;

                if (selectedOption !== "") {
                    var newTable = $("<table class='table'></table>").attr("id", tableId);
                    newTable.append("<thead><tr><th>Pengecekan</th><th>Bagian</th><th>Item</th><th>Instruksi Kerja</th><th>Remove</th></tr></thead>");
                    newTable.append(`
                        <tbody>
                            <tr>
                                <td>${selectedOption}</td>
                                <td>
                                    <select class='form-control select2 bagian-dropdown'>
                                        <option value=''>Pilih Bagian...</option>
                                        <?php
                                        $result = $conn_pm->query("SELECT id_Bagian, nm_Bagian FROM tb_bagian");
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['id_Bagian']}'>{$row['nm_Bagian']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class='form-control select2 item-dropdown' multiple>
                                        <option value=''>Pilih Item...</option>
                                        <?php
                                        $result = $conn_pm->query("SELECT id_Item, nm_Item FROM tb_item");
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['id_Item']}'>{$row['nm_Item']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class='form-control select2 instruksikerja-dropdown' multiple>
                                        <option value=''>Pilih Instruksi Kerja...</option>
                                        <?php
                                        $result = $conn_pm->query("SELECT id_InstruksiKerja, nm_InstruksiKerja FROM tb_instruksikerja");
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['id_InstruksiKerja']}'>{$row['nm_InstruksiKerja']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <button class='btn btn-danger remove_table_btn'>Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    `);
                    $("#show_alert").append(newTable);
                    tableCounter++;
                    $(".select2").select2();  // Reinisialisasi Select2 pada dropdown baru
                }
            });

            $("#show_alert").on('click', '.remove_table_btn', function () {
                $(this).closest('table').remove();
            });
        });
    </script>
</body>
</html>
