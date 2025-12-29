<?php
$mod = getIndex("mod", "home");

if ($mod == "book")
	include "module/book/index.php";
else if ($mod == "order")
	include "module/order/index.php";
else if ($mod == "user")
	include "module/user/index.php";
else if ($mod == "news")
	include "module/news/index.php";
