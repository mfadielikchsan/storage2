<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Item | Preventive Maintenance</title>
</head>
<body>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <dv class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel List Item Pengecekan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i>
                  Tambah Item Pengecekan
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Item</th>
            <th>NAMA ITEM</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($conn_pm, "SELECT * FROM tb_item");
  while 
  ($item = mysqli_fetch_array($query)) {
    // Lakukan sesuatu dengan data yang diambil dari database

            ?>
            <tr>
                <td><?php echo $item['id_Item']; ?></td>
                <td><?php echo $item['nm_Item']; ?></td>
                <td>
                    <a onclick="hapus_data(<?php echo $item['id_Item']; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="index.php?page=edit-itemkerja&& id_Item=<?php echo $item['id_Item']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID ITEM</th>
            <th>NAMA ITEM</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- tambah bagian -->
            <form method="post" action="add/tambah_itemkerja.php">
            <div class="modal-body">
                <div class="form-row">
                  <div class="col mb-2">
                  <div class="input-group">
                    <!-- Input id_Bagian -->
                    <input type="hidden" name="id_Item" value="<?php echo $row['id_Item']; ?>">
                  </div>
                  </div>
                </div>
                  <div class="form-row">
                    <div class="col mb-2">
                        <label for="labelitem">Nama Item</label>
                        <input type="text" class="form-control" id="nm_Item" name="nm_Item" required>

                        <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nm_Form = isset($_POST["nm_Item"]) ? $_POST["nm_Item"] : "";

                    // Memeriksa apakah nama form sudah ada dalam database
                    $query_check = mysqli_query($conn_pm, "SELECT COUNT(*) AS count FROM tb_item WHERE nm_Item = '$nm_Item'");
                    $row_check = mysqli_fetch_assoc($query_check);
                    $count = $row_check['count'];

                    if ($count > 0) {
                        // Jika nama form sudah ada dalam database, tampilkan pesan di bawah field teks
                        echo "<span style='color: red; font-size: 12px;'>Nama Form sudah ada dalam database!</span>";
                    }
                }
                ?>
                    </div>
                  </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script>  
function hapus_data(data_id){
  Swal.fire({
    title: "Apakah Datanya akan Dihapus?",
    // showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: "Hapus Data",
    ConfirmButtonColor: "#CD5C5C",
    // denyButtonText: `Don't save`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      window.location=("delete/delete_item.php?id_Item=" + data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  });
}
</script>
</body>
</html>