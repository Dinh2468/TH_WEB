<?php
$id = Utils::getIndex("id");
$r = $newsObj->getDetail($id);

$ac2 = "saveEdit";
$info = "Cập nhật Tin Tức";
// Nếu không tìm thấy -> Thêm mới
if (!$r) {
    $ac2 = "saveAdd";
    $info = "Thêm Tin Mới";
    $r = ["id" => "", "title" => "", "short_content" => "", "content" => "", "img" => "", "hot" => 0];
}
?>

<div class="tab-content default-tab">
    <form action="index.php?mod=news&ac=<?php echo $ac2; ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?php echo $info; ?></legend>
            <table width="100%">
                <tr>
                    <td>Tiêu đề</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                        <input class="text-input large-input" type="text" name="title" value="<?php echo $r['title']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td>
                        <input type="file" name="img">
                        <?php if ($r['img'] != "") echo "<br><img src='../images/news/" . $r['img'] . "' width='100'>"; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tóm tắt</td>
                    <td>
                        <textarea class="text-input" name="short_content" rows="3" cols="70"><?php echo $r['short_content']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td>
                        <textarea class="text-input textarea" id="textarea" name="content" rows="10" cols="79"><?php echo $r['content']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Tùy chọn</td>
                    <td>
                        <input type="checkbox" name="hot" value="1" <?php if ($r['hot'] == 1) echo "checked"; ?>> Tin Hot (Nổi bật)
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="button" type="submit" value="Lưu Tin Tức">
                        <input class="button" type="button" value="Hủy" onclick="window.location='index.php?mod=news'">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>