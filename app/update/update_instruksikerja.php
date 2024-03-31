<?php 
include('../../conf/config.php');
// Ambil nilai dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming form is submitted using POST method

    $id_InstruksiKerja = $_POST['id_InstruksiKerja'];
    $nm_Bagian = $_POST['nm_Bagian'];
    $nm_InstruksiKerja = $_POST['nm_InstruksiKerja'];
    $standart = $_POST['standart'];
    $metode = $_POST['metode'];
    $mcrun = isset($_POST['mcrun']) ? 1 : 0; // checkbox value
    $pengukuran = isset($_POST['pengukuran']) ? 1 : 0;
    $tool = isset($_POST['pengukuran']) ? $_POST['tool'] : ''; // only set tool if pengukuran checkbox is checked


    // Update the record in the database
    $updateQuery = "UPDATE tb_instruksikerja
                    SET id_Bagian = '$nm_Bagian',  -- Correct the column name
                    nm_InstruksiKerja = '$nm_InstruksiKerja',
                    Standart = '$standart',
                    Metode = '$metode',
                    Mc_Run = '$mcrun',
                    Ukur = '$pengukuran',
                    Tool = '$tool'
                    WHERE id_InstruksiKerja = '$id_InstruksiKerja'";

    if (mysqli_query($conn_pm, $updateQuery)) {
        echo "Update successful!";
    } else {
        echo "Error updating record: " . mysqli_error($conn_pm);
    }
}

header('Location: ../index.php?page=data-instruksikerja');
?>

