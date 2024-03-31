<?php
 include('../../conf/config.php');

  $id = $_GET['id_InstruksiKerja'];
  $query = mysqli_query($conn,"SELECT * FROM tb_instruksikerja WHERE id_Bagian = '$id'");

  while($data = mysqli_fetch_assoc($query)){
?>
  <option value="<?php echo $data['id_InstruksiKerja'] ?>"><?php echo $data['nm_InstruksiKerja'] ?></option>

<?php
  }
?>
