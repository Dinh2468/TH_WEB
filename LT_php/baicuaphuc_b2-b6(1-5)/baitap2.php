<!-- Viết các hàm theo yêu cầu: -->
<!-- Tính tổng từ 1 -> n -->
 <?
    $n=10;
    echo "Tong cac so chan tu 1 den ".$n." la: ".tongchan1n($n);

    echo "<br />Tong so nguyen to tu 2 den ".$n." la: ".demsnt1denn($n);
    
    echo "<br />Tich cac so chinh phuong tu 1 den ".$n." la: ".tichsochinhphuong1denn($n);
    
    echo "<br />Trung binh cong cac so la uoc so cua ".$n." la: ".trungbinhtonguocso($n);
    // Tinh tong chan tu 1 den n
    function tongchan1n($n){
        $sum = 0;
        for ($i=0; $i < $n ; $i+=2) { 
            $sum+=$i;
        }
        return $sum;
    }
    // Dem so nguyen to 1->n
    function ktsnt($n){
        if($n < 2) return false;
        for ($i=2; $i < $n; $i++) { 
            if($n % $i == 0)
                return false;
        }
        return true;
    }
    function demsnt1denn($n){
        $count = 0;
        for ($i=2; $i < $n; $i++) { 
            ktsnt($i)?$count++:$count;
        }
        return $count;
    }

    // Tich cac so chinh phuong tu 1 den n
    function ktscp($n){
        if($n<0) return false;
        $sqrt = sqrt($n);
        return $sqrt == intval($sqrt);
    }
    function tichsochinhphuong1denn($n){
        $tich=1;
        for ($i=1; $i < $n; $i++) { 
            ktscp($i)?$tich*=$i:$tich;
        }
        return $tich;
    }

    // Trung binh cong cac so la uoc so cua n
    function trungbinhtonguocso($n){
        $sum = 0;
        $count = 0;
        for($i=1; $i<=$n/2; $i++){
            if($n % $i == 0)
                {
                    $sum += $i;
                    $count++;
                }
        }
        return $sum/$count;
    }
 ?>