<?
$str = "a 'quote' is <b>bold</b>";
echo $str . "<br>";
$s1 = htmlentities($str);
echo $s1;
$s2 = html_entity_decode($s1);
echo "<br>" . $s2;
