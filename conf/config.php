<?php
// Koneksi ke database db_mesin
$host_mesin = "localhost";
$user_mesin = "root";
$password_mesin = "";
$database_mesin = "db_mesin";

$conn_mesin = mysqli_connect($host_mesin, $user_mesin, $password_mesin, $database_mesin);

if (!$conn_mesin) {
    echo("Koneksi database db_mesin gagal: " . mysqli_connect_error());
}

// Koneksi ke database db_pm
$database_pm = "db_pm";

$conn_pm = mysqli_connect($host_mesin, $user_mesin, $password_mesin, $database_pm);

if (!$conn_pm) {
    echo("Koneksi database db_pm gagal: " . mysqli_connect_error());
}
?>
