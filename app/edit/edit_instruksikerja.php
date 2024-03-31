<?php 
$id_InstruksiKerja = $_GET['id_InstruksiKerja'];
$query = mysqli_query($conn_pm, "SELECT * FROM tb_instruksikerja  WHERE id_InstruksiKerja='$id_InstruksiKerja'");
$view = mysqli_fetch_array($query);
?>
<!-- general form elements disabled -->
<section class="content">
    <div class="container-fluid">
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Instruksi Kerja</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form method='post' action='update/update_instruksikerja.php' enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Check ID</label>
                                <input type="text" class="form-control" placeholder="Check ID" name="id_InstruksiKerja" value="<?php echo $view['id_InstruksiKerja'];?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Bagian</label>
                                <select class="form-control" name="nm_Bagian" readonly>
                                    <?php 
                                    $sql_bagian = "SELECT id_Bagian, nm_Bagian FROM tb_bagian";
                                    $result_bagian = $conn_pm->query($sql_bagian);
                                    if ($result_bagian->num_rows > 0) {
                                        while($row_bagian = $result_bagian->fetch_assoc()) {
                                            $selected = ($row_bagian['id_Bagian'] == $view['id_Bagian']) ? 'selected' : '';
                                            echo "<option value='" . $row_bagian['id_Bagian'] . "' $selected>" . $row_bagian['nm_Bagian'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                           </div>
                        </div>
                     </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                            <label>Instruksi Kerja</label>
                            <input type="text" class="form-control" placeholder="Instruksi Kerja" name="nm_InstruksiKerja" value="<?php echo $view['nm_InstruksiKerja'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Standart</label>
                            <input type="text" class="form-control" placeholder="Standart" name="standart" value="<?php echo $view['Standart'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Metode</label>
                        <input type="text" class="form-control" placeholder="Metode" name="metode" value="<?php echo $view['Metode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kondisi Mesin Menyala</label>
                            <div class="select2-blue">
                            <input type="checkbox" name="mcrun" class="form-control-sm" data-bootstrap-switch data-off-color="danger" value="1" <?php echo ($view['Mc_Run'] == 1) ? 'checked' : '';  ?>>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Tool</label>
                        <input type="text" class="form-control" placeholder="Tool" id="tool" name="tool" value="<?php echo $view['Tool'];?>"<?php echo ($view['Ukur'] == 1) ? '' : 'disabled'; ?>>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pengukuran</label>
                            <div class="select2-blue">
                            <input type="checkbox" id="pengukuran" name="pengukuran" class="form-control-sm" data-bootstrap-switch data-off-color="danger" value="1" <?php echo ($view['Ukur'] == 1) ? 'checked' : '';  ?>>
                            </div>
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

<script>
        document.getElementById('pengukuran').addEventListener('change', function() {
            var toolField = document.getElementById('tool');
            toolField.disabled = !this.checked;
            if (!this.checked) {
                toolField.value = '';
            }
        });
    </script>