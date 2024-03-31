<?php
$id = $_GET['id'];
$result = mysqli_query($conn_pm, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Edit User | Preventive Maintenance</title>
</head>

<body class="adminbody">
    <div id="main">
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Edit user form -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h4 class="mb-2"><i class="fa fa-user"></i> Edit User</h4>
                                </div>
                                <div class="card-body">
                                    <form action="update/update_users.php" method="post" enctype="multipart/form-data">
                                        <!-- Hidden input for user ID -->
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        <!-- Hidden input for existing image path -->
                                        <input type="hidden" name="existing_image_path"
                                            value="<?php echo $user['avatar_path']; ?>">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Full name </label>
                                                        <input class="form-control" name="nama" type="text"
                                                            value="<?php echo $user['nama']; ?>" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>NPK </label>
                                                        <input class="form-control" name="npk" type="text"
                                                            value="<?php echo $user['npk']; ?>" required />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password" type="text"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select name="role_id" class="form-control" required>
                                                            <option value="">- select -</option>
                                                            <optgroup label="Admin">
                                                                <option value="1"
                                                                    <?php echo ($user['role_id'] == 1) ? 'selected' : ''; ?>>
                                                                    Admin
                                                                </option>
                                                                <option value="2"
                                                                    <?php echo ($user['role_id'] == 2) ? 'selected' : ''; ?>>
                                                                    Supervisor
                                                                </option>
                                                                <option value="3"
                                                                    <?php echo ($user['role_id'] == 3) ? 'selected' : ''; ?>>
                                                                    Foreman
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Registered member">
                                                                <option value="4"
                                                                    <?php echo ($user['role_id'] == 4) ? 'selected' : ''; ?>>
                                                                    Operator
                                                                </option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Active</label>
                                                        <select name="active" class="form-control">
                                                            <option value="1" <?php echo ($user['active'] == 1) ? 'selected' : ''; ?>>
                                                                YES
                                                            </option>
                                                            <option value="0" <?php echo ($user['active'] == 0) ? 'selected' : ''; ?>>
                                                                NO
                                                            </option>
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
                                            <button type="submit" class="btn btn-primary">Update user</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End edit user form -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
    </div>
    <!-- END main -->

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
