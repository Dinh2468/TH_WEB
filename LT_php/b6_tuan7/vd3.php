<?
$str = "hello";
echo "the string is: $str <br>";
$s1 = sha1($str);
$s2 = md5(sha1($str));
echo "sha1: $s1 <br>";
