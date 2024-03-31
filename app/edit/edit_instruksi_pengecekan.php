<?php

// Retrieve id_form and nm_form from the URL
$id_form = isset($_GET['id_form']) ? $_GET['id_form'] : '';
$nm_form = isset($_GET['nm_form']) ? $_GET['nm_form'] : '';

// Fetch data for Bagian dropdown
$bagian_result = $conn_pm->query("SELECT id_Bagian, nm_Bagian FROM tb_bagian");

// Fetch data for Instruksi Kerja dropdown
$instruksi_result = $conn_pm->query("SELECT id_InstruksiKerja, id_Bagian, nm_InstruksiKerja FROM tb_instruksikerja");

// Check if the form is submitted for update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $new_nm_form = isset($_POST['new_nm_form']) ? $_POST['new_nm_form'] : '';

    // Update the form data in the database
    $query_update = "UPDATE tb_form SET nm_form = '$new_nm_form' WHERE id_form = '$id_form'";

    if (mysqli_query($conn_pm, $query_update)) {
        // Redirect to a success page or the original page
        header('Location: index.php?page=data-form');
        exit();
    } else {
        // Handle the case where the query fails
        echo "Error: " . mysqli_error($conn_pm);
    }
}

// Display the form for editing
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Instruksi Kerja</title>
    </head>

<body>

    <!-- general form elements disabled -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Instruksi Kerja</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method='post' action='add/tambah_form_instruksikerja.php' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="id_form">ID Form</label>
                                    <input type="text" name="id_form" class="form-control" value="<?= $id_form; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="id_form">Nama Form</label>
                                    <input type="text" id="nm_form" name="nm_form" class="form-control" value="<?= $nm_form; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputKategoriMesin">Pengecekan</label>
                                    <select class="form-control" id="id_pengecekan" name="id_pengecekan" onchange="updateIdBagian()" style="width: 100%;">
                                        <?php
                                        $hasil = $conn_pm->query("SELECT id_pengecekan, pilih_pengecekan FROM bagian_pengecekan");

                                        // Tampilkan data sebagai dropdown options
                                        while ($row1 = $hasil->fetch_assoc()) {
                                            echo "<option value='" . $row1['id_pengecekan'] . "'>" . $row1['pilih_pengecekan'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br></br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" id="dynamicTable">
                                    <thead>
                                        <tr>
                                            <th>Urutan Pengecekan</th>
                                            <th>Bagian</th>
                                            <th>Instruksi Kerja</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table rows will be dynamically added here -->
                                    </tbody>
                                </table>
                                <div class="row">
    <div class="col-sm-6">
        <button type="button" class="btn btn-success" id="addRowBtn">Add Row</button>
    </div>
    <div class="col-sm-6 text-right">
        <button type="submit" class="btn btn-info">Simpan</button>
    </div>
</div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">Tabel Kode Form</h3>
              </div>
            <div class="card-body">
            <br>       
              <table id="example2" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th>ID Point Check</th>
                        <th>Form-Part</th>
                        <th>Sequence</th>
                        <th>Part Instruction</th>
                        <th>Work Instruction</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        $tabel = sql("SELECT fi.id_point_check, CONCAT(f.nm_form, ' - ', bp.pilih_pengecekan) AS id_formpengecekan, fi.urutan_point_check, b.nm_Bagian AS id_Bagian, i.nm_InstruksiKerja AS id_InstruksiKerja FROM tb_form_instruksikerja fi JOIN tb_formpengecekan fp ON fi.id_formpengecekan = fp.id_formpengecekan JOIN tb_form f ON fp.id_form = f.id_form JOIN bagian_pengecekan bp ON fp.id_pengecekan = bp.id_pengecekan JOIN tb_bagian b ON fi.id_Bagian = b.id_Bagian JOIN tb_instruksikerja i ON fi.id_InstruksiKerja = i.id_InstruksiKerja WHERE f.id_form = '$id_form'");

        function sql($sql) {
            global $conn_pm;
            $result = mysqli_query($conn_pm, $sql);
            $rows = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        ?>
        <?php foreach ($tabel as $row) : ?>
                        <tr>
                            <td ><?= $row["id_point_check"]; ?></td>
                            <td><?= $row["id_formpengecekan"]; ?></td>
                            <td><?= $row["urutan_point_check"]; ?></td>
                            <td><?= $row["id_Bagian"]; ?></td>
                            <td><?= $row["id_InstruksiKerja"]; ?></td>
                            <td><button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?= $row['id_point_check']; ?>')"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        
                        <?php endforeach; ?>
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>ID Point Check</th>
                        <th>Form-Part</th>
                        <th>Sequence</th>
                        <th>Part Instruction</th>
                        <th>Work Instruction</th>
                        <th>Action</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<script>
    $(document).ready(function () {
        // Function to add a new row to the dynamic table
        function addRow() {
            var rowNumber = $("#dynamicTable tbody tr").length + 1;
            var row = `
                <tr>
                    <td>${String.fromCharCode(96 + rowNumber)}</td>
                    <td>
                        <select class="select2 form-control bagian-dropdown" name="bagian[]" style="width: 100%;">
                            <option value="">Pilih Bagian...</option>`;
            
            // Populate Bagian dropdown options
            <?php
            $bagian_result = $conn_pm->query("SELECT id_Bagian, nm_Bagian FROM tb_bagian");
            while ($bagian_row = $bagian_result->fetch_assoc()) {
                echo "row += `<option value='{$bagian_row['id_Bagian']}'>{$bagian_row['nm_Bagian']}</option>`;";
            }
            ?>
            
            row += `</select>
                    </td>
                    <td>
                        <select class="select2 form-control instruksi-dropdown" name="instruksi[]" style="width: 100%;">
                            <option value="">Pilih Instruksi Kerja...</option>
                        </select>
                    </td>
                    <td><button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa fa-minus"></i></button></td>
                </tr>`;

            $("#dynamicTable tbody").append(row);

            // Initialize Select2 on the newly added row's dropdowns
            $('.select2').select2();

            // Attach change event to Bagian dropdown to dynamically populate Instruksi Kerja dropdown
            $('.bagian-dropdown').change(function () {
                var selectedBagian = $(this).val();
                var instruksiDropdown = $(this).closest('tr').find('.instruksi-dropdown');

                // Clear existing options
                instruksiDropdown.empty();
                instruksiDropdown.append('<option value="">Pilih Instruksi Kerja...</option>');

                // Fetch and populate Instruksi Kerja options based on selected Bagian
                <?php
                $instruksi_query = "SELECT id_InstruksiKerja, id_Bagian, nm_InstruksiKerja FROM tb_instruksikerja";
                $instruksi_result = $conn_pm->query($instruksi_query);
                while ($instruksi_row = $instruksi_result->fetch_assoc()) {
                    echo "if ({$instruksi_row['id_Bagian']} == selectedBagian) {
                            instruksiDropdown.append('<option value=\"{$instruksi_row['id_InstruksiKerja']}\">{$instruksi_row['nm_InstruksiKerja']}</option>');
                        }";
                }
                ?>
            });
        }

        // Function to remove a row from the dynamic table
        function removeRow(button) {
            $(button).closest("tr").remove();
        }

        // Attach the addRow function to the "Add Row" button click event
        $("#addRowBtn").click(addRow);

        // Attach the removeRow function to the "Remove" button click event
        $("#dynamicTable").on("click", ".btn-danger", function () {
            removeRow(this);
        });

        // Initialize Select2 on the existing dropdowns
        $('.select2').select2();
    });
</script>


</body>

</html>
