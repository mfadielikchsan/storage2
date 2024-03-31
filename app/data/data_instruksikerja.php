<?php
// Misalnya, $dataFromDatabase adalah array yang berisi data dari database
$dataFromDatabase = array(
    'McRun' => 1,  
    'Ukur' => 0    
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Point Check | Preventive Maintenance</title>
</head>
<body>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <dv class="col-12">
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
            <th>Bagian</th>
            <th>Instruksi Kerja</th>
            <th>Standart</th>
            <th>Metode</th>
            <th>Mc Run</th>
            <th>Ukur</th>
            <th>Tool</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($conn_pm, "SELECT tb_instruksikerja.*, tb_bagian.nm_Bagian 
                                  FROM tb_instruksikerja 
                                  INNER JOIN tb_bagian ON tb_instruksikerja.id_Bagian = tb_bagian.id_Bagian");
while ($mesin = mysqli_fetch_array($query)) {
    // Lakukan sesuatu dengan data yang diambil dari database

            ?>
            <tr>
                <td><?php echo $mesin['id_InstruksiKerja']; ?></td>
                <td><?php echo $mesin['nm_Bagian']; ?></td>
                <td><?php echo $mesin['nm_InstruksiKerja']; ?></td>
                <td><?php echo $mesin['Standart']; ?></td>
                <td><?php echo $mesin['Metode']; ?></td>
                <td><?php echo ($mesin['Mc_Run'] == '1') ? 'ON' : 'OFF'; ?>
                </td>
                <td>
                  <?php echo ($mesin['Ukur'] == '1') ? 'Used' : 'Not Used'; ?>
                </td>
                <td><?php echo $mesin['Tool']; ?></td>
                <td>
                    <a onclick="hapus_data(<?php echo $mesin['id_InstruksiKerja']; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="index.php?page=edit-instruksikerja&& id_InstruksiKerja=<?php echo $mesin['id_InstruksiKerja']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Bagian</th>
            <th>Instruksi Kerja</th>
            <th>Standart</th>
            <th>Metode</th>
            <th>Mc Run</th>
            <th>Ukur</th>
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
            <form method="post" action="add/tambah_instruksikerja.php">
            <div class="modal-body">
                <div class="form-row">
                  <div class="col mb-2">
                  <div class="input-group">
                    <!-- Input id_Bagian -->
                    <input type="hidden" name="id_InstruksiKerja" value="<?php echo $row['id_InstruksiKerja']; ?>">
                  </div>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="nm_Bagian" class="form-label">Bagian</label>
                  <select class="select2 form-control" id="id_Bagian" name="id_Bagian" onchange="updateIdBagian()">
                    <option value="">Pilih Bagian</option>
                      <?php 
                      $hasil = $conn_pm->query("SELECT id_Bagian, nm_Bagian FROM tb_bagian");

                      // Tampilkan data sebagai dropdown options
                      while ($row1 = $hasil->fetch_assoc()) {
                          echo "<option value='" . $row1['id_Bagian'] . "'>" . $row1['nm_Bagian'] . "</option>";
                      }
                      ?>
                  </select>
                  </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="nm_InstruksiKerja">Instruksi Kerja:</label>
                        <input type="text" class="form-control" id="nm_InstruksiKerja" name="nm_InstruksiKerja" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="Standart">Standart:</label>
                        <input type="text" class="form-control" id="standart" name="standart" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="Metode">Metode:</label>
                        <input type="text" class="form-control" id="metode" name="metode" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="McRun">MC Run:</label>
                        <div class="select2-blue">
                        <input type="checkbox" name="mcrun" id="mcrun" class="form-control-sm"  data-bootstrap-switch data-off-color="danger" value="1">
                        </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="Ukur">Ukur:</label>
                        <div class="select2-blue">
                        <input type="checkbox" name="pengukuran" id="pengukuran" class="form-control-sm"value="1">
                        </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="Tool">Tool:</label>
                       <input type="text" name="tool" id="tool" class="form-control form-control-sm" disabled>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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
      window.location=("delete/delete_instruksikerja.php?id_InstruksiKerja="+data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  })
}
</script>
</body>
<script>
  function updateIdBagian() {
    let nmBagian = document.getElementById('nm_Bagian');
    let idBagian = document.getElementById('id_Bagian');
    idBagian.value = nmBagian.value;
  }
</script>

<script>
  document.getElementById('nm_Bagian').addEventListener('change', function() {
    document.getElementById('id_Bagian').value = this.value;
  });
</script>


</html>