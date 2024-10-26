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


        <h1>Stock สินค้า</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>สินค้า</th>
                        <th>ราคา</th>
                        <th>ประเภทสินค้า</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                     <?php
                     
                    require 'database.php';
                    $query = "SELECT item.i_id , item.i_name , item.i_price , type_item.t_name FROM item INNER JOIN type_item ON item.t_id = type_item.t_id;"; 

                    if ($is_query_run = mysqli_query($mysqli, $query)) 
                { 
                    // Loop through the data
                    while ($query_executed = $is_query_run->fetch_assoc()) 
                    { 
                        // Output data in table rows
                        echo "<tr>";
                        echo "<td>" . $query_executed['i_id'] . "</td>";
                        echo "<td>" . $query_executed['i_name'] . "</td>";
                        echo "<td>" . $query_executed['i_price'] . "</td>";
                        echo "<td>" . $query_executed['t_name'] . "</td>";
                     

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