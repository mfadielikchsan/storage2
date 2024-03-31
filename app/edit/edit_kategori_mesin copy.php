<?php 
include('../conf/config.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the mesin data based on the provided ID
    $query = mysqli_query($conn_mesin, "SELECT * FROM mesin WHERE id = $id");
    $mesin = mysqli_fetch_assoc($query);

    
}  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updating mesin data
    // Make sure to perform validation and sanitation as needed

    // Example update query (you need to modify this based on your database structure)
    $updateQuery = "UPDATE mesin SET 
        prod = '{$_POST['prod']}', 
        subline = '{$_POST['subline']}',
        linename = '{$_POST['linename']}',
        linecode = '{$_POST['linecode']}',
        mcno = '{$_POST['mcno']}',
        lineno = '{$_POST['lineno']}',
        machine = '{$_POST['machine']}',
        maker = '{$_POST['maker']}',
        fixedasset = '{$_POST['fixedasset']}',
        fixedassetnew = '{$_POST['fixedassetnew']}',
        machno = '{$_POST['machno']}',
        old_mc_no = '{$_POST['old_mc_no']}',
        catatan = '{$_POST['catatan']}',
        machinegroup = '{$_POST['machinegroup']}',
        location = '{$_POST['location']}',
        machinebase = '{$_POST['machinebase']}',
        pendingcode = '{$_POST['pendingcode']}',
        type = '{$_POST['type']}',
        serialno = '{$_POST['serialno']}',
        country = '{$_POST['country']}',
        process = '{$_POST['process']}',
        year = '{$_POST['year']}',
        status = '{$_POST['status']}',
        keterangan = '{$_POST['keterangan']}',
        nourut = '{$_POST['nourut']}',
        plant = '{$_POST['plant']}',
        linecode2 = '{$_POST['linecode2']}',
        ins_usr = '{$_POST['ins_usr']}'
        WHERE id = $id";


    if (mysqli_query($conn_mesin, $updateQuery)) {
        // Insert data into tb_kat_mesin after successful update
        $id = mysqli_real_escape_string($conn_mesin, $_POST['id']);
        $kategoriMesin = mysqli_real_escape_string($conn_pm, $_POST['kategori_mesin']);
        if (isset($mesin['id_kat_mesin'])) {
          $id_kat_mesin = mysqli_real_escape_string($conn_pm, $mesin['id_kat_mesin']);
      } else {
          // Handle the case where id_kat_mesin is not set
          $id_kat_mesin = '';  // Or set a default value
      }

        $insertKatMesinQuery = "INSERT INTO db_pm.kat_mesin (id, kategori_mesin) VALUES ('$id', '$kategoriMesin')";

        
        if (mysqli_query($conn_mesin, $insertKatMesinQuery)) {
            // Redirect to index.php after successful update and insertion
            header('Location: ../index.php?page=data-kategori-mesin');
            exit();
        } else {
            // Handle errors if the insert query fails
            echo "Error inserting record into tb_kat_mesin: " . mysqli_error($conn_mesin);
        }
    } else {
        // Handle errors if the update query fails
        echo "Error updating record in mesin table: " . mysqli_error($conn_mesin);
    }
}
?>
<section class="content">
    <div class="container-fluid">
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Mesin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $mesin['id']; ?>">
                  <div class="row">
                  <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Produksi</label>
                        <select class="custom-select" id="inputGroupSelect01" name="prod">
                            <option value="<?php echo $mesin['prod'];?>" selected><?php echo $mesin['prod'];?></option>
                            <option value="1">PROD1</option>
                            <option value="2">PROD2</option>
                            <option value="3">PROD3</option>
                            <option value="4">PROD4</option>
                            <option value="5">PROD5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Subline</label>
                        <input type="text" class="form-control" placeholder="Sub line" name="subline" value="<?php echo $mesin['subline'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Line</label>
                        <input type="text" class="form-control" placeholder="Line" name="linename" value="<?php echo $mesin['linename'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode Line</label>
                        <input type="text" class="form-control" placeholder="Kode Line" name="linecode" value="<?php echo $mesin['linecode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nomor Mesin</label>
                        <input type="text" class="form-control" placeholder="Nomor Mesin" name="mcno" value="<?php echo $mesin['mcno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Mesin Ke</label>
                        <input type="text" class="form-control" placeholder="Mesin Ke" name="machno" value="<?php echo $mesin['machno'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Line</label>
                        <select class="custom-select" id="inputGroupSelect01" name="lineno">
                            <option value="<?php echo $mesin['lineno'];?>" selected><?php echo $mesin['lineno'];?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">6</option>
                            <option value="8">7</option>
                            <option value="9">8</option>
                            <option value="10">9</option>
                            <option value="11">10</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Fix Set New</label>
                        <input type="text" class="form-control" placeholder="Fix Set New" name="fixedassetnew" value="<?php echo $mesin['fixedassetnew'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Fix Asset</label>
                        <input type="text" class="form-control" placeholder="Fix Asset" name="fixedasset" value="<?php echo $mesin['fixedasset'];?>">
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Old Mesin</label>
                        <input type="text" class="form-control" placeholder="Old Mesin" name="old_mc_no" value="<?php echo $mesin['old_mc_no'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Serial</label>
                        <input type="text" class="form-control" placeholder="Nomor Serial" name="serialno" value="<?php echo $mesin['serialno'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nama Mesin</label>
                        <input type="text" class="form-control" placeholder="Nama Mesin" name="machine" value="<?php echo $mesin['machine'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Maker</label>
                        <input type="text" class="form-control" placeholder="Maker" name="maker" value="<?php echo $mesin['maker'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mesin</label>
                        <input type="text" class="form-control" placeholder="Mesin" name="machinegroup" value="<?php echo $mesin['machinegroup'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" placeholder="Lokasi" name="location" value="<?php echo $mesin['location'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Negara</label>
                        <input type="text" class="form-control" placeholder="Negara" name="country" value="<?php echo $mesin['country'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" placeholder="Tahun" name="year" value="<?php echo $mesin['year'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $mesin['status'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" class="form-control" placeholder="Catatan" name="catatan" value="<?php echo $mesin['catatan'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Plant</label>
                        <input type="text" class="form-control" placeholder="Plant" name="plant" value="<?php echo $mesin['plant'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Dasar Mesin</label>
                        <input type="text" class="form-control" placeholder="Dasar Mesin" name="machinebase" value="<?php echo $mesin['machinebase'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ins User</label>
                        <input type="text" class="form-control" placeholder="Ins User" name="ins_usr" value="<?php echo $mesin['ins_usr'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kode Pending</label>
                        <input type="text" class="form-control" placeholder="Kode Pending" name="pendingcode" value="<?php echo $mesin['pendingcode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" placeholder="Tipe" name="type" value="<?php echo $mesin['type'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Proses</label>
                        <input type="text" class="form-control" placeholder="Proses" name="process" value="<?php echo $mesin['process'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="<?php echo $mesin['keterangan'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nomor Urut</label>
                        <input type="text" class="form-control" placeholder="Nomor Urut" name="nourut" value="<?php echo $mesin['nourut'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Line Code 2</label>
                        <input type="text" class="form-control" placeholder="Line Code 2" name="linecode2" value="<?php echo $mesin['linecode2'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kode Pending</label>
                        <input type="text" class="form-control" placeholder="Kode Pending" name="pendingcode" value="<?php echo $mesin['pendingcode'];?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" placeholder="kategori" name="kategori_mesin" value="<?php echo isset($mesin['kategori_mesin']) ? $mesin['kategori_mesin'] : ''; ?>">
                      </div>
                    </div>
                </div>
                    <!--  -->
                  <div class="row">
                  <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- </div> -->
              <!-- /.card-body -->
            </div>
    </div>
</section>