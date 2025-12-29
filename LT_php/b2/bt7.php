<?
//bt7 giai ptbac1
$a = isset($b) ? $b : 10;
$b = isset($c) ? $c : 5;
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
