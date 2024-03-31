<?php 
$checkId = $_GET['CheckId'];
$query = mysqli_query($conn_pm,"SELECT * FROM tb_point_check  WHERE CheckId='$checkId'");
$view = mysqli_fetch_array($query);
?>
<!-- general form elements disabled -->
<section class="content">
    <div class="container-fluid">
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Check Point</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_point_check.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Check ID</label>
                        <input type="text" class="form-control" placeholder="Check ID" name="CheckId" value="<?php echo $view['CheckId'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Item</label>
                        <input type="text" class="form-control" placeholder="Item" name="Item" value="<?php echo $view['Item'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                            <label>Instruksi Kerja</label>
                            <input type="text" class="form-control" placeholder="Instruksi Kerja" name="instruksi_kerja" value="<?php echo $view['Item'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Standart</label>
                            <input type="text" class="form-control" placeholder="Standart" name="Standart" value="<?php echo $view['Standart'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Metode</label>
                        <input type="text" class="form-control" placeholder="Metode" name="Metode" value="<?php echo $view['Metode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mc Run</label>
                            <select name="McRun" class="form-control">
                                <option value="TRUE" <?php echo ($view['McRun'] == 'TRUE') ? 'selected' : ''; ?>>
                                    TRUE
                                </option>
                                <option value="FALSE" <?php echo ($view['McRun'] == 'FALSE') ? 'selected' : ''; ?>>
                                    FALSE
                                </option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Tool</label>
                        <input type="text" class="form-control" placeholder="Tool" name="Tool" value="<?php echo $view['Tool'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pengukuran</label>
                            <select name="Pengukuran" class="form-control">
                                <option value="TRUE" <?php echo ($view['Pengukuran'] == 'TRUE') ? 'selected' : ''; ?>>
                                    TRUE
                                </option>
                                <option value="FALSE" <?php echo ($view['Pengukuran'] == 'FALSE') ? 'selected' : ''; ?>>
                                    FALSE
                                </option>
                            </select>
                        </div>
                    </div>
                  </div>
                  
                  <div class="row">
                  <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</section>