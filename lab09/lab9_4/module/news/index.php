
<?php
$newsObj = new News();
// Lấy tham số 'ac' (action) từ URL, mặc định là 'list'
$ac = isset($_GET['ac']) ? $_GET['ac'] : 'list';

if ($ac == "list") {
	include "module/news/list.php";
} elseif ($ac == "detail") {
	include "module/news/detail.php";
}
?>