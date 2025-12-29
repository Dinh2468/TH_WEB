<?
$s = "truong dai hoc sai dai gon";
echo "<br> vi tri chuoi 'dai' " . strpos($s, "dai");
echo "<br> tim chuoi con 'dai' " . strstr($s, "dai");

$n = 0;
$s2 = str_replace("dai", "stu", $s, $n);

echo "<br> chuoi sau khi thay the: ($n) " . $s2;

echo "<br>" . str_shuffle($s);
