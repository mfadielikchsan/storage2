<?php

include 'koneksi.php';

// Check if the ID parameter is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve machine data based on the ID from 'mesin' table
    $query = mysqli_query($conn_mesin, "SELECT * FROM mesin WHERE mesin.id = $id");
    $mesin = mysqli_fetch_assoc($query);

    // Retrieve data from 'kat_mesin' table based on the same ID
    $query2 = mysqli_query($conn_pm, "SELECT * FROM kat_mesin WHERE kat_mesin.id = $id");
    $katMesin = mysqli_fetch_assoc($query2);

    // Combine the results if needed
    // For example, you can create an array to hold both results
    $resultArray = array('mesin' => $mesin, 'kat_mesin' => $katMesin);
} else {
    // Redirect to the index page if no ID is provided
    header("Location: index.php");
    exit();
}
?>

<section class="content">
    <div class="container-fluid">
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Mesin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="edit_process.php?id=<?php echo $mesin['id']; ?>" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-sm-6">
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
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Subline</label>
                        <input type="text" class="form-control" placeholder="Sub line" name="subline" value="<?php echo $mesin['subline'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Line</label>
                        <input type="text" class="form-control" placeholder="Line" name="linename" value="<?php echo $mesin['linename'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode Line</label>
                        <input type="text" class="form-control" placeholder="Kode Line" name="linecode" value="<?php echo $mesin['linecode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomor Mesin</label>
                        <input type="number" class="form-control" placeholder="Nomor Mesin" name="mcno" value="<?php echo $mesin['mcno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Mesin Ke</label>
                        <input type="text" class="form-control" placeholder="Mesin Ke" name="machno" value="<?php echo $mesin['machno'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Fix Set New</label>
                        <input type="text" class="form-control" placeholder="Fix Set New" name="fixedassetnew" value="<?php echo $mesin['fixedassetnew'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Fix Asset</label>
                        <input type="text" class="form-control" placeholder="Fix Asset" name="fixedasset" value="<?php echo $mesin['fixedasset'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Old Mesin</label>
                        <input type="text" class="form-control" placeholder="Old Mesin" name="old_mc_no" value="<?php echo $mesin['old_mc_no'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Serial</label>
                        <input type="text" class="form-control" placeholder="Nomor Serial" name="serialno" value="<?php echo $mesin['serialno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Mesin</label>
                        <input type="text" class="form-control" placeholder="Nama Mesin" name="machine" value="<?php echo $mesin['machine'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Maker</label>
                        <input type="text" class="form-control" placeholder="Maker" name="maker" value="<?php echo $mesin['maker'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mesin</label>
                        <input type="text" class="form-control" placeholder="Mesin" name="machinegroup" value="<?php echo $mesin['machinegroup'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" placeholder="Lokasi" name="location" value="<?php echo $mesin['location'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Negara</label>
                        <input type="text" class="form-control" placeholder="Negara" name="country" value="<?php echo $mesin['country'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" class="form-control" placeholder="Tahun" name="year" value="<?php echo $mesin['year'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $mesin['status'];?>">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" class="form-control" placeholder="Catatan" name="catatan" value="<?php echo $mesin['catatan'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plant</label>
                        <input type="text" class="form-control" placeholder="Plant" name="plant" value="<?php echo $mesin['plant'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Dasar Mesin</label>
                        <input type="text" class="form-control" placeholder="Dasar Mesin" name="machinebase" value="<?php echo $mesin['machinebase'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ins User</label>
                        <input type="text" class="form-control" placeholder="Ins User" name="ins_usr" value="<?php echo $mesin['ins_usr'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" placeholder="Tipe" name="type" value="<?php echo $mesin['type'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Proses</label>
                        <input type="text" class="form-control" placeholder="Proses" name="process" value="<?php echo $mesin['process'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="<?php echo $mesin['keterangan'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomor Urut</label>
                        <input type="text" class="form-control" placeholder="Nomor Urut" name="nourut" value="<?php echo $mesin['nourut'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Line Code 2</label>
                        <input type="text" class="form-control" placeholder="Line Code 2" name="linecode2" value="<?php echo $mesin['linecode2'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kode Pending</label>
                        <input type="text" class="form-control" placeholder="Kode Pending" name="pendingcode" value="<?php echo $mesin['pendingcode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" placeholder="kategori" name="kategori_mesin" value="<?php echo $katMesin['kategori_mesin']; ?>">
                        </div>
                    </div>
                </div>

                  </div>
                    <!--  -->
                  <div class="row">
                  <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</section>
