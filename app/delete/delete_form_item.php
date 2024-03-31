<?php 
include('../../conf/config.php');
$id_form_item = $_GET['id_form_item'];

$query = mysqli_query($conn_pm, "DELETE FROM tb_form_item WHERE id_form_item='$id_form_item'");
header('Location: ../index.php?page=edit-pengecekan');


?>