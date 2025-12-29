<?php
// Gọi hàm lấy tất cả NXB
$data = $publisher->getAll();
?>
<div class="tab-content default-tab" id="tab1">
    <div class="notification attention png_bg">
        <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
        <div>Quản lý danh sách Nhà Xuất Bản</div>
    </div>

    <table>
        <thead>
            <tr>
                <th><input class="check-all" type="checkbox" /></th>
                <th>Mã NXB</th>
                <th>Tên Nhà Xuất Bản</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <td colspan="6">
                    <div class="bulk-actions align-left">
                        <a class="button" href="index.php?mod=book&group=pub&ac=add">Thêm Nhà Xuất Bản Mới</a>
                    </div>
                    <div class="clear"></div>
                </td>
            </tr>
        </tfoot>

        <tbody>
            <?php
            foreach ($data as $r) { ?>
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><?php echo $r["pub_id"]; ?></td>
                    <td><a href="#" title="Edit"><?php echo $r["pub_name"]; ?></a></td>
                    <td>
                        <a href="index.php?mod=book&group=pub&ac=edit&id=<?php echo $r["pub_id"]; ?>" title="Edit">
                            <img src="resources/images/icons/pencil.png" alt="Edit" />
                        </a>&nbsp;&nbsp;

                        <a href="index.php?mod=book&group=pub&ac=delete&id=<?php echo $r["pub_id"]; ?>" title="Delete" onclick="return confirm('Bạn có chắc chắn muốn xóa NXB này?');">
                            <img src="resources/images/icons/cross.png" alt="Delete" />
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>