<?
$a = isset($_POST["a"]) ? $_POST["a"] : 0;
$b = isset($_POST["b"]) ? $_POST["b"] : 0;
$c = isset($_POST["c"]) ? $_POST["c"] : 0;
$dtb = isset($_POST["dtb"]) ? $_POST["dtb"] : 0;
$giay = isset($_POST["giay"]) ? $_POST["giay"] : 0;
$thang = isset($_POST["thang"]) ? $_POST["thang"] : 0;
$nam = isset($_POST["nam"]) ? $_POST["nam"] : 0;
?>
<form action="" method="post">
    a:<input type="number" name="a" value="<? echo $a ?>"><br>
    b:<input type="number" name="b" value="<? echo $b ?>"><br>
    c:<input type="number" name="c" value="<? echo $c ?>"><br>
    dtb:<input type="number" name="dtb" value="<? echo $dtb ?>"><br>
    giay:<input type="number" name="giay" value="<? echo $giay ?>"><br>
    thang:<input type="number" name="thang" value="<? echo $thang ?>"><br>
    nam:<input type="number" name="nam" value="<? echo $nam ?>"><br>
    <button type="submit">Submit</button>
</form>
<?
// $a = 8;
// $b = 5;
//bt1 xuat ra a b
echo "xuat gia tri a b <br>";
echo "a=$a, b=$b <br>";
// //bt2 hoan doi gia tri a b
// echo "<hr/>";
// echo "hoan doi gia tri a b <br>";
// $t = $a;
// $a = $b;
// $b = $t;
// echo "a=$a, b=$b <br>";
//bt3 tinh trung binh cong
echo "<hr/>";
echo "tinh trung binh cong <br>";
echo "AVG($a,$b)=" . ($a + $b) / 2;
//bt4 xuat ra a b cung dau trai dau
echo "<hr/>";
// $a = 10;
// $b = -5;
if ($a > 0 || $b < 0) {
    echo "$a trai dau voi $b";
} else {
    echo "$a cung dau voi $b";
}
//bt5 tim max
echo "<hr/>";
// $a = 10;
// $b = 50;
// $c = 1;
$max = $a;
if ($b > $max) $max = $b;
if ($c > $max) $max = $c;
echo "Max($a,$b,$c)=$max";
//bt6 xep loai hoc luc
echo "<hr/>";
echo "xep loai hoc luc <br>";
// $dtb = 8;
if ($dtb < 0 || $dtb > 10) echo "diem khong hop le";
else
if ($dtb < 5) echo "dtb $dtb xep loai yeu";
elseif ($dtb < 6.5) echo " dtb $dtb xep loai trung binh";
elseif ($dtb < 8) echo "dtb $dtb xep loai kha";
elseif ($dtb < 9) echo "dtb $dtb xep loai gioi";
//bt7 giai ptbac1
echo "<hr/>";
echo "giai phuong trinh bac 1 $a*x + $b = 0 <br>";
if ($a != 0) {
    $x = -$b / $a;
    echo "nghiem x=$x";
} elseif ($b == 0) {
    echo "phuong trinh vo so nghiem";
} else {
    echo "phuong trinh vo nghiem";
}
//bt8 giai ptbac2
echo "<hr/>";
echo "giai phuong trinh bac 2 $a*x^2 + $b*x + $c = 0 <br>";
if ($a == 0) {
    include 'D:\Study\HKI_NAM4\php\b2\bt7.php';
} else {
    $delta = $b * $b - 4 * $a * $c;
    if ($delta < 0) echo "phuong trinh vo nghiem";
    elseif ($delta == 0) {
        $x = -$b / (2 * $a);
        echo "phuong trinh co nghiem kep x1=x2=$x";
    } else {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        echo "phuong trinh co 2 nghiem phan biet x1=" . round($x1, 2) . ", x2=" . round($x2, 2);
    }
    if ($b == 0) {
        if ($c == 0) {
            echo "phuong trinh co vo so nghiem";
        }
    }
}
//bt9 doi giay sang h:m:s
echo "<hr/>";
echo "doi giay sang h:m:s <br>";
$phut = intdiv($giay, 60);
$gio = intdiv($phut, 60);
echo "$giay giay =" . $gio . " gio " . ($phut % 60) . " phut " . ($giay % 60) . " giay";
//bt10 in ra quy

echo "<hr/>";
echo "in ra quy <br>";
if ($thang < 1 || $thang > 12) {
    echo "thang khong hop le";
} else {
    switch ($thang) {
        case 1:
        case 2:
        case 3:
            echo "thang $thang thuoc quy 1";
            break;
        case 4:
        case 5:
        case 6:
            echo "thang $thang thuoc quy 2";
            break;
        case 7:
        case 8:
        case 9:
            echo "thang $thang thuoc quy 3";
            break;
        case 10:
        case 11:
        case 12:
            echo "thang $thang thuoc quy 4";
            break;
    }
}
//bt11 in ra so ngay trong thang
echo "<hr/>";
echo "in ra so ngay trong thang <br>";
if ($thang < 1 || $thang > 12) {
    echo "thang khong hop le";
} else {
    switch ($thang) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $ngay = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $ngay = 30;
            break;
        case 2:
            if (($nam % 4 == 0 && $nam % 100 != 0) || ($nam % 400 == 0))
                $ngay = 29;
            else
                $ngay = 28;
            break;
    }
    echo "nam $nam thang $thang ngay $ngay";
}
