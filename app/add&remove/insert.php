<?php

// insert.php

if (isset($_POST["item_name"])) {
    include('database_connection.php');
    $order_id = uniqid();

    for ($count = 0; $count < count($_POST["item_name"]); $count++) {
        $query = "INSERT INTO order_items (order_id, item_name, item_quantity, item_unit, item_instruksi) VALUES (:order_id, :item_name, :item_quantity, :item_unit, :item_instruksi)";

        $statement = $connect->prepare($query);

        $statement->execute(
            array(
                ':order_id' => $order_id,
                ':item_name' => $_POST["item_name"][$count],
                ':item_quantity' => $_POST["item_quantity"][$count],
                ':item_unit' => $_POST["item_unit"][$count],
                ':item_instruksi' => $_POST["item_instruksi"][$count]
            )
        );
    }

    // Tambahkan pemrosesan data untuk tabel tb_bagian dan tb_instruksikerja sesuai kebutuhan
    // ...

    $result = $statement->fetchAll();

    if (isset($result)) {
        echo 'ok';
    }
}

?>
