<?php 
include('../../conf/config.php');
$id_form = $_POST['id_form'];
$nm_form = $_POST['nm_form'];

$query = mysqli_query($conn_pm, "UPDATE tb_form SET id_form='$id_form',nm_form='$nm_form'WHERE id_form='$id_form'");
header('Location: ../index.php?page=data-form');

?>