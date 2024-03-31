<?php
include('koneksi.php');

// Fetch bagian options
$bagianQuery = mysqli_query($conn, "SELECT * FROM tb_bagian");
$bagianOptions = '<option value="">Pilih Bagian...</option>';
while ($bagianData = mysqli_fetch_array($bagianQuery)) {
    $bagianOptions .= '<option value="' . $bagianData['id_Bagian'] . '">' . $bagianData['nm_Bagian'] . '</option>';
}

// Fetch instruksikerja options
$instruksikerjaQuery = mysqli_query($conn, "SELECT * FROM tb_instruksikerja");
$instruksikerjaOptions = '<option value="">Pilih Instruksi Kerja...</option>';
while ($instruksikerjaData = mysqli_fetch_array($instruksikerjaQuery)) {
    $instruksikerjaOptions .= '<option value="' . $instruksikerjaData['id_InstruksiKerja'] . '">' . $instruksikerjaData['nm_InstruksiKerja'] . '</option>';
}

// Use a unique delimiter to separate the options
echo $bagianOptions . '|||' . $instruksikerjaOptions;
?>
