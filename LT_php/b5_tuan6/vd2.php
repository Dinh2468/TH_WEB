<?
echo $_POST['hoten'];
echo "<br>";
echo $_REQUEST['matkhau'];
echo "<br>";
echo $_POST['sesid'];
echo "<br>";
echo $_POST['gioitinh'];
if (isset($_POST['sothich']))
    foreach ($_POST['sothich'] as $st)
        echo "<br>" . $st;
else
    echo "Khong chon";
?>
<pre>
    <?
    print_r($_POST);
    ?>
</pre>