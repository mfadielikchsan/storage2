<?php 
include('../../conf/config.php');
$id_Bagian = $_GET['id_Bagian'];

$query = mysqli_query($conn_pm, "DELETE FROM tb_bagian WHERE id_Bagian='$id_Bagian'");
header('Location: ../index.php?page=data-bagian');


?>