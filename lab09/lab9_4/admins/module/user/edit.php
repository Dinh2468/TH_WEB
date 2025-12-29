<?php
$id = Utils::getIndex("id"); // Username
$r = $user->getDetail($id);

$ac2 = "saveEdit";
$info = "Cập nhật thông tin";
$isEdit = true;

if (count($r) == 0) {
    $ac2 = "saveAdd";
    $info = "Thêm người dùng mới";
    $isEdit = false;
    $r = ["username" => "", "name" => "", "email" => "", "phone" => ""];
}
?>

<div class="tab-content default-tab">
    <form action="index.php?mod=user&ac=<?php echo $ac2; ?>" method="post">
        <fieldset>
            <legend><?php echo $info; ?></legend>
            <table width="100%">
                <tr>
                    <td width="20%">Tên đăng nhập (Username)</td>
                    <td>
                        <input class="text-input medium-input" type="text" name="username"
                            value="<?php echo $r['username']; ?>"
                            <?php if ($isEdit) echo 'readonly style="background:#eee"'; ?> required>
                        <?php if ($isEdit) echo '<span class="input-notification information png_bg">Không thể đổi</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input class="text-input medium-input" type="password" name="password" value="">
                        <?php if ($isEdit) echo '<br><small>(Để trống nếu không muốn đổi mật khẩu)</small>'; ?>
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td><input class="text-input medium-input" type="text" name="name" value="<?php echo $r['name']; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input class="text-input medium-input" type="email" name="email" value="<?php echo $r['email']; ?>"></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input class="text-input medium-input" type="text" name="phone" value="<?php echo $r['phone']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="button" type="submit" value="Lưu lại">
                        <input class="button" type="button" value="Hủy" onclick="window.location='index.php?mod=user'">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>