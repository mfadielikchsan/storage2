<?php
// Include your database connection file
include('../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nama = $_POST['nama'];
    $npk = $_POST['npk'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $active = $_POST['active'];

    // Check if an image file is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_path = '../dist/img/' . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    } else {
        $image_path = ''; // Set a default image path if no file is uploaded
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $query = "INSERT INTO users (nama, npk, password, role_id, active, avatar_path) VALUES ('$nama', '$npk', '$hashed_password', '$role_id', '$active', '$image_path')";
    mysqli_query($conn_pm, $query);

    // Redirect back to the main page or wherever you want after adding the user
    header('Location: ../index.php?page=data-users');
    exit();
}
?>
