<?php
    include('../connect.php');
    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloai'];

    $sql = "update loai set tenloai = ? where maloai = ?";
    $stm = $dbh->prepare($sql);
    $stm->bindParam(2,$maloai);
    $stm->bindParam(1,$tenloai);
    $stm->execute();

    header("location:list_loai.php");
    