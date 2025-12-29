<?php
function nap_class($item)
{
    include 'classes/' . $item . '.class.php';
}
spl_autoload_register('nap_class');

$hcn = new HinhChuNhat(10, 20);
echo "<br/>" . get_class($hcn) . " " . $hcn;
