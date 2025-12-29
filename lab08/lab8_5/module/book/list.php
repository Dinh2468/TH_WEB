<?php
//CẤU HÌNH PHÂN TRANG
$pageSize = 5; // Số sách hiển thị trên 1 trang
$page = getIndex("page", 1); // Lấy trang hiện tại, mặc định là 1
$page = (int)$page; // Ép kiểu số nguyên để an toàn
if ($page < 1) $page = 1;
$offset = ($page - 1) * $pageSize; // Tính vị trí bắt đầu lấy dữ liệu 

$cat_id = getIndex("cat_id", "all");
// Lấy giá trị lọc theo danh mục, mặc định là "all"
$pub_id = getIndex("pub_id", "all");
// Lấy giá trị lọc theo nhà xuất bản, mặc định là "all"

// Tạo câu điều kiện WHERE chung để dùng cho cả việc Đếm và Lấy dữ liệu
$sqlWhere = " WHERE 1 ";
$arr = array();
if ($cat_id != "all") {
	$sqlWhere .= " AND cat_id = :cat_id ";
	$arr[":cat_id"] = $cat_id;
}

if ($pub_id != "all") {
	$sqlWhere .= " AND pub_id = :pub_id ";
	$arr[":pub_id"] = $pub_id;
}

//TÍNH TỔNG SỐ TRANG
$sqlCount = "SELECT count(*) as total FROM book " . $sqlWhere;
// Câu truy vấn đếm tổng số bản ghi thỏa mãn điều kiện
$dataCount = $book->select($sqlCount, $arr);

// Lấy dòng đầu tiên vì kết quả trả về là mảng 2 chiều
$totalRecords = $dataCount[0]['total'];
$totalPages = ceil($totalRecords / $pageSize);
// Làm tròn lên để tính tổng số trang

//TRUY VẤN DỮ LIỆU CHO TRANG HIỆN TẠI
$sql = "SELECT * FROM book " . $sqlWhere . " LIMIT $offset, $pageSize";
$list = $book->select($sql, $arr);

echo "<div>Có " . $totalRecords . " kết quả (Trang $page / $totalPages)</div>";
foreach ($list as $r) {
?>
	<div class="book">
		<?php echo $r["book_name"]; ?>
	</div>
<?php
}
?>
<div class="pagination" style="margin-top: 20px; text-align: center;">
	<?php
	// Hiển thị nút Previous nếu không phải trang 1
	if ($page > 1) {
		$prevPage = $page - 1;
		echo "<a href='index.php?ac=list&cat_id=$cat_id&pub_id=$pub_id&page=$prevPage'>&laquo; Trước</a> ";
	}

	// Lặp qua các trang để hiển thị số
	for ($i = 1; $i <= $totalPages; $i++) {
		if ($i == $page) {
			echo "<strong style='margin: 0 5px;'>$i</strong> ";
		} else {
			echo "<a href='index.php?ac=list&cat_id=$cat_id&pub_id=$pub_id&page=$i' style='margin: 0 5px;'>$i</a> ";
		}
	}
	// Hiển thị nút Next nếu chưa đến trang cuối
	if ($page < $totalPages) {
		$nextPage = $page + 1;
		echo "<a href='index.php?ac=list&cat_id=$cat_id&pub_id=$pub_id&page=$nextPage'>Sau &raquo;</a> ";
	}
	?>
</div>