<?php 
include('../../conf/config.php');
// Ambil nilai dari form

/// Ambil data dari tabel db_mesin.mesin
$query = "SELECT id, prod, linename, linecode2, machine, mcno, maker, fixedasset, subline, lineno FROM mesin";
$result = $conn_mesin->query($query);

// Periksa apakah query berhasil
if ($result) {
    // Loop through hasil query dan simpan ke dalam tb_tipe_mesin di db_pm
    while ($row = $result->fetch_assoc()) {
        $insertQuery = "INSERT INTO db_pm.tb_tipe_mesin (id, prod, linename, linecode2, machine, mcno, maker, fixedasset, subline, lineno) VALUES ('" . $row['id'] . "', '" . $row['prod'] . "', '" . $row['linename'] . "', '" . $row['linecode2'] . "', '" . $row['machine'] . "', '" . $row['mcno'] . "', '" . $row['maker'] . "', '" . $row['fixedasset'] . "', '" . $row['subline'] . "', '" . $row['lineno'] . "')";

        $insertResult = $conn_pm->query($insertQuery);

        if (!$insertResult) {
            echo "Error inserting data: " . $conn_pm->error;
        }
    }

    // Bebaskan hasil query
    $result->free();
} else {
    echo "Error fetching data: " . $conn_pm->error;
}

// Tutup koneksi
$conn_pm->close();
?>