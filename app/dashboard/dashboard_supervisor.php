<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Preventive Maintenance</title>
</head>
<body>
  
</body>
</html>
<section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" id="report-mesin">
            <?php include('banner/banner_supervisor1.php');?>
            </div>
          </div>
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" id="report-mesin">
            <?php include('banner/banner_supervisor2.php');?>
            </div>
          </div>
          <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h1 class="card-title"><b>Already Schedule</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i>
                  Tambah Mesin
                </button> -->
                <!-- <br></br> -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Produksi</th>
                    <th>Line</th>
                    <th>Nomor Mesin</th>
                    <th>Nama Mesin</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 0;
                    $query = mysqli_query($conn_pm, "SELECT * FROM mesin");
                    while($mesin = mysqli_fetch_array($query)){
                      $id++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $id;?></td>
                    <td><?php echo $mesin['prod'];?></td>
                    <td><?php echo $mesin['linename'];?></td>
                    <td><?php echo $mesin['mcno'];?></td>
                    <td><?php echo $mesin['machine'];?></td>
                    <td>
                      <a onclick="hapus_data(<?php echo $mesin['id'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                      <a href="index.php?page=edit-mesin&& id=<?php echo $mesin['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Produksi</th>
                    <th>Line</th>
                    <th>Nomor Mesin</th>
                    <th>Nama Mesin</th>
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