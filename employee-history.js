// ตัวอย่างข้อมูลพนักงานและประวัติ
const employees = [
    { id: 1, name: "สมชาย", loginHistory: [{ date: "2024-09-28", inTime: "08:00", outTime: "17:00" }], salesHistory: [{ date: "2024-09-28", item: "มาม่า", quantity: 5, total: 100 }] },
    { id: 2, name: "สมศรี", loginHistory: [{ date: "2024-09-29", inTime: "09:00", outTime: "18:00" }], salesHistory: [{ date: "2024-09-29", item: "ปลากระป๋อง", quantity: 10, total: 150 }] }
];

function loadEmployeeHistory() {
    const select = document.getElementById("employeeSelect");
    const selectedEmployee = employees.find(emp => emp.id === parseInt(select.value));
    
    if (selectedEmployee) {
        renderLoginHistory(selectedEmployee.loginHistory);
        renderSalesHistory(selectedEmployee.salesHistory);
    }
}

function renderLoginHistory(history) {
    const tableBody = document.querySelector("#loginHistoryTable tbody");
    tableBody.innerHTML = ""; // เคลียร์ข้อมูลเก่าก่อน

    history.forEach(entry => {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${entry.date}</td><td>${entry.inTime}</td><td>${entry.outTime}</td>`;
        tableBody.appendChild(row);
    });
}

function renderSalesHistory(history) {
    const tableBody = document.querySelector("#salesHistoryTable tbody");
    tableBody.innerHTML = ""; // เคลียร์ข้อมูลเก่าก่อน

    history.forEach(entry => {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${entry.date}</td><td>${entry.item}</td><td>${entry.quantity}</td><td>${entry.total}</td>`;
        tableBody.appendChild(row);
    });
}

function editEmployee() {
    const select = document.getElementById("employeeSelect");
    const employeeName = select.options[select.selectedIndex].text;
    alert(`แก้ไขข้อมูลของพนักงาน: ${employeeName}`);
    // เพิ่มฟังก์ชันแก้ไขพนักงานที่นี่
}

function deleteEmployee() {
    const select = document.getElementById("employeeSelect");
    const employeeName = select.options[select.selectedIndex].text;
    if (confirm(`คุณต้องการลบพนักงาน ${employeeName} จริงหรือไม่?`)) {
        // ลบข้อมูลพนักงานจากฐานข้อมูลหรือรายการพนักงาน
        alert(`พนักงาน ${employeeName} ถูกลบเรียบร้อยแล้ว`);
    }
}

function filterHistory() {
    const searchInput = document.getElementById("searchHistory").value.toLowerCase();
    const loginRows = document.querySelectorAll("#loginHistoryTable tbody tr");
    const salesRows = document.querySelectorAll("#salesHistoryTable tbody tr");

    loginRows.forEach(row => {
        const date = row.children[0].textContent.toLowerCase();
        row.style.display = date.includes(searchInput) ? "" : "none";
    });

    salesRows.forEach(row => {
        const date = row.children[0].textContent.toLowerCase();
        row.style.display = date.includes(searchInput) ? "" : "none";
    });
}

function sortHistory(column) {
    const table = column === 'login' ? document.querySelector("#loginHistoryTable tbody") : document.querySelector("#salesHistoryTable tbody");
    const rowsArray = Array.from(table.rows);

    rowsArray.sort((a, b) => {
        const dateA = new Date(a.cells[0].textContent);
        const dateB = new Date(b.cells[0].textContent);
        return dateA - dateB;
    });

    rowsArray.forEach(row => table.appendChild(row)); // แทรกแถวเรียงใหม่
}

// ฟังก์ชันโหลดข้อมูลพนักงานตอนเริ่มต้น
function initEmployeeList() {
    const select = document.getElementById("employeeSelect");
    employees.forEach(emp => {
        const option = document.createElement("option");
        option.value = emp.id;
        option.text = emp.name;
        select.appendChild(option);
    });
}

// เรียกใช้งานฟังก์ชันเมื่อโหลดหน้าเสร็จ
window.onload = () => {
    initEmployeeList();
};
