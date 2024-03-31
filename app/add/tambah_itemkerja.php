<?php
include('../../conf/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nomor terakhir dari kolom id_Item
    $query_last_id = mysqli_query($conn_pm, "SELECT MAX(id_Item) AS max_id FROM tb_Item");
    $row_last_id = mysqli_fetch_assoc($query_last_id);
    $max_id = $row_last_id['max_id'];

    // Menambahkan 1 ke nomor terakhir untuk mendapatkan nomor selanjutnya
    $next_id = $max_id + 1;

    // Mengambil nilai dari input nama Item
    $nm_Item = $_POST["nm_Item"];

    // Menyimpan data baru ke dalam tabel tb_Item
    $query_insert = "INSERT INTO tb_Item (id_Item, nm_Item) VALUES ('$next_id', '$nm_Item')";

    if (mysqli_query($conn_pm, $query_insert)) {
        // Jika insert berhasil, redirect ke halaman yang ditentukan
        header('Location: ../index.php?page=data-itemkerja');
        exit;
    } else {
        // Jika terjadi kesalahan saat menjalankan query
        echo "Error: " . $query_insert . "<br>" . mysqli_error($conn_pm);
    }
}
?>
