<?php
function nap_class($item)
{
    include 'ThiSinh/' . $item . '.class.php';
}
spl_autoload_register('nap_class');

$ts = new KhoiA(01, "Dinh", 7, 7, 7);
echo $ts;
