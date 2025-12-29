<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="index.php?url=loai/edit">Them loai</a>
    </div>&nbsp;
    <table border="1" cellspacing="0">
        <tr>
            <th>Ma Loai</th>
            <th>Ten Loai</th>
            <th></th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['maloai']; ?></td>
                <td><?php echo $row['tenloai']; ?></td>
                <td>
                    <a href="index.php?url=loai/del&maloai=<?php echo $row['maloai'];
                                                            ?>">Delete</a> |
                    <a href="index.php?url=loai/edit&maloai=<?php echo $row['maloai'];
                                                            ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>