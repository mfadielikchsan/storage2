<?php
$id_formpengecekan = isset($_GET['id_formpengecekan']) ? $_GET['id_formpengecekan'] : '';
$query = mysqli_query($conn_pm, "SELECT * FROM tb_formpengecekan WHERE id_formpengecekan='$id_formpengecekan'");
$idpoint = mysqli_fetch_array($query); 

$kode_query = mysqli_query($conn_pm, "SELECT max(code_sche) AS kodeBig FROM tb_schedule_preventive");
$kode_data = mysqli_fetch_array($kode_query);

// Check if $kodeshe is null before using substr
$kodeshe = 'SCH' . sprintf("%03s", ($kode_data['kodeBig'] !== null) ? (int) substr($kode_data['kodeBig'], 3, 3) + 1 : 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Jadwal Preventive</title>
    </head>

<body>

    <!-- general form elements disabled -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Jadwal Preventive</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <form method="post" action="add/tambah_jadwal.php" id="add_form">
                <div class="modal-body" id="addModalBody">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputKodepreventive">Kode Point Check</label>
                                <input type="text" name="id_formpengecekan" id="inputKodepreventive1" value="<?php echo $idpoint['id_formpengecekan'];?>" class="form-control" placeholder="Kode Point Check" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputKodepreventive">Kode Preventive</label>
                                <input type="text" name="code_sche" id="inputKodepreventive2" value="<?php echo $kodeshe;?>" class="form-control" placeholder="Kode Preventive" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jarak_bulan">Interval</label>
                                <select class="form-control" id="jarak_bulan" name="jarak_bulan" data-placeholder="--Choose Interval--">
                                    <option value="1">1 Bulan</option>
                                    <option value="2">2 Bulan</option>
                                    <option value="3">3 Bulan</option>
                                    <option value="4">4 Bulan</option>
                                    <option value="6">6 Bulan</option>
                                    <option value="12">12 Bulan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggalAwal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm" id="field-periode">
                            <div class="form-group">
                                <label for="Cekperiode">Periode</label>
                            </div>
                            <div class="row">
                                <a href="#" class="btn btn-primary" onclick="checkPeriode();">Check Periode</a>
                                <table class="table tabel-periode" id="tabel-periode">
                                    <thead>
                                        <tr>
                                            <th>Periode Ke</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                </div>
            </form> 
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
<script>
function checkPeriode() {
    document.getElementById("tabel-periode").getElementsByTagName('tbody')[0].innerHTML = '';

    var intervalVal = parseInt(document.getElementById("jarak_bulan").value);
    var tanggalVal = document.getElementById("tanggalAwal").value;
    var tanggalSplit = tanggalVal.split("-");
    var tahun = parseInt(tanggalSplit[0]);
    var bulan = parseInt(tanggalSplit[1]);
    var hari = parseInt(tanggalSplit[2]);
    var tanggalToDate = new Date(tahun, bulan - 1, hari); // bulan dimulai dari 0 (Januari = 0)
    var tbodyRef = document.getElementById('tabel-periode').getElementsByTagName('tbody')[0];

    var nomer = 1;
    for (var i = 0; i < 12 / intervalVal; i++) {
        if (i > 0) {
            bulan += intervalVal;
            if (bulan > 12) {
                bulan -= 12;
                tahun++;
            }
        }

        var newRow = tbodyRef.insertRow();
        var cellPeriode = newRow.insertCell();
        var periodeVal = document.createTextNode('Periode ' + nomer);
        cellPeriode.appendChild(periodeVal);

        var cellTanggal = newRow.insertCell();
        var formattedDate = formatPeriodeDate(hari, bulan, tahun);
        var tanggalVal = document.createTextNode(formattedDate);
        cellTanggal.appendChild(tanggalVal);

        nomer++;
    }
}

function formatPeriodeDate(day, month, year) {
    // Menggunakan fungsi Intl.DateTimeFormat untuk memformat tanggal
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = new Intl.DateTimeFormat('id-ID', options).format(new Date(year, month - 1, day));
    return formattedDate;
}
</script>
</body>

</html>
