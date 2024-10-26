<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $item = $_POST['item'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $total_s = $stock * $price;

    $query = "UPDATE stock SET item='$item', stock='$stock', price='$price', total_s='$total_s' WHERE id='$id'";

    if (mysqli_query($mysqli, $query)) {
        echo "แก้ไขสินค้าสำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($mysqli);
    }
}
?>
