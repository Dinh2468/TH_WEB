<? $product = [
    ['id' => 'sp1', 'name' => 'iphone', 'qty' => 4, 'price' => 48],
    ['id' => 'sp2', 'name' => 'samsung', 'qty' => 2, 'price' => 60],
];
$sort_type = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
usort($product, function ($a, $b) use ($sort_type) {
    if ($sort_type == 'asc') {
        return $a['price'] <=> $b['price'];
    } else {
        return $b['price'] <=> $a['price'];
    }
    //<=> nếu $a > $b trả về 1, nếu $a < $b trả về -1, nếu bằng trả về 0
});
echo "<a href='?sort=asc'>Tăng  </a>";
echo "<a href='?sort=desc'>Giảm </a>";
echo "<table border='1'>";
echo "<tr><th>id</th><th>name</th><th>qty</th><th>price</th></tr>";
foreach ($product as $sp) {
    echo "<tr>";
    echo "<td>" . $sp['id'] . "</td>";
    echo "<td>" . $sp['name'] . "</td>";
    echo "<td>" . $sp['qty'] . "</td>";
    echo "<td>" . $sp['price'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<?php
define('PI', 3.14);
const Pi = 3.14;
?>

210a
212a
213
$data = $stm->fetch(PDO::FETCH_OBJ); // trả về 1 đối tượng
echo $data->name;chắc là câu c
214
$data = $stm->fetchAll(PDO::FETCH_OBJ); // trả về mảng đối tượng
echo $data[0]->name; // truy cập phần tử mảng và thuộc tính đối tượng


A:: a1 //goi const