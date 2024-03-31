<?php 
$idInstruksiKerja = $_GET['id_InstruksiKerja'];
$query = mysqli_query($conn_pm, "SELECT * FROM tb_instruksikerja  WHERE id_InstruksiKerja='$idInstruksiKerja'");
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
                <form method='POST' action='update/update_point_check.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Check ID</label>
                        <input type="text" class="form-control" placeholder="Check ID" name="id_InstruksiKerja" value="<?php echo $view['id_InstruksiKerja'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
    <div class="form-group">
    <label>Bagian</label>
    <select id="nm_Bagian" class="form-control" name="nm_Bagian">

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
    <option value="1" <?php echo ($view['Mc_Run'] == 1) ? 'selected' : ''; ?>>TRUE</option>
    <option value="0" <?php echo ($view['Mc_Run'] == 0) ? 'selected' : ''; ?>>FALSE</option>
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
                            <select name="Ukur" class="form-control">
    <option value="1" <?php echo ($view['Ukur'] == 1) ? 'selected' : ''; ?>>TRUE</option>
    <option value="0" <?php echo ($view['Ukur'] == 0) ? 'selected' : ''; ?>>FALSE</option>
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