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

        <h1>Employee พนักงาน</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>รหัสประเภทสินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>รายละเอียดสินค้า</th>

                       
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                     <?php
                     
                    require 'database.php';
                    $query = "SELECT * FROM `type_item`"; 

                    if ($is_query_run = mysqli_query($mysqli, $query)) 
                { 
                    // Loop through the data
                    while ($query_executed = $is_query_run->fetch_assoc()) 
                    { 
                        // Output data in table rows
                        echo "<tr>";
                        echo "<td>" . $query_executed['t_id'] . "</td>";
                        echo "<td>" . $query_executed['t_name'] . "</td>";
                        echo "<td>" . $query_executed['t_detail'] . "</td>";
                      
                       // echo "<td><a href='delete_product.php?id=" . $query_executed['id'] . "'>ลบ</a></td>";
                        //echo "<td><a href='edit_product.php?id=" . $query_executed['id'] . "'>แก้ไข</a></td>";

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
