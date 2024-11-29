<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fcb933068a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{margin-top:20px;
            background-color:#f2f6fc;
            color:#69707a;
            }
            .img-account-profile {
                height: 10rem;
            }
            .rounded-circle {
                border-radius: 50% !important;
            }
            .card {
                box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
            }
            .card .card-header {
                font-weight: 500;
            }
            .card-header:first-child {
                border-radius: 0.35rem 0.35rem 0 0;
            }
            .card-header {
                padding: 1rem 1.35rem;
                margin-bottom: 0;
                background-color: rgba(33, 40, 50, 0.03);
                border-bottom: 1px solid rgba(33, 40, 50, 0.125);
            }
            .form-control, .dataTable-input {
                display: block;
                width: 100%;
                padding: 0.875rem 1.125rem;
                font-size: 0.875rem;
                font-weight: 400;
                line-height: 1;
                color: #69707a;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #c5ccd6;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.35rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .nav-borders .nav-link.active {
                color: #0061f2;
                border-bottom-color: #0061f2;
            }
            .nav-borders .nav-link {
                color: #69707a;
                border-bottom-width: 0.125rem;
                border-bottom-style: solid;
                border-bottom-color: transparent;
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
                padding-left: 0;
                padding-right: 0;
                margin-left: 1rem;
                margin-right: 1rem;
            }
            .fa-2x {
                font-size: 2em;
            }

            .table-billing-history th, .table-billing-history td {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
                padding-left: 1.375rem;
                padding-right: 1.375rem;
            }
            .table > :not(caption) > * > *, .dataTable-table > :not(caption) > * > * {
                padding: 0.75rem 0.75rem;
                background-color: var(--bs-table-bg);
                border-bottom-width: 1px;
                box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
            }

            .border-start-primary {
                border-left-color: #0061f2 !important;
            }
            .border-start-secondary {
                border-left-color: #6900c7 !important;
            }
            .border-start-success {
                border-left-color: #00ac69 !important;
            }
            .border-start-lg {
                border-left-width: 0.25rem !important;
            }
            .h-100 {
                height: 100% !important;
            }
            .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }
        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            margin: 0 1rem;
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<?php
    include 'header.php';
?>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link ms-0 " href="?action=profile">Trang cá nhân</a>
        <a class="nav-link" href="?action=changePass" >Bảo mật</a>
        <a class="nav-link active" href="?action=history" >Xem đơn hàng</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Billing card 1-->
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Tổng tiền đã tiêu</div>
                    <div class="h3"><?php echo number_format($total_spent, 0, ',', '.'); ?> đ</div>
                    <a class="text-arrow-icon small" href="#!">
                        Xem thông tin
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 2-->
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Tổng số đơn</div>
                    <div class="h3"><?= $order_count?></div>
                    <a class="text-arrow-icon small text-secondary" href="#!">
                        Xem thông tin
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Số đơn đã hoàn thành</div>
                    <div class="h3 d-flex align-items-center"><?=$completed_order?></div>
                    <a class="text-arrow-icon small text-success" href="#!">
                        Xem thông tin
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        
    </div>
    <!-- Billing history card-->
    <div class="card mb-4">
        <div class="card-header">Danh sách đơn hàng</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Mã đơn</th>
                            <th class="border-gray-200" scope="col">Ngày đặt</th>
                            <th class="border-gray-200" scope="col">Tổng tiền</th>
                            <th class="border-gray-200" scope="col">Trạng thái</th>
                            <th class="border-gray-200" scope="col">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="5">Bạn chưa mua đơn hàng nào</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?= htmlspecialchars($order['order_code']) ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime(htmlspecialchars($order['date']))) ?></td>
                                    <td><?= number_format(htmlspecialchars($order['total_amount']), 0, ',', '.') ?> đ</td>
                                    <td>
                                        <span class="badge 
                                            <?php 
                                                switch ($order['status']) {
                                                    case 'Pending':
                                                        echo 'bg-warning';
                                                        break;
                                                    case 'Processing':
                                                        echo 'bg-primary';
                                                        break;
                                                    case 'Delivered':
                                                        echo 'bg-success';
                                                        break;
                                                    case 'Cancelled':
                                                        echo 'bg-danger';
                                                        break;
                                                    default:
                                                        echo 'bg-light text-dark';
                                                }
                                            ?>">
                                            <?= htmlspecialchars($order['status']) ?>
                                        </span>
                                    </td>
                                    <td><a href="?action=orderDetail&order_code=<?= $order['order_code'] ?>">Chi tiết</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<?php
    include 'footer.php';
?>
</html>