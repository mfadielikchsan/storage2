<?php 
include('../../conf/config.php');
$prod = $_GET['prod'];
$subline = $_GET['subline'];
$linename = $_GET['linename'];
$linecode = $_GET['linecode'];
$mcno = $_GET['mcno'];
$lineno = $_GET['lineno'];
$machine = $_GET['machine'];
$maker = $_GET['maker'];
$fixedasset = $_GET['fixedasset'];
$fixedassetnew = $_GET['fixedassetnew'];
$machno = $_GET['machno'];
$old_mc_no = $_GET['old_mc_no'];
$catatan = $_GET['catatan'];
$machinegroup = $_GET['machinegroup'];
$location = $_GET['location'];
$machinebase = $_GET['machinebase'];
$pendingcode = $_GET['pendingcode'];
$type = $_GET['type'];
$serialno = $_GET['serialno'];
$country = $_GET['country'];
$process = $_GET['process'];
$year = $_GET['year'];
$status = $_GET['status'];
$keterangan = $_GET['keterangan'];
$nourut = $_GET['nourut'];
$plant = $_GET['plant'];
$linecode2 = $_GET['linecode2'];
$ins_usr = $_GET['ins_usr'];

$query = mysqli_query($conn_mesin, "INSERT INTO mesin (id, prod, subline, linename, linecode, mcno, lineno, machine, maker, fixedasset, fixedassetnew, machno, old_mc_no, catatan, machinegroup, location, machinebase, pendingcode, type, serialno, country, process, year, status, keterangan, nourut, plant, linecode2, ins_usr) VALUES ('1', '$prod', '$subline', '$linename', '$linecode', '$mcno', '$lineno', '$machine', '$maker', '$fixedasset', '$fixedassetnew',  '$machno',  '$old_mc_no', '$catatan', '$machinegroup', '$location', '$machinebase', '$pendingcode', '$type', '$serialno', '$country', '$process', '$year', '$status', '$keterangan', '$nourut', '$plant', '$linecode2', '$ins_usr')");

header('Location: ../index.php?page=data-mesin');

?>