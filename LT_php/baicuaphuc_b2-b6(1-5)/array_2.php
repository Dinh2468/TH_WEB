<?
    $a = [2,8,55,3,9,1,6];
    $b = ["Nam", "An", "Hai","Quy", "Phuc","Tuan"];

    sort($a);
    $sort_b = sort($b, SORT_STRING);
    // Tach cac phan tu bang dau "_"
    $str = implode("_", $a)."<br />"; 
    echo $str;
    echo $sort_b."<br />";

    // Ghep cac phan tu cach nhau bang dau "_" lai thanh mang
    $c=explode("_", $str);
    print_r($c);
?>