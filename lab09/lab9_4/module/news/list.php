<?php
// Lấy trang hiện tại
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Lấy dữ liệu từ Class News
$listNews = $newsObj->getAll($page);
?>
<div class="news-list-container">
    <h2 class="title-mod">Tin tức mới nhất</h2>
    <?php
    if (count($listNews) > 0) {
        foreach ($listNews as $r) {
    ?>
            <div class="news-item">
                <div class="news-img">
                    <?php if (!empty($r['img'])) { ?>
                        <img src="images/<?php echo $r['img']; ?>" alt="<?php echo $r['title']; ?>" />
                    <?php } else { ?>
                        <img src="images/no-image.png" alt="No Image" />
                    <?php } ?>
                </div>

                <div class="news-info">
                    <h3>
                        <a href="index.php?mod=news&ac=detail&id=<?php echo $r['id']; ?>">
                            <?php echo $r['title']; ?>
                        </a>
                    </h3>

                    <p class="short-content">
                        <?php echo $r['short_content']; ?>
                    </p>

                    <a class="read-more" href="index.php?mod=news&ac=detail&id=<?php echo $r['id']; ?>">
                        Xem chi tiết &raquo;
                    </a>
                </div>
            </div>
    <?php
        }
    } else {
        echo "<p>Chưa có tin tức nào.</p>";
    }
    ?>

    <div class="pagination">
        <?php
        if ($page > 1) {
            $prev = $page - 1;
            echo "<a href='index.php?mod=news&ac=list&page=$prev'>&laquo; Trang trước</a> ";
        }

        if (count($listNews) >= $newsObj->PageSize) {
            $next = $page + 1;
            echo "<a href='index.php?mod=news&ac=list&page=$next'>Trang sau &raquo;</a>";
        }
        ?>
    </div>
</div>