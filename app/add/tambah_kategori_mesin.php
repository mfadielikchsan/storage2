<?php
include('../../conf/config.php');

        $id = mysqli_real_escape_string($conn_mesin, $_POST['id']);
        $kategoriMesin = mysqli_real_escape_string($conn_pm, $_POST['kategori_mesin']);
        if (isset($mesin['id_kat_mesin'])) {
          $id_kat_mesin = mysqli_real_escape_string($conn_pm, $mesin['id_kat_mesin']);
      } else {
          // Handle the case where id_kat_mesin is not set
          $id_kat_mesin = '';  // Or set a default value
      }

        $insertKatMesinQuery = "INSERT INTO db_pm.kat_mesin (id, kategori_mesin) VALUES ('$id', '$kategoriMesin')";

        header('Location: ../index.php?page=data-kategori-mesin');
?>