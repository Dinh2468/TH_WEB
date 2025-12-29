<?php
if (!defined("ROOT")) exit("Access Denied");

$msg = ""; // Biến lưu thông báo lỗi

if (isset($_POST["btn_login"])) {
    $email = $_POST["email"];
    $pass  = $_POST["password"];

    // Gọi class Customer để kiểm tra tài khoản
    $customerObj = new Customer();
    $user = $customerObj->checkLogin($email, $pass);

    if ($user) {
        //  Đăng nhập thành công -> Lưu vào Session
        $_SESSION["user_login"] = $user;
        //  Chuyển hướng về trang trước đó (nếu có)
        if (isset($_GET["redirect"])) {
            $url = urldecode($_GET["redirect"]);
            echo "<script>window.location='$url';</script>";
        } else {
            echo "<script>window.location='index.php';</script>";
        }
        exit;
    } else {
        $msg = "Email hoặc mật khẩu không chính xác!";
    }
}
?>

<div class="login-container">
    <h2 class="login-header">ĐĂNG NHẬP KHÁCH HÀNG</h2>

    <?php if ($msg != "") { ?>
        <div class="error-msg">
            <?php echo $msg; ?>
        </div>
    <?php } ?>

    <form action="" method="post">
        <div class="form-group">
            <label for="email">Email đăng nhập:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email của bạn..." required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu..." required>
        </div>

        <button type="submit" name="btn_login" class="btn-login">Đăng Nhập</button>

        <div class="register-link">
            Chưa có tài khoản? <a href="index.php?mod=member&ac=register">Đăng ký ngay</a>
        </div>
    </form>
</div>