<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Point Check | Preventive Maintenance</title>
</head>
<body>
  
</body>
</html>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel List Point Check</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i>
                  Tambah Point Check
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Cek ID</th>
                  <th>Item</th>
                  <th>Instruksi Kerja</th>
                  <th >Standart</th>
                  <th>Metode</th>
                  <th>Mc Run</th>
                  <th>Pengukuran</th>
                  <th>Tool</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = mysqli_query($conn_pm, "SELECT 
                      tb_instruksikerja.id_InstruksiKerja,
                      tb_bagian.nm_Bagian,
                      tb_instruksikerja.nm_InstruksiKerja,
                      tb_instruksikerja.Standart,
                      tb_instruksikerja.Metode,
                      tb_instruksikerja.Mc_Run,
                      tb_instruksikerja.Ukur,
                      tb_instruksikerja.Tool
                      FROM tb_instruksikerja
                      INNER JOIN tb_bagian ON tb_instruksikerja.id_Bagian = tb_bagian.id_Bagian");
                  while ($mesin = mysqli_fetch_array($query)) {
                      // Lakukan sesuatu dengan data yang diambil dari database
                  ?>
                  <tr>
                    <td><?php echo $mesin['id_InstruksiKerja'];?></td>
                    <td><?php echo $mesin['nm_Bagian'];?></td>
                    <td><?php echo $mesin['nm_InstruksiKerja'];?></td>
                    <td><?php echo $mesin['Standart'];?></td>
                    <td><?php echo $mesin['Metode'];?></td>
                    <td style="text-align:center;">
                        <input class="form-check-input" type="checkbox" <?php echo ($mesin['Mc_Run'] == '1') ? 'checked' : ''; ?>>
                    </td>
                    <td style="text-align:center;">
                        <input class="form-check-input" type="checkbox" <?php echo ($mesin['Ukur'] == '1') ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo $mesin['Tool'];?></td>
                    <td>
                        <a onclick="hapus_data(<?php echo $mesin['id_InstruksiKerja'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="index.php?page=edit-check&& id_InstruksiKerja=<?php echo $mesin['id_InstruksiKerja'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>


                  <tfoot>
                  <tr>
                  <th>Id</th>
                  <th>Item</th>
                  <th>Instruksi Kerja</th>
                  <th>Standart</th>
                  <th>Metode</th>
                  <th>Mc Run</th>
                  <th>Pengukuran</th>
                  <th>Tool</th>
                  <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Point Check</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- tambah bagian -->
            <form method="post" action="add/tambah_point_check.php">
            <div class="modal-body">
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Id">ID:</label>
                  <input type="text" class="form-control" id="Id" name="Id" required>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Bagian">Bagian:</label>
                  <input type="text" class="form-control" id="Bagian" name="Bagian" required>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Item">Instruksi Kerja:</label>
                  <input type="text" class="form-control" id="Item" name="Item" required>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Standart">Standart:</label>
                  <input type="text" class="form-control" id="Standart" name="Standart" required>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Metode">Metode:</label>
                  <input type="text" class="form-control" id="Metode" name="Metode" required>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="McRun">MC Run:</label>
                  <select class="form-control" id="McRun" name="McRun">
                      <option value="TRUE">TRUE</option>
                      <option value="FALSE">FALSE</option>
                  </select>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Tool">Tool:</label>
                  <input type="text" class="form-control" id="Tool" name="Tool" required>
                  </div>
                  </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="Pengukuran">Pengukuran:</label>
                  <select class="form-control" id="Pengukuran" name="Pengukuran">
                      <option value="TRUE">TRUE</option>
                      <option value="FALSE">FALSE</option>
                  </select>
                  </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>

          <!-- tambah intruksi kerja -->
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script>
function hapus_data(data_id){
  // alert('oke');
  // window.location=("delete/delete_mahasiswa.php?id="+data_id);
  Swal.fire({
    title: "Apakah Datanya akan Dihapus?",
    // showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: "Hapus Data",
    ConfirmButtonColor: "#CD5C5C",
    // denyButtonText: `Don't save`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      window.location=("delete/delete_point_check.php?CheckId="+data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  })
}
</script>
</body>
</html>