<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="index.php?url=nhaxb/edit">Them nha xuat ban</a>
    </div>&nbsp;
    <table border="1" cellspacing="0">
        <tr>
            <th>Ma NXB</th>
            <th>Ten NXB</th>
            <th></th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['manxb']; ?></td>
                <td><?php echo $row['tennxb']; ?></td>
                <td>
                    <a href="index.php?url=nhaxb/del&manxb=<?php echo $row['manxb'];
                                                            ?>">Delete</a> |
                    <a href="index.php?url=nhaxb/edit&manxb=<?php echo $row['manxb'];
                                                            ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>