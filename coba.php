<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Periode dengan Range Tanggal</title>

    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body class="container mt-5">

<!-- Input untuk memasukkan jumlah periode -->
<div class="form-group">
    <label for="jumlah-periode">Masukkan Jumlah Periode:</label>
    <input type="number" class="form-control" id="jumlah-periode" min="1" value="0">
</div>

<!-- Input untuk memasukkan interval bulan -->
<div class="form-group">
    <label for="interval-bulan">Interval Bulan:</label>
    <input type="number" class="form-control" id="interval-bulan" min="1" value="0">
</div>


<!-- Input untuk memasukkan tanggal awal -->
<div class="form-group">
    <label for="tanggal-awal">Tanggal Awal:</label>
    <input type="date" class="form-control" id="tanggal-awal" required>
</div>

<button class="btn btn-primary" onclick="aturPeriode()">Atur Periode</button>

<!-- Tempat menampilkan field untuk setiap periode -->
<div id="field-periode" class="mt-3"></div>

<script>
// Fungsi untuk mengatur field input berdasarkan jumlah periode, tanggal awal, dan interval bulan
function aturPeriode() {
    // Dapatkan nilai input jumlah periode, tanggal awal, dan interval bulan
    var jumlahPeriode = parseInt(document.getElementById('jumlah-periode').value);
    var tanggalAwal = document.getElementById('tanggal-awal').value;
    var intervalBulan = parseInt(document.getElementById('interval-bulan').value);

    // Validasi input
    if (isNaN(jumlahPeriode) || jumlahPeriode <= 0 || tanggalAwal === '' || isNaN(intervalBulan) || intervalBulan <= 0) {
        alert("Masukkan input yang valid.");
        return;
    }

    // Dapatkan elemen untuk menampilkan field
    var fieldPeriode = document.getElementById('field-periode');
    fieldPeriode.innerHTML = ''; // Hapus field sebelumnya (jika ada)

    // Parse tanggal awal ke dalam objek Date
    var startDate = new Date(tanggalAwal);

    // Loop untuk membuat field sesuai dengan jumlah periode
    for (var i = 1; i <= jumlahPeriode; i++) {
        // Buat input untuk setiap periode
        var inputPeriode = document.createElement('input');
        inputPeriode.type = 'date';
        inputPeriode.className = 'form-control';
        inputPeriode.name = 'periode[]';
        inputPeriode.required = true;
        inputPeriode.value = formatDate(startDate); // Set nilai awal
        fieldPeriode.appendChild(inputPeriode);

        // Tambahkan interval bulan ke tanggal awal untuk periode berikutnya
        startDate.setMonth(startDate.getMonth() + intervalBulan);
    }
}

// Fungsi untuk memformat objek Date ke format tanggal yang diinginkan (YYYY-MM-DD)
function formatDate(date) {
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);
    return year + '-' + month + '-' + day;
}
</script>

<!-- Tambahkan Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
