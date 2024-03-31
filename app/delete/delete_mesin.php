<?php 
include('../../conf/config.php');
$id = $_GET['id'];

$query = mysqli_query($conn_pm, "DELETE FROM mesin WHERE id='$id'");
header('Location: ../index.php?page=data-mesin');

?>