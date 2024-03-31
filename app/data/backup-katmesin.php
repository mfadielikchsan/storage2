
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kategori Mesin | Preventive Maintenance</title>
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
                <h3 class="card-title">Tabel List Kategori Mesin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i> Tambah Kategori Mesin
                </button> -->
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Line</th>
                    <th>Nomor Mesin</th>
                    <th>Mesin</th>
                    <th>Kategori</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 0;
                    $query = mysqli_query($conn_mesin, "SELECT * FROM mesin");
                    while ($mesin = mysqli_fetch_array($query)) {
                        $id++;
                    $kategori_query = mysqli_query($conn_pm, "SELECT * FROM kat_mesin WHERE id = {$mesin['id']}");
                    $kategori = mysqli_fetch_array($kategori_query);
                    if ($kategori !== null) {
                    } else {
                    }
                    ?>
                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $mesin['linename'];?></td>
                    <td><?php echo $mesin['mcno'];?></td>
                    <td><?php echo $mesin['machine'];?></td>
                    <?php 
                    ?>
                    <td>
                      <?php 
                      if ($kategori !== null) {
                          echo $kategori['kategori_mesin'];
                      } else {
                          echo "N"; // You can customize this message
                      }
                      ?>
                  </td>
                    <td>
                      <a onclick="hapus_data(<?php echo $mesin['id'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      <a href="#" data-toggle="modal" data-target="#modal-xl" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Line</th>
                    <th>Nomor Mesin</th>
                    <th>Mesin</th>
                    <th>Kategori</th>
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

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Kategori Mesin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $mesin['id']; ?>">
                  <div class="row">
                  <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Produksi</label>
                        <select class="custom-select" id="inputGroupSelect01" name="prod">
                            <option value="<?php echo $mesin['prod'];?>" selected><?php echo $mesin['prod'];?></option>
                            <option value="1">PROD1</option>
                            <option value="2">PROD2</option>
                            <option value="3">PROD3</option>
                            <option value="4">PROD4</option>
                            <option value="5">PROD5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Subline</label>
                        <input type="text" class="form-control" placeholder="Sub line" name="subline" value="<?php echo $mesin['subline'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Line</label>
                        <input type="text" class="form-control" placeholder="Line" name="linename" value="<?php echo $mesin['linename'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode Line</label>
                        <input type="text" class="form-control" placeholder="Kode Line" name="linecode" value="<?php echo $mesin['linecode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nomor Mesin</label>
                        <input type="text" class="form-control" placeholder="Nomor Mesin" name="mcno" value="<?php echo $mesin['mcno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Mesin Ke</label>
                        <input type="text" class="form-control" placeholder="Mesin Ke" name="machno" value="<?php echo $mesin['machno'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Line</label>
                        <select class="custom-select" id="inputGroupSelect01" name="lineno">
                            <option value="<?php echo $mesin['lineno'];?>" selected><?php echo $mesin['lineno'];?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">6</option>
                            <option value="8">7</option>
                            <option value="9">8</option>
                            <option value="10">9</option>
                            <option value="11">10</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Fix Set New</label>
                        <input type="text" class="form-control" placeholder="Fix Set New" name="fixedassetnew" value="<?php echo $mesin['fixedassetnew'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Fix Asset</label>
                        <input type="text" class="form-control" placeholder="Fix Asset" name="fixedasset" value="<?php echo $mesin['fixedasset'];?>">
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Old Mesin</label>
                        <input type="text" class="form-control" placeholder="Old Mesin" name="old_mc_no" value="<?php echo $mesin['old_mc_no'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Serial</label>
                        <input type="text" class="form-control" placeholder="Nomor Serial" name="serialno" value="<?php echo $mesin['serialno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nama Mesin</label>
                        <input type="text" class="form-control" placeholder="Nama Mesin" name="machine" value="<?php echo $mesin['machine'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Maker</label>
                        <input type="text" class="form-control" placeholder="Maker" name="maker" value="<?php echo $mesin['maker'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mesin</label>
                        <input type="text" class="form-control" placeholder="Mesin" name="machinegroup" value="<?php echo $mesin['machinegroup'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" placeholder="Lokasi" name="location" value="<?php echo $mesin['location'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Negara</label>
                        <input type="text" class="form-control" placeholder="Negara" name="country" value="<?php echo $mesin['country'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" placeholder="Tahun" name="year" value="<?php echo $mesin['year'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $mesin['status'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" class="form-control" placeholder="Catatan" name="catatan" value="<?php echo $mesin['catatan'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Plant</label>
                        <input type="text" class="form-control" placeholder="Plant" name="plant" value="<?php echo $mesin['plant'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Dasar Mesin</label>
                        <input type="text" class="form-control" placeholder="Dasar Mesin" name="machinebase" value="<?php echo $mesin['machinebase'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ins User</label>
                        <input type="text" class="form-control" placeholder="Ins User" name="ins_usr" value="<?php echo $mesin['ins_usr'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kode Pending</label>
                        <input type="text" class="form-control" placeholder="Kode Pending" name="pendingcode" value="<?php echo $mesin['pendingcode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" placeholder="Tipe" name="type" value="<?php echo $mesin['type'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Proses</label>
                        <input type="text" class="form-control" placeholder="Proses" name="process" value="<?php echo $mesin['process'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="<?php echo $mesin['keterangan'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nomor Urut</label>
                        <input type="text" class="form-control" placeholder="Nomor Urut" name="nourut" value="<?php echo $mesin['nourut'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Line Code 2</label>
                        <input type="text" class="form-control" placeholder="Line Code 2" name="linecode2" value="<?php echo $mesin['linecode2'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kode Pending</label>
                        <input type="text" class="form-control" placeholder="Kode Pending" name="pendingcode" value="<?php echo $mesin['pendingcode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" placeholder="kategori" name="kategori_mesin" value="<?php echo isset($mesin['kategori_mesin']) ? $mesin['kategori_mesin'] : ''; ?>">
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