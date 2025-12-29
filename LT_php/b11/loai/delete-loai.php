<?php
include '../connect.php';
if (!isset($_GET['maloai'])) exit;
$maloai = $_GET['maloai'];
$stm = $dbh->prepare("delete from loai where maloai = ?");
$stm->bindParam(1, $maloai);
$stm->execute();

if ($stm->rowCount() > 0) {
?>
    <script>
        alert('Xoa thanh cong');
        window.location = 'list-loai.php';
    </script>
<?php } ?>