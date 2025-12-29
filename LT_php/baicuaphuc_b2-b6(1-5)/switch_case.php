<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>May tinh</title>
    <?
        $a=isset($_GET['soa'])?(float)$_GET['soa']:0;
        $b=isset($_GET['sob'])?(float)$_GET['sob']:0;
        $pheptinh = isset($_GET['pheptinh'])?$_GET['pheptinh']:'';
    ?>
</head>
<body>
    <form action="switch_case.php" method="GET">
        <label for="soa">Số a:</label>
        <input type="number" name="soa" value="<?php $a ?>"><br/>
        <label for="sob">Số b:</label>
        <input type="number" name="sob" value="<?php $b ?>"><br/>
        <input type="submit" name="pheptinh" value="+">
        <input type="submit" name="pheptinh" value="-">
        <input type="submit" name="pheptinh" value="*">
        <input type="submit" name="pheptinh" value="/">
    </form>
    <?php
       switch ($pheptinh) {
        case '+':
            $c=$a+$b;
            echo $c;
            break;
        case '-':
            $c=$a-$b;
            echo $c;
            break;
        case '*':
            $c=$a*$b;
            echo $c;
            break;
        case '/':
            try {
                $c=$a/$b;
                echo $c;      
            } catch (Exception $e) {
                echo "Loi chia 0: \nMa loi: ".$e->getMessage();
            } finally{
                echo "Dong nay luon chay !!!";
            }
            break;
        default:
            # code...
            break;
       }
       
    ?>
</body>
</html>