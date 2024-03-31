
<?php
$id_form = $_GET['id_form'];
$query = mysqli_query($conn_pm, "SELECT * FROM tb_form WHERE id_form='$id_form'");
$view = mysqli_fetch_array($query);

// Tampilkan formulir untuk mengedit instruksi
?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title"><h2>CODE FORM</h2></div>
                    </div>
                    <div class="card-body">
                        <form action="edit_form_process.php" method="post">
                            <input type="hidden" name="form_id" value="<?php echo $row['id_form']; ?>">
                            <div class="col">
                                <div class="form-group">
                                <label for="codeform">Code FORM</label>
                                    <div class="select2-blue">
                                        <div class="select2-blue">
                                        <input type="text" name="form_nm" id="form_nm" class="form-control form-control-sm" value="<?php echo $row['nm_form']; ?>">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan Perubahan">
                        </form>

    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script>
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
</script> -->