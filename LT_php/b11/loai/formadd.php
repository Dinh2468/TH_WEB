<?php
$maloai = $_POST['maloai'] ?? "";
if ($maloai) {

    include '../connect.php';
    $stm = $dbh->prepare("select * from loai where maloai=?");
    $params = array($maloai);
    $stm->execute($params);
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    $row = $rows[0];
    $dbh = null;
}
?>
<form action='add-list.php' method='post'>
    <table>
        <tr>
            <td>Thong tin loai</td>
        </tr>
        <tr>
            <td>
                Ma loai
            </td>
            <td>
                <input type='text' name='maloai' placeholder='Nhap ma loai' value=<?= $row['maloai'] ?> />
                <?php
                // if (isset($row))
                // echo "value= " . $row['maloai'];
                ?>
            </td>
        </tr>
        <tr>
            <td>Ten loai</td>
            <td>
                <input type='text' name='tenloai' placeholder='Nhap ten loai' value=<?= $row['tenloai'] ?> />
                <?php
                // if (isset($row))
                // echo "value= " . $row['tenloai'];
                ?>
            </td>
        </tr>
    </table>
    <input type='submit' value='Luu' />
    <a href="list-loai.php">Tro ve</a>
</form>