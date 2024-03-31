<?php
include('../../conf/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nomor terakhir dari kolom id_Bagian
    $query_last_id = mysqli_query($conn_pm, "SELECT MAX(id_Bagian) AS max_id FROM tb_bagian");
    $row_last_id = mysqli_fetch_assoc($query_last_id);
    $max_id = $row_last_id['max_id'];

    // Menambahkan 1 ke nomor terakhir untuk mendapatkan nomor selanjutnya
    $next_id = $max_id + 1;

    // Mengambil nilai dari input nama bagian
    $nm_Bagian = $_POST["nm_Bagian"];

    // Menyimpan data baru ke dalam tabel tb_bagian
    $query_insert = "INSERT INTO tb_bagian (id_Bagian, nm_Bagian) VALUES ('$next_id', '$nm_Bagian')";

    if (mysqli_query($conn_pm, $query_insert)) {
        // Jika insert berhasil, redirect ke halaman yang ditentukan
        header('Location: ../index.php?page=data-bagiankerja');
        exit;
    } else {
        // Jika terjadi kesalahan saat menjalankan query
        echo "Error: " . $query_insert . "<br>" . mysqli_error($conn_pm);
    }
}
?>
