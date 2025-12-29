<?php
$id = Utils::getIndex("id");
// Lấy thông tin NXB theo ID để đổ vào form (nếu là sửa)
$r = $publisher->getById($id);

$ac2 = "saveEdit";
$info = "Sửa thông tin Nhà Xuất Bản";

// Nếu không tìm thấy dữ liệu -> Chuyển sang chế độ Thêm mới
if (Count($r) == 0) {
    $ac2 = "saveAdd";
    $info = "Thêm Mới Nhà Xuất Bản";
    $r["pub_id"] = "";
    $r["pub_name"] = "";
    $r["phone"] = "";
}
?>
<div class="tab-content default-tab">
    <form action="index.php?mod=book&group=pub&ac=<?php echo $ac2; ?>" method="post">
        <fieldset>
            <legend><?php echo $info; ?></legend>
            <table width="100%" border="0" cellspacing="3">
                <tr>
                    <td width="20%">Mã NXB</td>
                    <td>
                        <input class="text-input small-input" type="text" name="pub_id" value="<?php echo $r["pub_id"]; ?>" readonly style="background-color: #eee;">
                        <span class="input-notification information png_bg">Tự động</span>
                    </td>
                </tr>
                <tr>
                    <td>Tên NXB</td>
                    <td>
                        <input class="text-input medium-input" type="text" name="pub_name" value="<?php echo $r["pub_name"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="button" type="submit" value="Lưu dữ liệu">
                        <input class="button" type="button" value="Hủy bỏ" onclick="window.location='index.php?mod=book&group=pub'">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>