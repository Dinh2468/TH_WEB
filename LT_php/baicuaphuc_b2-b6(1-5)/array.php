<?
// 4 cách khởi tạo mảng
$arr = [];
print_r($arr);

$arr = array();
print_r($arr);

$arr = array(42, "abc");
print_r($arr);

echo "<br />Cac phan tu trong mang for <br />";
for($i=0;$i<count($arr);$i++)
    echo $arr[$i]."<br />";

$arr = array(9, "abc" => 3, "xyz" => 5);
print_r($arr);

// isset(): kiểm tra có key hay không
if(isset($arr["abc"]))
    unset($arr["abc"]);
print_r($arr);


echo "<br />Cac phan tu trong mang foreach <br />";
$arr = array(9, "abc" => 5, "xyz" => 5, "dinner" => "abc", "hct" => "100");
foreach($arr as $value)
    echo " $value <br />";

// Mang 2 chieu
$mang2chieu = array("x" => array(1,2,5),"y" => array(2,4,6));
 $x=$mang2chieu["x"][0];
 $y=$mang2chieu["y"];
 $z=$y[0];

//  Ham in_array: kiem tra phan tu co trong mang hay khong
 if(in_array(2 ,$y))
    echo "co gia tri 2 trong mang<br />";

//  Lay gia tri key ngau nhien trong mang khong trung, tu be den lon
$rand_key = array_rand($y,2);
foreach($rand_key as $value)
    print_r($value. "    ");
?>