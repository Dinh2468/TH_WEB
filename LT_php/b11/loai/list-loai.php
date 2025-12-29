<?php
include '../connect.php';

$stm = $dbh->query('select * from loai');
echo "<div>So dong:" . $stm->rowCount() . " </div> <br>";

$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="form.php?action=add-list">add</a>

<table border="1" style="border: 1px; " cellspacing="0">
    <tr>
        <th>Ma loai</th>
        <th>Ten loai</th>
        <th>Action</th>
    </tr>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?php echo $row['maloai'] ?></td>
            <td><?php echo $row['tenloai'] ?></td>
            <td>
                <a href="delete-loai.php?maloai=<?php echo $row['maloai'] ?>"
                    onclick="return confirm(' Ban co muon xoa khong?')">Delete</a>
                <a href="formadd.php?action=update-loai&maloai=<?php echo $row['maloai'] ?>">Update</a> |
            </td>
        </tr>
    <?php endforeach; ?>

</table>