<?
if (!isset($_SESSION)) session_start();
if (isset($_GET["reset"]) && $_GET["reset"] == 1)
    unset($_SESSION["n"]);
if (isset($_SESSION["n"]))
    $_SESSION["n"]++;
else
    $_SESSION["n"] = 1;
echo "ket qua n=:" . $_SESSION["n"];
?>
<br>
<a href="b.php">Trang b</a>
<a href="b.php?reset=1">Reset</a>