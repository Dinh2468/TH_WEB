<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $data['action']; ?>" method="post">
        <table>
            <tr>
                <th colspan="2">THONG TIN NXB</th>
            </tr>
            <tr>
                <td>Ma NXB:</td>
                <td><input type="text"
                        name="maloai" <?php echo ($data['isUpdate'] ? "readonly" : ""); ?> value="<?php echo $data['row']['maloai'] ?? ""; ?>"></td>
            </tr>
            <tr>
                <td>Ten NXB:</td>
                <td><input type="text"
                        name="tenloai" value="<?php echo $data['row']['tenloai'] ?? ""; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save"> <a
                        href="index.php?url=loai/index">Cancel</a></td>
            </tr>
        </table>
    </form>
</body>

</html>