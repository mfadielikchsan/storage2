<?php
// Koneksi ke database
include('koneksi.php');

// Query untuk mendapatkan data Nomor Mesin
$query = mysqli_query($conn, "SELECT mcno FROM mesin");

// Mengumpulkan hasil query ke dalam array
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Menutup koneksi ke database
mysqli_close($conn);
?>
