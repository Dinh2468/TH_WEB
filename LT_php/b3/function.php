<?
$a = 1;
$b = 2;
function F()
{
    $a = 6;
    global $b; //global dùng để truy cập biến toàn cục (bên ngoài hàm) từ bên trong hàm. dung de thay doi gia tri bien toan cuc
    $b = 7;
    global $c;
    $c = 8;
}
f(); //ten ham ko phan biet hoa thuong
echo "a=$a , b= $b, c=$c";
