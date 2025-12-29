<?php

$cart = new Cart(); // Khởi tạo giỏ hàng
$bookObj = new Book(); // Khởi tạo đối tượng sách
$ac = getIndex("ac"); // Lấy ành động thực hiện

if ($ac == "add") { // Thêm sản phẩm vào giỏ hàng
	$id = getIndex("id");
	$quantity = getIndex("quantity", 1);
	$cart->add($id, $quantity);
	echo "<script>window.location='index.php?mod=cart';</script>";
	exit;
}

if ($ac == "del") { // Xóa sản phẩm khỏi giỏ hàng
	$id = getIndex("id");
	$cart->remove($id);
	echo "<script>window.location='index.php?mod=cart';</script>";
	exit;
}

if ($ac == "update") { // Cập nhật số lượng sản phẩm trong giỏ hàng
	if (isset($_POST['qty'])) {
		foreach ($_POST['qty'] as $id => $new_quantity) {
			$new_quantity = intval($new_quantity);
			if ($new_quantity > 0) $cart->edit($id, $new_quantity);
			else $cart->remove($id);
		}
	}
	echo "<script>window.location='index.php?mod=cart';</script>";
	exit;
}

// Lấy danh sách item từ Session
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>

<div class="cart-container">
	<h2 class="title-mod">Giỏ hàng của bạn</h2>

	<?php if (count($cartItems) == 0) { ?>
		<p>Giỏ hàng đang rỗng. <a href="index.php">Quay lại mua sắm</a></p>
	<?php } else { ?>

		<form action="index.php?mod=cart&ac=update" method="post">
			<table class="cart-table">
				<thead>
					<tr>
						<th>Hình ảnh</th>
						<th>Tên sách</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$totalMoney = 0;
					foreach ($cartItems as $book_id => $quantity) {
						$book = $bookObj->getDetail($book_id);

						if ($book) {
							$price = $book['price'];
							$subtotal = $price * $quantity;
							$totalMoney += $subtotal;
					?>
							<tr>
								<td class="text-center">
									<?php if (!empty($book['img'])) { ?>
										<img class="cart-img" src="images/book/<?php echo $book['img']; ?>" />
									<?php } ?>
								</td>
								<td>
									<a class="cart-book-name" href="index.php?mod=book&ac=detail&id=<?php echo $book_id; ?>">
										<?php echo $book['book_name']; ?>
									</a>
								</td>
								<td class="text-right">
									<?php echo number_format($price); ?> đ
								</td>
								<td class="text-center">
									<input class="qty-input" type="number" name="qty[<?php echo $book_id; ?>]" value="<?php echo $quantity; ?>" min="1">
									<!-- name="qty[...]": Cách đặt tên này giúp PHP gom tất cả số lượng vào một mảng qty khi submit, giúp xử lý cập nhật hàng loạt dễ dàng. -->
								</td>
								<td class="text-right">
									<strong><?php echo number_format($subtotal); ?> đ</strong>
								</td>
								<td class="text-center">
									<a class="btn-delete" href="index.php?mod=cart&ac=del&id=<?php echo $book_id; ?>" onclick="return confirm('Bạn chắc chắn muốn bỏ sản phẩm này?');">
										[Xóa]
									</a>
								</td>
							</tr>
					<?php
						}
					}
					?>

					<tr class="total-row">
						<td colspan="4" class="text-right">Tổng cộng thanh toán:</td>
						<td class="text-right total-price">
							<?php echo number_format($totalMoney); ?> đ
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>

			<div class="cart-actions">
				<a href="index.php" class="btn btn-continue">Tiếp tục mua</a>

				<button type="submit" class="btn btn-update">Cập nhật giỏ hàng</button>

				<a href="index.php?mod=order&ac=checkout" class="btn btn-checkout">Thanh toán &raquo;</a>
			</div>
		</form>
	<?php } ?>
</div>