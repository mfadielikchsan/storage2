<?php
// Include your database connection file
include('../../conf/config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
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
        // If no new image is uploaded, keep the existing image path
        $image_path = $_POST['existing_image_path'];
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update data in the database
    $query = "UPDATE users SET nama='$nama', npk='$npk', password='$hashed_password', role_id='$role_id', active='$active', avatar_path='$image_path' WHERE id='$id'";
    mysqli_query($conn_pm, $query);

    // Redirect back to the main page or wherever you want after updating the user
    header('Location: ../index.php?page=data-users');
    exit();
}

// Fetch user data for pre-filling the form
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $result = mysqli_query($conn_pm, "SELECT * FROM users WHERE id='$id'");
//     $user = mysqli_fetch_assoc($result);

    // Check if the user is found
//     if (!$user) {
//         // If no user is found, redirect to the main page
//         header('Location: ../index.php?page=data-users');
//         exit();
//     }
// } else {
//     // If no user ID is provided, redirect to the main page
//     header('Location: ../index.php?page=data-users');
//     exit();
// }
?>