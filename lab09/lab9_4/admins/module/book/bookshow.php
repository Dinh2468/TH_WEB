<?php
$book = new Book();
$page = Utils::getIndex("page", 1); // Lấy trang hiện tại
$data = $book->getAll($page); // Lấy dữ liệu sách
$page_count = $book->getPageCount();

?>
<div class="tab-content default-tab" id="tab1">
	<!-- This is the target div. id must match the href of this div's tab -->

	<div class="notification attention png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
			This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
		</div>
	</div>

	<table>

		<thead>
			<tr>
				<th><input class="check-all" type="checkbox" /></th>
				<th>Tên sách</th>
				<th>Giá</th>
				<th>Loại</th>
				<th>Nhà XB</th>
				<th>Column 5</th>
			</tr>

		</thead>

		<tfoot>
			<tr>
				<td colspan="6">
					<div class="bulk-actions align-left">
						<a class="button" href="index.php?mod=book&group=book&ac=add">Thêm Sách Mới</a>
					</div>

					<div class="pagination">
						...
					</div>
				</td>
			</tr>
		</tfoot>

		<tbody>
			<?php
			foreach ($data as $r) { ?>
				<tr>
					<td><input type="checkbox" /></td>
					<td><a href="#" title="title"><?php echo $r["book_name"]; ?>
						</a></td>
					<td><?php echo number_format($r["price"]); ?> VND</td>
					<td><?php echo $r["cat_name"]; ?></td>
					<td><?php echo $r["pub_name"]; ?></td>
					<td>
						<!-- Icons -->
						<a href="index.php?mod=book&ac=edit&id=<?php echo $r["book_id"]; ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>&nbsp;&nbsp;
						<a href="index.php?mod=book&ac=delete&id=<?php echo $r["book_id"]; ?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>

					</td>
				</tr>
			<?php
			}
			?>

		</tbody>

	</table>

</div> <!-- End #tab1 -->