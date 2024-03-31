<?php
// Include your database connection file here
include('../../conf/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_formpengecekan = isset($_POST['id_formpengecekan']) ? $_POST['id_formpengecekan'] : '';
    $code_sche = isset($_POST['code_sche']) ? $_POST['code_sche'] : '';
    $jarak_bulan = isset($_POST['jarak_bulan']) ? $_POST['jarak_bulan'] : '';
    $tanggalAwal = isset($_POST['tanggalAwal']) ? $_POST['tanggalAwal'] : '';

    // Process the initial date
    $tanggalSplit = explode("-", $tanggalAwal);
    $tahun = (int)$tanggalSplit[0];
    $bulan = (int)$tanggalSplit[1];
    $hari = (int)$tanggalSplit[2];

    // Initialize an array to store the generated periods
    $generatedPeriods = array();

    for ($i = 1; $i <= 12 / $jarak_bulan; $i++) {
        if ($i > 1) {
            $bulan += $jarak_bulan;
            if ($bulan > 12) {
                $bulan -= 12;
                $tahun++;
            }
        }

        // Format the date
        $formattedDate = date('Y-m-d', mktime(0, 0, 0, $bulan, $hari, $tahun));
        
        // Store the period and date in the array
        $generatedPeriods[] = array(
            'periode' => "periode$i",
            'tanggal' => $formattedDate
        );
    }

    // Insert data into the database
    $query = "INSERT INTO tb_schedule_preventive (code_sche, id_formpengecekan, tanggalAwal, jarak_bulan, ";
    foreach ($generatedPeriods as $period) {
        $query .= $period['periode'] . ", ";
    }
    $query = rtrim($query, ", ");
    $query .= ") VALUES ('$code_sche', '$id_formpengecekan', '$tanggalAwal', '$jarak_bulan', ";
    
    foreach ($generatedPeriods as $period) {
        $query .= "'{$period['tanggal']}', ";
    }
    $query = rtrim($query, ", ");
    $query .= ")";

    // Execute the query
    $result = mysqli_query($conn_pm, $query);

    if ($result) {
        echo "Data has been successfully inserted into the database.";
        header("Location: ../index.php?page=data-tanggalan");
        exit(); // Ensure that no other output is sent before the redirect
    } else {
        echo "Error: " . mysqli_error($conn_pm);
    }
}
?>
