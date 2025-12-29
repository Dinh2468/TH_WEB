<?php
$group = Utils::getIndex("group", "book");

//cho xu ly table category
if ($group == "cat") {
	$category = new Category();
	$ac = Utils::getIndex("ac", "catShow");
	if ($ac != "delete")
		include ROOT . "/admins/module/book/catedit.php"; //Insert form edit or add new

	if ($ac == "catShow")
		include ROOT . "/admins/module/book/catshow.php";

	if ($ac == "delete") {
		//xu ly xoa	
		$n = $category->delete(Utils::getIndex("id"));
?>
		<script language="javascript">
			alert("Đã xóa <?php echo $n; ?> category!");
			window.location = "index.php?mod=book&group=cat";
		</script>
	<?php
	}
	if ($ac == "saveEdit") {
		//xu ly edit -> and redirect to index.php -> mod-> action	
		$n = $category->saveEdit();
	?>
		<script language="javascript">
			alert("Đã sửa <?php echo $n; ?> category!");
			window.location = "index.php?mod=book&group=cat";
		</script>
	<?php
	}
	if ($ac == "saveAdd") {
		//xu ly edit -> and redirect to index.php -> mod-> action	
		$n = $category->saveAddNew();
	?>
		<script language="javascript">
			alert("Da them <?php echo $n; ?> category!");
			window.location = "index.php?mod=book&group=cat";
		</script>
<?php
	}
}
if ($group == "book") {
	if ($group == "book") {
		$book = new Book();
		$ac = Utils::getIndex("ac", "bookShow");

		// 1. Hiển thị danh sách
		if ($ac == "bookShow") {
			include ROOT . "/admins/module/book/bookshow.php";
		}

		// 2. Hiện form Thêm hoặc Sửa
		if ($ac == "add" || $ac == "edit") {
			include ROOT . "/admins/module/book/bookedit.php";
		}

		// 3. Xử lý lưu khi Thêm Mới
		if ($ac == "saveAdd") {
			$name = Utils::postIndex("book_name");
			$price = Utils::postIndex("price");
			$cat_id = Utils::postIndex("cat_id");
			$pub_id = Utils::postIndex("pub_id");
			$desc = Utils::postIndex("description");

			// Xử lý upload ảnh
			$img = "";
			if (isset($_FILES["img"]) && $_FILES["img"]["name"] != "") {
				$img = time() . "_" . $_FILES["img"]["name"];
				move_uploaded_file($_FILES["img"]["tmp_name"], ROOT . "/images/book/" . $img);
			}

			// Gọi hàm Add trong Book.class.php
			$n = $book->add($name, $cat_id, $pub_id, $price, $img, $desc);

			echo "<script>alert('Đã thêm $n sách mới!'); window.location='index.php?mod=book&group=book';</script>";
		}

		// 4. Xử lý lưu khi Cập nhật
		if ($ac == "saveEdit") {
			$id = Utils::postIndex("book_id");
			$name = Utils::postIndex("book_name");
			$price = Utils::postIndex("price");
			$cat_id = Utils::postIndex("cat_id");
			$pub_id = Utils::postIndex("pub_id");
			$desc = Utils::postIndex("description");
			$old_img = Utils::postIndex("old_img");

			// Xử lý upload ảnh (Nếu có chọn ảnh mới thì lấy, không thì dùng ảnh cũ)
			$img = $old_img;
			if (isset($_FILES["img"]) && $_FILES["img"]["name"] != "") {
				$img = time() . "_" . $_FILES["img"]["name"];
				move_uploaded_file($_FILES["img"]["tmp_name"], ROOT . "/images/book/" . $img);
			}

			// Gọi hàm Update trong Book.class.php
			$n = $book->update($id, $name, $cat_id, $pub_id, $price, $img, $desc);

			echo "<script>alert('Đã cập nhật sách!'); window.location='index.php?mod=book&group=book';</script>";
		}

		// 5. Xử lý Xóa
		if ($ac == "delete") {
			$id = Utils::getIndex("id");
			$n = $book->delete($id);
			echo "<script>alert('Đã xóa sách!'); window.location='index.php?mod=book&group=book';</script>";
		}
	}
}

if ($group == "pub") {
	$publisher = new Publisher();
	// Lấy hành động (action), mặc định là xem danh sách
	$ac = Utils::getIndex("ac", "pubShow");

	// 1. Nếu action là xem danh sách
	if ($ac == "pubShow") {
		include "pubshow.php";
	}

	// 2. Nếu action là form Sửa hoặc Thêm mới (không phải lưu và không phải xóa)
	if ($ac == "edit" || $ac == "add") {
		include "pubedit.php";
	}

	// 3. Xử lý Xóa
	if ($ac == "delete") {
		$n = $publisher->delete(Utils::getIndex("id"));
		// Redirect về trang danh sách
		echo "<script>window.location='index.php?mod=book&group=pub';</script>";
	}

	// 4. Xử lý Lưu khi Sửa
	if ($ac == "saveEdit") {
		// Gọi hàm update trong class Publisher
		$id = Utils::postIndex("pub_id");
		$name = Utils::postIndex("pub_name");
		$phone = Utils::postIndex("pub_phone");

		$n = $publisher->update($id, $name, $phone);
		echo "<script>window.location='index.php?mod=book&group=pub';</script>";
	}

	// 5. Xử lý Lưu khi Thêm Mới
	if ($ac == "saveAdd") {
		// Gọi hàm add trong class Publisher
		$name = Utils::postIndex("pub_name");
		$phone = Utils::postIndex("pub_phone");

		$n = $publisher->add($name, $phone);
		echo "<script>window.location='index.php?mod=book&group=pub';</script>";
	}
}
