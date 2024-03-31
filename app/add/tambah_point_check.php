<?php 
include('../../conf/config.php');
// Ambil nilai dari form
$id_Bagian = $_POST['id_Bagian']; // Update this line to match the correct name attribute
$bagian = $_POST['nm_Bagian'];



$query = mysqli_query($conn_pm, "INSERT INTO tb_bagian (id_Bagian, nm_Bagian) VALUES ('$id_Bagian','$bagian')");
header('Location: ../index.php?page=data-instruksikerja');
?>