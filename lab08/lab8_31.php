<?php

try {
	$pdh = new PDO("mysql:host=localhost; dbname=bookstore1", "root", "");
	$pdh->query("  set names 'utf8'");
} catch (Exception $e) {
	echo $e->getMessage();
	exit;
}
// chức năng xóa loại
$cat_id = isset($_GET["cat_id"]) ? $_GET["cat_id"] : "";
//kiểm tra biến cat_id có tồn tại không, nếu có thì gán giá trị cho $cat_id, nếu không thì gán rỗng
$sql = "delete from category where cat_id = :cat_id ";
$arr = array(":cat_id" => $cat_id); //mảng giá trị cho tham số
$stm = $pdh->prepare($sql); //trả về đối tượng statement
$stm->execute($arr); //thực thi câu lệnh với mảng giá trị
$n = $stm->rowCount(); //đếm số dòng bị ảnh hưởng
if ($n > 0) $thongbao = "Da xoa $n loai sach! ";
else $thongbao = "Loi xoa!";
?>
<script language="javascript">
	alert("<?php echo $thongbao; ?>");
	window.location = "lab8_3.php";
</script>