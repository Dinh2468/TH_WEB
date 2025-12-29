<?php
// Gọi hàm lấy danh sách
$listOrder = $order->getAll($status_filter);

function getStatusName($s)
{
    if ($s == 0) return "<span style='color:red; font-weight:bold'>Mới đặt</span>";
    if ($s == 1) return "<span style='color:blue'>Đang xử lý</span>";
    if ($s == 2) return "<span style='color:green'>Đã hoàn thành</span>";
    return "Khác";
}
?>

<div class="tab-content default-tab">
    <table>
        <thead>
            <tr>
                <th>Mã ĐH</th>
                <th>Ngày đặt</th>
                <th>Người nhận</th>
                <th>SĐT</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listOrder as $r) { ?>
                <tr>
                    <td>#<?php echo $r['order_id']; ?></td>

                    <td><?php echo $r['order_date']; ?></td>

                    <td><?php echo $r['consignee_name']; ?></td>

                    <td><?php echo $r['consignee_phone']; ?></td>

                    <td><?php echo getStatusName($r['status']); ?></td>

                    <td>
                        <a href="index.php?mod=order&ac=detail&id=<?php echo $r['order_id']; ?>" title="Xem chi tiết">
                            <img src="resources/images/icons/pencil.png" alt="Detail" /> Chi tiết
                        </a>

                        <?php if ($r['status'] == 0) { ?>
                            <br>
                            <a href="index.php?mod=order&ac=updateStatus&id=<?php echo $r['order_id']; ?>&new_status=1">
                                &rarr; Duyệt đơn
                            </a>
                        <?php } elseif ($r['status'] == 1) { ?>
                            <br>
                            <a href="index.php?mod=order&ac=updateStatus&id=<?php echo $r['order_id']; ?>&new_status=2" style="color:green">
                                &rarr; Hoàn thành
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>