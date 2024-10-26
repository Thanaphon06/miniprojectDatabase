<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $total_s = $stock * $price;

    $query = "INSERT INTO stock (item, stock, price, total_s) VALUES ('$item', '$stock', '$price', '$total_s')";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>
            alert('เพิ่มสินค้าสำเร็จ');
            setTimeout(function(){
                window.location.href = 'stocks.php'; // ใส่หน้าที่ต้องการกลับไป
            }, 2000); // 2000 มิลลิวินาที = 2 วินาที
        </script>";
    } else {
        echo "<script>
        alert('เกิดข้อผิดพลาด: " . mysqli_error($mysqli) . "');
        setTimeout(function(){
            window.location.href = 'stocks.php'; // หรือหน้าอื่นที่ต้องการกลับไป
        }, 2000); // 2000 มิลลิวินาที = 2 วินาที
    </script>";
    }
}
?>
