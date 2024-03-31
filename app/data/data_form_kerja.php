<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">Tabel Kode Form</h3>
              </div>
            <div class="card-body">  
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>
                  Tambah New Work Instruction
            </button>  
            <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD ID FORM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="add/tambah_form_kerja.php" id="add_form">
                <div class="modal-body" id="addModalBody">
                    <!-- Input id_form -->
                    <input type="hidden" class="form-control" id="id_form" name="id_form" value="" required>
                    <label for="nm_form">Nama Form:</label>
                    <!-- Input id_form -->
                    <input type="text" class="form-control" id="nm_form" name="nm_form" value="" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="add_form">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

            <br></br>        
              <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th>ID Form</th>
                        <th>Kode Form</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tabel = sql("SELECT * FROM tb_form");
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
                            <td ><?= $row["id_form"]; ?></td>
                            <td><?= $row["nm_form"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $row['id_form']; ?>"><i class="fa fa-edit"></i></button>
                                <!-- Tombol Hapus dengan SweetAlert2 -->
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?= $row['id_form']; ?>')"><i class="fa fa-trash"></i></button>
                                


                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>ID Form</th>
                        <th>Kode Form</th>
                        <th>Action</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <?php foreach ($tabel as $row) : ?>
    <!-- Modal untuk Edit Data -->
    <div class="modal fade" id="editModal<?= $row['id_form']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row['id_form']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?= $row['id_form']; ?>">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir Edit Data -->
                    <form method="POST" action="update/update_form_kerja.php">
                        <input type="hidden" name="id_form" value="<?= $row['id_form']; ?>">
                        <div class="form-group">
                            <label for="id_form">ID Form</label>
                            <input type="text" class="form-control" id="id_form" name="id_form" value="<?= $row['id_form']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_form">Code Name</label>
                            <input type="text" class="form-control" id="nm_form" name="nm_form" value="<?= $row['nm_form']; ?>">
                        </div>
                        <!-- Add any additional fields you want to update -->

                        <button type="submit" class="btn btn-primary" name="update_data">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
</div>
</section>

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
            window.location = "delete/delete_form_kerja.php?id_form=" + id;
        }
    });
}

</script>