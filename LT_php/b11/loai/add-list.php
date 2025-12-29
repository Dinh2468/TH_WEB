<?php
include '../connect.php';
if (!isset($_POST['maloai']) || !isset($_POST['tenloai'])) exit;
$maloai = $_POST['maloai'];
$tenloai = $_POST['tenloai'];

$stm = $dbh->prepare("insert into loai(maloai, tenloai) values (?,?)");
$params = array($maloai, $tenloai);
$stm->execute($params);
$dbh = null;

header('location:list-loai.php');
exit;
