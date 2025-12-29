<?php
$loi = [];
$username = $password = $repassword = $email = $hoten = $ghichu = "";
$sothich = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    if (!preg_match('/^[a-zA-Z0-9._-]{6,20}$/', $username)) {
        $loi[] = "Username >= 6 ky tu va chi chua ky tu chu, so, dau cham, gach duoi, gach ngang.";
    }
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if (strlen($password) < 8) {
        $loi[] = "Mat khau phai >= 8 ky tu.";
    }
    if ($password !== $repassword) {
        $loi[] = "Mat khau va nhap lai mat khau khong khop.";
    }
    $email = trim($_POST['email']);
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $loi[] = "Email khong hop le.";
    }
    $hoten = trim($_POST['hoten']);
    if (str_word_count($hoten) < 2) {
        $loi[] = "Ho ten phai co it nhat 2 tu.";
    }
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
    if (!isset($_POST['sothich'])) {
        $loi[] = "Phai chon it nhat 1 so thich.";
    } else {
        $sothich = $_POST['sothich'];
    }
    $ghichu = strip_tags(trim($_POST['ghichu']));
    $ghichu = nl2br($ghichu);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form dang ky</title>
</head>

<body>
    <h2>Form dang ky</h2>

    <form action="" method="post">
        <label for=""> username</label><br>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
        <label for=""> password</label><br>
        <input type="password" name="password"><br>
        <label for=""> Re-password</label><br>
        <input type="password" name="repassword"><br>
        <label for=""> email</label><br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <label for=""> Ho ten</label><br>
        <input type="text" name="hoten" value="<?php echo htmlspecialchars($hoten); ?>"><br>
        <label for=""> Gioi tinh</label><br>
        <input type="radio" name="gioitinh" value="Nam" <?php if (isset($gioitinh) && $gioitinh == "Nam") echo "checked"; ?>>Nam
        <input type="radio" name="gioitinh" value="Nu" <?php if (isset($gioitinh) && $gioitinh == "Nu") echo "checked"; ?>>Nu<br>
        <label for=""> So thich</label><br>
        <input type="checkbox" name="sothich[]" value="The thao" <?php if (in_array("The thao", $sothich)) echo "checked"; ?>>The thao
        <input type="checkbox" name="sothich[]" value="Am nhac" <?php if (in_array("Am nhac", $sothich)) echo "checked"; ?>>Am nhac
        <input type="checkbox" name="sothich[]" value="Du lich" <?php if (in_array("Du lich", $sothich)) echo "checked"; ?>>Du lich<br>
        <label for=""> Ghi chu</label><br>
        <textarea name="ghichu" cols="30" rows="5"><?php echo htmlspecialchars($ghichu); ?></textarea><br>
        <input type="submit" value="Dang ky">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($loi) > 0) {
        echo "<div style='color:red;'> danh sach loi<br>";
        foreach ($loi as $l) {
            echo "-$l<br>";
        }
        echo "</div>";
    } else if ($_SERVER["REQUEST_METHOD"] == "POST" && count($loi) == 0) {
        echo "<h3>Thong tin dang ky</h3>";
        echo "Username: $username <br>";
        echo "password (SHA1):" . sha1($password) . "<br>";
        echo "Email: $email <br>";
        echo "Ho ten: $hoten <br>";
        echo "Gioi tinh: $gioitinh <br>";
        echo "So thich: " . implode(', ', $sothich) . "<br>";
        echo "Ghi chu: $ghichu <br>";
    }
    ?>
    <a href="">Cau 2</a>
</body>


</html>