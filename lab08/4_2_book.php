<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Quản lý Sách (Book) - Full</title>
</head>

<body>
    <div id="container">
        <h2>Quản lý Sách (Full Columns)</h2>
        <?php
        try {
            $pdh = new PDO("mysql:host=localhost; dbname=bookstore1", "root", "");
            $pdh->query("set names 'utf8'");
            $pdh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "<div class='msg error'>Lỗi kết nối: " . $e->getMessage() . "</div>";
            exit;
        }
        if (isset($_GET["del_id"])) {
            $id_xoa = $_GET["del_id"];
            $sql_del = "DELETE FROM book WHERE book_id = :id";
            $stm = $pdh->prepare($sql_del);
            $stm->execute(array(":id" => $id_xoa));
            if ($stm->rowCount() > 0)
                echo "<div class='msg success'>Đã xóa thành công sách có mã: $id_xoa</div>";
            else
                echo "<div class='msg error'>Lỗi xóa hoặc mã sách không tồn tại.</div>";
        }
        if (isset($_POST["sm"])) {
            $arr = array(
                ":id"    => $_POST["book_id"],
                ":name"  => $_POST["book_name"],
                ":desc"  => $_POST["description"],
                ":price" => $_POST["price"],
                ":img"   => $_POST["img"],
                ":pub"   => $_POST["pub_id"],
                ":cat"   => $_POST["cat_id"]
            );
            $sql_ins = "INSERT INTO book(book_id, book_name, description, price, img, pub_id, cat_id) 
                        VALUES(:id, :name, :desc, :price, :img, :pub, :cat)";
            try {
                $stm = $pdh->prepare($sql_ins);
                $stm->execute($arr);
                if ($stm->rowCount() > 0)
                    echo "<div class='msg success'>Thêm mới thành công sách: " . $_POST["book_name"] . "</div>";
            } catch (PDOException $e) {
                echo "<div class='msg error'>Lỗi thêm dữ liệu: " . $e->getMessage() . "</div>";
            }
        }
        ?>
        <form action="" method="post">
            <table class="form-table">
                <tr>
                    <td width="150">Mã sách (book_id):</td>
                    <td><input type="text" name="book_id" class="form-input" required /></td>
                </tr>
                <tr>
                    <td>Tên sách (book_name):</td>
                    <td><input type="text" name="book_name" class="form-input" required /></td>
                </tr>
                <tr>
                    <td>Giá (price):</td>
                    <td><input type="number" name="price" class="form-input" /></td>
                </tr>
                <tr>
                    <td>Hình ảnh (img):</td>
                    <td><input type="text" name="img" class="form-input" /></td>
                </tr>
                <tr>
                    <td>Mã NXB (pub_id):</td>
                    <td><input type="text" name="pub_id" class="form-input" /></td>
                </tr>
                <tr>
                    <td>Mã Loại (cat_id):</td>
                    <td><input type="text" name="cat_id" class="form-input" /></td>
                </tr>
                <tr>
                    <td>Mô tả (description):</td>
                    <td><textarea name="description" rows="3" class="form-input"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="sm" value="Thêm sách mới" />
                    </td>
                </tr>
            </table>
        </form>

        <hr />

        <h3>Danh sách sách trong kho</h3>
        <?php
        $stm = $pdh->prepare("SELECT * FROM book");
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>NXB</th>
                    <th>Loại</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["book_id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["book_name"]); ?></td>
                        <td><?php echo number_format($row["price"]); ?> đ</td>
                        <td><?php echo htmlspecialchars($row["img"]); ?></td>
                        <td><?php echo htmlspecialchars($row["pub_id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["cat_id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["description"]); ?></td>
                        <td style="text-align: center;">
                            <a href="?del_id=<?php echo $row['book_id']; ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa sách <?php echo $row['book_name']; ?>?');"> [Xóa]
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>