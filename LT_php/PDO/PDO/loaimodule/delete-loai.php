<?php
    include '../connect.php';
    $maloai = $_GET['maloai'];
    if(!isset($maloai)) exit;
    $sql = "delete from loai where maloai = ?";
    $stm = $dbh->prepare($sql);
    $stm->bindParam(1, $maloai);
    $stm->execute();

    if($stm->rowCount()>0){
        ?>
    <script>
        alert('Xoa thanh cong');
        window.location = 'list_loai.php';
    </script>
    <?php } ?>