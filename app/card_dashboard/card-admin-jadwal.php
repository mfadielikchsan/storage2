<?php
include('../../conf/config.php');

$query = "SELECT id FROM mesin ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["id"] . "<br>";
        }
    } else {
        echo "Tidak ada data yang ditemukan.";
    }
} else {
    echo "Error: " . $conn->error;
}

// Menutup koneksi database
$conn->close();

 echo $id;
?>