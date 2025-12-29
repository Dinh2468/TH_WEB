<?php
$action = $_GET['action'];
if (isset($_GET['maloai'])) {
    $maloai = $_GET['maloai'];
}
?>
<form action="<?= $aciton ?>.php" method="post">
    <label for="maloai">Mã loại</label><br />
    <input name="maloai" <?php if (isset($maloai)) {
                                echo "value=\"" . $maloai . "\"" . "readonly";
                            } else
                                echo "type='text'";
                            ?> /><br />
    <label for="tenloai">Tên loại</label><br />
    <input type="text" name="tenloai" /><br />
    <input type="submit" value="Thêm" />
</form>