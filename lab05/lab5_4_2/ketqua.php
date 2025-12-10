<h2>Kết quả tìm kiếm</h2>
<?php
if (isset($_GET['tensp']) && isset($_GET['cachtim']) && isset($_GET['loai'])) {
    $tensp = $_GET['tensp'];
    $cachtim = $_GET['cachtim'];
    $loai = $_GET['loai'];

    echo "<b>Tên sản phẩm:</b> " . htmlspecialchars($tensp) . "<br>";

    if ($cachtim == "gandung") {
        echo "<b>Cách tìm:</b> Gần đúng<br>";
    } else {
        echo "<b>Cách tìm:</b> Chính xác<br>";
    }

    // In ra loại sản phẩm (nếu không phải "tatca")
    if ($loai != "tatca") {
        echo "<b>Loại sản phẩm:</b> " . ucfirst($loai) . "<br>";
    } else {
        echo "<b>Loại sản phẩm:</b> Tất cả<br>";
    }
} else {
    echo "Không có dữ liệu được gửi lên!";
}
?>