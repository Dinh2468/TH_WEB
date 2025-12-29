<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<table>
    <h2>Bảng cửu chương</h2>
    <table>
        <tr>
            <?php for ($i = 2; $i <= 9; $i++): ?>
                <th>Cửu chương <?= $i ?></th>
            <?php endfor; ?>
        </tr>
        <tr>
            <?php for ($i = 2; $i <= 9; $i++): ?>
                <td>
                    <?php for ($j = 1; $j <= 10; $j++): ?>
                        <?= $i ?> x <?= $j ?> = <?= $i * $j ?><br>
                    <?php endfor; ?>
                </td>
            <?php endfor; ?>
        </tr>
    </table>

    </body>

</html>