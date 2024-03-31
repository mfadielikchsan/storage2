
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
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel List Tipe Mesin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i>
                  Tambah Tipe Mesin
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>ID Form</th>
                  <th>Tipe Mesin</th>
                  <th>Kategori Mesin</th>
                  <th>Nomor Mesin</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query = mysqli_query($conn_pm, "SELECT * FROM tb_form_mesin");
                    while($mesin = mysqli_fetch_array($query)){
                    ?>
                  <tr>
                    <td><?php echo !empty($mesin['id_form']) ? $mesin['id_form'] : '';?></td>
                    <td><?php echo !empty($mesin['id_tm']) ? $mesin['id_tm'] : '';?></td>
                    <td><?php echo !empty($mesin['kat_mesin']) ? $mesin['kat_mesin'] : '';?></td>
                    <td><?php echo !empty($mesin['mcno']) ? $mesin['mcno'] : '';?></td>
                    <td>
                        <a onclick="hapus_data(<?php echo $mesin['id_tm'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="index.php?page=edit-check&& id_tm=<?php echo $mesin['id_tm'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                  <th>ID Form</th>
                  <th>Tipe Mesin</th>
                  <th>Kategori Mesin</th>
                  <th>Nomor Mesin</th>
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
            <form method="post" action="add/tambah_tp_mesin.php">
            <div class="modal-body">
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="id_form">ID Preventive:</label>
                <!-- Input id_form -->
                <input type="text" class="form-control" id="id_form" name="id_form" value="" readonly>


                  </div>
                </div>
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="inputTipeMesin">Tipe Mesin</label>
                  <select name="id_tm" class="form-control" id="id_tm">
    <?php
    $query = "SELECT id_tm, nm_tm FROM tb_tpmesin";
    $resulttm = $conn_pm->query($query);

    while ($row = $resulttm->fetch_assoc()) {
        echo "<option value='" . $row['id_tm'] . "'>" . $row['nm_tm'] . "</option>";
    }
    ?>
</select>

                  </div>
                </div>
                
                <div class="form-row">
                  <div class="col mb-2">
                  <label for="inputKategoriMesin" >Kategori Mesin</label>
                            <select name="kat_mesin" class="form-control" style="width: 100%;" id="kat_mesin">
                            <option value="" selected="selected">Pilih...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            </select>
                  </div>
                  </div>

                <div class="form-group">
                  <label for="mcno" class="form-label">Nomor Mesin</label>
                  <div id="show_item">
                      <div class="row">
                        <div class="col-md-9 mb-3">
                          <select name="product_name[]" class="form-control" required id="inputNomorMesin">
                            <option value="">Pilih Mesin</option>
                              <?php 
                              $hasil = $conn_pm->query("SELECT mcno FROM mesin");

                              // Tampilkan data sebagai dropdown options
                              while ($row1 = $hasil->fetch_assoc()) {
                                echo "<option value='{$row1['mcno']}'>{$row1['mcno']}</option>";
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
      window.location=("delete/delete_point_check.php?id_InstruksiKerja="+data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  })
}
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js'></script>
<script>
            function hapus_item(element) {
                $(element).closest('.row').remove();
            }
        </script>
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
                                    $hasil = $conn_pm->query("SELECT mcno FROM mesin");
                                    while ($row1 = $hasil->fetch_assoc()) {
                                        echo "<option value='{$row1['mcno']}'>{$row1['mcno']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2 d-grid">
                                <button class="btn btn-danger remove_item_btn" onclick="hapus_item(this)"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    `);
                    $(".select2").select2(); // Inisialisasi Select2 pada dropdown baru
                });
            });
        </script>
</body>


</html>