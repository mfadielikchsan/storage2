<?php
session_start();

// Periksa jika pengguna tidak masuk, redirect ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Periksa peran pengguna
$userRole = $_SESSION['user_role'];

// Redirect berdasarkan peran pengguna
switch ($userRole) {
    case 1:
        // Admin, lanjutkan dengan kode HTML yang ada
        ?>
        <!-- ... (HTML untuk admin) ... -->
        <?php
        break;
    case 2:
        // Supervisor, lanjutkan dengan kode HTML yang sesuai
        ?>
        <!-- ... (HTML untuk supervisor) ... -->
        <?php
        break;
    case 3:
        // Foreman, lanjutkan dengan kode HTML yang sesuai
        ?>
        <!-- ... (HTML untuk foreman) ... -->
        <?php
        break;
    case 4:
        // Operator, lanjutkan dengan kode HTML yang sesuai
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Operator Dashboard | Preventive Maintenance</title>
            <!-- Tambahkan Bootstrap CSS jika diperlukan -->
        </head>

        <body class="operatorbody">
            <div id="main">
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- Tempatkan konten operator Anda di sini -->
                                    <h1>Selamat datang, <?php echo $_SESSION['user_nama']; ?>!</h1>
                                    <p>Ini adalah halaman dashboard operator. Anda dapat melanjutkan dengan menambahkan konten dan fitur sesuai kebutuhan.</p>
                                    <!-- ... (tambahkan lebih banyak konten sesuai kebutuhan) -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END content -->
                </div>
                <!-- END content-page -->
            </div>
            <!-- END main -->

            <!-- Tambahkan Bootstrap JS dan jQuery jika diperlukan -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </body>

        </html>
        <?php
        break;
    default:
        // Untuk peran lain, redirect ke halaman yang sesuai atau tampilkan pesan kesalahan
        header("Location: unauthorized.php");
        exit();
}
?>
