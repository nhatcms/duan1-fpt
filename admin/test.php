<?php
// Dữ liệu đơn hàng mẫu
$orders = [
    ["id" => 1, "user_name" => "John Doe", "total_amount" => 1000, "date" => "2023-01-01", "status" => "Processing"],
    ["id" => 2, "user_name" => "Jane Smith", "total_amount" => 2000, "date" => "2023-01-02", "status" => "Completed"],
    ["id" => 3, "user_name" => "Michael Brown", "total_amount" => 1500, "date" => "2023-01-03", "status" => "Pending"],
    // Add more sample data as needed
];

// Xử lý AJAX
if (isset($_GET['ajax']) && $_GET['ajax'] === 'true') {
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Lọc dữ liệu theo mã đơn hàng (search)
    $filteredOrders = array_filter($orders, function($order) use ($search) {
        return !$search || strpos((string)$order['id'], $search) !== false;
    });

    // Giới hạn số dòng
    $filteredOrders = array_slice($filteredOrders, 0, $limit);

    // Xuất dữ liệu dạng bảng
    ob_start();
    ?>
    <table class="table table-striped align-middle" id="table">
        <thead class="table-light">
            <tr>
                <th>Mã đơn</th>
                <th>Tên người mua</th>
                <th>Tổng tiền</th>
                <th>Ngày giờ</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredOrders as $order): ?>
                <tr>
                    <td><?= $order["id"] ?></td>
                    <td><?= $order["user_name"] ?></td>
                    <td><?= number_format($order["total_amount"]) ?></td>
                    <td><?= $order["date"] ?></td>
                    <td>
                        <span class="badge bg-<?= $order["status"] == "Processing"
                            ? "warning text-dark"
                            : ($order["status"] == "Completed" ? "success" : "danger") ?>">
                            <?= $order["status"] ?>
                        </span>
                    </td>
                    <td>
                        <a href="?action=editProduct&id=<?= $order["id"] ?>" class="btn btn-warning">
                            <i class="bi bi-eye"></i> Chi tiết
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    echo ob_get_clean();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Đơn hàng</h2>
        <div>
            <input type="text" id="search" class="form-control d-inline-block w-auto me-2" placeholder="Tìm theo mã đơn">
            <select id="limit" class="form-select d-inline-block w-auto me-2">
                <option value="2" selected>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button class="btn btn-outline-primary me-2" id="export-btn">Xuất Excel</button>
        </div>
    </div>

    <!-- Vùng hiển thị danh sách đơn hàng -->
    <div id="orders-table">
        <!-- Dữ liệu sẽ được tải qua AJAX -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const limitSelect = document.getElementById('limit');
        const searchInput = document.getElementById('search');
        const ordersTable = document.getElementById('orders-table');

        // Hàm tải dữ liệu qua AJAX
        function loadOrders() {
            const limit = limitSelect.value;
            const search = searchInput.value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `?ajax=true&limit=${limit}&search=${search}`, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    ordersTable.innerHTML = xhr.responseText;
                } else {
                    ordersTable.innerHTML = '<p class="text-danger">Lỗi tải dữ liệu!</p>';
                }
            };
            xhr.send();
        }

        // Thay đổi số dòng hiển thị
        limitSelect.addEventListener('change', loadOrders);

        // Tìm kiếm
        searchInput.addEventListener('input', loadOrders);

        // Tải dữ liệu ban đầu
        loadOrders();

        // Xuất Excel
        document.getElementById('export-btn').addEventListener('click', function () {
            const table = document.querySelector('#orders-table table');
            if (table) {
                const workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
                XLSX.writeFile(workbook, 'Orders.xlsx');
            } else {
                alert('Không có dữ liệu để xuất!');
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
