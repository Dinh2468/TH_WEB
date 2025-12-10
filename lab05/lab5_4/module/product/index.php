<?php
if (!defined("ROOT")) //kiểm tra ROOT đã được khai báo chưa nếu chưa thì không cho truy cập 
{
	echo "You don't have permission to access this page!";
	exit;
}
if ($ac == "spbc") //kiểm tra biến ac có giá trị là spbc thì mở file spbc.php 
	include ROOT . "/module/product/spbc.php";
if ($ac == "spmoi") //kiểm tra biến ac có giá trị là spmoi thì mở file spmoi.php
	$path = ROOT . "/module/product/spmoi.php";
if ($ac == "catalog") { //kiểm tra biến ac có giá trị là catalog thì mở file product_catalog.php
	$path = ROOT . "/module/product/product_catalog.php";
}
if ($ac == "press") { //kiểm tra biến ac có giá trị là press thì mở file product_press.php
	$path = ROOT . "/module/product/product_press.php";
}
if ($ac == "detail") { //kiểm tra biến ac có giá trị là detail thì mở file product_detail.php
	$path = ROOT . "/module/product/product_detail.php";
}
