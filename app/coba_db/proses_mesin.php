<?php
include 'koneksi.php';

// Proses formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    // ... (mengambil nilai formulir lainnya)

    // Simpan data ke database db_mesin
    $query_mesin = "INSERT INTO mesin (id, prod, subline, linename, linecode, mcno, lineno, machine, maker, fixedasset, fixedassetnew, machno, old_mc_no, catatan, machinegroup, location, machinebase, pendingcode, type, serialno, country, process, year, status, keterangan, nourut, plant, linecode2, ophour, ins_dt, ins_usr) VALUES ('1', '$prod', '$subline', '$linename', '$linecode', '$mcno', '$lineno', '$machine', '$maker', '$fixedasset', '$fixedassetnew',  '$machno',  '$old_mc_no', '$catatan', '$machinegroup', '$location', '$machinebase', '$pendingcode', '$type', '$serialno', '$country', '$process', '$year', '$status', '$keterangan', '$nourut', '$plant', '$linecode2', '0', NOW(), '$ins_usr')";
    if (mysqli_query($conn_mesin, $query_mesin)) {
        echo "Data berhasil disimpan ke database db_mesin.";
    } else {
        echo "Error: " . $query_mesin . "<br>" . mysqli_error($conn_mesin);
    }

    // Simpan data ke database db_pm
    $query_pm = "INSERT INTO coba_mesin (id, prod, subline, linename, linecode, mcno, lineno, machine, maker, fixedasset, fixedassetnew, machno, old_mc_no, catatan, machinegroup, location, machinebase, pendingcode, type, serialno, country, process, year, status, keterangan, nourut, plant, linecode2, ophour, ins_dt, ins_usr) VALUES ('1', '$prod', '$subline', '$linename', '$linecode', '$mcno', '$lineno', '$machine', '$maker', '$fixedasset', '$fixedassetnew',  '$machno',  '$old_mc_no', '$catatan', '$machinegroup', '$location', '$machinebase', '$pendingcode', '$type', '$serialno', '$country', '$process', '$year', '$status', '$keterangan', '$nourut', '$plant', '$linecode2', '0', NOW(), '$ins_usr')";
    if (mysqli_query($conn_pm, $query_pm)) {
        echo "Data berhasil disimpan ke database db_pm.";
    } else {
        echo "Error: " . $query_pm . "<br>" . mysqli_error($conn_pm);
    }
}

// Tutup koneksi
mysqli_close($conn_mesin);
mysqli_close($conn_pm);
?>