<?php
include('../conf/config.php');

$roles = [
  1 => 'Admin',
  2 => 'Supervisor',
  3 => 'Foreman',
  4 => 'Operator',
];

// Count the number of users
$userQuery = mysqli_query($conn_pm, "SELECT COUNT(id) AS jmluser FROM users");
$userView = mysqli_fetch_array($userQuery);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Users | Preventive Maintenance</title>
  </head>

  <body class="adminbody">
    <div id="main">
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
              </div>
            </div>
            <!-- kotak baru -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card mb-3">
                  <!-- tambah users -->
                  <div class="card-header" >
                    <h4 class="mb-2"><i class="fa fa-user"></i> All users (<?php echo $userView['jmluser'];?> users)</h4>
                    <span class="ml-auto" style="display: flex; justify-content: flex-end;">
                      <button
                        class="btn btn-primary btn-sm mt-2" 
                        data-toggle="modal"
                        data-target="#modal_add_user">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Add
                        new user
                      </button>
                    </span>
                    <div
                      class="modal fade custom-modal"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="modal_add_user"
                      aria-hidden="true"
                      id="modal_add_user"
                    >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form
                            action="add/tambah_users.php"
                            method="post"
                            enctype="multipart/form-data"
                          >
                          <div class="modal-header">
                              <h5 class="modal-title">Add new user</h5>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                              >
                                <span aria-hidden="true">&times;</span
                                ><span class="sr-only">Close</span>
                              </button>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Nama </label>
                                    <input
                                      class="form-control"
                                      name="nama"
                                      type="text"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>NPK </label>
                                    <input
                                      class="form-control"
                                      name="npk"
                                      type="text"
                                      required
                                    />
                                  </div>
                                </div>

                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input
                                      class="form-control"
                                      name="password"
                                      type="text"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Role</label>
                                    <select
                                      name="role_id"
                                      class="form-control"
                                      required>
                                      <option value="">- select -</option>
                                      <optgroup label="Admin">
                                        <option value="1">Admin</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Foreman</option>
                                      </optgroup>
                                      <optgroup label="Registered member">
                                        <option value="4">Operator</option>
                                      </optgroup>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Active</label>
                                    <select name="active" class="form-control">
                                      <option value="1">YES</option>
                                      <option value="0">NO</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Avatar image (optional):</label> <br />
                                <input type="file" name="image" />
                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">
                                Add user
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end add users -->

                  <!-- start tabel -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width='7%'>ID</th>
                            <th style="width: 250px">Nama</th>
                            <th style="width: 130px">NPK</th>
                            <th style="width: 130px">Role</th>
                            <th style="width: 120px">Active</th>
                            <th style="width: 150px">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $id = 0;
                            $query = mysqli_query($conn_pm, "SELECT * FROM users");
                            while($user = mysqli_fetch_array($query)){
                            $id++
                            ?>
                          <tr>
                            <td width='5%'><?php echo $id;?></td>
                            <td>
                              <span style="float: left; margin-right: 40px; margin-left: 10px">
                              <img alt="image" class="img-circle elevation" width="50" src="uploads/<?php echo $user['avatar_path'];?>"/>
                              </span>
                              <strong><?php echo $user['nama'];?></strong>
                            </td>
                            <td><?php echo $user['npk'];?></td>
                            <td><?php echo $roles[$user['role_id']];?></td>
                            <td><?php echo $user['active'];?></td>
                            <td>
                              <a onclick="hapus_data(<?php echo $user['id'];?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                              <a href="index.php?page=edit-users&& id=<?php echo $user['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th style="width: 50px">ID</th>
                            <th>User details</th>
                            <th style="width: 130px">NPK</th>
                            <th style="width: 130px">Role</th>
                            <th style="width: 120px">Active</th>
                            <th style="width: 200px">Actions</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
  
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
      window.location=("delete/delete_users.php?id="+data_id)
      // Swal.fire("Saved!", "", "success");
    } 
  })
}
</script>
</body>
</html>
