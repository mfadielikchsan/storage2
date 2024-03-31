<?php 
$id_Bagian = $_GET['id_Bagian'];
$query = mysqli_query($conn_pm, "SELECT * FROM tb_bagian  WHERE id_Bagian='$id_Bagian'");
$bagianedit = mysqli_fetch_array($query);
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
               <form method='post' action='update/update_bagiankerja.php' enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Check ID</label>
                                <input type="text" class="form-control" placeholder="Check ID" name="id_Bagian" value="<?php echo $bagianedit['id_Bagian'];?>" readonly>
                            </div>
                        </div>
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                            <label>Instruksi Kerja</label>
                            <input type="text" class="form-control" placeholder="Instruksi Kerja" name="nm_Bagian" value="<?php echo $bagianedit['nm_Bagian'];?>">
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