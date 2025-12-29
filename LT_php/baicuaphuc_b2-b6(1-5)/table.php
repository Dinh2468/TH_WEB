<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?
        $n=6;
    ?>
    <table border="1">
        <tr colspan="3">
            <td colspan="3">Bang cuu chuong <?= $n ?></td>
        </tr>
        <? for ($i=1; $i <= 10; $i++) { ?>
            <tr>
                <td><?= $n ?></td>
                <td><?= $i ?></td>
                <td><?= $n*$i ?></td>
            </tr>
        <? } ?>
    </table>
</body>
</html>