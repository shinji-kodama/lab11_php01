<?php

function h($str){
    return htmlspecialchars($str, ENT_QUOTES); //PHPの文字を無効化する関数
}

function d($s){
    echo 'var_dump結果:';
    echo '<pre>';
    var_dump($s);
    echo '</pre>';
}

?>