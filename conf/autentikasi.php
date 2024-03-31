<?php 
session_start();
include ('config.php');

// Periksa jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npk = $_POST['npk'];
    $password = $_POST['password'];

    // Ambil data pengguna berdasarkan NPK yang diberikan
    $result = mysqli_query($conn_pm, "SELECT * FROM users WHERE npk='$npk'");
    $user = mysqli_fetch_assoc($result);

    // Verifikasi kata sandi
    if ($user && password_verify($password, $user['password'])) {
        // Kata sandi benar, set variabel sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nama'] = $user['nama'];
        $_SESSION['user_role'] = $user['role_id'];

        // Redirect berdasarkan peran pengguna
        switch ($user['role_id']) {
            case 1:
                header('Location:../app/index.php'); // Admin
                break;
            case 2:
                header('Location:../app/index2.php'); // Supervisor
                break;
            case 3:
                header('Location:../app/index3.php'); // Foreman
                break;
            case 4:
                header('Location:../app/index4.php'); // Operator
                break;
            default:
                // Tangani peran lain jika diperlukan
                break;
        }
        exit();
    } else if($npk == '' || $password ==''){
    header('Location:../index.php?error=2');
    }else {
        // Login tidak valid, tampilkan pesan kesalahan
        header('Location:../index.php?error=1');
    }
} else {
    // Pengecekan tambahan untuk mencegah pengguna masuk ulang setelah login
    if (isset($_SESSION['user_id'])) {
        // Pengguna sudah masuk, redirect ke dashboard sesuai peran
        switch ($_SESSION['user_role']) {
            case 1:
                header('Location:../app/index.php'); // Admin
                break;
            case 2:
                header('Location:../app/index2.php'); // Supervisor
                break;
            case 3:
                header('Location:../app/index3.php'); // Foreman
                break;
            case 4:
                header('Location:../app/index4.php'); // Operator
                break;
            default:
                // Tangani peran lain jika diperlukan
                break;
        }
        exit();
    }
}
?>

