<?
    // Đề: a=8 b=5
    // a. xuất ra phần dư của a và b
    $a = 8;
    $b = 5;
    echo $a>$b?$a%$b:$b%$a;

    //b. hoán đổi giá trị a và b
    $temp = $a;
    $a = $b;
    $b = $temp;
    echo "<br/>a = ".$a;
    echo "<br/>b = ".$b;
    unset($temp);
    // c: xuất gia gtr trung bình
    echo "<br/>".($a+$b)/2;
    // d: xuất ra a,b cùng dấu hoặc trái dấu với a=10 $b=-5
    echo $a*$b>0?"<br/>a và b cùng dấu":"<br/>a và b trái dấu";
    // e: xuất giá trị lớn nhất
    $a=10;
    $b=50;
    $c=462;
    echo "<br/>Số lớn nhất là: ";
    echo $a>$b?($a>$c?$a:$c):($b>$c?$b:$c);

    // Xuất kết quả học tập dựa vào dtb
    $dtb=99.5;
    echo '<br />Kết quả của số điểm '.$dtb.' là: ';
    echo $dtb>=8?'giỏi':($dtb>=6.5?'Khá':($dtb>=5?'Trung bình':'Yếu'));

    // Đổi số giây -> giờ-phút:giây dùng switch
    $second=3660;
    $minute=$second>=60?intdiv($second,60):0;
    $hour=$minute>=60?intdiv($minute,60):0;
    echo "<br />";
    echo $hour.'-'.$minute%60 . ':'.$second%60;

    // ngay=3 thang=10 nam=2025
    // cho biết ngày thứ mấy trong năm ?
    $ngay=1;
    $thang=2;
    $nam=2025;
    $congdon=$ngay;
    switch($thang-1){
        case 11:
            $congdon+=30;
        case 10:
            $congdon+=30;
        case 9:
            $congdon+=30;
        case 8:
            $congdon+=30;
        case 7:
            $congdon+=30;
        case 6:
            $congdon+=30;
        case 5:
            $congdon+=30;
        case 4:
            $congdon+=30;
        case 3:
            $congdon+=30;
        case 2:
            $congdon+=30;
        case 1:
            $congdon+=30;
    }
    echo "<br />";
    echo $congdon
?>