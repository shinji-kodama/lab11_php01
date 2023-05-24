<?php
date_default_timezone_set('Asia/Tokyo');

$name = $_POST['name'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$bmi = round($weight/$height/$height*10000*10)/10;
$bmi_L = round(1.3*$weight/pow($height/100, 2.5),1);
$gender = $_POST['gender'];
$sid = $_COOKIE['PHPSESSID'];

$arr = [$name, $age, $gender, $height, $weight,$bmi, $bmi_L, date("Y-m-d H:i:s"), $sid];

//文字作成
$str = implode($arr, ',');
//File書き込み
$file = fopen("data/kadai.txt","a");	// ファイル読み込み
fwrite($file, $str."\n");
fclose($file);

header( "Location: ./read.php" ) ;
exit;
?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/test.csv を確認しましょう！</h2>

<ul>
<li><a href="read.php">read.phpを開く</a></li>
<li><a href="input.php">戻る</a></li>
</ul>
</body>
</html>