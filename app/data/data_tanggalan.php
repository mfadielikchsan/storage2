<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">Tabel Kode Form</h3>
              </div>
            <div class="card-body">  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>
                  Tambah Jadwal
            </button>  
            <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD JADWAL</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

            <br></br>        
              <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th>ID Jadwal</th>
                        <th>Point Check</th>
                        <th>Tanggal Awal</th>
                        <th>Jarak Bulan</th>
                        <th>Periode 1</th>
                        <th>Periode 2</th>
                        <th>Periode 3</th>
                        <th>Periode 4</th>
                        <th>Periode 5</th>
                        <th>Periode 6</th>
                        <th>Periode 7</th>
                        <th>Periode 8</th>
                        <th>Periode 9</th>
                        <th>Periode 10</th>
                        <th>Periode 11</th>
                        <th>Periode 12</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tabel = sql("SELECT * FROM tb_schedule_preventive");
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
                            <td ><?= $row["code_sche"]; ?></td>
                            <td><?= $row["id_formpengecekan"]; ?></td>
                            <td><?= $row["tanggalAwal"]; ?></td>
                            <td><?= $row["jarak_bulan"]; ?></td>
                            <td><?= $row["periode1"]; ?></td>
                             <td><?= $row["periode2"]; ?></td>
                              <td><?= $row["periode3"]; ?></td>
                               <td><?= $row["periode4"]; ?></td>
                                <td><?= $row["periode5"]; ?></td>
                                <td><?= $row["periode6"]; ?></td>
                                <td><?= $row["periode7"]; ?></td>
                                <td><?= $row["periode8"]; ?></td>
                                <td><?= $row["periode9"]; ?></td>
                                <td><?= $row["periode10"]; ?></td>
                                <td><?= $row["periode11"]; ?></td>
                                <td><?= $row["periode12"]; ?></td>
                            <td>tombol
                            <!-- <a href="index.php?page=edit-pengecekan-jadwal&id_point_check=<?= $row['id_point_check']; ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>ID Jadwal</th>
                        <th>Point Check</th>
                        <th>Tanggal Awal</th>
                        <th>Jarak Bulan</th>
                        <th>Periode 1</th>
                        <th>Periode 2</th>
                        <th>Periode 3</th>
                        <th>Periode 4</th>
                        <th>Periode 5</th>
                        <th>Periode 6</th>
                        <th>Periode 7</th>
                        <th>Periode 8</th>
                        <th>Periode 9</th>
                        <th>Periode 10</th>
                        <th>Periode 11</th>
                        <th>Periode 12</th>
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