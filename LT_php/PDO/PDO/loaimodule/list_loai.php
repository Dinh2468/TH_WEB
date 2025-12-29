<?php
include '../connect.php';

$stm = $dbh->query('select * from loai');
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="info.php?action=them-loai">Add loai moi</a>

<table border="1" style="border: 1px; background-color: aqua;">
    <tr>
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th>Action</th>
    </tr>
    <?php
        foreach($rows as $row) {?>
            <tr>
                <td><?= $row['maloai'] ?></td>
                <td><?= $row['tenloai'] ?></td>
                <td>
                    <a href="delete-loai.php?maloai=<?= $row['maloai'] ?>">Delete</a>||
                    <a href="info.php?action=update-loai&maloai=<?= $row['maloai'] ?>">Update</a>
                </td>
            </tr>
        <?php } ?>
    
</table>
<?php
$dbh = null;