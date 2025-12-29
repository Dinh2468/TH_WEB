<?
    require("array_bt1.php");
    $a = GetArray2(10,1,20);
    // InArray($a);
    ShowArray($a);
    $b = Delete($a);
    // InArray($b);

    function GetArray($n, $min, $max){
        for($i = 0; $i< $n; $i++)
            $arr[] = rand($min, $max);
        return $arr;
    }

    function GetArray2($n, $min, $max){
        $arr = [];
        for($i = 0; $i < $n; $i++)
            {
                $rand_num = rand($min, $max);
                while(in_array($rand_num, $arr))
                    $rand_num = rand($min, $max);
                $arr[] = $rand_num;
            }
        return $arr;
    }

    function Delete($arr){
        foreach($arr as $key => $x){
            if($x % 2 == 0 && $x > 0)
                unset($arr[$key]);
        }
        return $arr;
    }

    function InArray($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

?>