<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you have sanitized and validated the input fields for security

    $id = $_POST['id'];
    $prod = $_POST['prod'];
    $subline = $_POST['subline'];
    $linename = $_POST['linename'];
    $linecode = $_POST['linecode'];
    $mcno = $_POST['mcno'];
    $lineno = $_POST['lineno'];
    $machine = $_POST['machine'];
    $maker = $_POST['maker'];
    $fixedasset = $_POST['fixedasset'];
    $fixedassetnew = $_POST['fixedassetnew'];
    $machno = $_POST['machno'];
    $old_mc_no = $_POST['old_mc_no'];
    $catatan = $_POST['catatan'];
    $machinegroup = $_POST['machinegroup'];
    $location = $_POST['location'];
    $machinebase = $_POST['machinebase'];
    $pendingcode = $_POST['pendingcode'];
    $type = $_POST['type'];
    $serialno = $_POST['serialno'];
    $country = $_POST['country'];
    $process = $_POST['process'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $nourut = $_POST['nourut'];
    $plant = $_POST['plant'];
    $linecode2 = $_POST['linecode2'];
    $ins_usr = $_POST['ins_usr'];
    // Add other fields similarly

    // Update the mesin data in the database
    $update_query = "UPDATE mesin SET prod='$prod', linename='$linename', mcno='$mcno', machine='$machine' WHERE id='$id'";
    $result = mysqli_query($conn_pm, $update_query);

    if ($result) {
        // Successful update
        header("Location: ../your_original_page.php");
        exit();
    } else {
        // Handle the case where the update fails
        echo "Update failed.";
        exit();
    }
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method.";
    exit();
}
?>
