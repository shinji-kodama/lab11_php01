<?php

$str_base = 'PHP4, PHP5, PHP7';
$str = explode(', ', $str_base); //今回はスペースも入れてる

echo '<pre>';
var_dump($str);
var_dump($str_base);
echo '</pre>';

?>
<table>
    <tr>
        <td><?php echo $str[0]; ?></td>
    </tr>
</table>