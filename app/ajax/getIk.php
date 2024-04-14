<?php
    $host_mesin = "localhost";
    $user_mesin = "root";
    $password_mesin = "";
    $database_pm = "db_pm";
    $conn_pm = mysqli_connect($host_mesin, $user_mesin, $password_mesin, $database_pm);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $sql = "SELECT * 
                FROM tb_detail_item det 
                join tb_instruksikerja ik on det.id_Bagian = ik.id_Bagian
                join tb_bagian bag on det.id_Bagian = bag.id_Bagian
                WHERE det.id_Item = '$id'";
        $result = $conn_pm->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }
?>