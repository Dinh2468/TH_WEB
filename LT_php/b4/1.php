<?php
$arr = [];
$arr = [9, 2, 3, 15];
echo "<br>Cac phan tu trong mang";
for ($i = 0; $i < count($arr); $i++) {
    echo "<br>Phan tu thu $i la: " . $arr[$i];
}
$arr2 = ["a=" > 100, "b" => 20, "c" => 4, "xyz" => 7, "cd" => 45];
echo "<br>Cac phan tu trong mang arr2";
foreach ($arr2 as $value) {
    echo "<br>Gia tri la: " . $value;
}
echo "<br>Cac phan tu trong mang arr2";
foreach ($arr2 as $key => $value) {
    echo "<br>Phan tu $key: " . $value;
}

if (in_array(45, $arr2, true)) {
    echo "<br>Co gia tri 45";
} else {
    echo "<br>Khong co gia tri 45";
}
