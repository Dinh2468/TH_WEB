<?php
    include('../connect.php');
    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloai'];

    $sql = "insert into loai(maloai, tenloai) value(?,?)";
    $stm = $dbh->prepare($sql);
    $stm->bindParam(1,$maloai);
    $stm->bindParam(2,$tenloai);
    $stm->execute();

    header("location:list_loai.php");