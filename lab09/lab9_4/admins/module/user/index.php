<?php
$user = new User();
$ac = Utils::getIndex("ac", "show");

// 1. Xem danh sách
if ($ac == "show") {
    include "show.php";
}

// 2. Form Thêm/Sửa
if ($ac == "add" || $ac == "edit") {
    include "edit.php";
}

// 3. Xử lý Lưu Thêm Mới
if ($ac == "saveAdd") {
    $u = Utils::postIndex("username");
    $p = Utils::postIndex("password");
    $n = Utils::postIndex("name");
    $e = Utils::postIndex("email");
    $ph = Utils::postIndex("phone");

    // Kiểm tra trùng lặp user (nên làm thêm hàm checkExist trong Class User)
    $user->add($u, $p, $n, $e, $ph);
    echo "<script>alert('Thêm tài khoản thành công!'); window.location='index.php?mod=user';</script>";
}

// 4. Xử lý Lưu Cập Nhật
if ($ac == "saveEdit") {
    $u = Utils::postIndex("username");
    $p = Utils::postIndex("password"); // Nếu rỗng user muốn giữ pass cũ
    $n = Utils::postIndex("name");
    $e = Utils::postIndex("email");
    $ph = Utils::postIndex("phone");

    $user->update($u, $p, $n, $e, $ph);
    echo "<script>alert('Cập nhật thành công!'); window.location='index.php?mod=user';</script>";
}

// 5. Xử lý Xóa
if ($ac == "delete") {
    $u = Utils::getIndex("id"); // Ở đây id chính là username
    $user->delete($u);
    echo "<script>window.location='index.php?mod=user';</script>";
}
