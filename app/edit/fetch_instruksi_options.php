<?php
// Include the database configuration
include('../../conf/config.php');

// Get the selected Bagian ID from the request
$id_bagian = isset($_GET['id_bagian']) ? $_GET['id_bagian'] : '';

// Fetch Instruksi Kerja options based on the selected Bagian
$query = mysqli_query($conn, "SELECT * FROM tb_instruksikerja WHERE id_Bagian = '$id_bagian'");

// Output the options
while ($data = mysqli_fetch_assoc($query)) {
    echo '<option value="' . $data['id_InstruksiKerja'] . '">' . $data['nm_InstruksiKerja'] . '</option>';
}
?>
