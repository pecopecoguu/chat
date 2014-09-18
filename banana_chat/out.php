<?php
require_once 'function.php';
//セッション開始宣言
session_start();
//セッション破棄
session_destroy();
//メモリ開放
unset ($_SESSION['user']);

?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>バナナちゃっと</title>
<link rel="stylesheet" href="php.css" media="all" />
</head>
<body>
<div class="wrap">
	<header>
		<div class="logout">
			<p class="fbig">ご利用ありがとうございました。</p>
			<p><img src="saru.png" width="350px" alt="" /></p>
			<p><a href="index.php">トップぺージにもどる</a></p>
		</div>
	</header>
	<footer>
		<address>Copyright © 2014 CSS4 All Rights Reserved.</address>
	</footer>
</div>
</body>
</html>