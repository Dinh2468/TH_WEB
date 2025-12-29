<?php
$book = new Book();
$category = new Category();
$publisher = new Publisher();

// Lấy ID từ URL (nếu sửa)
$id = Utils::getIndex("id");
$r = $book->getDetail($id);

// Load danh sách Loại và NXB cho dropdown
$cats = $category->getAll();
$pubs = $publisher->getAll();

// Mặc định cho trường hợp Thêm mới
$ac2 = "saveAdd";
$info = "Thêm sách mới";
$img_thumb = "";

// Trường hợp Sửa (nếu tìm thấy ID)
if (count($r) > 0) {
    $ac2 = "saveEdit";
    $info = "Cập nhật sách: " . $r['book_name'];
    if ($r['img'] != "") {
        $img_thumb = "<img src='" . BASE_URL . "images/book/" . $r['img'] . "' width='60' />";
        // Lưu ý: BASE_URL là đường dẫn gốc, nếu chưa định nghĩa thì dùng đường dẫn tương đối ../images/book/
    }
} else {
    // Reset các biến để không báo lỗi Undefined khi thêm mới
    $r = ["book_id" => "", "book_name" => "", "price" => "", "description" => "", "cat_id" => "", "pub_id" => "", "img" => ""];
}
?>

<div class="content-box-header">
    <h3><?php echo $info; ?></h3>
</div>

<div class="content-box-content">
    <form action="index.php?mod=book&group=book&ac=<?php echo $ac2; ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <p>
                <label>Mã sách (Tự động)</label>
                <input class="text-input small-input" type="text" name="book_id" value="<?php echo $r['book_id']; ?>" readonly style="background:#eee;" />
            </p>

            <p>
                <label>Tên sách (*)</label>
                <input class="text-input medium-input" type="text" name="book_name" value="<?php echo $r['book_name']; ?>" required />
            </p>

            <p>
                <label>Giá (*)</label>
                <input class="text-input small-input" type="number" name="price" value="<?php echo $r['price']; ?>" required /> VNĐ
            </p>

            <p>
                <label>Loại sách</label>
                <select name="cat_id" class="small-input">
                    <?php foreach ($cats as $c) { ?>
                        <option value="<?php echo $c['cat_id']; ?>" <?php if ($r['cat_id'] == $c['cat_id']) echo "selected"; ?>>
                            <?php echo $c['cat_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label>Nhà xuất bản</label>
                <select name="pub_id" class="small-input">
                    <?php foreach ($pubs as $p) { ?>
                        <option value="<?php echo $p['pub_id']; ?>" <?php if ($r['pub_id'] == $p['pub_id']) echo "selected"; ?>>
                            <?php echo $p['pub_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label>Hình ảnh</label>
                <?php echo $img_thumb; ?><br>
                <input type="file" name="img" />
                <input type="hidden" name="old_img" value="<?php echo $r['img']; ?>">
            </p>

            <p>
                <label>Mô tả</label>
                <textarea class="text-input textarea" name="description" rows="10" cols="79"><?php echo $r['description']; ?></textarea>
            </p>

            <p>
                <input class="button" type="submit" value="Lưu dữ liệu" />
                <input class="button" type="button" value="Quay lại" onclick="location.href='index.php?mod=book&group=book'" />
            </p>
        </fieldset>
    </form>
</div>