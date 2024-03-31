
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kategori Mesin | Preventive Maintenance</title>
</head>
<body>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel List Kategori Mesin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i> Tambah Kategori Mesin
                </button> -->
                Keterangan: 
                <br>
                - Mesin Kategori A = 1 Jam
                <br>
                - Mesin Kategori B = 1,5 Jam
                <br>
                - Mesin Kategori C = 2 Jam
                <br>
                - Mesin Kategori D = 2,5 Jam
                <br>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                <!-- <table  class="table table-bordered table-striped"> -->
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Line</th>
                    <th>Nomor Mesin</th>
                    <th>Mesin</th>
                    <th>Kategori</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 0;
                    $query = mysqli_query($conn_mesin, "SELECT * FROM mesin");
                    while ($mesin = mysqli_fetch_array($query)) {
                        $id++;
                    $kategori_query = mysqli_query($conn_pm, "SELECT * FROM kat_mesin WHERE id = {$mesin['id']}");
                    $kategori = mysqli_fetch_array($kategori_query);
                    if ($kategori !== null) {
                    } else {
                    }
                    ?>
                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo preg_replace('/(?<=\w)(?=[A-Z])/', ' ', $mesin['linename']);?></td>
                    <td width='5%'><?php echo $mesin['mcno'];?></td>
                    <td><?php echo $mesin['machine'];?></td>
                    <?php 
                    ?>
                    <td width='4%'>
                      <?php 
                      if ($kategori !== null) {
                          echo $kategori['kategori_mesin'];
                      } else {
                          echo "N"; // You can customize this message
                      }
                      ?>
                  </td>
                    <td>
                      <a onclick="hapus_data(<?php echo $mesin['id'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      <a href="index.php?page=edit-kategori&& id=<?php echo $mesin['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Line</th>
                    <th>Nomor Mesin</th>
                    <th>Mesin</th>
                    <th>Kategori</th>
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

      
      <script>
function hapus_data(data_id){
  // alert('oke');
  // window.location=("delete/delete_mahasiswa.php?id="+data_id);
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
      window.location=("delete/delete_mesin.php?id="+data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  })
}
</script>
</body>
</html>