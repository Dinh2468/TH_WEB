<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tìm kiếm sách - Bookstore</title>
</head>

<body>
    <h2>Chức năng tìm kiếm sách</h2>
    <?php
    try {
        $pdh = new PDO("mysql:host=localhost; dbname=bookstore1", "root", "");
        $pdh->query("set names 'utf8'");
    } catch (Exception $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
        exit;
    }
    $rows = [];
    $message = "";
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action == 'Tìm kiếm') {
        $search = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $sql = "SELECT * FROM book WHERE book_name LIKE :ten";
        $stm = $pdh->prepare($sql);
        $stm->bindValue(":ten", "%$search%");
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) == 0) $message = "Không tìm thấy sách nào với từ khóa: <strong>$search</strong>";
        else $message = "Tìm thấy " . count($rows) . " cuốn sách theo từ khóa: <strong>$search</strong>";
    } elseif ($action == 'Hiện tất cả') {
        $sql = "SELECT * FROM book";
        $stm = $pdh->prepare($sql);
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

        $message = "Đang hiển thị tất cả " . count($rows) . " cuốn sách có trong kho.";
    }
    ?>
    <div class="search-box">
        <form method="get" action="">
            <label>Nhập tên sách:</label>
            <input type="text" name="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">

            <input type="submit" name="action" value="Tìm kiếm">

            <input type="submit" name="action" value="Hiện tất cả" class="btn-all">
        </form>
    </div>
    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (!empty($rows)): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Giá</th>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['book_id'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($row['book_name'] ?? '-'); ?></td>
                    <td><?php echo number_format($row['price'] ?? 0); ?> VNĐ</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>