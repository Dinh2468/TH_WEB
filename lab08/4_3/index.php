<?php
require_once("Book.php");
$book = new Book(); // Khởi tạo đối tượng Book
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quản lý sách (OOP)</title>

</head>

<body>
    <div id="container">

        <form action="" method="post">
            <table>
                <tr>
                    <td>Mã sách:</td>
                    <td><input type="text" name="book_id" required /></td>
                </tr>
                <tr>
                    <td>Tên sách:</td>
                    <td><input type="text" name="book_name" required /></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><input type="text" name="description" required /></td>
                </tr>
                <tr>
                    <td>Giá:</td>
                    <td><input type="number" name="price" required /></td>
                </tr>
                <tr>
                    <td>Hình:</td>
                    <td><input type="text" name="img" required /></td>
                </tr>
                <tr>
                    <td>NXB (pub_id):</td>
                    <td><input type="text" name="pub_id" required /></td>
                </tr>
                <tr>
                    <td>Loại (cat_id):</td>
                    <td><input type="text" name="cat_id" required /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="sm" value="Insert" /></td>
                </tr>
            </table>
        </form>

        <?php
        // XỬ LÝ NÚT INSERT
        if (isset($_POST["sm"])) {
            $ok = $book->insertBook(
                $_POST["book_id"],
                $_POST["book_name"],
                $_POST["description"],
                $_POST["price"],
                $_POST["img"],
                $_POST["pub_id"],
                $_POST["cat_id"]
            );

            echo $ok ? "Đã thêm 1 sách!" : "Lỗi thêm!";
        }

        // HIỂN THỊ DANH SÁCH
        $rows = $book->getAllBooks();
        ?>

        <hr>

        <table border="1" cellpadding="5">
            <tr>
                <th>Mã sách</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>NXB</th>
                <th>Loại</th>
                <th>Thao tác</th>
            </tr>

            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo $row["book_id"]; ?></td>
                    <td><?php echo $row["book_name"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["pub_id"]; ?></td>
                    <td><?php echo $row["cat_id"]; ?></td>
                    <td><a href="Lab8_book_delete_oop.php?book_id=<?php echo $row['book_id']; ?>">Xóa</a></td>
                </tr>
            <?php } ?>
        </table>

    </div>
</body>

</html>