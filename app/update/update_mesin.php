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

$query = mysqli_query($conn_pm, "UPDATE mesin SET prod='$prod',subline='$subline',linename='$linename',linecode='$linecode',mcno='$mcno',maker='$maker',lineno='$lineno',machine='$machine',fixedasset='$fixedasset',fixedassetnew='$fixedassetnew',machno='$machno',old_mc_no='$old_mc_no',catatan='$catatan',machinegroup='$machinegroup',location='$location',machinebase='$machinebase',pendingcode='$pendingcode',type='$type',serialno='$serialno',country='$country',process='$process',year='$year',status='$status',keterangan='$keterangan',nourut='$nourut',plant='$plant',linecode2='$linecode2',ins_usr='$ins_usr' WHERE id='$id'");

header('Location: ../index.php?page=data-mesin');

?>