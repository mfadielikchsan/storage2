<?php 
// Tangkap ID dari permintaan POST
$id = $_POST['id'];

// Lakukan query untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM tb_tpmesin WHERE id_tm = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ubah hasil query ke dalam format array asosiatif
    $row = $result->fetch_assoc();

    // Tampilkan data dalam formulir
    ?>
    <label for="id_tm">ID form:</label>
    <input type="text" class="form-control" id="id_tm" name="id_tm" value="<?php echo $row['id_tm']; ?>" required>
    <label for="nm_tm">Nama Form:</label>
    <input type="text" class="form-control" id="nm_tm" name="nm_tm" value="<?php echo $row['nm_tm']; ?>" required>
    <?php
} else {
    // Jika tidak ada data ditemukan, kembalikan data kosong
    echo json_encode([]);
}

// Tutup koneksi ke database
$conn->close();
?>