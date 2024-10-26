// ตัวอย่างข้อมูลลูกค้า
let customers = [
    { id: 1, name: "สมชาย", points: 150 },
    { id: 2, name: "สมศรี", points: 200 },
];

function renderCustomerList() {
    const customerTableBody = document.querySelector("#customerTable tbody");
    customerTableBody.innerHTML = ""; // ลบข้อมูลเดิม

    customers.forEach((customer, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${customer.name}</td>
            <td>${customer.points}</td>
            <td>
                <button class="edit-btn" onclick="editCustomer(${customer.id})">แก้ไข</button>
                <button class="delete-btn" onclick="deleteCustomer(${customer.id})">ลบ</button>
            </td>
        `;
        customerTableBody.appendChild(row);
    });
}

// เพิ่มลูกค้าใหม่
document.getElementById("addCustomerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const customerName = document.getElementById("customerName").value;
    const customerPoints = document.getElementById("customerPoints").value;

    if (customerName && customerPoints) {
        const newCustomer = {
            id: customers.length + 1,
            name: customerName,
            points: parseInt(customerPoints),
        };

        customers.push(newCustomer);
        renderCustomerList();

        // ล้างข้อมูลในฟอร์ม
        document.getElementById("customerName").value = "";
        document.getElementById("customerPoints").value = "";
    }
});

// แก้ไขลูกค้า
function editCustomer(id) {
    const customer = customers.find(cust => cust.id === id);
    const newPoints = prompt(`ปรับปรุงแต้มสะสมของลูกค้า ${customer.name}:`, customer.points);

    if (newPoints !== null) {
        customer.points = parseInt(newPoints);
        renderCustomerList();
    }
}

// ลบลูกค้า
function deleteCustomer(id) {
    if (confirm("คุณแน่ใจหรือไม่ว่าต้องการลบลูกค้าคนนี้?")) {
        customers = customers.filter(cust => cust.id !== id);
        renderCustomerList();
    }
}

// เรียกใช้เมื่อเริ่มต้น
window.onload = () => {
    renderCustomerList();
};
