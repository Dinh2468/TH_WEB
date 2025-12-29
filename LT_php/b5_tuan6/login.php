<?
if (!isset($_SESSION)) session_start();
if (isset($_POST['user']) && isset($_POST['pass']))
    $_SESSION['menber'] = $_POST['user'] . " - " . $_POST['pass'];
