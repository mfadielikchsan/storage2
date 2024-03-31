<?php 
include('../../conf/config.php');

$id_Bagian = $_POST['id_Bagian'];
$nm_Bagian = $_POST['nm_Bagian'];

$query = mysqli_query($conn_pm, "UPDATE tb_bagian SET
                nm_Bagian = '$nm_Bagian' 
                WHERE id_Bagian = '$id_Bagian'");

header('Location: ../index.php?page=data-bagiankerja');
?>