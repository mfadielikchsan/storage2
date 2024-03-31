<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Dropdown</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <form id="myForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="mb-3">
  <label for="idJenis" class="form-label">ID Jenis</label>
  <div class="input-group">
    <!-- Input idJenis -->
    <input type="text" class="form-control" id="idJenis" name="idJenis" readonly>

    <!-- Input userInput -->
    <input type="text" class="form-control" id="userInput" name="userInput" required>
  </div>
</div>

    <div class="mb-3">
      <label for="namaJenis" class="form-label">Nama Jenis</label>
      <select class="form-select" id="namaJenis" name="namaJenis">
        <option value="">Pilih Jenis</option>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "daftarmesin";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Ambil data dari database
        $result = $conn->query("SELECT id_jenis, nama_jenis FROM jenis_barang");

        // Tampilkan data sebagai dropdown options
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id_jenis'] . "'>" . $row['nama_jenis'] . "</option>";
        }

        // Tutup koneksi database
        $conn->close();
        ?>
      </select>
    </div>

    <div class="mb-3">
  <label for="nmItem" class="form-label">Nama Item</label>
  <input type="text" class="form-control" id="nmItem" name="nmItem" required>
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
  // Event handler ketika dropdown berubah
  $("#namaJenis").change(function () {
    // Mengisi input ID Jenis dengan nilai dari dropdown yang dipilih
    $("#idJenis").val($(this).val());
  });

  // Event handler ketika userInput berubah
  $("#userInput").on('input', function () {
    // Optional: Apakah ada logika tertentu yang ingin Anda terapkan ketika userInput berubah?
  });

  // Optional: Jika ingin mengisi input ID Jenis saat halaman pertama kali dimuat
  $("#namaJenis").change();
});
</script>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idJenis = $_POST["idJenis"];
    $userInput = isset($_POST["userInput"]) ? $_POST["userInput"] : "";
    $nmItem = isset($_POST["nmItem"]) ? $_POST["nmItem"] : "";

    // Append user input to id_jenis to create id_item
    $idItem = $idJenis . $userInput;
    

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if id_item already exists
    $checkQuery = "SELECT * FROM tb_iitem WHERE id_item = '$idItem'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Error: id_item already exists.";
    } else {
        // Insert data into tb_item
        $insertQuery = "INSERT INTO tb_iitem (id_item, id_jenis, nm_item) VALUES ('$idItem', '$idJenis', '$nmItem')";

        if ($conn->query($insertQuery) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }


    // Close connection
    $conn->close();
}
?>
