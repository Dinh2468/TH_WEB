<?
$a = "   function rtrim      ";
$b = "   function rtrim *****";

$s1 = rtrim($a);
$s2 = rtrim($b, "*");
$s3 = trim($a);

echo $a . "(" . strlen($a) . ")<br>";
echo $s1 . "(" . strlen($s1) . ")<br>";
echo $s2 . "(" . strlen($s2) . ")<br>";
echo $s3 . "(" . strlen($s3) . ")<br>";
