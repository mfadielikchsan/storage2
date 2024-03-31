<?php 
include('../../conf/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $kat_mesin = $_POST["kat_mesin"];

    // Validasi apakah kategori mesin dipilih
if(empty($kat_mesin)) {
    echo "Mohon pilih kategori mesin!";
    // Tambahkan logika lain sesuai kebutuhan, misalnya redirect kembali ke halaman form
    exit; // Menghentikan eksekusi script lebih lanjut
}

    // Ambil mcno dari tabel mesin
    $queryMesin = "SELECT mcno FROM mesin WHERE mcno = ?";
    $stmt = $conn_pm->prepare($queryMesin);
    $stmt->bind_param("s", $mcno);
    $mcno = $_POST["product_name"][0];
    $stmt->execute();
    $stmt->bind_result($mcno);
    $stmt->fetch();
    $stmt->close();

    // Ambil id_tm dari tabel tb_tpmesin
    $queryIdTm = "SELECT id_tm FROM tb_tpmesin WHERE nm_tm = ?";
    $stmtIdTm = $conn_pm->prepare($queryIdTm);
    $stmtIdTm->bind_param("s", $id_tm);
    $id_tm = $_POST["id_tm"]; // Pastikan ini adalah nilai yang diharapkan dari dropdown
    $stmtIdTm->execute();
    $stmtIdTm->bind_result($id_tm);
    $stmtIdTm->fetch();
    $stmtIdTm->close();

    // Generate id_form otomatis
    $queryCount = "SELECT COUNT(*) FROM tb_form_mesin";
    $resultCount = mysqli_query($conn_pm, $queryCount);
    $row = mysqli_fetch_array($resultCount);
    $count = $row[0] + 1;
    $id_form = "FM" . sprintf("%04d", $count);

    $query = "INSERT INTO tb_form_mesin (id_form, id_tm, kat_mesin, mcno) VALUES ('$id_form', '$id_tm', '$kat_mesin', '$mcno')";
$result = mysqli_query($conn_pm, $query);
header('Location: ../index.php?page=data-tipe');

}
?>
