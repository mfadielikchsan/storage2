<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mesin | Preventive Maintenance</title>
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
                <h3 class="card-title">Tabel List Mesin PT Kayaba Indonesia</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i>
                  Tambah Mesin
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Produksi</th>
                    <th>Line</th>
                    <th>Nomor Mesin</th>
                    <th>Nama Mesin</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 0;
                    $query = mysqli_query($conn_pm, "SELECT * FROM mesin");
                    while($mesin = mysqli_fetch_array($query)){
                      $id++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $id;?></td>
                    <td><?php echo $mesin['prod'];?></td>
                    <td><?php echo $mesin['linename'];?></td>
                    <td><?php echo $mesin['mcno'];?></td>
                    <td><?php echo $mesin['machine'];?></td>
                    <td>
                      <a onclick="hapus_data(<?php echo $mesin['id'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                      <a href="index.php?page=edit-mesin&& id=<?php echo $mesin['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Produksi</th>
                    <th>Line</th>
                    <th>Nomor Mesin</th>
                    <th>Nama Mesin</th>
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
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Mesin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="add/tambah_mesin.php">
            <div class="modal-body">
                <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Subline</label>
                    <input type="text" class="form-control" placeholder="Sub Line" name="subline" required>
                  </div>
                  <div class="col mb-3">
                  <label for="item">Produksi</label>
                  <select class="custom-select" id="inputGroupSelect01" name="prod">
                      <option selected>Produksi ke..</option>
                      <option value="PROD1">PROD1</option>
                      <option value="PROD2">PROD2</option>
                      <option value="PROD3">PROD3</option>
                      <option value="PROD4">PROD4</option>
                      <option value="PROD5">PROD5</option>
                  </select>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Line Name</label>
                    <input type="text" class="form-control" placeholder="Line" name="linename" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Kode Line</label>
                    <input type="text" class="form-control" placeholder="Kode Line" name="linecode" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Nomor Mesin</label>
                    <input type="text" class="form-control" placeholder="Nomor Mesin" name="mcno" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Nomor Line</label>
                    <select class="custom-select" id="inputGroupSelect01" name="lineno">
                      <option selected>Nomor Line</option>
                      <option value="1">0</option>
                      <option value="2">1</option>
                      <option value="3">2</option>
                      <option value="4">3</option>
                      <option value="5">4</option>
                      <option value="6">5</option>
                      <option value="7">6</option>
                      <option value="8">7</option>
                      <option value="9">8</option>
                      <option value="10">9</option>
                      <option value="11">10</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Nama Mesin</label>
                    <input type="text" class="form-control" placeholder="Nama Mesin" name="machine" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Maker</label>
                    <input type="text" class="form-control" placeholder="Maker" name="maker" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Fix Asset</label>
                    <input type="text" class="form-control" placeholder="Fix ASet" name="fixedasset" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Fix Asset New</label>
                    <input type="text" class="form-control" placeholder="Fix ASet New" name="fixedassetnew" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Nomor Mesin</label>
                    <input type="text" class="form-control" placeholder="No Mesin" name="machno" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Old Mesin</label>
                    <input type="text" class="form-control" placeholder="Old Mesin" name="old_mc_no" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Catatan</label>
                    <input type="text" class="form-control" placeholder="Catatan" name="catatan" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Mesin</label>
                    <input type="text" class="form-control" placeholder="Mesin" name="machinegroup" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Lokasi</label>
                    <input type="text" class="form-control" placeholder="Lokasi" name="location" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Dasar Mesin</label>
                    <input type="text" class="form-control" placeholder="Dasar Mesin" name="machinebase" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Kode Pending</label>
                    <input type="text" class="form-control" placeholder="Kode Pending" name="pendingcode" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Tipe</label>
                    <input type="text" class="form-control" placeholder="Tipe" name="type" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Nomor Serial</label>
                    <input type="text" class="form-control" placeholder="Nomor Serial" name="serialno" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Negara</label>
                    <input type="text" class="form-control" placeholder="Negara" name="country" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Proses</label>
                    <input type="text" class="form-control" placeholder="Proses" name="process" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Tahun</label>
                    <input type="text" class="form-control" placeholder="Tahun" name="year" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Status</label>
                    <input type="text" class="form-control" placeholder="Status" name="status" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Keterangan</label>
                    <input type="text" class="form-control" placeholder="keterangan" name="keterangan" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                  <label for="item">Nomor Urut</label>
                    <input type="text" class="form-control" placeholder="nourut" name="nourut" required>
                  </div>
                  <div class="col mb-3">
                  <label for="item">Planning</label>
                    <input type="text" class="form-control" placeholder="Plant" name="plant" required>
                  </div>
                  <div class="col mb-3">
                    <label for="item">Ins User</label>
                    <input type="text" class="form-control" placeholder="ins_usr" name="ins_usr" required>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col mb-3">
                    <label for="item">Kode Line 2</label>
                    <input type="text" class="form-control" placeholder="linecode2" name="linecode2" required>
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
      window.location=("delete/delete_mesin.php?id="+data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  })
}
</script>
</body>
</html>