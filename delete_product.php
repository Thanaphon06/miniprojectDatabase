<?php
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM stock WHERE id='$id'";

    if (mysqli_query($mysqli, $query)) {
        echo "ลบสินค้าสำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($mysqli);
    }
}
?>
