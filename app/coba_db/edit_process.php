-<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
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
    // ... (mengambil nilai formuli

    // Update the machine record in the database
    $update_query = "UPDATE Mmesin SET prod='$prod',subline='$subline',linename='$linename',linecode='$linecode',mcno='$mcno',maker='$maker',lineno='$lineno',machine='$machine',fixedasset='$fixedasset',fixedassetnew='$fixedassetnew',machno='$machno',old_mc_no='$old_mc_no',catatan='$catatan',machinegroup='$machinegroup',location='$location',machinebase='$machinebase',pendingcode='$pendingcode',type='$type',serialno='$serialno',country='$country',process='$process',year='$year',status='$status',keterangan='$keterangan',nourut='$nourut',plant='$plant',linecode2='$linecode2',ins_usr='$ins_usr' WHERE id='$id'";

    $result = mysqli_query($conn_mesin, $update_query);

    if ($result) {
        // Redirect to the edit page after successful update
        header("Location: edit.php?id=$id");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn_mesin);
    }
} else {
    // Redirect to the index page if accessed directly without form submission
    header("Location: index.php");
    exit();
}
?>
