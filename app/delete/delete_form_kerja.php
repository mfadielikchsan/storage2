<?php 
include('../../conf/config.php');
$id_form = $_GET['id_form'];

$query = mysqli_query($conn_pm, "DELETE FROM tb_form WHERE id_form='$id_form'");
header('Location: ../index.php?page=data-form');


?>