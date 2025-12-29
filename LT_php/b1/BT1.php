<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = isset($_GET['a']) ? $_GET['a'] : 0;
    $b = isset($_GET['b']) ? $_GET['b'] : 0;
    $pheptinh = isset($_GET['pheptinh']) ? $_GET['pheptinh'] : '';
    ?>
    <form action="">
        A = <input type="number" name="a" id="" value="<? $a ?>">
        <br> <br>
        B = <input type="number" name="b" id="" value="<? $b ?>">
        <br><br>
        <div>
            <input type="submit" name="pheptinh" value="+">
            <input type="submit" name="pheptinh" value="-">
            <input type="submit" name="pheptinh" value="*">
            <input type="submit" name="pheptinh" value="/">
        </div>
        <br>
    </form>
    <?php
    if ($pheptinh == "+") {
        $c = $a + $b;
        echo "Tổng là:$a + $b = $c";
    } elseif ($pheptinh == "-") {
        $c = $a - $b;
        echo "Hiệu là:$a - $b = $c";
    } elseif ($pheptinh == "*") {
        $c = $a * $b;
        echo "Tích là:$a * $b = $c";
    } elseif ($pheptinh == "/") {
        if ($b != 0) {
            $c = $a / $b;
            echo "Thương là:$a / $b = $c";
        } else {
            echo "Không thể chia cho 0";
        }
    }
    ?>
</body>

</html>