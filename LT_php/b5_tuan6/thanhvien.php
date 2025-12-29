<?
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['menber'])) {
    header("Location: formlogin.php");
}
?>
<h3>Welcome, you</h3>
<h2>Your info: <?= $_SESSION['member'] ?></h2>
<a href="">Logout</a>