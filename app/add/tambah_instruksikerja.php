<?php
// Ambil nilai dari form
$id_Bagian = isset($_POST["id_Bagian"]) ? $_POST["id_Bagian"] : "";
$nm_InstruksiKerja = isset($_POST["nm_InstruksiKerja"]) ? $_POST["nm_InstruksiKerja"] : "";
$standart = isset($_POST['standart']) ? $_POST['standart'] : "";
$metode = isset($_POST['metode']) ? $_POST['metode'] : "";
$mcrun = isset($_POST['mcrun']) ? 1 : 0;
$pengukuran = isset($_POST['pengukuran']) ? 1 : 0;
$tool = isset($_POST['tool']) ? $_POST['tool'] : "";

include('../../conf/config.php');

// Periksa apakah id_Bagian tersedia
if(empty($id_Bagian)) {
    echo "Bagian tidak tersedia!";
    exit;
}

// Query untuk mendapatkan id_InstruksiKerja terbesar dari bagian yang dipilih
$sql = "SELECT MAX(id_InstruksiKerja) AS max_id FROM tb_instruksikerja WHERE id_Bagian = ?";
$stmt = $conn_pm->prepare($sql);
$stmt->bind_param("i", $id_Bagian);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$max_id = $row['max_id'];

// Jika belum ada ID di bagian ini, mulai dari 1
if ($max_id === null) {
    $next_id = 1;
} else {
    // Ekstrak nomor urutan dari ID terbesar dan tambahkan 1
    $max_id_number = (int)substr($max_id, 2); // Ambil nomor urutan dari karakter ke-3 hingga terakhir
    $next_id_number = $max_id_number + 1;
    // Format ID baru dengan dua digit pertama dari ID bagian dan lima digit selanjutnya dari nomor urutan
    $new_id = substr($id_Bagian, 0, 2) . sprintf("%04d", $next_id_number);
}
// Check if $new_id is not null before inserting into the database
if (!isset($new_id) || empty($new_id)) {
    // If $new_id is empty, set it to the starting number of id_Bagian followed by 00001
    $new_id = $id_Bagian . "0001";
}

// Debugging: Output $new_id to see what value it has
echo "New ID: " . $new_id . "<br>";


// Masukkan data baru ke tabel tb_instruksikerja
$sql_insert = "INSERT INTO tb_instruksikerja (id_InstruksiKerja, id_Bagian, nm_InstruksiKerja, Standart, Metode, Mc_Run, Ukur, Tool) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_insert = $conn_pm->prepare($sql_insert);
$stmt_insert->bind_param("ssssssss", $new_id, $id_Bagian, $nm_InstruksiKerja, $standart, $metode, $mcrun, $pengukuran, $tool);
$stmt_insert->execute();

// Tutup koneksi
$stmt->close();
$stmt_insert->close();
$conn_pm->close();

header('Location: ../index.php?page=data-instruksikerja');
?>