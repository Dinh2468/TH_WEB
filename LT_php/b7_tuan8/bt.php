<?
//cau 1
function F1(&$a, &$b, $c = 2)
{
    $a *= 4;
    $b -= 3;
    $c--;
    return $a + $b + $c;
}
$n = 2;
$m = "4" + "2";
$s = F1($n, $m);
echo "1.n=$n, m=$m s=$s";

//cau 2
function F2(&$a, $b = 6)
{
    $a += 2;
    $b++;
    return $a + $b;
}
$n = 6;
$m = array_sum([1, 0, 2]);
$s = F2($n);
echo "<br>2.n=$n, m=$m s=$s";

//cau 3
function F3($arr, $n = 3)
{
    $s = 2;
    foreach ($arr as $k => $v) {
    }
}

//array_diff(1,2); tim hỉu