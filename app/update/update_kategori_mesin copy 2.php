<?php
include('../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updating mesin data
    // Make sure to perform validation and sanitation as needed

    $id = mysqli_real_escape_string($conn_pm, $_POST['id']);
    $kategoriMesin = mysqli_real_escape_string($conn_pm, $_POST['kategori_mesin']);
    if (isset($mesin['id_kat_mesin'])) {
        $id_kat_mesin = mysqli_real_escape_string($conn_pm, $mesin['id_kat_mesin']);
    } else {
        // Handle the case where id_kat_mesin is not set
        $id_kat_mesin = '';  // Or set a default value
    }

    $updateQuery = "UPDATE db_pm.kat_mesin 
                SET kategori_mesin = '$kategoriMesin', 
                    id_kat_mesin = '$id_kat_mesin' 
                WHERE id = '$id'";


    if (!$mesin) {
        // Redirect ke index.php jika data tidak ditemukan
        header('Location: ../index.php?page=data-kategori-mesin');
        exit();
    } else {
        // Handle errors if the update query fails
        echo "Error updating record in kat_mesin table: " . mysqli_error($conn_pm);
    }
}
