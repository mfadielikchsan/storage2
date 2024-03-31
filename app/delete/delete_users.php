<?php
include('../../conf/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the user from the database
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn_pm, $query);

    // Redirect back to the main page or wherever you want after deleting the user
    header('Location: ../index.php?page=data-users');
    exit();
} else {
    // If no user ID is provided, redirect to the main page
    header('Location: ../index.php?page=data-users');
    exit();
}
?>
