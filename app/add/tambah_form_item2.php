<?php
include('../../conf/config.php');

// Tangkap data dari formulir
$id_formpengecekan = $_POST['id_formpengecekan'];
$nm_form = $_POST['nm_form'];
$id_form = $_POST['id_form'];
$pilih_pengecekan = $_POST['pilih_pengecekan'];
$id_item_values = isset($_POST['product_name']) ? $_POST['product_name'] : [];

// Ambil nomor terakhir dari tabel tb_form_item untuk id_pengecekan tertentu
$query_last_number = "SELECT MAX(SUBSTRING(id_form_item, LENGTH(?) + 1)) as last_number FROM tb_form_item2 WHERE id_formpengecekan = ?";
$stmt_last_number = mysqli_prepare($conn_pm, $query_last_number);
mysqli_stmt_bind_param($stmt_last_number, "ss", $id_formpengecekan, $id_formpengecekan);
mysqli_stmt_execute($stmt_last_number);
mysqli_stmt_bind_result($stmt_last_number, $last_number);
mysqli_stmt_fetch($stmt_last_number);
mysqli_stmt_close($stmt_last_number);

// Tentukan nomor berikutnya dengan menambah 1 ke nomor terakhir yang ditemukan
$new_number = sprintf('%07d', ($last_number + 1));
$id_form_item = $id_formpengecekan . $new_number;

// Query untuk menyimpan data ke dalam tabel form_item
$query_insert = "INSERT INTO tb_form_item2 (id_form_item, id_formpengecekan, id_item) VALUES (?, ?, ?)";

// Persiapkan statement
$stmt = mysqli_prepare($conn_pm, $query_insert);

// Bind parameter ke statement dan eksekusi untuk setiap item
foreach ($id_item_values as $id_item) {
    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "sss", $id_form_item, $id_formpengecekan, $id_item);

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        // Data berhasil disimpan
        echo "Data berhasil disimpan ke dalam tabel form_item.";
    } else {
        // Handle kesalahan jika query gagal
        echo "Error: " . mysqli_error($conn_pm);
    }

    // Tambahkan 1 ke nomor untuk persiapan iterasi berikutnya
    $new_number++;
    $id_form_item = $id_formpengecekan . sprintf('%07d', $new_number);
}

// Tutup statement
mysqli_stmt_close($stmt);

// Redirect ke halaman data-formitem setelah semua item disimpan
header("Location: ../index.php?page=edit-pengecekan2&id_formpengecekan=$id_formpengecekan&nm_form=$nm_form&id_form=$id_form&pilih_pengecekan=$pilih_pengecekan");

// Tutup koneksi database jika diperlukan
mysqli_close($conn_pm);
?>
