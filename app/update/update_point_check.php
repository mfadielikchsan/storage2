<?php 
include('../../conf/config.php');
// Ambil nilai dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming form is submitted using POST method

    // Retrieve values from the form
    $idInstruksiKerja = $_POST['id_InstruksiKerja'];
    $nm_Bagian = $_POST['nm_Bagian'];
    $nm_InstruksiKerja = $_POST['nm_InstruksiKerja'];
    $Standart = $_POST['Standart'];
    $Metode = $_POST['Metode'];
    $McRun = $_POST['McRun'];
    $ukur = $_POST['Ukur'];
    $Tool = $_POST['Tool'];

    // Update the record in the database
    $updateQuery = "UPDATE tb_instruksikerja
                    SET nm_Bagian = (
                        SELECT nm_Bagian 
                        FROM tb_bagian 
                        WHERE tb_bagian.id_Bagian = tb_instruksikerja.id_Bagian
                    ),
                    nm_InstruksiKerja = '$nm_InstruksiKerja',
                    Standart = '$Standart',
                    Metode = '$Metode',
                    McRun = '$McRun',
                    Ukur = '$ukur',
                    Tool = '$Tool'
                    WHERE id_InstruksiKerja = '$idInstruksiKerja'";

    if (mysqli_query($conn_pm, $updateQuery)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn_pm);
    }
}

header('Location: ../index.php?page=data-instruksikerja');
?>