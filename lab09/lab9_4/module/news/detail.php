<?php
// Lấy id từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Gọi hàm getDetail từ class News
$d = $newsObj->getDetail($id);
if ($d) // Nếu tìm thấy tin tức
{
?>
    <div class="news-detail-container">
        <h1 class="detail-title"><?php echo $d['title']; ?></h1>
        <div class="detail-content">
            <?php
            if (!empty($d['img'])) {
                echo '<div class="detail-img"><img src="images/' . $d['img'] . '" /></div>';
            }
            echo $d['content'];
            ?>
        </div>
        <div class="go-back">
            <a href="index.php?mod=news">&laquo; Quay lại danh sách tin</a>
        </div>
    </div>
<?php
} else {
    echo "<div style='padding:20px'>Không tìm thấy tin tức này!</div>";
}
?>