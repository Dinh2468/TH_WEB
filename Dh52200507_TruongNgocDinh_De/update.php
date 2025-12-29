<?php
$loi = [];
$pass = "";
$random_pass = "";
$tenfile = "";
$ext = "";
$tenimg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = intval($_POST["Length"]);
    if ($pass < 6) {
        $loi[] = "Độ dài mật khẩu phải lớn hơn hoặc bằng 6 ký tự.";
    }
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $tenfile = $_FILES["file"]["name"];
        $size = $_FILES["file"]["size"];
        $ext = strtolower(pathinfo($tenfile, PATHINFO_EXTENSION));
        $allowed = ["jpg", "png", "gif"];
        if (!in_array($ext, $allowed)) {
            $loi[] = "Chỉ được upload file ảnh có đuôi jpg, png, gif.";
        }
        if ($size > 2 * 1024 * 1024) {
            $loi[] = "Kích thước file không được vượt quá 2MB.";
        }
        if (empty($loi)) {
            if (!is_dir("images")) {
                mkdir("images");
            }
            $tenimg = "images/" . $tenfile;
            move_uploaded_file($_FILES["file"]["tmp_name"], $tenimg);
        }
    } else {
        $loi[] = "Lỗi khi upload file.";
    }
    if (empty($loi)) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $random_pass = "";
        for ($i = 0; $i < $pass; $i++) {
            $random_pass .= $chars[rand(0, strlen($chars) - 1)];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài làm</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($loi) > 0) {
        echo "<div style='color:red'><b>Danh sách lỗi:</b><br>";
        foreach ($loi as $l) {
            echo "- $l <br>";
        }
        echo "</div>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($loi) == 0) {
        echo "<b>Tên file:</b> $tenfile <br>";
        echo "<b>Phần mở rộng:</b> $ext <br><br>";
        echo "<b>Ảnh đã upload:</b><br>";
        echo "<img src='$tenimg' style='max-width:300px'><br><br>";
        echo "<b>Mật khẩu ngẫu nhiên:</b> $random_pass <br>";
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Chọn file ảnh:</label><br>
        <input type="file" name="file" required><br><br>
        <label>Độ dài mật khẩu:</label><br>
        <input type="number" name="Length" value="<?php echo $pass ?>" min="6" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>

</html>