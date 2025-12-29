<?php
if (!defined("ROOT")) {
	echo "Err!";
	exit;
}

$book = new Book();

// 1. Lấy dữ liệu danh mục và NXB để đổ vào <select>
// (Sử dụng hàm exeQuery có sẵn trong class Book để lấy nhanh)
$cats = $book->exeQuery("SELECT * FROM category");
$pubs = $book->exeQuery("SELECT * FROM publisher");

// 2. Lấy tham số tìm kiếm từ URL
$key = getIndex("key", "");       // Tên sách
$cat_id = getIndex("cat_id", "all"); // Mã loại
$pub_id = getIndex("pub_id", "all"); // Mã NXB
$page = getIndex("page", 1);      // Trang hiện tại

// 3. Gọi hàm tìm kiếm nâng cao vừa viết
$list = $book->searchAdvanced($key, $cat_id, $pub_id, $page);

?>

<div class="search-page">
	<h2 class="title-mod">Tìm kiếm sách nâng cao</h2>

	<form action="index.php" method="get" class="search-form">
		<input type="hidden" name="mod" value="book">
		<input type="hidden" name="ac" value="search">

		<div class="form-row">
			<input type="text" name="key" value="<?php echo $key; ?>" placeholder="Nhập tên sách..." />

			<select name="cat_id">
				<option value="all">-- Tất cả loại sách --</option>
				<?php foreach ($cats as $c) { ?>
					<option value="<?php echo $c['cat_id']; ?>" <?php if ($cat_id == $c['cat_id']) echo "selected"; ?>>
						<?php echo $c['cat_name']; ?>
					</option>
				<?php } ?>
			</select>

			<select name="pub_id">
				<option value="all">-- Tất cả Nhà Xuất Bản --</option>
				<?php foreach ($pubs as $p) { ?>
					<option value="<?php echo $p['pub_id']; ?>" <?php if ($pub_id == $p['pub_id']) echo "selected"; ?>>
						<?php echo $p['pub_name']; ?>
					</option>
				<?php } ?>
			</select>

			<button type="submit">Tìm kiếm</button>
		</div>
	</form>

	<hr>

	<h3>Kết quả: Tìm thấy <?php echo count($list); ?> sách (Trang <?php echo $page; ?>/<?php echo $book->getPageCount(); ?>)</h3>

	<div class="book-list">
		<?php foreach ($list as $r) { ?>
			<div class="book-item">
				<div class="book-img">
					<img src="images/book/<?php echo $r['img']; ?>" alt="">
				</div>
				<div class="book-info">
					<h4><?php echo $r["book_name"]; ?></h4>
					<p>Giá: <span class="price"><?php echo number_format($r['price']); ?> đ</span></p>
					<p>Loại: <?php echo $r['cat_name']; ?> | NXB: <?php echo $r['pub_name']; ?></p>
				</div>
			</div>
		<?php } ?>
	</div>

	<div class="pagination">
		<?php
		// Tạo chuỗi tham số để giữ lại điều kiện khi chuyển trang
		$params = "&key=$key&cat_id=$cat_id&pub_id=$pub_id";

		for ($i = 1; $i <= $book->getPageCount(); $i++) {
			$active = ($page == $i) ? "active" : "";
			echo "<a class='$active' href='index.php?mod=book&ac=search$params&page=$i'>$i</a> ";
		}
		?>
	</div>
</div>