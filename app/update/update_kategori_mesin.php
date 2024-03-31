<?php
include('../../conf/config.php');
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

// kategori
$id_kat_mesin = $_POST['id_kat_mesin'];
$kategori_mesin = $_POST['kategori_mesin'];

$insertKatMesinQuery = "INSERT INTO db_pm.kat_mesin (id, kategori_mesin) VALUES ('$id', '$kategori_mesin')";
mysqli_query($conn_pm, $insertKatMesinQuery);

if(isset($conn_pm, $insertKatMesinQuery)){
        $updateKatMesinQuery = "UPDATE db_pm.kat_mesin 
                SET kategori_mesin = '$kategori_mesin'
                WHERE id = '$id'";
mysqli_query($conn_pm, $updateKatMesinQuery);
}

// $id = mysqli_insert_id($conn_pm);

$updateQuery = "UPDATE mesin SET 
        prod = '{$_POST['prod']}', 
        subline = '{$_POST['subline']}',
        linename = '{$_POST['linename']}',
        linecode = '{$_POST['linecode']}',
        mcno = '{$_POST['mcno']}',
        lineno = '{$_POST['lineno']}',
        machine = '{$_POST['machine']}',
        maker = '{$_POST['maker']}',
        fixedasset = '{$_POST['fixedasset']}',
        fixedassetnew = '{$_POST['fixedassetnew']}',
        machno = '{$_POST['machno']}',
        old_mc_no = '{$_POST['old_mc_no']}',
        catatan = '{$_POST['catatan']}',
        machinegroup = '{$_POST['machinegroup']}',
        location = '{$_POST['location']}',
        machinebase = '{$_POST['machinebase']}',
        pendingcode = '{$_POST['pendingcode']}',
        type = '{$_POST['type']}',
        serialno = '{$_POST['serialno']}',
        country = '{$_POST['country']}',
        process = '{$_POST['process']}',
        year = '{$_POST['year']}',
        status = '{$_POST['status']}',
        keterangan = '{$_POST['keterangan']}',
        nourut = '{$_POST['nourut']}',
        plant = '{$_POST['plant']}',
        linecode2 = '{$_POST['linecode2']}',
        ins_usr = '{$_POST['ins_usr']}'
        WHERE id = $id";

header('Location: ../index.php?page=data-kategori-mesin');
?>

