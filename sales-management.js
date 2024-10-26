document.getElementById('addSaleForm').addEventListener('input', calculateTotal);

// คำนวณยอดรวม (ราคาต่อหน่วย x จำนวน) - ส่วนลด
function calculateTotal() {
    const price = parseFloat(document.getElementById('productPrice').value) || 0;
    const quantity = parseFloat(document.getElementById('quantity').value) || 0;
    const discount = parseFloat(document.getElementById('discount').value) || 0;
    const total = (price * quantity) - discount;
    document.getElementById('total').value = total > 0 ? total : 0;

    // อัปเดตแต้มสะสม (1 แต้มต่อทุก 100 บาท)
    const pointsAdded = Math.floor(total / 100);
    document.getElementById('pointsAdded').value = pointsAdded;
}

// แสดง/ซ่อนข้อมูลสมาชิก
function toggleMemberInfo() {
    const memberInfo = document.getElementById('memberInfo');
    const isMember = document.getElementById('isMember').value;
    
    if (isMember === 'สมาชิก') {
        memberInfo.style.display = 'block';
    } else {
        memberInfo.style.display = 'none';
        // ล้างค่าฟอร์มสมาชิก
        document.getElementById('memberCode').value = '';
        document.getElementById('memberName').value = '';
        document.getElementById('pointsAdded').value = '';
        document.getElementById('totalPoints').value = '';
    }
}
