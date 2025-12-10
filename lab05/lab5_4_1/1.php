<?php
$arr = array();
$r = array("id" => 1, "name" => "Product1");
$arr[] = $r;
$r = array("id" => 2, "name" => "Product2");
$arr[] = $r;
$r = array("id" => 3, "name" => "Product3");
$arr[] = $r;
$r = array("id" => 4, "name" => "Product4");
$arr[] = $r;

// Duyệt qua từng phần tử mảng và in ra các liên kết
foreach ($arr as $item) {
    echo '<a href="2.php?id=' . $item["id"] . '">' . $item["name"] . '</a><br>';
}
