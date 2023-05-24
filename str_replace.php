<?php

$a = 'PHP4,PHP5,PHP6,PHP7...';
$s = str_replace('PHP', 'JS', $a);
echo $s;

$m = str_replace('JS', 'Python', $s);
echo $m;
?>