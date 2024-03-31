<?php
include('../../conf/config.php');

// Mengambil nilai nama form dari form yang dikirimkan
$nm_form = isset($_POST["nm_form"]) ? $_POST["nm_form"] : "";

// Mengambil ID terbaru dari database
$query_max_id = mysqli_query($conn_pm, "SELECT MAX(id_form) AS max_id FROM tb_form");
$row = mysqli_fetch_assoc($query_max_id);
$max_id = $row['max_id'];

// Menentukan ID berikutnya
if ($max_id === null) {
    $next_id = 'FR00001'; // Jika tidak ada data, ID dimulai dari FR00001
} else {
    // Membuat ID berikutnya dengan mengambil nomor setelah FR dan menambahkannya 1
    $next_id = 'FR' . sprintf('%05d', intval(substr($max_id, 2)) + 1);

    // Loop until a unique ID is found
    while (mysqli_num_rows(mysqli_query($conn_pm, "SELECT id_form FROM tb_form WHERE id_form = '$next_id'")) > 0) {
        $next_id = 'FR' . sprintf('%05d', intval(substr($next_id, 2)) + 1);
    }
}

// Menyiapkan query untuk melakukan insert data
$query_insert = "INSERT INTO tb_form (id_form, nm_form) VALUES ('$next_id', '$nm_form')";

// Melakukan query ke database
if (mysqli_query($conn_pm, $query_insert)) {
    // Jika insert berhasil, redirect ke halaman yang ditentukan
}
    header('Location: ../index.php?page=data-form');
?>
