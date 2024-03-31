<?php  

// Retrieve id_form and nm_form from the URL
$id_form = isset($_GET['id_form']) ? $_GET['id_form'] : '';
$nm_form = isset($_GET['nm_form']) ? $_GET['nm_form'] : '';
$id_formpengecekan = isset($_GET['id_formpengecekan']) ? $_GET['id_formpengecekan'] : '';
$pilih_pengecekan = isset($_GET['pilih_pengecekan']) ? $_GET['pilih_pengecekan'] : '';
$id_pengecekan = isset($_GET['id_pengecekan']) ? $_GET['id_pengecekan'] : '';
?>


<!-- general form elements disabled -->
<section class="content">
    <div class="container-fluid">
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">TAMBAH ITEM FORM</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form method='post' action='add/tambah_form_item2.php' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="id_form">ID Form</label>
                            <input type="text" name="id_formpengecekan" class="form-control" value="<?= $id_formpengecekan; ?>" readonly>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputKategoriMesin" >Pengecekan</label>
                            <input class="select2 form-control" id="pilih_pengecekan" name="pilih_pengecekan" value="<?= $pilih_pengecekan; ?>"readonly>
                        </div>
                    </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="mcno" class="form-label">Pilih Item</label>
                  <div id="show_item">
                      <div class="row">
                        <div class="col-md-9 mb-3">
                          <select name="product_name[]" class="select2 form-control" required id="inputNomorMesin">
                            <option value="">Pilih Item...</option>
                              <?php 
                              $hasil = $conn_pm->query("SELECT id_Item,nm_Item FROM tb_item");

                              // Tampilkan data sebagai dropdown options
                              while ($row1 = $hasil->fetch_assoc()) {
                                echo "<option value='{$row1['id_Item']}'>{$row1['nm_Item']}</option>";
                              }
                              ?>
                          </select>
                        </div>
                        <div class="col-md-2 mb-3 d-grid">
                        <button class="btn btn-success add_item_btn" onclick="addItem(event)"><i class="fa fa-plus"></i></button>

                        </div>
                      </div>
                  </div>
                </div>
                </div>
                </div>
                <div class="row">
                <button type="submit" class="btn btn-info">Simpan</button>
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
                        <th>ID Form Item</th>
                        <th>Pengecekan</th>
                        <th>Item</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tabel = sql("SELECT fi.id_form_item, CONCAT(f.nm_form, ' - ', bp.pilih_pengecekan) AS id_formpengecekan, b.nm_Item AS nm_Item FROM tb_form_item2 fi JOIN tb_formpengecekan fp ON fi.id_formpengecekan = fp.id_formpengecekan JOIN bagian_pengecekan bp ON fp.id_pengecekan = bp.id_pengecekan JOIN tb_item b ON fi.id_Item = b.id_Item JOIN tb_form f ON fp.id_form = f.id_form WHERE fp.id_formpengecekan = '$id_formpengecekan'");
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
                        <?php $i = 1; ?>
                            <?php foreach ( $tabel as $row ) : ?>
                        <tr>
                            <td ><?= $row["id_form_item"]; ?></td>
                            <td><?= $row["id_formpengecekan"]; ?></td>
                            <td><?= $row["nm_Item"]; ?></td>
                            <td><!-- Tombol Hapus dengan SweetAlert2 -->
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?= $row['id_form_item']; ?>')"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>ID Form Item</th>
                        <th>Pengecekan</th>
                        <th>Item</th>
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
        document.getElementById('pengukuran').addEventListener('change', function() {
            var toolField = document.getElementById('tool');
            toolField.disabled = !this.checked;
            if (!this.checked) {
                toolField.value = '';
            }
        });
</script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Data',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengarahkan ke skrip penghapusan dengan window.location
            window.location = "delete/delete_form_item.php?id_form_item=" + id;
        }
    });
}

</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Event delegation for dynamically added elements
        $('#show_item').on('click', '.remove_item_btn', function(event) {
            event.preventDefault();
            $(this).closest('.row').remove();
        });

        // Function to add a new item row
        function addItem(event) {
            event.preventDefault();
            var newItem = `
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <select name="product_name[]" class="form-control" required>
                            <option value="">Pilih Item...</option>
                            <?php 
                            $hasil = $conn_pm->query("SELECT id_Item,nm_Item FROM tb_item");
                            while ($row1 = $hasil->fetch_assoc()) {
                                echo "<option value='{$row1['id_Item']}'>{$row1['nm_Item']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3 d-grid">
                        <button class="btn btn-danger remove_item_btn"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            `;
            $('#show_item').append(newItem);
        }

        // Event listener for the add item button
        $('.add_item_btn').on('click', function(event) {
            addItem(event);
        });
    });
</script>
