<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css"> -->
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Bootstrap Color Picker -->
  <!-- <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <!-- <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css"> -->
  <!-- dropzonejs -->
  <!-- <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="card-body">
<div class="row">
                <div class="form-group">
                    <label>Item</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select Item" style="width: 100%;">
                        <?php
                        include('koneksi.php');

                        // SQL query to fetch data from tb_item
                        $sql = "SELECT * FROM tb_item";
                        $result = $conn->query($sql);

                        // Check if there are rows in the result
                        if ($result->num_rows > 0) {
                            // Fetch data and store it in an associative array
                            while ($row = $result->fetch_assoc()) {
                                echo '<option>' . htmlspecialchars($row['nm_Item']) . '</option>';
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the connection
                        $conn->close();
                        ?>
                    </select>
                </div>
    <div class="form-group">
  <label>Bagian</label>
  <select class="form-control select2" name="bagian" id="bagian" onchange="instruksikerja()">
    <option value="">Pilih Bagian...</option>
    <?php
      include('koneksi.php');

      $query = mysqli_query($conn,"SELECT * FROM tb_bagian");
      while($data = mysqli_fetch_array($query)){
    ?>
      <option value="<?php echo $data['id_Bagian'] ?>"><?php echo $data['nm_Bagian'] ?></option>

    <?php
      }
    ?>
  </select>
</div>

<div class="form-group">
  <label>Instruksi Kerja</label>
  <select class="form-control select2" name="instruksikerja" id="instruksikerja">
  </select>
</div>

<script>
  function instruksikerja(){
    var bagian = document.getElementById("bagian").value;
    $('#instruksikerja').load("dinstruksikerja.php?id_InstruksiKerja="+bagian+"");
  }
</script>

</div>
</div>
</div>


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<!-- <script src="../plugins/moment/moment.min.js"></script> -->
<!-- <script src="../plugins/inputmask/jquery.inputmask.min.js"></script> -->
<!-- date-range-picker -->
<!-- <script src="../plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap color picker -->
<!-- <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Bootstrap Switch -->
<!-- <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> -->
<!-- BS-Stepper -->
<!-- <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
<!-- dropzonejs -->
<!-- <script src="../plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../dist/js/demo.js"></script> -->


<!-- Page specific script -->
<script>
  // bagian
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  // item & kota
  // function instruksikerja(){
  //   var bagian = $('#bagian').val();
  //   $('#instruksikerja').load("dinstruksikerja.php?id_InstruksiKerja="+bagian+"");
  // }

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

 
</script>
</body>
</html>