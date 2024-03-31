<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">Tabel Kode Form</h3>
              </div>
            <div class="card-body">   
              <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th>Id Head Form</th>
                        <th>Name of Form</th>
                        <th>Part Check</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        $tabel = sql("SELECT tb_formpengecekan.id_formpengecekan, tb_form.nm_form, bagian_pengecekan.pilih_pengecekan
                    FROM tb_formpengecekan
                    JOIN tb_form ON tb_formpengecekan.id_form = tb_form.id_form
                    JOIN bagian_pengecekan ON tb_formpengecekan.id_pengecekan = bagian_pengecekan.id_pengecekan"
        );

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
        <?php foreach ($tabel as $row) : ?>
            <tr>
                <td><?= $row["id_formpengecekan"]; ?></td>
                <td><?= $row["nm_form"]; ?></td>
                <td><?= $row["pilih_pengecekan"]; ?></td>
                            <td>
                                <a href="index.php?page=edit-pengecekan2&id_formpengecekan=<?= $row['id_formpengecekan']; ?>&nm_form=<?= $row['nm_form']; ?>&pilih_pengecekan=<?= $row['pilih_pengecekan']; ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>Id Head Form</th>
                        <th>Name of Form</th>
                        <th>Part Check</th>
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
            window.location = "delete/delete_form_kerja2.php?id_form=" + id;
        }
    });
}

</script>