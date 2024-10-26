<?php
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM stock WHERE id='$id'";
    $result = mysqli_query($mysqli, $query);
    $product = $result->fetch_assoc();
}
?>

<form action="update_product.php" method="post">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <label for="item">ชื่อสินค้า:</label>
    <input type="text" id="item" name="item" value="<?php echo $product['item']; ?>" required>
    <label for="stock">จำนวน:</label>
    <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required>
    <label for="price">ต้นทุนต่อหน่วย:</label>
    <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required>
    <button type="submit">บันทึกการแก้ไข</button>
</form>
