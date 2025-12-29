<?php
if (!defined("ROOT")) exit("Access Denied");

// 1. KIỂM TRA ĐĂNG NHẬP
if (!isset($_SESSION['user_login'])) {
    // Nếu chưa đăng nhập -> chuyển về trang login
    echo "<script>alert('Vui lòng đăng nhập để thanh toán!'); window.location='index.php?mod=member&ac=login&redirect=index.php?mod=order&ac=checkout';</script>";
    exit;
}

$currentUser = $_SESSION['user_login']; // Lấy thông tin user từ session

// 2. KIỂM TRA GIỎ HÀNG
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if (count($cart) == 0) {
    echo "<div class='alert'>Giỏ hàng của bạn đang trống. <a href='index.php'>Mua hàng ngay</a></div>";
    return;
}

// 3. XỬ LÝ KHI BẤM NÚT "THANH TOÁN" (Lưu Database)
if (isset($_POST['btn_submit_order'])) {
    $orderObj = new Order();

    // KIỂM TRA KỸ EMAIL
    if (isset($currentUser['email']) && !empty($currentUser['email'])) {
        $user_email = $currentUser['email'];
    } else {
        echo "<script>alert('Lỗi: Không tìm thấy Email người dùng. Vui lòng đăng nhập lại!'); window.location='index.php?mod=member&ac=login';</script>";
        exit;
    }
    $info = array(
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address']
    );

    $new_order_id = $orderObj->createOrder($user_email, $info, $cart);
}
?>

<div class="checkout-wrapper">
    <h2 class="title-mod">Thông Tin Giao Hàng</h2>

    <div class="checkout-layout">
        <div class="checkout-left">
            <form action="" method="post">
                <div class="form-group">
                    <label>Họ tên người nhận:</label>
                    <input type="text" name="name" class="form-control"
                        value="<?php echo isset($currentUser['name']) ? $currentUser['name'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input type="text" name="phone" class="form-control"
                        value="<?php echo isset($currentUser['phone']) ? $currentUser['phone'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label>Địa chỉ giao hàng:</label>
                    <textarea name="address" class="form-control" rows="4" required><?php echo isset($currentUser['address']) ? $currentUser['address'] : ''; ?></textarea>
                </div>

                <button type="submit" name="btn_submit_order" class="btn-submit-order">
                    XÁC NHẬN THANH TOÁN
                </button>
            </form>
        </div>

        <div class="checkout-right">
            <h4>Đơn hàng của bạn</h4>
            <p>Tổng số sản phẩm: <strong><?php echo count($cart); ?></strong></p>
            <hr>
            <a href="index.php?mod=cart" class="btn-back-cart">&laquo; Quay lại giỏ hàng</a>
        </div>
    </div>
</div>