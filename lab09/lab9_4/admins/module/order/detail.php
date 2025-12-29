<?php
$id = Utils::getIndex("id");
$info = $order->getById($id);
$details = $order->getOrderDetail($id);

if (count($info) > 0) {
    $o = $info[0];
?>
    <div class="content-box-header">
        <h3>Chi tiết đơn hàng #<?php echo $o['order_id']; ?></h3>
    </div>

    <div class="content-box-content">
        <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
            <p><strong>Ngày đặt:</strong> <?php echo $o['date']; ?></p>
            <p><strong>Email:</strong> <?php echo $o['email']; ?></p>
        </div>

        <table width="100%">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $d) { ?>
                    <tr>
                        <td><?php echo $d['book_name']; ?></td>
                        <td><img src="../images/book/<?php echo $d['img']; ?>" width="50"></td>
                        <td><?php echo $d['quantity']; ?></td>
                        <td><?php echo number_format($d['price']); ?> đ</td>
                        <td><?php echo number_format($d['quantity'] * $d['price']); ?> đ</td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" align="right"><strong>Tổng cộng:</strong></td>
                    <td><strong><?php echo number_format($o['total']); ?> đ</strong></td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 15px;">
            <input type="button" class="button" value="Quay lại danh sách" onclick="history.back()">
        </div>
    </div>
<?php } else {
    echo "Không tìm thấy đơn hàng.";
} ?>