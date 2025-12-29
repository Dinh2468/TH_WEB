<?php
$listUser = $user->getAll();
?>
<div class="tab-content default-tab">
    <div class="notification information png_bg">
        <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" /></a>
        <div>Quản lý danh sách Quản trị viên (Admin)</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5">
                    <div class="bulk-actions align-left">
                        <a class="button" href="index.php?mod=user&ac=add">Thêm người dùng mới</a>
                    </div>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($listUser as $r) { ?>
                <tr>
                    <td><?php echo $r['username']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['phone']; ?></td>
                    <td>
                        <a href="index.php?mod=user&ac=edit&id=<?php echo $r['username']; ?>" title="Edit">
                            <img src="resources/images/icons/pencil.png" alt="Edit" />
                        </a>&nbsp;&nbsp;
                        <a href="index.php?mod=user&ac=delete&id=<?php echo $r['username']; ?>" title="Delete" onclick="return confirm('Xóa tài khoản này?');">
                            <img src="resources/images/icons/cross.png" alt="Delete" />
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>