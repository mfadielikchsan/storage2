<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Point Check</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Form Point Check</h2>

    <form id="pointCheckForm">
        <label for="checkId">Check ID:</label>
        <input type="text" id="checkId" name="checkId" required><br>

        <label for="bagian">Bagian:</label>
        <input type="text" id="bagian" name="bagian" required><br>

        <label for="item">Item:</label>
        <input type="text" id="item" name="item" required><br>

        <label for="standart">Standart:</label>
        <input type="text" id="standart" name="standart" required><br>

        <label for="metode">Metode:</label>
        <input type="text" id="metode" name="metode" required><br>

        <label for="mcRun">MC Run:</label>
        <select id="mcRun" name="mcRun">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <label for="tool">Tool:</label>
        <input type="text" id="tool" name="tool" required><br>

        <label for="pengukuran">Pengukuran:</label>
        <select id="pengukuran" name="pengukuran">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <button type="button" onclick="addPointCheck()">Tambah</button>
    </form>

    <h2>Tabel Point Check</h2>
    <table id="pointCheckTable">
        <thead>
            <tr>
                <th>Check ID</th>
                <th>Bagian</th>
                <th>Item</th>
                <th>Standart</th>
                <th>Metode</th>
                <th>MC Run</th>
                <th>Tool</th>
                <th>Pengukuran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan diisi melalui JavaScript -->
        </tbody>
    </table>

    <script>
        // Memeriksa apakah ada data di LocalStorage dan memuatnya ke dalam tabel saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        var savedData = JSON.parse(localStorage.getItem('pointCheckData')) || [];
        renderTable(savedData);
    });

    function addPointCheck() {
        // Mendapatkan nilai dari form
        // Kirim nilai ini ke server-side script (PHP) untuk disimpan di database
        var formData = new FormData(document.getElementById('pointCheckForm'));

        fetch('save_point_check.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            // Jika Anda ingin melakukan sesuatu setelah berhasil disimpan ke database, tambahkan kode di sini
            // Misalnya, membersihkan formulir atau melakukan tindakan tertentu
            addToLocalStorage(); // Menambahkan data ke penyimpanan lokal
            addToTable(); // Menambahkan data ke tabel
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function addToLocalStorage() {
        // Mendapatkan nilai dari form
        var checkId = document.getElementById('checkId').value;
        var bagian = document.getElementById('bagian').value;
        var item = document.getElementById('item').value;
        var standart = document.getElementById('standart').value;
        var metode = document.getElementById('metode').value;
        var mcRun = document.getElementById('mcRun').value;
        var tool = document.getElementById('tool').value;
        var pengukuran = document.getElementById('pengukuran').value;

        // Memuat data yang ada di LocalStorage
        var savedData = JSON.parse(localStorage.getItem('pointCheckData')) || [];

        // Menambahkan data baru
        savedData.push({
            checkId: checkId,
            bagian: bagian,
            item: item,
            standart: standart,
            metode: metode,
            mcRun: mcRun,
            tool: tool,
            pengukuran: pengukuran
        });

        // Menyimpan kembali data ke LocalStorage
        localStorage.setItem('pointCheckData', JSON.stringify(savedData));
    }

    function addToTable() {
        // Memuat data yang ada di LocalStorage
        var savedData = JSON.parse(localStorage.getItem('pointCheckData')) || [];

        // Memanggil fungsi renderTable untuk memperbarui tabel dengan data yang ada
        renderTable(savedData);
    }

    function renderTable(data) {
        // Menghapus semua baris dari tabel
        var table = document.getElementById('pointCheckTable');
        table.getElementsByTagName('tbody')[0].innerHTML = '';

        // Menambahkan data ke tabel
        for (var i = 0; i < data.length; i++) {
            var newRow = table.insertRow(table.rows.length);
            newRow.insertCell(0).innerHTML = data[i].checkId;
            newRow.insertCell(1).innerHTML = data[i].bagian;
            newRow.insertCell(2).innerHTML = data[i].item;
            newRow.insertCell(3).innerHTML = data[i].standart;
            newRow.insertCell(4).innerHTML = data[i].metode;
            newRow.insertCell(5).innerHTML = (data[i].mcRun === 'yes') ? '<input type="checkbox" checked>' : '<input type="checkbox">';
            newRow.insertCell(6).innerHTML = data[i].tool;
            newRow.insertCell(7).innerHTML = (data[i].pengukuran === 'yes') ? '<input type="checkbox" checked>' : '<input type="checkbox>';
            newRow.insertCell(8).innerHTML = '<button onclick="deleteRow(this)">Delete</button>';
        }
    }

    function deleteRow(button) {
        // Mendapatkan indeks baris yang akan dihapus
        var rowIndex = button.parentNode.parentNode.rowIndex;

        // Memuat data yang ada di LocalStorage
        var savedData = JSON.parse(localStorage.getItem('pointCheckData')) || [];

        // Menghapus data berdasarkan indeks
        savedData.splice(rowIndex - 1, 1);

        // Menyimpan kembali data ke LocalStorage
        localStorage.setItem('pointCheckData', JSON.stringify(savedData));

        // Memanggil fungsi renderTable untuk memperbarui tabel dengan data yang ada
        renderTable(savedData);
    }
    </script>
</body>
</html>
