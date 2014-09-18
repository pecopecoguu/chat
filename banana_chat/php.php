<?php
require_once 'function.php';
session_start();
$data = $_POST;
$name = $_SESSION['user']['name'];
$date = $_SESSION['user']['date'];

if (!isset($name)){
	header('Location: index.php');
	exit();
}

if (isset($data['write'])){
	$str = str_replace(array("\r\n","\r"), "\t", $data['message']);
	$file = fopen('text.txt', 'ab');
	flock($file, LOCK_EX);
	fputs($file, h($name)."\t");
	fputs($file, h($date)."\t");
	fputs($file, h($str)."\n");
	flock($file, LOCK_UN);
	fclose($file);
}
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
		<h1><img src="logo.gif" width="500px" alt="" /></h1>
		<h2><?php print 'ようこそ　'.h($name).'バナナさん！！！'; ?></h2>
		<div id="form" class="clearfix">
			<form method="POST" action="php.php">
				<textarea name="message" id="message" required></textarea>
				<input type="submit" name="write" value="送信" >
				<p class="out"><a href="out.php" class="b">ログアウト</a></p>
			</form>
		</div>
	</header>
	<article id="main" class="clearfix">
		<?php
	$text = @file('text.txt')
	or die('ファイルが開けませんでした。');
	foreach (array_reverse($text) as $row) {
	$datum = explode("\t", $row);
	?>
		<div id="box">
			<dl class="li">
				<dt><?php print($datum[0].'バナナさん'); ?>
					<time><?php print('（'.$datum[1].'）'); ?></time>
				</dt>
				<dd>
					<?php foreach (array_slice($datum, 2) as $fruit) {
			echo $fruit . "<br>";
		}
		?>
				</dd>
			</dl>
		</div>
		<?php
	}
	?>
	</article>
	<footer>
		<p class="link"><a href="#top">トップに戻る</a></p>
		<address>
		Copyright © 2014 CSS4 All Rights Reserved.
		</address>
	</footer>
</div>
<SCRIPT LANGUAGE="JavaScript">
<!--
setTimeout("location.reload()",1000*30);
//-->
</SCRIPT>
</body>
</html>