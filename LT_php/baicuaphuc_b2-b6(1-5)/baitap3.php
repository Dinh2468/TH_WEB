<?
    $n = 235;
    echo "<br />So chu so cua ".$n." la: ".demsochuso($n);
    echo "<br />Tong cac chu so cua ".$n." la: ".tongcacchuso($n);
    echo "<br />Tich cac chu so chan cua ".$n." la: ".tichchusochan($n);
    echo "<br />Trung binh cong so le cua ".$n." la: ".TBCongSoLe($n);
    echo "<br />So ".$n." la so: ".kttangdan($n)?"Tang dan":"Khong tang dan";
    
    // Dem so chu so cua n
    function demsochuso($n){
        $count = 0;
        while($n>0){
            $count++;
            $n=floor($n/10);
        }
        return $count;
    }

    // Tong cac chu so
    function tongcacchuso($n){
        $sum = 0;
        while($n>0){
            $sum += ($n % 10);
            $n=floor($n/10);
        }
        return $sum;
    }

    // Tinh tich chu so chan
    function tichchusochan($n){
        $tich = 0;
        while($n>0){
            if( ($n % 10) % 2 == 0 )
                if($tich==0)
                    $tich=($n%10);
                else    
                    $tich*= ($n % 10);
            $n=floor($n/10);
        }
        return $tich;
    }

    // Trung binh cong so le
    function TBCongSoLe($n) {
        $sum = 0;
        $count = 0;
        while($n>0){
            if(($n%10)%2!=0){
                $sum += ($n % 10);
                $count++;
            }
            $n=floor($n/10);
        }
        return $sum/$count;
    }

    // Kiem tra chu so tang dan
    function kttangdan($n){
        while($n>0){
            if(($n/100)>($n/10))
                return false;
            $n=floor($n/10);
        }
        return true;
    }
?>