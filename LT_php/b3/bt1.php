<?
$n = 16;
echo "<br> Tong tu 1 den $n:" . Tong1denN($n);
echo "<br> Tong chan tu 1 den $n:" . tongchan1denn($n);
echo "<br> Dem so nguyen to tu 1 den n $n:" . demsnt1denn($n);
echo "<br> Tich so chinh phuong tu 1 den n $n:" . tichscp1denn($n);
echo "<br> Trung binh cong uoc chung cua 8 tu 1 den n $n:" . AVGUC8($n);
//tinh tong tu 1 den n
function Tong1denN($n)
{
    $s = 0;
    for ($i = 1; $i <= $n; $i++) {
        $s += $i;
    }
    return $s;
}
//tinh tong chan tu 1 den n
function tongchan1denn($n)
{
    $s = 0;
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 2 == 0) {
            $s += $i;
        }
    }
    return $s;
}
//dem so nguyen to tu 1->n
function demsnt1denn($n)
{
    $s = 0;
    for ($i = 1; $i <= $n; $i++) {
        if (ktsnt($i) == 1) {
            $s++;
        }
    }
    return $s;
}
function ktsnt($a)
{
    if ($a < 2) return 0;
    else
        for ($i = 2; $i <= sqrt($a); $i++) {
            if ($a % $i == 0)
                return 0;
        }
    return 1;
}
//tich cac so chinh phuong tu 1 -> n
function tichscp1denn($n)
{
    $s = 1;
    for ($i = 1; $i <= $n; $i++) {
        if (ktscp($i) == 1) {
            $s *= $i;
        }
    }
    return $s;
}
function ktscp($a)
{
    $i = 1;
    while ($i * $i < $a) {
        $i++;
    };
    if ($i * $i == $a) return 1;
    return 0;
}
//tinh trung binh cong uoc chung cua 8 tu 1 den n
function AVGUC8($n)
{
    $s = 0;
    $d = 0;
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 8 == 0) {
            $s += $i;
            $d++;
        }
    }
    $avg = $s / $d;
    return $avg;
}
