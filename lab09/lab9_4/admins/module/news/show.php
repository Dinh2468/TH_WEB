<?php
// Lấy danh sách tin (mặc định lấy trang 1, hoặc bạn có thể viết hàm lấy all)
// Ở đây dùng hàm getAll(1) để lấy 10 tin mới nhất demo, 
// nếu muốn lấy hết bạn cần chỉnh lại hàm getAll trong Class News bỏ LIMIT
$page = Utils::getIndex("page", 1);
$listNews = $newsObj->getAll($page);
?>
<div class="tab-content default-tab">
    <div class="notification information png_bg">
        <div>Quản lý Tin Tức</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th width="40%">Tiêu đề</th>
                <th>Tin Hot</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5">
                    <div class="bulk-actions align-left">
                        <a class="button" href="index.php?mod=news&ac=add">Thêm Tin Mới</a>
                    </div>
                    <div class="pagination">
                        <a href="index.php?mod=news&page=<?php echo $page - 1; ?>" title="Previous">&laquo; Trước</a>
                        <a href="index.php?mod=news&page=<?php echo $page + 1; ?>" title="Next">Sau &raquo;</a>
                    </div>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($listNews as $r) { ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td>
                        <?php if ($r['img'] != "") { ?>
                            <img src="../images/news/<?php echo $r['img']; ?>" height="50">
                        <?php } ?>
                    </td>
                    <td>
                        <strong><?php echo $r['title']; ?></strong><br>
                        <small><?php echo substr($r['short_content'], 0, 100); ?>...</small>
                    </td>
                    <td style="text-align:center;">
                        <?php echo ($r['hot'] == 1) ? '<img src="resources/images/icons/tick_circle.png" alt="Hot">' : ''; ?>
                    </td>
                    <td>
                        <a href="index.php?mod=news&ac=edit&id=<?php echo $r['id']; ?>" title="Sửa"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>&nbsp;&nbsp;
                        <a href="index.php?mod=news&ac=delete&id=<?php echo $r['id']; ?>" onclick="return confirm('Xóa tin này?');" title="Xóa"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>