<?php 
include('../../conf/config.php');

$id_Item = $_POST['id_Item'];
$nm_Item = $_POST['nm_Item'];

$query = mysqli_query($conn_pm, "UPDATE tb_item SET
                nm_Item = '$nm_Item' 
                WHERE id_Item = '$id_Item'");

header('Location: ../index.php?page=data-itemkerja');
?>