<?php
$mod = getIndex("mod", "book");
$ac = getIndex("ac", "home");
if ($mod == "book")
	include "module/book/index.php";
if ($mod == "news")
	include "module/news/index.php";
if ($mod == "cart")
	include "module/cart/index.php";
if ($mod == "order")
	include "module/order/checkout.php";
if ($mod == "member") {
	if ($ac == "login") {
		include "module/member/login.php";
	} else if ($ac == "register") {
		include "module/member/register.php";
	}
}
