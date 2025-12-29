<?php
$order = new Order();
$ac = Utils::getIndex("ac", "show");

// Lấy trạng thái từ URL (nếu không có thì mặc định là -1: xem tất cả)
$status_filter = isset($_GET['status']) ? intval($_GET['status']) : -1;

if ($ac == "show") {
    include "show.php";
}

if ($ac == "detail") {
    include "detail.php";
}

// Xử lý cập nhật trạng thái (khi bấm nút Duyệt đơn, Hoàn thành...)
if ($ac == "updateStatus") {
    $id = Utils::getIndex("id");
    $new_status = Utils::getIndex("new_status");
    $order->updateStatus($id, $new_status);

    // Quay lại trang danh sách đúng với bộ lọc hiện tại
    echo "<script>alert('Cập nhật trạng thái thành công!'); window.location='index.php?mod=order&status=$new_status';</script>";
}
