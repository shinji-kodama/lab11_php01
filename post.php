<?php
session_start();
echo 'セッションIDは'.$_COOKIE['PHPSESSID'].'です';
?>

<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
</head>
<body>
<form action="write.php" method="post">	 	<!-- post_confirm -> write.php -->
	<li class="AAA">名前: <input type="text" name="name"></li>
	<li class="AAA">性別: <select name="gender">
		<option value="m">男性</option>
		<option value="f">女性</option>
		<option value="o">その他</option>
	</select></li>		
	<li class="AAA">年齢: <input type="text" name="age"></li>		
	<li class="AAA">身長: <input type="text" name="height"></li>		
	<li class="AAA">体重: <input type="text" name="weight"></li>
	<input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>