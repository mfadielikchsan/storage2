<?php

$conn = new PDO('mysql:host=localhost;dbname=db_pm', 'root', '');
foreach($_POST['product_name'] as $key => $value) {
    $sql = 'INSERT INTO mesin(mcno) VALUES(:mesinno)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':mesinno' => $value,
    ]);
}
echo 'Item inserted successfully';
?>