<?php 
$id    = $_GET['id'];
$query = mysqli_query($conn_pm,"SELECT * FROM mesin WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>
<!-- general form elements disabled -->
<section class="content">
    <div class="container-fluid">
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Mesin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_mesin.php' enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Produksi</label>
                        <select class="custom-select" id="inputGroupSelect01" name="prod">
                            <option value="<?php echo $view['prod'];?>" selected><?php echo $view['prod'];?></option>
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
                        <label>Line</label>
                        <input type="text" class="form-control" placeholder="Line" name="linename" value="<?php echo $view['linename'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode Line</label>
                        <input type="text" class="form-control" placeholder="Kode Line" name="linecode" value="<?php echo $view['linecode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomor Mesin</label>
                        <input type="text" class="form-control" placeholder="Nomor Mesin" name="mcno" value="<?php echo $view['mcno'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Line</label>
                        <select class="custom-select" id="inputGroupSelect01" name="lineno">
                            <option value="<?php echo $view['lineno'];?>" selected><?php echo $view['lineno'];?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Fix Set New</label>
                        <input type="text" class="form-control" placeholder="Fix Set New" name="fixedassetnew" value="<?php echo $view['fixedassetnew'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Serial</label>
                        <input type="text" class="form-control" placeholder="Nomor Serial" name="serialno" value="<?php echo $view['serialno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Mesin</label>
                        <input type="text" class="form-control" placeholder="Nama Mesin" name="machine" value="<?php echo $view['machine'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mesin</label>
                        <input type="text" class="form-control" placeholder="Mesin" name="machinegroup" value="<?php echo $view['machinegroup'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" placeholder="Lokasi" name="location" value="<?php echo $view['location'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Negara</label>
                        <input type="text" class="form-control" placeholder="Negara" name="country" value="<?php echo $view['country'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" placeholder="Tahun" name="year" value="<?php echo $view['year'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $view['status'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plant</label>
                        <input type="text" class="form-control" placeholder="Plant" name="plant" value="<?php echo $view['plant'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ins User</label>
                        <input type="text" class="form-control" placeholder="Ins User" name="ins_usr" value="<?php echo $view['ins_usr'];?>">
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
                 <!--  <div class="col-sm-6">
                      <label class="form-label" for="customFile">Upload Foto</label>
                      <input type="file" name="foto" class="form-control" id="customFile" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <img src="foto/<?php echo $view['foto'];?>" width="200px" class="rounded float-right">
                    </div>
                  </div> -->