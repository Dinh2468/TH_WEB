<?
if (!isset($_SESSION))
    session_start();
if (isset($_SESSION['menber'])) {
    header("Location: thanhvien.php");
}
?>
<form action="">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit">
    <button type="submit">Login</button>
</form>