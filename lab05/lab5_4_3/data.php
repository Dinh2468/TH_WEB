<?php
$errors = [];

$username   = trim($_POST["username"]);
$password   = $_POST["password"];
$repassword = $_POST["repassword"];
$gender     = isset($_POST["gender"]) ? $_POST["gender"] : "";
$hobbies    = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
$province   = $_POST["province"];
$imageName  = "";

if (empty($username)) { //empty kiểm tra chuỗi rỗng
    $errors[] = "Tên đăng nhập không được để trống.";
}
if (empty($password)) {
    $errors[] = "Mật khẩu không được để trống.";
}
if (empty($repassword)) {
    $errors[] = "Vui lòng nhập lại mật khẩu.";
} elseif ($password !== $repassword) {
    $errors[] = "Mật khẩu nhập lại không trùng khớp.";
}
if (empty($gender)) {
    $errors[] = "Vui lòng chọn giới tính.";
}
if ($province == "chon") {
    $errors[] = "Vui lòng chọn tỉnh.";
}
//Kiểm tra file hình ảnh (nếu có upload)
if (!empty($_FILES["image"]["name"])) {
    $imageName = $_FILES["image"]["name"];
    $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    //strtolower chuyển về chữ thường
    //PATHINFO_EXTENSION lấy phần mở rộng của file .img.jpg -> jpg
    $valid_exts = ["jpg", "jpeg", "png", "gif", "bmp"];

    if (!in_array($ext, $valid_exts)) {
        $errors[] = "File hình không hợp lệ (chỉ chấp nhận: jpg, png, gif, bmp).";
    }
}
?>

<h2>Kết quả đăng ký</h2>
<?php
if (empty($errors)) {
    echo "<b>Tên đăng nhập:</b> $username <br>";
    echo "<b>Giới tính:</b> $gender <br>";

    if (!empty($hobbies)) {
        echo "<b>Sở thích:</b> " . implode(", ", $hobbies) . "<br>";
    } else {
        echo "<b>Sở thích:</b> Không chọn<br>";
    }

    echo "<b>Tỉnh:</b> $province <br>";

    if (!empty($imageName)) {
        echo "<b>Hình ảnh:</b> $imageName <br>";
    } else {
        echo "<b>Hình ảnh:</b> Không có<br>";
    }

    echo "<h3 style='color:green'>Đăng ký thành công!</h3>";
} else {
    echo "<h3 style='color:red'>Có lỗi xảy ra:</h3><ul>";
    foreach ($errors as $err) {
        echo "<li>$err</li>";
    }
    echo "</ul>";
}
echo '<a href="formnhap.php">Quay lại trang đăng ký</a>';
?>