
<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">Tabel Kode Form</h3>
              </div>
            <div class="card-body">  
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
                                <a href="index.php?page=edit-pengecekan-instruksi&id_form=<?= $row['id_form']; ?>&nm_form=<?= $row['nm_form']; ?>" class="btn btn-sm btn-success">
  <i class="fa fa-plus"></i>
</a>


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