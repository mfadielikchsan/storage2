<?php
// Sambungkan ke database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nilai dari form
$checkId = $_POST['checkId'];
$bagian = $_POST['bagian'];
$item = $_POST['item'];
$standart = $_POST['standart'];
$metode = $_POST['metode'];
$mcRun = $_POST['mcRun'];
$tool = $_POST['tool'];
$pengukuran = $_POST['pengukuran'];

// Simpan nilai ke database
$sql = "INSERT INTO point_check (check_id, bagian, item, standart, metode, mc_run, tool, pengukuran)
        VALUES ('$checkId', '$bagian', '$item', '$standart', '$metode', '$mcRun', '$tool', '$pengukuran')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan ke database";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
