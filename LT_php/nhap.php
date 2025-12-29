<?php
function F6($a)
{
    foreach ($a as $k => $v) $a[$k] += $v + $k;
    return implode('*', $a);
}
echo '<br>6.' . F6([1, 1, 0, 1]);
