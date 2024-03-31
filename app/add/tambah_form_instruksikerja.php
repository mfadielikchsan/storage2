<?php
include('../../conf/config.php');

$id_pengecekan = isset($_POST["id_pengecekan"]) ? $_POST["id_pengecekan"] : "";
$id_form = isset($_POST["id_form"]) ? $_POST["id_form"] : "";
$nm_form = isset($_POST["nm_form"]) ? $_POST["nm_form"] : "";

// Check database connection
if ($conn_pm->connect_error) {
    die("Connection failed: " . $conn_pm->connect_error);
}

// Function to generate next ID for tb_formpengecekan
function generateNextID($conn_pm, $table, $prefix, $id_form, $id_pengecekan) {
    // Check if the combination of id_form and id_pengecekan already exists
    $query_check = "SELECT id_formpengecekan FROM $table WHERE id_form = '$id_form' AND id_pengecekan = '$id_pengecekan'";
    $result_check = mysqli_query($conn_pm, $query_check);

    // If the combination already exists, return the existing id_formpengecekan
    if (mysqli_num_rows($result_check) > 0) {
        $row = mysqli_fetch_assoc($result_check);
        $existing_id = $row['id_formpengecekan'];
        return array('id' => $existing_id, 'next_id' => null); // Set next_id to null to indicate existing ID
    }

    // If the combination doesn't exist, generate a new ID
    $query = "SELECT MAX(SUBSTRING(id_formpengecekan, 3)) as max_id FROM $table";
    $result = mysqli_query($conn_pm, $query);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];

    if ($max_id === null) {
        $next_id = 1;
    } else {
        $next_id = intval($max_id) + 1;
    }

    $formatted_id = $prefix . str_pad($next_id, 8, '0', STR_PAD_LEFT);

    return array('id' => $formatted_id, 'next_id' => $next_id);
}

function generateNextPointID($conn_pm, $table, $id_formpengecekan) {
    // Get the current maximum ID
    $query = "SELECT MAX(SUBSTRING(id_point_check, 16)) AS max_id FROM $table WHERE id_formpengecekan = '$id_formpengecekan'";
    $result = mysqli_query($conn_pm, $query);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];

    // If there are no records in the table, start from 1
    if ($max_id === null) {
        $next_id = 1;
    } else {
        // Increment the maximum ID by 1
        $next_id = intval($max_id) + 1;
    }

    return $next_id;
}

$id_formpengecekan_data = generateNextID($conn_pm, 'tb_formpengecekan', 'FP', $id_form, $id_pengecekan);
$id_formpengecekan = $id_formpengecekan_data['id'];

// Check if a new ID is generated or an existing one is used
if ($id_formpengecekan_data['next_id'] !== null) {
    // Insert new record into tb_formpengecekan
    $query_insert_form = "INSERT INTO tb_formpengecekan (id_formpengecekan, id_form, id_pengecekan) VALUES ('$id_formpengecekan', '$id_form', '$id_pengecekan')";
    if (mysqli_query($conn_pm, $query_insert_form)) {
        echo "Data berhasil disimpan di tb_formpengecekan. ";
    }
} else {
    // Jika id_formpengecekan sudah ada, periksa keberadaan id_InstruksiKerja dalam id_formpengecekan yang sama
    $id_InstruksiKerja = isset($_POST['id_InstruksiKerja']) ? $_POST['id_InstruksiKerja'] : "";
    $query_check_instruksi = "SELECT id_InstruksiKerja FROM tb_form_instruksikerja WHERE id_formpengecekan = '$id_formpengecekan' AND id_InstruksiKerja = '$id_InstruksiKerja'";
    $result_check_instruksi = mysqli_query($conn_pm, $query_check_instruksi);
}

$bagian = $_POST['bagian'];
$instruksi = $_POST['instruksi'];

$query_last_urutan = "SELECT urutan_point_check FROM tb_form_instruksikerja WHERE id_formpengecekan = '$id_formpengecekan' ORDER BY urutan_point_check DESC LIMIT 1";
$result_last_urutan = mysqli_query($conn_pm, $query_last_urutan);
if(mysqli_num_rows($result_last_urutan) > 0) {
    $last_urutan_row = mysqli_fetch_assoc($result_last_urutan);
    $last_urutan = $last_urutan_row['urutan_point_check'];

    // Convert the last urutan_point_check to the next character in alphabet
    $next_urutan = ++$last_urutan;
} else {
    // If no records found, start with 'a'
    $next_urutan = 'a';
}

// Loop through the arrays and insert data into tb_form_instruksikerja
for ($i = 0; $i < count($bagian); $i++) {
    $bagian_value = mysqli_real_escape_string($conn_pm, $bagian[$i]);
    $instruksi_value = mysqli_real_escape_string($conn_pm, $instruksi[$i]);

    // Generate the next id_point_check
    $id_point_check_suffix = generateNextPointID($conn_pm, 'tb_form_instruksikerja', $id_formpengecekan);
    $id_point_check = $id_formpengecekan . 'PCK' . str_pad($id_point_check_suffix, 8, '0', STR_PAD_LEFT);

    // Check if id_InstruksiKerja already exists for this id_formpengecekan
    $query_check_instruksi = "SELECT id_InstruksiKerja FROM tb_form_instruksikerja WHERE id_formpengecekan = '$id_formpengecekan' AND id_InstruksiKerja = '$instruksi_value'";
    $result_check_instruksi = mysqli_query($conn_pm, $query_check_instruksi);

    if (mysqli_num_rows($result_check_instruksi) > 0) {
        // If id_InstruksiKerja already exists for this id_formpengecekan, redirect to the original page
        header('Location: ../index.php?page=edit-pengecekan-instruksi');
        exit(); // Stop script execution after redirect
    }

    // Insert the data directly into tb_form_instruksikerja with the next_urutan
    $insert_row_query = "INSERT INTO tb_form_instruksikerja (id_point_check, id_formpengecekan, urutan_point_check, id_Bagian, id_InstruksiKerja)
                        VALUES ('$id_point_check', '$id_formpengecekan', '$next_urutan', '$bagian_value', '$instruksi_value')";

    mysqli_query($conn_pm, $insert_row_query);

    // Set next_urutan to the next character in alphabet
    $next_urutan++;
}
// Redirect to the original page
header("Location: ../index.php?page=edit-pengecekan-instruksi&id_form=$id_form&nm_form=$nm_form");
exit();
?>
