<?php
// Kiểm tra xem có nhận được tham số id hay không
if (isset($_GET['id'])) {
    $id = $_GET['id'];  // Lấy giá trị id từ URL
    echo "Giá trị id nhận được là: " . $id;
} else {
    echo "Không có id nào được gửi lên!";
}
