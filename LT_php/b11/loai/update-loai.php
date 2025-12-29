<?php
$maloai = $_GET['maloai'] ?? "";
if ($maloai) {

    include '../connect.php';
    $stm = $dbh->prepare("update loai set tenloai =? where maloai=?");
    $params = array($maloai);
    $stm->execute($params);
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    $row = $rows[0];
    $dbh = null;
    header('location:list-loai.php');
}
