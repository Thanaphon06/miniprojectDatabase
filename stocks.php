<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock สินค้า</title>
    <link rel="stylesheet" href="stock.css">
    <!-- นำเข้า Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2><i class="fas fa-store"></i> Admin <dir>Enterprise</dir></h2>
        </div>
        <ul class="menu">
            <li><a href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="product-management.html"><i class="fas fa-box"></i> การจัดการสินค้า</a></li>
            <li><a href="stock.html"><i class="fas fa-warehouse"></i> สต๊อก</a></li>
            <li><a href="sales-management.html"><i class="fas fa-shopping-cart"></i> การจัดการการขาย</a></li>
            <li><a href="sales-history.html"><i class="fas fa-history"></i> ประวัติการขาย</a></li>
            <li><a href="employee-management.html"><i class="fas fa-users"></i> การจัดการพนักงาน</a></li>
            <li><a href="customer-management.html"><i class="fas fa-chart-bar"></i> จัดการสมาชิกลูกค้า</a></li>
        </ul>
        <div class="logout">
            <a href="login.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <div class="content">
    <div class="form-container">
    <h2>เพิ่มสินค้า</h2>
    <form action="add_product.php" method="post">
        <label for="item">ชื่อสินค้า:</label>
        <input type="text" id="item" name="item" required>
        <label for="stock">จำนวน:</label>
        <input type="number" id="stock" name="stock" required>
        <label for="price">ต้นทุนต่อหน่วย:</label>
        <input type="number" id="price" name="price" required>
        <button type="submit">เพิ่มสินค้า</button>
    </form>
</div>

        <h1>Stock สินค้า</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>ต้นทุนต่อหน่วย</th>
                        <th>มูลค่าสินค้าในสต็อก</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                     <?php
                     
                    require 'database.php';
                    $query = "SELECT * FROM `stock`"; 

                    if ($is_query_run = mysqli_query($mysqli, $query)) 
                { 
                    // Loop through the data
                    while ($query_executed = $is_query_run->fetch_assoc()) 
                    { 
                        // Output data in table rows
                        echo "<tr>";
                        echo "<td>" . $query_executed['id'] . "</td>";
                        echo "<td>" . $query_executed['item'] . "</td>";
                        echo "<td>" . $query_executed['stock'] . "</td>";
                        echo "<td>" . $query_executed['price'] . "</td>";
                        echo "<td>" . $query_executed['total_s'] . "</td>";
                        echo "<td><a href='delete_product.php?id=" . $query_executed['id'] . "'>ลบ</a></td>";
                        echo "<td><a href='edit_product.php?id=" . $query_executed['id'] . "'>แก้ไข</a></td>";

                        echo "</tr>";
                    } 
                } 
                else 
                { 
                    echo "<tr><td colspan='3'>Error in execution!</td></tr>"; 
                } 
                ?>
 
                </tbody>
            </table>
        
    </div>
</body>
</html>
