// กำหนดตัวแปรสำหรับการเก็บข้อมูลสินค้า
let products = [];
let productId = 1; // ตัวนับสำหรับ ID สินค้า

// ฟังก์ชันสำหรับการเพิ่มสินค้า
document.getElementById('productForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // รับค่าจากฟอร์ม
    const productName = document.getElementById('productName').value;
    const productQty = document.getElementById('productQty').value;
    const productCost = document.getElementById('productCost').value;
    const productImage = document.getElementById('productImage').files[0];

    // ตรวจสอบว่าผู้ใช้เลือกไฟล์รูปภาพหรือไม่
    if (!productImage) {
        alert('กรุณาเลือกรูปภาพสินค้า');
        return;
    }

    // อ่านไฟล์รูปภาพและเก็บข้อมูลในรูปแบบ base64
    const reader = new FileReader();
    reader.onloadend = function() {
        const productImageSrc = reader.result;

        // สร้างอ็อบเจ็กต์สำหรับสินค้าใหม่
        const newProduct = {
            id: productId++,
            name: productName,
            qty: productQty,
            cost: productCost,
            imageSrc: productImageSrc
        };

        // เพิ่มสินค้าใหม่ลงในรายการสินค้า
        products.push(newProduct);

        // อัปเดตตารางสินค้า
        updateProductTable();

        // ล้างค่าฟอร์มหลังจากเพิ่มสินค้าเสร็จ
        document.getElementById('productForm').reset();
    };

    reader.readAsDataURL(productImage);
});

// ฟังก์ชันสำหรับอัปเดตตารางสินค้า
function updateProductTable() {
    const tableBody = document.querySelector('#productTable tbody');
    tableBody.innerHTML = ''; // ล้างตารางก่อน

    // สร้างแถวในตารางสำหรับแต่ละสินค้า
    products.forEach(product => {
        const row = document.createElement('tr');

        // สร้างเซลล์สำหรับแต่ละคอลัมน์
        row.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.qty}</td>
            <td>฿${product.cost}</td>
            <td>฿${product.qty * product.cost}</td>
            <td><img src="${product.imageSrc}" alt="${product.name}" width="60" height="60"></td>
            <td class="action-buttons">
                <button class="edit" onclick="editProduct(${product.id})">แก้ไข</button>
                <button class="delete" onclick="deleteProduct(${product.id})">ลบ</button>
            </td>
        `;

        // เพิ่มแถวใหม่ลงในตาราง
        tableBody.appendChild(row);
    });
}

// ฟังก์ชันสำหรับแก้ไขสินค้า
function editProduct(id) {
    const product = products.find(p => p.id === id);
    if (product) {
        // เติมข้อมูลลงในฟอร์มเพื่อให้ผู้ใช้แก้ไข
        document.getElementById('productName').value = product.name;
        document.getElementById('productQty').value = product.qty;
        document.getElementById('productCost').value = product.cost;

        // ลบสินค้าเก่าออกจากรายการก่อนเพิ่มสินค้าใหม่
        deleteProduct(id);
    }
}

// ฟังก์ชันสำหรับลบสินค้า
function deleteProduct(id) {
    products = products.filter(product => product.id !== id);
    updateProductTable();
}
