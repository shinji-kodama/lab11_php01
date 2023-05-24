<?php
include('fs.php');
session_start();
$_SESSION = array();
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}
//セッションを破棄する
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    body {
        /* background:lightgray; */
    }
    .wrap {
        background: white;
        margin: 0 auto;
        width:1000px;
    }
    tr {
        border-bottom:black 1px solid;
        text-align:center;
    }
    th {
        background-color: lightgray;
    }
    p {
        text-align:center;
    }
    .imgbox {
        
        width: 400px;
        height: 300px;
        margin-left:auto;
        margin-right:auto;
        margin-top:60px;
    }
    .fl {
        display: flex;
        justify-content: equal-between;
    }

    table {
        margin: 0 auto;
    }
    </style>
</head>
<body>
    <div class="wrap">
        <h1 style="text-align:center">入力者の統計情報</h1>
        <div class="fl">
            <div class="imgbox" style="height:350px"><img src="fig01.php" width=400 height=400></div>
            <div class="imgbox" style="height:300px; width:300px"><canvas id="myChart01" width="300" height="300"></div>
        </div>
        <p>fig. 1 性別</p>
        <div class="fl">
            <div class="imgbox"><img src="fig03.php" width=400 height=300></div>
            <div class="imgbox"><canvas id="myChart03" width="400" height="300"></div>
        </div>
        <p>fig. 2 年齢構成</p>
        <div class="fl">
            <div class="imgbox"><img src="fig02.php" width=400 height=300></div>
            <div class="imgbox"><canvas id="myChart02" width="400" height="300"></div>
        </div>
        <p>fig. 3 身長と体重の関係</p>
        <p style="margin-top:60px">table 1 入力結果一覧</p>
        <table border='1'>
            <tr><th>index</th><th>名前</th><th>年齢</th><th>性別</th><th>身長(cm)</th><th>体重(kg)</th><th>BMI</th><th>BMI_Lloyd</th><th>登録時刻</th><th>session_id</th></tr>

<?php
$fp = fopen('./data/kadai.txt', 'r');
$index = 0;
$arr = [];

$sum_m = 0;
$sum_f = 0;
$sum_o = 0;

$sum_20 = 0;
$sum_30 = 0;
$sum_40 = 0;
$sum_50 = 0;
$sum_60 = 0;

while (!feof($fp)) {
    // fgetsでファイルを読み込み、変数に格納
    $row = rtrim(fgets($fp), "\n");
    if($row !== ''){
        $arr[0][$index] = $index;
        $txt = explode(',', $row);
        echo '<tr>';
        echo '<td>'.$index.'</td>';
        for($i = 0;$i < count($txt); ++$i){
            echo '<td>'.h($txt[$i]).'</td>';
            $arr[$i+1][$index] = (int)$txt[$i];
            if($i == 1){
                if($txt[$i]<30){
                    $sum_20 += 1;
                }
                if($txt[$i]>=30 && $txt[$i]<40){
                    $sum_30 += 1;
                }
                if($txt[$i]>=40 && $txt[$i]<50){
                    $sum_40 += 1;
                }
                if($txt[$i]>=50 && $txt[$i]<60){
                    $sum_50 += 1;
                }
                if($txt[$i]>=60){
                    $sum_60 += 1;
                }
            }
            if($txt[$i]=='m'){
                $sum_m += 1;
            }
            if($txt[$i]=='f'){
                $sum_f += 1;
            }
            if($txt[$i]=='o'){
                $sum_o += 1;
            }
        }
    echo '</tr>';
    }
    $index += 1;
} 

fclose($fp);
// d($arr);

$arr_gender = [$sum_m, $sum_f, $sum_o];
$arr_age = [$sum_20, $sum_30, $sum_40, $sum_50, $sum_60];
$php_g = json_encode($arr_gender);
$php_a = json_encode($arr_age);
$php_arr = json_encode($arr);

?>
        </table>
    
        <ul>
            <li><a href="post.php">post.phpを開く</a></li>
            <li><a href="input.php">戻る</a></li>
        </ul>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"></script>
<script>
const js_array = <?php echo $php_arr;?>;
const js_gender = <?php echo $php_g;?>;
const js_age = <?php echo $php_a;?>;
</script>
<script src="js/ch.js"></script>
</body>
</html>