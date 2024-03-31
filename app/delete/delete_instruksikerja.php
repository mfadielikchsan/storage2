<?php 
include('../../conf/config.php');
$idInstruksiKerja = $_GET['id_InstruksiKerja'];

$query = mysqli_query($conn_pm, "DELETE FROM tb_instruksikerja WHERE id_InstruksiKerja='$idInstruksiKerja'");
header('Location: ../index.php?page=data-instruksikerja');


?>